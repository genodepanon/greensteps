<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

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

        $rows = DB::table($table)->orderByDesc('id')->limit(200)->get();
        $columns = $rows->isNotEmpty() ? array_keys((array) $rows->first()) : Schema::getColumnListing($table);
        $count = DB::table($table)->count();

        return view('secret', [
            'stage'   => 'table',
            'tables'  => self::TABLES,
            'table'   => $table,
            'rows'    => $rows,
            'columns' => $columns,
            'count'   => $count,
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

        $data = $request->except(['__table', '_token']);
        foreach ($data as $k => $v) {
            if ($v === '__NULL__') $data[$k] = null;
        }

        DB::table($table)->insert($data);

        return redirect('/axel?table=' . urlencode($table) . '&flash=created');
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