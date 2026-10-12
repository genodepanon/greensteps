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
        .login-password-wrap {
            display:flex; align-items:center; gap:0; width:100%; background:#0b2a3b; border:1px solid #334155; border-radius:10px;
            overflow:hidden; transition:border-color 0.2s ease, box-shadow 0.2s ease;
        }
        .login-password-wrap:focus-within {
            border-color:#7dd3fc; box-shadow:0 0 0 3px rgba(125, 211, 252, 0.12);
        }
        .login-password-icon {
            width:42px; text-align:center; color:#94a3b8; font-size:0.96rem; flex-shrink:0;
        }
        input[type=text], input[type=password], input[type=date], textarea, select {
            padding:10px; border-radius:8px; border:1px solid #334155; background:#0b2a3b; color:#e2e8f0; font-family:inherit; font-size:0.95rem;
        }
        input[type=text], input[type=password], textarea, select { width:100%; }
        .login-password-wrap input {
            border:none; background:transparent; width:100%; padding:12px 14px 12px 0; border-radius:0; color:#e2e8f0; font-size:0.95rem; outline:none;
        }
        label { display:block; margin:12px 0 4px; font-size:0.85rem; color:#94a3b8; font-weight:600; }
        table { width:100%; min-width:760px; border-collapse:collapse; font-size:0.82rem; }
        th, td { padding:8px 10px; text-align:left; border-bottom:1px solid #1e3a4f; vertical-align:top; max-width:280px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
        th { color:#7dd3fc; font-weight:600; background:#0b2a3b; position:sticky; top:0; }
        tr:hover { background:#1a4358; }
        .table-toolbar { display:grid; grid-template-columns:minmax(180px, 240px) minmax(220px, 1fr) auto auto; gap:12px; align-items:end; background:#123a4f; padding:16px; border-radius:12px; margin-bottom:12px; }
        .table-toolbar .field { min-width:0; }
        .table-toolbar label { margin-top:0; }
        .table-toolbar input, .table-toolbar select { width:100%; }
        .results-count { display:flex; justify-content:space-between; gap:12px; flex-wrap:wrap; margin:0 2px 12px; color:#94a3b8; font-size:0.82rem; }
        .table-card { overflow-x:auto; padding:0; }
        .table-card table { margin:0; }
        .empty-state { text-align:center; padding:48px 20px; color:#94a3b8; }
        .empty-state h2 { color:#e2e8f0; font-size:1.1rem; margin:10px 0 6px; }
        .empty-state p { margin:0 0 16px; font-size:0.9rem; }
        .pagination { display:flex; align-items:center; justify-content:space-between; gap:12px; margin-top:14px; color:#94a3b8; font-size:0.82rem; }
        .pagination-actions { display:flex; gap:8px; }
        .btn-disabled { opacity:0.45; cursor:not-allowed; }
        .account-form { max-width:720px; margin:0 auto; }
        .account-form h2 { margin:0 0 6px; color:#e2e8f0; font-size:1.15rem; }
        .account-form p { margin:0 0 14px; color:#94a3b8; font-size:0.85rem; }
        .account-grid { display:grid; grid-template-columns:repeat(2,minmax(0,1fr)); gap:0 16px; }
        .account-grid .form-row { min-width:0; }
        .account-actions { display:flex; flex-wrap:wrap; gap:8px; margin-top:16px; }
        .field-errors { margin:0 0 12px; padding-left:20px; }
        @media (max-width:700px) {
            body { padding:12px; }
            .topbar { align-items:flex-start; flex-direction:column; }
            .topbar-right { width:100%; flex-wrap:wrap; }
            .table-toolbar { grid-template-columns:minmax(0,1fr) auto; }
            .table-toolbar .field:first-child { grid-column:1 / -1; }
            .table-toolbar .search-field { grid-column:1 / -1; }
            .results-count { font-size:0.75rem; }
            .pagination { align-items:flex-start; flex-direction:column; }
            .login-box { margin:40px auto; }
            .account-grid { grid-template-columns:1fr; }
        }
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
            <div class="login-password-wrap">
                <span class="login-password-icon">🔒</span>
                <input type="password" name="password" autofocus required>
            </div>
            <div style="margin-top:16px;"><button class="btn" type="submit">Enter</button></div>
        </form>
    </div>
@endif

@if($stage === 'table')
    <div class="topbar">
        <div>
            <h1>Database manager</h1>
            <div class="small">{{ \Illuminate\Support\Str::headline($table) }} · {{ number_format($totalCount) }} total rows</div>
        </div>
        <div class="topbar-right">
            @if($table === 'users')
                <a class="btn" href="/axel/accounts/create">+ Create account</a>
            @else
                <a class="btn" href="/axel/create?table={{ urlencode($table) }}">+ New row</a>
            @endif
            <a class="btn btn-secondary" href="/axel/logs">Activity log</a>
            <a class="btn btn-secondary" href="/axel/logout">Logout</a>
        </div>
    </div>

    <form class="table-toolbar" method="GET" action="/axel">
        <div class="field">
            <label for="table">Table</label>
            <select id="table" name="table">
                @foreach($tables as $t)
                    <option value="{{ $t }}" {{ $t === $table ? 'selected' : '' }}>{{ \Illuminate\Support\Str::headline($t) }}</option>
                @endforeach
            </select>
        </div>
        <div class="field search-field">
            <label for="tableSearch">Search this table</label>
            <input id="tableSearch" type="search" name="q" value="{{ $search }}" placeholder="Search any column">
        </div>
        <button class="btn" type="submit">Search</button>
        @if($search)
            <a class="btn btn-secondary" href="/axel?table={{ urlencode($table) }}">Clear</a>
        @endif
    </form>
    <div class="results-count">
        <span>Results {{ number_format($rows->firstItem() ?? 0) }} to {{ number_format($rows->lastItem() ?? 0) }} of {{ number_format($count) }} matching rows</span>
        @if($search)<span>Search: “{{ $search }}”</span>@endif
    </div>

    @if($flash)<div class="flash">{{ $flash }}</div>@endif
    @if($error)<div class="error">{{ $error }}</div>@endif

    <div class="card table-card">
        @if($rows->count() === 0)
            <div class="empty-state">
                <i class="fas fa-magnifying-glass"></i>
                <h2>{{ $search ? 'No matching rows' : 'This table is empty' }}</h2>
                <p>{{ $search ? 'Try another search or clear the current filter.' : 'Add a row to get started.' }}</p>
                @if($search)
                    <a class="btn btn-secondary" href="/axel?table={{ urlencode($table) }}">Clear search</a>
                @else
                    @if($table === 'users')
                        <a class="btn" href="/axel/accounts/create">+ Create account</a>
                    @else
                        <a class="btn" href="/axel/create?table={{ urlencode($table) }}">+ New row</a>
                    @endif
                @endif
            </div>
        @else
            <table>
                <thead>
                    <tr>
                        @foreach($columns as $col)<th>{{ \Illuminate\Support\Str::headline($col) }}</th>@endforeach
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
    @if($rows->hasPages())
        <nav class="pagination" aria-label="Table pages">
            <span>Page {{ $rows->currentPage() }} of {{ $rows->lastPage() }}</span>
            <div class="pagination-actions">
                @if($rows->onFirstPage())
                    <span class="btn btn-secondary btn-disabled">Previous</span>
                @else
                    <a class="btn btn-secondary" href="{{ $rows->previousPageUrl() }}">Previous</a>
                @endif
                @if($rows->hasMorePages())
                    <a class="btn btn-secondary" href="{{ $rows->nextPageUrl() }}">Next</a>
                @else
                    <span class="btn btn-secondary btn-disabled">Next</span>
                @endif
            </div>
        </nav>
    @endif
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

@if($stage === 'account-create')
    <div class="topbar">
        <div>
            <h1>Create account</h1>
            <div class="small">Add a Citizen, Maintenance, or Admin account.</div>
        </div>
        <div class="topbar-right">
            <a class="btn btn-secondary" href="/axel?table=users">← Back to users</a>
            <a class="btn btn-secondary" href="/axel/logout">Logout</a>
        </div>
    </div>

    <div class="card account-form">
        <h2>Account details</h2>
        <p>Passwords are securely hashed before saving.</p>
        @if($errors->any())
            <div class="error">
                <ul class="field-errors">
                    @foreach($errors->all() as $message)<li>{{ $message }}</li>@endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/axel/accounts">
            @csrf
            <div class="account-grid">
                <div class="form-row">
                    <label for="accountName">Full name</label>
                    <input id="accountName" type="text" name="full_name" value="{{ old('full_name') }}" maxlength="150" autocomplete="name" required>
                </div>
                <div class="form-row">
                    <label for="accountEmail">Email address</label>
                    <input id="accountEmail" type="email" name="email" value="{{ old('email') }}" maxlength="150" autocomplete="email" required>
                </div>
                <div class="form-row">
                    <label for="accountRole">Account type</label>
                    <select id="accountRole" name="role" required>
                        <option value="citizen" {{ old('role', 'citizen') === 'citizen' ? 'selected' : '' }}>Citizen</option>
                        <option value="maintenance" {{ old('role') === 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                </div>
                <div class="form-row" id="accountTeamRow" {{ old('role', 'citizen') === 'maintenance' ? '' : 'hidden' }}>
                    <label for="accountTeam">Maintenance team</label>
                    <input id="accountTeam" type="text" name="team_name" value="{{ old('team_name') }}" maxlength="150">
                </div>
                <div class="form-row">
                    <label for="accountPhone">Phone (optional)</label>
                    <input id="accountPhone" type="tel" name="phone" value="{{ old('phone') }}" maxlength="50" autocomplete="tel">
                </div>
                <div class="form-row">
                    <label for="accountPassword">Password</label>
                    <input id="accountPassword" type="password" name="password" minlength="8" autocomplete="new-password" required>
                </div>
                <div class="form-row">
                    <label for="accountPasswordConfirmation">Confirm password</label>
                    <input id="accountPasswordConfirmation" type="password" name="password_confirmation" minlength="8" autocomplete="new-password" required>
                </div>
            </div>
            <div class="account-actions">
                <button class="btn" type="submit">Create account</button>
                <a class="btn btn-secondary" href="/axel?table=users">Cancel</a>
            </div>
        </form>
    </div>
    <script>
        const accountRole = document.getElementById('accountRole');
        const accountTeamRow = document.getElementById('accountTeamRow');
        const accountTeam = document.getElementById('accountTeam');
        function updateAccountTeamField() {
            const isMaintenance = accountRole.value === 'maintenance';
            accountTeamRow.hidden = !isMaintenance;
            accountTeam.required = isMaintenance;
        }
        accountRole.addEventListener('change', updateAccountTeamField);
        updateAccountTeamField();
    </script>
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