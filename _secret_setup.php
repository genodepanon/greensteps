<?php
$controller = <<<'PHP'
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
    ];

    public function index(Request $request)
    {
        if (!session(self::SESSION_KEY)) {
            return view('secret', ['stage' => 'login', 'error' => null]);
        }

        $table = $request->query('table', 'users');
        if (!in_array($table, self::TABLES, true)) $table = 'users';

        $rows = DB::table($table)->orderByDesc('id')->limit(200)->get();
        $columns = $rows->isNotEmpty() ? array_keys((array) $rows->first()) : Schema::getColumnListing($table);
        $count = DB::table($table)->count();

        return view('secret', [
            'stage' => 'table',
            'tables' => self::TABLES,
            'table' => $table,
            'rows' => $rows,
            'columns' => $columns,
            'count' => $count,
            'error' => $request->query('error'),
            'flash' => $request->query('flash'),
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
            'stage' => 'row',
            'tables' => self::TABLES,
            'table' => $table,
            'row' => (array) $row,
            'columns' => $columns,
            'error' => null,
            'flash' => null,
        ]);
    }

    public function update(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);
        $table = $request->input('__table');
        if (!in_array($table, self::TABLES, true)) abort(400);

        $id = (int) $request->input('__id');
        $data = $request->except(['__table', '__id', '_token']);

        // cast booleans / nulls
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
            'stage' => 'create',
            'tables' => self::TABLES,
            'table' => $table,
            'columns' => $columns,
            'error' => null,
            'flash' => null,
        ]);
    }

    public function store(Request $request)
    {
        if (!session(self::SESSION_KEY)) abort(403);
        $table = $request->input('__table');
        if (!in_array($table, self::TABLES, true)) abort(400);

        $data = $request->except(['__table', '_token']);
        foreach ($data as $k => $v) {
            if ($v === '__NULL__' || $v === '') {
                if ($v === '__NULL__') $data[$k] = null;
            }
        }

        DB::table($table)->insert($data);

        return redirect('/axel?table=' . urlencode($table) . '&flash=created');
    }
}
PHP;

$view = <<<'HTML'
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>DB Manager</title>
    <style>
        * { box-sizing: border-box; }
        body { font-family: -apple-system, Segoe UI, Roboto, sans-serif; background:#0b2a3b; color:#e2e8f0; margin:0; padding:20px; }
        h1 { color:#7dd3fc; margin:0 0 16px; font-size:1.4rem; }
        a { color:#7dd3fc; text-decoration:none; }
        a:hover { text-decoration:underline; }
        .btn { background:#2d7a4f; color:white; border:none; padding:8px 16px; border-radius:8px; cursor:pointer; font-weight:600; text-decoration:none; display:inline-block; }
        .btn:hover { background:#23673f; }
        .btn-danger { background:#dc2626; }
        .btn-danger:hover { background:#991b1b; }
        .btn-secondary { background:#334155; }
        .btn-secondary:hover { background:#475569; }
        .card { background:#123a4f; border-radius:12px; padding:20px; margin-bottom:16px; }
        .login-box { max-width:400px; margin:80px auto; }
        input[type=text], input[type=password], input[type=number], textarea, select {
            width:100%; padding:10px; border-radius:8px; border:1px solid #334155; background:#0b2a3b; color:#e2e8f0; font-family:inherit; font-size:0.95rem;
        }
        label { display:block; margin:12px 0 4px; font-size:0.85rem; color:#94a3b8; font-weight:600; }
        table { width:100%; border-collapse:collapse; font-size:0.82rem; }
        th, td { padding:8px 10px; text-align:left; border-bottom:1px solid #1e3a4f; vertical-align:top; max-width:280px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
        th { color:#7dd3fc; font-weight:600; background:#0b2a3b; position:sticky; top:0; }
        tr:hover { background:#1a4358; }
        .tabs { display:flex; flex-wrap:wrap; gap:8px; margin-bottom:16px; }
        .tabs a { padding:6px 14px; background:#123a4f; border-radius:20px; font-size:0.85rem; }
        .tabs a.active { background:#2d7a4f; color:white; }
        .error { background:#7f1d1d; color:#fecaca; padding:10px 14px; border-radius:8px; margin-bottom:12px; font-size:0.85rem; }
        .flash { background:#14532d; color:#bbf7d0; padding:10px 14px; border-radius:8px; margin-bottom:12px; font-size:0.85rem; }
        .actions { display:flex; gap:6px; white-space:nowrap; }
        .small { font-size:0.75rem; color:#64748b; }
        .col-name { display:inline-block; width:120px; font-weight:600; color:#7dd3fc; vertical-align:top; }
        .form-row { margin-bottom:8px; }
        .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
        .topbar-right { display:flex; gap:12px; align-items:center; }
    </style>
</head>
<body>

@if($stage === 'login')
    <div class="card login-box">
        <h1>DB Manager · Login</h1>
        @if(request()->session()->get('error'))
            <div class="error">{{ request()->session()->get('error') }}</div>
        @endif
        <form method="POST" action="/axel/login">
            @csrf
            <label>Password</label>
            <input type="password" name="password" autofocus required>
            <div style="margin-top:16px;"><button class="btn" type="submit">Enter</button></div>
        </form>
    </div>
@endif

@if($stage === 'table')
    <div class="topbar">
        <h1>DB Manager · <code style="color:#94a3b8;">{{ $table }}</code> <span class="small">({{ $count }} rows, showing up to 200)</span></h1>
        <div class="topbar-right">
            <a class="btn btn-secondary" href="/axel/create?table={{ urlencode($table) }}">+ New row</a>
            <a class="btn btn-secondary" href="/axel/logout">Logout</a>
        </div>
    </div>

    <div class="tabs">
        @foreach($tables as $t)
            <a href="/axel?table={{ urlencode($t) }}" class="{{ $t === $table ? 'active' : '' }}">{{ $t }}</a>
        @endforeach
    </div>

    @if($flash)<div class="flash">{{ $flash }}</div>@endif
    @if($error)<div class="error">{{ $error }}</div>@endif

    <div class="card" style="overflow-x:auto;">
        @if(count($rows) === 0)
            <p class="small">No rows.</p>
        @else
            <table>
                <thead>
                    <tr>
                        @foreach($columns as $col)<th>{{ $col }}</th>@endforeach
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rows as $row)
                        <tr>
                            @foreach($columns as $col)
                                <td title="{{ is_scalar($row->$col ?? '') ? $row->$col : json_encode($row->$col) }}">{{ \Illuminate\Support\Str::limit((string)($row->$col ?? ''), 60) }}</td>
                            @endforeach
                            <td>
                                <div class="actions">
                                    <a class="btn" style="padding:4px 10px; font-size:0.75rem;" href="/axel/row?table={{ urlencode($table) }}&id={{ $row->id }}">Edit</a>
                                    <form method="POST" action="/axel/delete" onsubmit="return confirm('Delete row #{{ $row->id }} from {{ $table }}?');" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="__table" value="{{ $table }}">
                                        <input type="hidden" name="__id" value="{{ $row->id }}">
                                        <button class="btn btn-danger" style="padding:4px 10px; font-size:0.75rem;" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endif

@if($stage === 'row')
    <div class="topbar">
        <h1>Edit row #{{ $row['id'] }} in <code>{{ $table }}</code></h1>
        <div class="topbar-right">
            <a class="btn btn-secondary" href="/axel?table={{ urlencode($table) }}">← Back</a>
        </div>
    </div>

    @if($flash)<div class="flash">{{ $flash }}</div>@endif
    @if($error)<div class="error">{{ $error }}</div>@endif

    <div class="card">
        <form method="POST" action="/axel/update">
            @csrf
            <input type="hidden" name="__table" value="{{ $table }}">
            <input type="hidden" name="__id" value="{{ $row['id'] }}">
            @foreach($columns as $col)
                @if($col === 'id') @continue @endif
                <div class="form-row">
                    <label>{{ $col }}</label>
                    @php
                        $val = $row[$col] ?? '';
                        $isLong = is_string($val) && strlen($val) > 80;
                    @endphp
                    @if($isLong)
                        <textarea name="{{ $col }}" rows="4">{{ $val }}</textarea>
                    @else
                        <input type="text" name="{{ $col }}" value="{{ $val }}" placeholder="(leave blank to keep empty) — type __NULL__ for NULL">
                    @endif
                </div>
            @endforeach
            <div style="margin-top:16px; display:flex; gap:10px;">
                <button class="btn" type="submit">Save changes</button>
                <a class="btn btn-secondary" href="/axel?table={{ urlencode($table) }}">Cancel</a>
            </div>
        </form>

        <hr style="margin:24px 0; border:none; border-top:1px solid #1e3a4f;">
        <form method="POST" action="/axel/delete" onsubmit="return confirm('Delete row #{{ $row['id'] }}?');">
            @csrf
            <input type="hidden" name="__table" value="{{ $table }}">
            <input type="hidden" name="__id" value="{{ $row['id'] }}">
            <button class="btn btn-danger" type="submit">Delete this row</button>
        </form>
    </div>
@endif

@if($stage === 'create')
    <div class="topbar">
        <h1>New row in <code>{{ $table }}</code></h1>
        <div class="topbar-right">
            <a class="btn btn-secondary" href="/axel?table={{ urlencode($table) }}">← Back</a>
        </div>
    </div>

    @if($flash)<div class="flash">{{ $flash }}</div>@endif
    @if($error)<div class="error">{{ $error }}</div>@endif

    <div class="card">
        <form method="POST" action="/axel/store">
            @csrf
            <input type="hidden" name="__table" value="{{ $table }}">
            @foreach($columns as $col)
                @if($col === 'id') @continue @endif
                <div class="form-row">
                    <label>{{ $col }}</label>
                    <input type="text" name="{{ $col }}" value="" placeholder="(empty) — type __NULL__ for NULL">
                </div>
            @endforeach
            <div style="margin-top:16px; display:flex; gap:10px;">
                <button class="btn" type="submit">Insert row</button>
                <a class="btn btn-secondary" href="/axel?table={{ urlencode($table) }}">Cancel</a>
            </div>
        </form>
    </div>
@endif

</body>
</html>
HTML;

file_put_contents(__DIR__ . '/app/Http/Controllers/SecretDbController.php', $controller);
file_put_contents(__DIR__ . '/resources/views/secret.blade.php', $view);

echo "Written:\n";
echo "  app/Http/Controllers/SecretDbController.php\n";
echo "  resources/views/secret.blade.php\n"; 
