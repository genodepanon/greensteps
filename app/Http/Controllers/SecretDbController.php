<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class SecretDbController extends Controller
{
    const PASSWORD = 'axel';
    const SESSION_KEY = 'secret_db_ok';

    private const TABLES = [
        'users', 'reports', 'tasks', 'ratings',
        'user_notifications', 'points_log', 'team_locations', 'report_comments',
        'activity_log',
    ];

    public function index(Request $request)
    {
        if (!session(self::SESSION_KEY)) {
            return view('secret', ['stage' => 'login', 'error' => null, 'tables' => self::TABLES]);
        }

        $table = $request->query('table', 'users');
        if (!in_array($table, self::TABLES, true)) $table = 'users';

        $columns = Schema::getColumnListing($table);
        if ($table === 'users') {
            $columns = array_values(array_diff($columns, ['password', 'remember_token']));
        }
        $search = trim((string) $request->query('q', ''));
        $query = DB::table($table);
        if ($search !== '') {
            $query->where(function ($query) use ($columns, $search) {
                foreach ($columns as $column) {
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        }

        $count = (clone $query)->count();
        $totalCount = DB::table($table)->count();
        $rows = $query->orderByDesc('id')->paginate(50)->withQueryString();

        return view('secret', [
            'stage'   => 'table',
            'tables'  => self::TABLES,
            'table'   => $table,
            'rows'    => $rows,
            'columns' => $columns,
            'count'   => $count,
            'totalCount' => $totalCount,
            'search'  => $search,
            'error'   => $request->query('error'),
            'flash'   => $request->query('flash'),
        ]);
    }

    public function login(Request $request)
    {
        if ($request->input('password') === self::PASSWORD) {
            session([self::SESSION_KEY => true]);
            return redirect('/axel');
        }
        return redirect('/axel')->with('error', 'Wrong password.');
    }

    public function logout()
    {
        session()->forget(self::SESSION_KEY);
        return redirect('/axel');
    }

    public function row(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);
        $table = $request->query('table');
        if (!in_array($table, self::TABLES, true)) abort(400);
        $id = (int) $request->query('id');

        $row = DB::table($table)->where('id', $id)->first();
        if (!$row) abort(404);

        $columns = Schema::getColumnListing($table);
        if ($table === 'users') {
            $columns = array_values(array_diff($columns, ['password', 'remember_token']));
        }

        return view('secret', [
            'stage'   => 'row',
            'tables'  => self::TABLES,
            'table'   => $table,
            'row'     => (array) $row,
            'columns' => $columns,
            'error'   => null,
            'flash'   => null,
        ]);
    }

    public function update(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);
        $table = $request->input('__table');
        if (!in_array($table, self::TABLES, true)) abort(400);

        $id = (int) $request->input('__id');
        $data = $request->except(['__table', '__id', '_token']);
        if ($table === 'users') {
            unset($data['password'], $data['remember_token']);
        }

        foreach ($data as $k => $v) {
            if ($v === '__NULL__') $data[$k] = null;
        }

        DB::table($table)->where('id', $id)->update($data);

        return redirect('/axel/row?table=' . urlencode($table) . '&id=' . $id . '&flash=updated');
    }

    public function delete(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);
        $table = $request->input('__table');
        if (!in_array($table, self::TABLES, true)) abort(400);
        $id = (int) $request->input('__id');

        DB::table($table)->where('id', $id)->delete();

        return redirect('/axel?table=' . urlencode($table) . '&flash=deleted');
    }

    public function createForm(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);
        $table = $request->query('table', 'users');
        if (!in_array($table, self::TABLES, true)) $table = 'users';
        if ($table === 'users') return redirect('/axel/accounts/create');

        $columns = Schema::getColumnListing($table);

        return view('secret', [
            'stage'   => 'create',
            'tables'  => self::TABLES,
            'table'   => $table,
            'columns' => $columns,
            'error'   => null,
            'flash'   => null,
        ]);
    }

    public function store(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);
        $table = $request->input('__table');
        if (!in_array($table, self::TABLES, true)) abort(400);
        if ($table === 'users') return redirect('/axel/accounts/create');

        $data = $request->except(['__table', '_token']);
        foreach ($data as $k => $v) {
            if ($v === '__NULL__') $data[$k] = null;
        }

        DB::table($table)->insert($data);

        return redirect('/axel?table=' . urlencode($table) . '&flash=created');
    }

    public function accountForm()
    {
        if (!session(self::SESSION_KEY)) abort(403);
        return view('secret', ['stage' => 'account-create', 'tables' => self::TABLES]);
    }

    public function createAccount(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);

        $data = $request->validate([
            'full_name' => 'required|string|max:150',
            'email' => 'required|email|max:150|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:citizen,maintenance,admin',
            'team_name' => 'nullable|required_if:role,maintenance|string|max:150',
            'phone' => 'nullable|string|max:50',
        ]);

        User::create([
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'team_name' => $data['role'] === 'maintenance' ? $data['team_name'] : null,
            'phone' => $data['phone'] ?? null,
            'points' => 0,
        ]);

        return redirect('/axel?table=users&flash=account+created');
    }

    // ============ ACTIVITY LOG VIEWER ============

    public function logs(Request $request)
    {
        if (!session(self::SESSION_KEY)) {
            return view('secret', ['stage' => 'login', 'error' => null, 'tables' => self::TABLES]);
        }

        $query = DB::table('activity_log')->orderByDesc('id');

        // Filters
        $userId = $request->query('user_id');
        if ($userId) $query->where('user_id', (int) $userId);

        $action = $request->query('action');
        if ($action) $query->where('action', $action);

        $from = $request->query('from');
        if ($from) $query->where('created_at', '>=', $from . ' 00:00:00');

        $to = $request->query('to');
        if ($to) $query->where('created_at', '<=', $to . ' 23:59:59');

        $search = $request->query('q');
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('user_name', 'like', "%{$search}%")
                  ->orWhere('details', 'like', "%{$search}%")
                  ->orWhere('ip_address', 'like', "%{$search}%");
            });
        }

        $logs = $query->limit(500)->get();
        $actions = DB::table('activity_log')->select('action')->groupBy('action')->orderBy('action')->pluck('action');

        return view('secret', [
            'stage'   => 'logs',
            'tables'  => self::TABLES,
            'logs'    => $logs,
            'actions' => $actions,
            'filters' => [
                'user_id' => $userId,
                'action'  => $action,
                'from'    => $from,
                'to'      => $to,
                'q'       => $search,
            ],
            'flash'   => $request->query('flash'),
        ]);
    }

    public function logsClear()
    {
        if (!session(self::SESSION_KEY)) abort(403);
        DB::table('activity_log')->truncate();
        return redirect('/axel/logs?flash=Log+cleared');
    }
}