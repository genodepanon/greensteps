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
        input[type=text], input[type=password], input[type=date], textarea, select {
            padding:10px; border-radius:8px; border:1px solid #334155; background:#0b2a3b; color:#e2e8f0; font-family:inherit; font-size:0.95rem;
        }
        input[type=text], input[type=password], textarea, select { width:100%; }
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
        .form-row { margin-bottom:8px; }
        .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:16px; }
        .topbar-right { display:flex; gap:12px; align-items:center; }

        /* Log-specific */
        .log-filters { display:flex; gap:10px; flex-wrap:wrap; align-items:flex-end; margin-bottom:16px; }
        .log-filters .f { display:flex; flex-direction:column; }
        .log-filters .f label { margin:0 0 4px 0; }
        .log-filters input, .log-filters select { min-width:140px; }
        .action-pill { padding:3px 10px; border-radius:40px; font-size:0.7rem; font-weight:700; letter-spacing:0.3px; text-transform:uppercase; white-space:nowrap; }
        .action-LOGIN          { background:#dbeafe; color:#1e4a7a; }
        .action-LOGOUT         { background:#f1f5f9; color:#475569; }
        .action-REGISTER       { background:#dcfce7; color:#166534; }
        .action-SUBMIT_REPORT  { background:#fef3c7; color:#92400e; }
        .action-ASSIGN_TEAM    { background:#ede9fe; color:#6d28d9; }
        .action-START_TASK     { background:#e0f2fe; color:#0369a1; }
        .action-COMPLETE_TASK  { background:#dcfce7; color:#166534; }
        .action-REJECT_TASK    { background:#fee2e2; color:#991b1b; }
        .action-REJECT_REPORT  { background:#fee2e2; color:#991b1b; }
        .action-RATE_TEAM      { background:#fef3c7; color:#92400e; }
        .action-UPDATE_PROFILE { background:#dbeafe; color:#1e4a7a; }
        .action-other          { background:#e2e8f0; color:#334155; }
        .ip-col { font-family: ui-monospace, monospace; font-size:0.75rem; color:#94a3b8; }
        .time-col { font-family: ui-monospace, monospace; font-size:0.75rem; color:#94a3b8; }
    </style>
</head>
<body>

@if($stage === 'login')
    <div class="card login-box">
        <h1>DB Manager · Login</h1>
        @if(session('error'))
            <div class="error">{{ session('error') }}</div>
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
            <a class="btn btn-secondary" href="/axel/logs">📜 Activity Log</a>
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

@if($stage === 'logs')
    <div class="topbar">
        <h1>📜 Activity Log <span class="small">({{ count($logs) }} entries, newest first)</span></h1>
        <div class="topbar-right">
            <a class="btn btn-secondary" href="/axel">← Back to tables</a>
            <form method="POST" action="/axel/logs/clear" onsubmit="return confirm('Delete ALL log entries? This cannot be undone.');" style="display:inline;">
                @csrf
                <button class="btn btn-danger" type="submit">Clear log</button>
            </form>
        </div>
    </div>

    @if($flash)<div class="flash">{{ $flash }}</div>@endif

    <div class="card">
        <form method="GET" action="/axel/logs">
            <div class="log-filters">
                <div class="f">
                    <label>Search (name / details / IP)</label>
                    <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Sara, team alpha, 127.0...">
                </div>
                <div class="f">
                    <label>Action</label>
                    <select name="action">
                        <option value="">All</option>
                        @foreach($actions as $a)
                            <option value="{{ $a }}" {{ ($filters['action'] ?? '') === $a ? 'selected' : '' }}>{{ $a }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="f">
                    <label>From date</label>
                    <input type="date" name="from" value="{{ $filters['from'] ?? '' }}">
                </div>
                <div class="f">
                    <label>To date</label>
                    <input type="date" name="to" value="{{ $filters['to'] ?? '' }}">
                </div>
                <div class="f">
                    <button class="btn" type="submit">Filter</button>
                </div>
                <div class="f">
                    <a class="btn btn-secondary" href="/axel/logs">Reset</a>
                </div>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Time</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Action</th>
                    <th>Details</th>
                    <th>IP</th>
                </tr>
            </thead>
            <tbody>
                @foreach($logs as $log)
                    @php
                        $pillClass = in_array($log->action, [
                            'LOGIN','LOGOUT','REGISTER','SUBMIT_REPORT','ASSIGN_TEAM',
                            'START_TASK','COMPLETE_TASK','REJECT_TASK','REJECT_REPORT',
                            'RATE_TEAM','UPDATE_PROFILE'
                        ]) ? 'action-' . $log->action : 'action-other';
                    @endphp
                    <tr>
                        <td class="small">#{{ $log->id }}</td>
                        <td class="time-col">{{ $log->created_at }}</td>
                        <td>{{ $log->user_name ?? '—' }}</td>
                        <td class="small">{{ $log->user_role ?? '—' }}</td>
                        <td><span class="action-pill {{ $pillClass }}">{{ $log->action }}</span></td>
                        <td title="{{ $log->details }}">{{ \Illuminate\Support\Str::limit((string)($log->details ?? ''), 80) }}</td>
                        <td class="ip-col">{{ $log->ip_address ?? '—' }}</td>
                    </tr>
                @endforeach
                @if(count($logs) === 0)
                    <tr><td colspan="7" class="small" style="text-align:center; padding:20px;">No log entries match your filters.</td></tr>
                @endif
            </tbody>
        </table>
    </div>
@endif

</body>
</html>