
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>GreenSteps · Environmental Reporting System</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet" />
        <style>
            * { margin: 0; padding: 0; box-sizing: border-box; }

             body {
                font-family: 'Inter', sans-serif;
                background: linear-gradient(145deg, #f0f4f8 0%, #e2eaf1 100%);
                min-height: 100vh;
                color: #1e293b;
                padding: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            /* DARK MODE */
            body.dark-mode {
                background: linear-gradient(145deg, #0d0f12 0%, #171a1d 100%);
                color: #f3f4f6;
            }
            body.dark-mode .login-container,
            body.dark-mode .card,
            body.dark-mode .stat-card,
            body.dark-mode .modal-box,
            body.dark-mode .dropdown-menu,
            body.dark-mode .notification-dropdown,
            body.dark-mode .profile-dropdown,
            body.dark-mode .sidebar,
            body.dark-mode .chat-sidebar,
            body.dark-mode .chat-main,
            body.dark-mode .report-card,
            body.dark-mode .photo-modal-content,
            body.dark-mode .form-group,
            body.dark-mode .input-wrapper {
                background: #171b1d;
                border: 1px solid #2d3135;
                color: #f3f4f6;
            }
            body.dark-mode .card-header {
                background: #1d2125;
                border-bottom: 1px solid #2d3135;
            }
            body.dark-mode .card-header h3 {
                color: #f3f4f6;
            }
            body.dark-mode .stat-card .number {
                color: #f3f4f6;
            }
            body.dark-mode .stat-card .label {
                color: #d1d5db;
            }
            body.dark-mode .btn {
                background: #2b2f33;
                color: #f3f4f6;
                border-color: #3d4248;
            }
            body.dark-mode .btn-secondary { background: #2b2f33; color: #f3f4f6; }
            body.dark-mode .admin-report-search-input input,
            body.dark-mode .admin-report-filter-toggle,
            body.dark-mode .admin-report-export-button,
            body.dark-mode .admin-filter-control,
            body.dark-mode .search-box input,
            body.dark-mode .team-selector select,
            body.dark-mode input,
            body.dark-mode select,
            body.dark-mode textarea,
            body.dark-mode .input-wrapper input,
            body.dark-mode .form-group input,
            body.dark-mode .form-group select {
                background: #24282c;
                color: #f3f4f6;
                border-color: #3d4248;
            }
            body.dark-mode input::placeholder,
            body.dark-mode textarea::placeholder,
            body.dark-mode .form-group input::placeholder,
            body.dark-mode select option {
                color: #d1d5db;
            }
            body.dark-mode .user-badge {
                background: rgba(255,255,255,0.05);
                color: #f3f4f6;
            }
            body.dark-mode .badge {
                filter: grayscale(1) brightness(1.05);
            }
            body.dark-mode .badge-bg {
                background: #2b2f33;
                color: #f3f4f6;
            }
            body.dark-mode .report-card .info h4 { color: #f3f4f6; }
            body.dark-mode .report-card .meta { color: #d1d5db; }
            body.dark-mode .report-actions .btn { background: #2b2f33; color: #f3f4f6; }
            body.dark-mode .header { background: rgba(17,19,21,0.85); }
            body.dark-mode .empty-desc { color: #d1d5db; }
            body.dark-mode .empty-title { color: #f3f4f6; }
            body.dark-mode .task-item {
                border-bottom-color: #2d3135;
            }
            body.dark-mode #notificationBell {
                color: #f3f4f6;
            }
            body.dark-mode .report-priority-badge {
                color: #f3f4f6;
            }
            body.dark-mode .applicant-action {
                background: #2b2f33;
                color: #f3f4f6;
                border-color: #3d4248;
            }
            body.dark-mode .map-legend {
                background: #1d2125;
                border: 1px solid #2d3135;
            }
            body.dark-mode .map-legend span {
                color: #f3f4f6;
            }
            body.dark-mode .map-popup,
            body.dark-mode .map-popup-content {
                background: #171b1d;
                color: #f3f4f6;
            }
            body.dark-mode .modal-overlay {
                background: rgba(0,0,0,0.72);
            }
            body.dark-mode .progress-bar-bg {
                background: #2d3135;
            }
            body.dark-mode .progress-bar-fill {
                background: #d1d5db;
            }
            body.dark-mode .table-row {
                border-bottom-color: #2d3135;
            }
            body.dark-mode .table-header {
                background: #1d2125;
                border-bottom: 1px solid #2d3135;
                color: #f3f4f6;
            }
            /* MONOCHROME DARK MODE */
            body.dark-mode .badge-pending,
            body.dark-mode .badge-review,
            body.dark-mode .badge-assigned,
            body.dark-mode .badge-progress,
            body.dark-mode .badge-completed,
            body.dark-mode .badge-rejected,
            body.dark-mode .badge-rated,
            body.dark-mode .badge-bg,
            body.dark-mode .badge-assigned,
            body.dark-mode .badge-progress,
            body.dark-mode .badge-rejected {
                background: #2b2f33;
                color: #f3f4f6;
                border: 1px solid #3d4248;
            }
            body.dark-mode .badge-pending i,
            body.dark-mode .badge-assigned i,
            body.dark-mode .badge-progress i,
            body.dark-mode .badge-completed i,
            body.dark-mode .badge-rejected i,
            body.dark-mode .badge-rated i,
            body.dark-mode .badge-review i {
                color: #e5e7eb !important;
            }
            body.dark-mode .btn-primary {
                background: #e5e7eb;
                color: #111827;
                border: 1px solid #d1d5db;
            }
            body.dark-mode .btn-primary:hover {
                background: #f3f4f6;
                color: #111827;
            }
            body.dark-mode .btn-success,
            body.dark-mode .btn-info,
            body.dark-mode .btn-admin,
            body.dark-mode .btn-rate,
            body.dark-mode .btn-danger {
                background: #3d4248;
                color: #f3f4f6;
                border: 1px solid #52575d;
            }
            body.dark-mode .priority-critical,
            body.dark-mode .priority-high,
            body.dark-mode .priority-medium,
            body.dark-mode .priority-low {
                background: #2b2f33;
                color: #f3f4f6;
            }
            body.dark-mode .status-dot {
                color: #e5e7eb;
            }
            body.dark-mode .legend-dot {
                filter: grayscale(1) brightness(1.5);
            }
            body.dark-mode .map-key-item {
                color: #d1d5db;
            }
            body.dark-mode .stats-card .stat-value {
                color: #f3f4f6;
            }
            body.dark-mode .stats-card .stat-label {
                color: #d1d5db;
            }
            body.dark-mode .badge-pending .fas,
            body.dark-mode .badge-completed .fas,
            body.dark-mode .badge-rejected .fas,
            body.dark-mode .badge-rated .fas,
            body.dark-mode .badge-assigned .fas,
            body.dark-mode .badge-progress .fas,
            body.dark-mode .badge-review .fas {
                color: #e5e7eb !important;
            }
            body.dark-mode .btn-map {
                background: #2b2f33;
                color: #f3f4f6;
                border-color: #3d4248;
            }
            body.dark-mode .pref-toggle span:before {
                background: #d1d5db;
            }
            body.dark-mode .chat-person:hover,
            body.dark-mode .chat-person.active {
                background: #2b2f33;
                border-color: #3d4248;
            }
            body.dark-mode .chat-message-row.theirs .chat-bubble {
                background: #2b2f33;
                color: #f3f4f6;
                border-color: #3d4248;
            }
            body.dark-mode .chat-search input {
                background: #24282c;
                color: #f3f4f6;
                border-color: #3d4248;
            }
            body.dark-mode textarea,
            body.dark-mode .form-group textarea,
            body.dark-mode .comment-compose textarea,
            body.dark-mode #trackCommentInput,
            body.dark-mode #rateComment,
            body.dark-mode #adminRejectReason,
            body.dark-mode #maintRejectReason,
            body.dark-mode #startNotes,
            body.dark-mode #completeNotes,
            body.dark-mode #description {
                background: #24282c !important;
                color: #f3f4f6 !important;
                border-color: #3d4248 !important;
            }
            body.dark-mode textarea::placeholder,
            body.dark-mode .comment-compose textarea::placeholder {
                color: #d1d5db !important;
            }
            body.dark-mode h3,
            body.dark-mode .card-header h3,
            body.dark-mode .modal-box h3,
            body.dark-mode .modal-box h3 i,
            body.dark-mode .nav-route .route-step .step-desc,
            body.dark-mode .role-name,
            body.dark-mode .role-desc,
            body.dark-mode .role-arrow,
            body.dark-mode .form-group .input-wrapper i,
            body.dark-mode .report-time,
            body.dark-mode .task-time,
            body.dark-mode .task-item .task-location,
            body.dark-mode .track-step .step-label,
            body.dark-mode .track-step .step-desc,
            body.dark-mode .track-step .step-time,
            body.dark-mode .notification-item .notif-time,
            body.dark-mode .comment-time,
            body.dark-mode .empty-state,
            body.dark-mode .map-key-item,
            body.dark-mode .filter-hint,
            body.dark-mode .muted-text,
            body.dark-mode .meta-text,
            body.dark-mode .modal-box .modal-subtitle,
            body.dark-mode .detail-row .detail-label,
            body.dark-mode .detail-row .detail-value {
                color: #f3f4f6 !important;
            }
            body.dark-mode .modal-details {
                background: #1d2125 !important;
                border: 1px solid #2d3135;
            }
            body.dark-mode .modal-details .detail-row {
                border-bottom-color: #2d3135;
            }
            body.dark-mode .modal-details .detail-label {
                color: #d1d5db !important;
            }
            body.dark-mode .modal-details .detail-value {
                color: #f3f4f6 !important;
            }
            body.dark-mode .tracking-timeline,
            body.dark-mode .track-step,
            body.dark-mode .report-track-expand,
            body.dark-mode .live-track-wrap,
            body.dark-mode .nav-route {
                background: #1d2125 !important;
                border-color: #2d3135 !important;
            }
            body.dark-mode .track-step .step-label,
            body.dark-mode .track-step .step-desc,
            body.dark-mode .track-step .step-time,
            body.dark-mode .live-track-title,
            body.dark-mode .live-track-meta,
            body.dark-mode .nav-route .route-step .step-desc,
            body.dark-mode .nav-route .route-step .step-dist {
                color: #f3f4f6 !important;
            }
            body.dark-mode .track-step.done .step-icon,
            body.dark-mode .track-step.active .step-icon,
            body.dark-mode .track-step.rejected .step-icon {
                background: #2b2f33 !important;
                color: #f3f4f6 !important;
                border: 1px solid #3d4248;
            }
            body.dark-mode .track-step::before {
                background: #3d4248 !important;
            }
            body.dark-mode .track-step.done::before,
            body.dark-mode .track-step.active::before,
            body.dark-mode .track-step.rejected::before {
                background: #3d4248 !important;
            }
            body.dark-mode .live-status {
                background: #2b2f33 !important;
                color: #f3f4f6 !important;
            }
            body.dark-mode .live-status.live {
                background: #21362c !important;
                color: #d1d5db !important;
            }
            body.dark-mode .live-status.waiting {
                background: #332e26 !important;
                color: #f3f4f6 !important;
            }
            body.dark-mode .live-track-map {
                background: #171b1d !important;
                border-color: #3d4248 !important;
            }
            body.dark-mode .form-group label,
            body.dark-mode .admin-filter-field > span,
            body.dark-mode .task-search i,
            body.dark-mode .profile-menu-item .menu-arrow,
            body.dark-mode .upload-area i,
            body.dark-mode .upload-area .upload-hint,
            body.dark-mode .report-card .meta,
            body.dark-mode .task-item .task-meta,
            body.dark-mode .report-item .report-meta {
                color: #f3f4f6 !important;
            }

            .btn {
                display: inline-flex; align-items: center; gap: 8px;
                padding: 0.6rem 1.4rem; border-radius: 60px;
                font-weight: 600; font-size: 0.9rem; border: none;
                cursor: pointer; transition: all 0.2s ease;
                background: white; color: #0b2a3b;
                font-family: inherit;
                box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            }
            .btn-primary { background: #2d7a4f; color: white; }
            .btn-primary:hover { background: #23673f; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(45,122,79,0.3); }
            .btn-outline-light { background: transparent; border: 1.5px solid rgba(255,255,255,0.25); color: white; }
            .btn-outline-light:hover { background: rgba(255,255,255,0.08); }
            .btn-logout { background: rgba(220,38,38,0.15); color: #fca5a5; border: 1px solid rgba(220,38,38,0.2); }
            .btn-logout:hover { background: rgba(220,38,38,0.25); }
            .btn-success { background: #16a34a; color: white; }
            .btn-success:hover { background: #15803d; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(22,163,74,0.3); }
            .btn-secondary { background: #f1f5f9; color: #1e293b; }
            .btn-secondary:hover { background: #e2e8f0; }
            .btn-info { background: #2563eb; color: white; }
            .btn-info:hover { background: #1d4ed8; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(37,99,235,0.3); }
            .btn-admin { background: #7c3aed; color: white; }
            .btn-admin:hover { background: #6d28d9; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(124,58,237,0.3); }
            .btn-rate { background: #f59e0b; color: white; }
            .btn-rate:hover { background: #d97706; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(245,158,11,0.3); }
            .btn-danger { background: #dc2626; color: white; }
            .btn-danger:hover { background: #b91c1c; transform: translateY(-2px); box-shadow: 0 4px 16px rgba(220,38,38,0.3); }
            .btn-sm { font-size: 0.75rem; padding: 0.35rem 0.8rem; }
            .btn-sm-admin {
                background: #f1f5f9; color: #1e293b;
                font-size: 0.8rem; padding: 0.3rem 0.7rem;
                border-radius: 12px; border: 1px solid #e2e8f0;
            }
            .btn-sm-admin:hover { background: #e2e8f0; }

            .login-container {
                max-width: 440px; width: 100%;
                background: white; border-radius: 40px;
                padding: 2.5rem 2.2rem;
                box-shadow: 0 20px 60px rgba(11,42,59,0.10);
                border: 1px solid rgba(255,255,255,0.5);
                margin: 20px auto;
            }
            .logo { text-align: center; margin-bottom: 2rem; }
            .logo h1 {
                font-size: 2.2rem; font-weight: 700; color: #0b2a3b;
                letter-spacing: -0.02em; display: flex;
                align-items: center; justify-content: center; gap: 10px;
            }
            .logo h1 i { color: #2d7a4f; }
            .logo .subtitle { color: #64748b; font-size: 0.9rem; margin-top: 4px; font-weight: 500; }
            .divider { height: 2px; background: linear-gradient(to right, transparent, #dce3ec, transparent); margin: 1.5rem 0; }
            .login-title { font-size: 1.5rem; font-weight: 600; margin-bottom: 0.3rem; color: #0b2a3b; }
            .login-subtitle { color: #64748b; font-size: 0.9rem; margin-bottom: 1.8rem; }

            .role-buttons { display: flex; flex-direction: column; gap: 12px; margin-bottom: 1rem; }
            .role-btn {
                display: flex; align-items: center; gap: 14px;
                padding: 1rem 1.2rem; border-radius: 20px;
                border: 2px solid #e9eef3; background: white;
                cursor: pointer; transition: all 0.2s ease;
                font-family: inherit; text-align: left; width: 100%;
            }
            body.dark-mode .role-btn {
                background: #2d3e52;
                border-color: #4a5a72;
                color: #e2e8f0;
            }
            .role-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
            .role-btn.citizen-role:hover { border-color: #2d7a4f; background: #f0fdf4; }
            .role-btn.maintenance-role:hover { border-color: #2563eb; background: #eff6ff; }
            .role-btn.admin-role:hover { border-color: #7c3aed; background: #f5f3ff; }
            .role-icon {
                width: 48px; height: 48px; border-radius: 16px;
                display: flex; align-items: center; justify-content: center;
                font-size: 1.4rem; flex-shrink: 0;
            }
            .citizen-icon { background: #dbeafe; color: #1e4a7a; }
            .maintenance-icon { background: #e0e7ff; color: #3730a3; }
            .admin-icon { background: #ede9fe; color: #6d28d9; }
            .role-info { flex: 1; }
            .role-name { font-weight: 600; font-size: 1rem; color: #0b2a3b; margin-bottom: 2px; }
            .role-desc { font-size: 0.8rem; color: #64748b; }
            .role-arrow { color: #94a3b8; font-size: 0.9rem; transition: 0.15s ease; }
            .role-btn:hover .role-arrow { color: #0b2a3b; transform: translateX(4px); }

            .form-group { margin-bottom: 1.2rem; }
            .form-group label { display: block; font-weight: 500; font-size: 0.85rem; margin-bottom: 6px; color: #1e293b; }
            .form-group label .required { color: #dc2626; margin-left: 2px; }
            .form-group .input-wrapper { position: relative; display: flex; align-items: center; }
            .form-group .input-wrapper i { position: absolute; left: 14px; color: #94a3b8; font-size: 1rem; }
            .form-group input, .form-group select, .form-group textarea {
                width: 100%; padding: 0.8rem 1rem 0.8rem 2.8rem;
                border-radius: 16px; border: 1.5px solid #e2e8f0;
                font-family: inherit; font-size: 0.95rem;
                transition: 0.15s ease; background: #f8fafc;
            }
            .form-group textarea { padding: 0.8rem 1rem; resize: vertical; min-height: 60px; }
            .form-group select { padding: 0.8rem 1rem; }
            .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
                outline: none; border-color: #2d7a4f; background: white;
                box-shadow: 0 0 0 3px rgba(45,122,79,0.08);
            }
            .form-options { display: flex; justify-content: space-between; align-items: center; margin: 0.5rem 0 1.5rem; font-size: 0.85rem; }
            .form-options label { display: flex; align-items: center; gap: 6px; color: #64748b; cursor: pointer; }
            .form-options label input[type="checkbox"] { width: 16px; height: 16px; accent-color: #2d7a4f; cursor: pointer; }
            .form-options a { color: #2d7a4f; text-decoration: none; font-weight: 500; cursor: pointer; }

            .btn-login {
                width: 100%; padding: 0.9rem; border-radius: 60px; border: none;
                background: #2d7a4f; color: white; font-weight: 600;
                font-size: 1rem; cursor: pointer; transition: all 0.2s ease;
                display: flex; align-items: center; justify-content: center;
                gap: 8px; font-family: inherit;
            }
            .btn-login:hover { background: #23673f; transform: translateY(-2px); box-shadow: 0 6px 20px rgba(45,122,79,0.3); }

            .register-link { text-align: center; margin-top: 1.5rem; color: #64748b; font-size: 0.9rem; }
            .register-link a { color: #2d7a4f; font-weight: 600; text-decoration: none; cursor: pointer; }
            .register-link a:hover { text-decoration: underline; }

            .error-message {
                background: #fee2e2; color: #991b1b;
                padding: 10px 16px; border-radius: 12px;
                font-size: 0.85rem; display: none; margin-bottom: 1rem;
                align-items: center; gap: 8px;
            }
            .error-message.show { display: flex; }

            .dashboard-container { max-width: 1300px; width: 100%; display: none; }
            .dashboard-container.active { display: block; }

            .header {
                background: linear-gradient(145deg, #0b2a3b 0%, #123a4f 100%);
                border-radius: 24px; padding: 1.5rem 2rem; color: white;
                display: flex; flex-wrap: wrap; justify-content: space-between;
                align-items: center; margin-bottom: 2rem;
            }
            .header-left { display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
            .header-left h1 { font-size: 1.6rem; font-weight: 700; display: flex; align-items: center; gap: 10px; }
            .header-left h1 i { color: #7dd3fc; }
            .header-left .user-badge {
                background: rgba(255,255,255,0.12); padding: 6px 16px;
                border-radius: 40px; font-size: 0.8rem;
                display: flex; align-items: center; gap: 8px;
                cursor: pointer; transition: 0.15s ease;
                border: 1px solid transparent;
            }
            .header-left .user-badge:hover { background: rgba(255,255,255,0.2); border-color: rgba(255,255,255,0.2); }
            .header-right { display: flex; gap: 12px; align-items: center; flex-wrap: wrap; }

            .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2rem; }
            .stat-card { background: white; border-radius: 20px; padding: 1.5rem; border: 1px solid #e9eef3; box-shadow: 0 2px 8px rgba(0,0,0,0.02); }
            .stat-card .number { font-size: 2.2rem; font-weight: 700; color: #0b2a3b; }
            .stat-card .label { font-size: 0.85rem; color: #64748b; margin-top: 4px; display: flex; align-items: center; gap: 6px; }

            .main-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
            .card { background: white; border-radius: 24px; padding: 1.5rem 1.8rem; border: 1px solid #e9eef3; box-shadow: 0 2px 8px rgba(0,0,0,0.02); }
            .card-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
            .card-header h3 { font-size: 1.1rem; font-weight: 600; display: flex; align-items: center; gap: 8px; }
            .card-header .action-link { color: #2563eb; font-size: 0.85rem; cursor: pointer; font-weight: 500; }
            .card-header .action-link:hover { text-decoration: underline; }

            .admin-report-searchbar {
                display: grid; grid-template-columns: minmax(0, 1fr) auto auto 42px;
                gap: 0.5rem; align-items: center; margin-bottom: 0.75rem;
            }
            .admin-report-search-input { position: relative; min-width: 0; }
            .admin-report-search-input > i { position: absolute; left: 0.85rem; top: 50%; transform: translateY(-50%); color: #64748b; }
            .admin-report-search-input input {
                width: 100%; min-width: 0; height: 42px; padding: 0.6rem 0.75rem 0.6rem 2.4rem;
                border: 1px solid #e2e8f0; border-radius: 12px; background: #f8fafc;
                color: #1e293b; font: inherit; font-size: 0.85rem;
            }
            .admin-report-search-input input:focus { outline: none; border-color: #2d7a4f; background: white; box-shadow: 0 0 0 3px rgba(45,122,79,0.08); }
            .admin-report-search-button, .admin-report-filter-toggle, .admin-report-export-button {
                display: inline-flex; align-items: center; justify-content: center; gap: 0.4rem;
                min-height: 42px; padding: 0.55rem 0.8rem; border: 1px solid #e2e8f0;
                border-radius: 12px; font: inherit; font-size: 0.82rem; font-weight: 600; cursor: pointer;
            }
            .admin-report-search-button { background: #2d7a4f; border-color: #2d7a4f; color: white; }
            .admin-report-search-button:hover { background: #246641; }
            .admin-report-filter-toggle, .admin-report-export-button { background: white; color: #334155; }
            .admin-report-filter-toggle[aria-expanded="true"] { border-color: #2d7a4f; color: #246641; background: #f0fdf4; }
            .admin-report-export-button { width: 42px; padding: 0; color: #2563eb; }
            .admin-report-filters {
                display: grid; grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 0.75rem; margin-bottom: 0.75rem; padding: 0.9rem;
                border: 1px solid #e2e8f0; border-radius: 12px; background: #f8fafc;
            }
            .admin-report-filters[hidden] { display: none; }
            .admin-filter-field { display: flex; flex-direction: column; gap: 0.35rem; min-width: 0; }
            .admin-filter-field > span { color: #64748b; font-size: 0.75rem; font-weight: 600; }
            .admin-filter-control {
                width: 100%; min-width: 0; min-height: 42px; padding: 0.6rem 0.75rem;
                border: 1px solid #e2e8f0; border-radius: 12px; background: #f8fafc;
                color: #1e293b; font: inherit; font-size: 0.85rem;
            }
            .admin-filter-control:focus { outline: none; border-color: #2d7a4f; background: white; box-shadow: 0 0 0 3px rgba(45,122,79,0.08); }
            .admin-filter-export { display: flex; align-items: flex-end; justify-content: flex-end; }
            .admin-filter-clear { min-height: 42px; padding: 0.55rem 0.75rem; border: 0; background: transparent; color: #64748b; font: inherit; font-size: 0.8rem; cursor: pointer; }
            .admin-filter-clear:hover { color: #1e293b; }
            .applicant-actions { display: flex; align-items: center; gap: 0.45rem; }
            .applicant-action {
                display: inline-flex; align-items: center; justify-content: center;
                width: 38px; height: 38px; border: 1px solid transparent; border-radius: 50%;
                cursor: pointer; font-size: 0.9rem; transition: background 0.15s ease, transform 0.15s ease;
            }
            .applicant-action:hover { transform: scale(1.06); }
            .applicant-approve { background: #dcfce7; border-color: #bbf7d0; color: #15803d; }
            .applicant-approve:hover { background: #bbf7d0; }
            .applicant-reject { background: #fee2e2; border-color: #fecaca; color: #b91c1c; }
            .applicant-reject:hover { background: #fecaca; }

            .report-item, .task-item {
                display: flex; justify-content: space-between; align-items: center;
                padding: 0.9rem 0; border-bottom: 1px solid #f0f4f9; transition: 0.1s ease;
            }
            .report-item:last-child, .task-item:last-child { border-bottom: none; }
            .report-item:hover, .task-item:hover { background: #f8fafc; margin: 0 -0.5rem; padding-left: 0.5rem; padding-right: 0.5rem; border-radius: 8px; }
            body.dark-mode .report-item:hover,
            body.dark-mode .task-item:hover {
                background: #20252a;
            }
            .report-item .report-info, .task-item .task-info { display: flex; align-items: center; gap: 10px; flex: 1; }
            .report-item .report-info i, .task-item .task-info i { width: 20px; }
            .report-item .report-title, .task-item .task-title { font-weight: 500; font-size: 0.95rem; }
            .report-item .report-meta, .task-item .task-meta { display: flex; align-items: center; gap: 10px; flex-wrap: wrap; }
            .task-item .task-location { font-size: 0.8rem; color: #64748b; margin-top: 2px; }
            .task-item .task-actions { display: flex; gap: 6px; flex-wrap: wrap; }

            .badge { display: inline-block; padding: 4px 14px; border-radius: 40px; font-size: 0.7rem; font-weight: 600; letter-spacing: 0.3px; text-transform: uppercase; }
            .badge-pending { background: #fef9c3; color: #854d0e; }
            .badge-review { background: #dbeafe; color: #1e4a7a; }
            .badge-assigned { background: #e0f2fe; color: #0369a1; }
            .badge-progress { background: #f3e8ff; color: #6b21a5; }
            .badge-completed { background: #dcfce7; color: #166534; }
            .badge-rejected { background: #fee2e2; color: #991b1b; }
            .badge-rated { background: #fef3c7; color: #92400e; }

            .report-time, .task-time { font-size: 0.75rem; color: #94a3b8; }

            .btn-sm {
                padding: 0.35rem 0.85rem; font-size: 0.75rem; border-radius: 40px;
                border: none; cursor: pointer; transition: 0.15s ease;
                font-weight: 500; display: inline-flex; align-items: center;
                gap: 4px; font-family: inherit;
            }
            .btn-sm-primary { background: #dbeafe; color: #1e4a7a; }
            .btn-sm-primary:hover { background: #bfdbfe; transform: scale(1.05); }
            .btn-sm-success { background: #dcfce7; color: #166534; }
            .btn-sm-success:hover { background: #bbf7d0; transform: scale(1.05); }
            .btn-sm-info { background: #dbeafe; color: #1e4a7a; }
            .btn-sm-info:hover { background: #bfdbfe; transform: scale(1.05); }
            .btn-sm-admin { background: #ede9fe; color: #6d28d9; }
            .btn-sm-admin:hover { background: #ddd6fe; transform: scale(1.05); }
            .btn-sm-warning { background: #fef3c7; color: #92400e; }
            .btn-sm-warning:hover { background: #fde68a; transform: scale(1.05); }
            .btn-sm-rate { background: #fef3c7; color: #92400e; }
            .btn-sm-rate:hover { background: #fde68a; transform: scale(1.05); }
            .btn-sm-track { background: #e0f2fe; color: #0369a1; }
            .btn-sm-track:hover { background: #bae6fd; transform: scale(1.05); }
            .btn-sm-actions {
                background: #f1f5f9; color: #1e293b;
                border: 1px solid #e2e8f0;
            }
            .btn-sm-actions:hover { background: #e2e8f0; transform: scale(1.05); }
            .btn-sm-actions i { color: #2563eb; }
            .btn-sm-danger { background: #fee2e2; color: #991b1b; }
            .btn-sm-danger:hover { background: #fecaca; transform: scale(1.05); }

            .tracking-timeline {
                display: flex; flex-direction: column;
                gap: 0; margin: 0.5rem 0 0.8rem 0;
                padding: 0.5rem 0.2rem 0.2rem 0.2rem;
                position: relative;
            }
            .track-step {
                display: flex; align-items: flex-start; gap: 14px;
                padding: 0.6rem 0; position: relative;
            }
            .track-step .step-icon {
                width: 32px; height: 32px; border-radius: 50%;
                display: flex; align-items: center; justify-content: center;
                font-size: 0.75rem; flex-shrink: 0;
                background: #e9eef3; color: #94a3b8;
                transition: 0.2s ease; position: relative; z-index: 2;
            }
            .track-step.done .step-icon { background: #dcfce7; color: #16a34a; }
            .track-step.active .step-icon { background: #fef3c7; color: #d97706; box-shadow: 0 0 0 4px rgba(245,158,11,0.15); }
            .track-step.rejected .step-icon { background: #fee2e2; color: #dc2626; }
            .track-step .step-content { flex: 1; padding-top: 4px; }
            .track-step .step-label { font-weight: 500; font-size: 0.9rem; color: #94a3b8; }
            .track-step.done .step-label { color: #166534; font-weight: 500; }
            .track-step.active .step-label { color: #92400e; font-weight: 600; }
            .track-step.rejected .step-label { color: #991b1b; font-weight: 600; }
            .track-step .step-desc { font-size: 0.78rem; color: #94a3b8; margin-top: 2px; }
            .track-step.done .step-desc { color: #4b7a5a; }
            .track-step.active .step-desc { color: #b45309; }
            .track-step.rejected .step-desc { color: #b91c1c; }
            .track-step .step-time { font-size: 0.65rem; color: #94a3b8; margin-top: 2px; display: block; }
            .track-step::before {
                content: ''; position: absolute; left: 15px; top: 38px;
                width: 2px; height: calc(100% - 10px);
                background: #e9eef3; z-index: 1;
            }
            .track-step:last-child::before { display: none; }
            .track-step.done::before { background: #86efac; }
            .track-step.active::before { background: linear-gradient(to bottom, #fcd34d 50%, #e9eef3 50%); }
            .track-step.rejected::before { background: #fca5a5; }
            .track-step:first-child::before { top: 38px; }
            .track-step:last-child .step-content { padding-bottom: 0; }

            .track-btn {
                display: inline-flex; align-items: center; gap: 4px;
                background: #f1f5f9; border: none; padding: 4px 12px;
                border-radius: 40px; font-size: 0.7rem; font-weight: 500;
                color: #1e293b; cursor: pointer; transition: 0.15s ease;
                font-family: inherit;
            }
            .track-btn:hover { background: #e2e8f0; }
            .track-btn i { font-size: 0.65rem; color: #2563eb; }

            .report-track-expand {
                grid-column: 1 / -1; width: 100%;
                padding: 0.5rem 0.2rem 0.2rem 0.2rem;
                animation: fadeIn 0.25s ease;
                border-bottom: 1px solid #f0f4f9;
            }
            .report-track-expand:last-child { border-bottom: none; }

            .live-track-wrap {
                margin-top: 0.75rem; padding-top: 0.75rem;
                border-top: 1px dashed #dbe4ee;
            }
            .live-track-header {
                display: flex; align-items: center; justify-content: space-between;
                gap: 8px; margin-bottom: 0.5rem; flex-wrap: wrap;
            }
            .live-track-title {
                font-weight: 600; font-size: 0.88rem; color: #0b2a3b;
                display: flex; align-items: center; gap: 6px;
            }
            .live-track-title i { color: #2563eb; }
            .live-status {
                display: inline-flex; align-items: center; gap: 6px;
                font-size: 0.7rem; font-weight: 500; color: #64748b;
                background: #f1f5f9; padding: 3px 10px; border-radius: 40px;
            }
            .live-status.live { color: #166534; background: #dcfce7; }
            .live-status.waiting { color: #92400e; background: #fef3c7; }
            .live-pulse-dot {
                width: 7px; height: 7px; border-radius: 50%;
                background: #94a3b8; flex-shrink: 0;
            }
            .live-status.live .live-pulse-dot {
                background: #16a34a;
                box-shadow: 0 0 0 0 rgba(22,163,74,0.5);
                animation: livePulse 1.6s ease infinite;
            }
            .live-status.waiting .live-pulse-dot { background: #d97706; }
            @keyframes livePulse {
                0% { box-shadow: 0 0 0 0 rgba(22,163,74,0.45); }
                70% { box-shadow: 0 0 0 8px rgba(22,163,74,0); }
                100% { box-shadow: 0 0 0 0 rgba(22,163,74,0); }
            }
            .live-track-map {
                width: 100%; height: 240px; border-radius: 14px;
                background: #e9eef3; border: 1px solid #cbd9e8; overflow: hidden;
            }
            .live-track-meta {
                margin-top: 0.45rem; font-size: 0.72rem; color: #64748b;
                display: flex; gap: 12px; flex-wrap: wrap;
            }
            .gps-indicator {
                display: none; align-items: center; gap: 6px;
                font-size: 0.72rem; font-weight: 500; color: #166534;
                background: #dcfce7; border: 1px solid #bbf7d0;
                padding: 4px 10px; border-radius: 40px; margin-left: 8px;
            }
            .gps-indicator.active { display: inline-flex; }
            .gps-indicator .gps-dot {
                width: 7px; height: 7px; border-radius: 50%; background: #16a34a;
                animation: livePulse 1.6s ease infinite;
            }

            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(-6px); }
                to { opacity: 1; transform: translateY(0); }
            }

            .report-item-wrap {
                display: flex; flex-direction: column;
                border-bottom: 1px solid #f0f4f9;
            }
            .report-item-wrap:last-child { border-bottom: none; }
            .report-item-wrap .report-item {
                border-bottom: none; padding: 0.9rem 0;
            }
            .report-item-wrap .report-item:hover {
                background: #f8fafc; margin: 0 -0.5rem;
                padding-left: 0.5rem; padding-right: 0.5rem;
                border-radius: 8px;
            }

            .notification-item {
                display: flex; gap: 12px; padding: 0.8rem 0;
                border-bottom: 1px solid #f0f4f9; transition: 0.1s ease;
            }
            .notification-item:last-child { border-bottom: none; }
            .notification-item .notif-icon {
                width: 32px; height: 32px; border-radius: 50%; background: #dbeafe;
                display: flex; align-items: center; justify-content: center;
                color: #1e4a7a; font-size: 0.8rem; flex-shrink: 0;
            }
            .notification-item .notif-content { flex: 1; }
            .notification-item .notif-content .notif-title { font-weight: 500; font-size: 0.9rem; }
            .notification-item .notif-content .notif-desc { font-size: 0.8rem; color: #64748b; }
            .notification-item .notif-time { font-size: 0.7rem; color: #94a3b8; }

            .comments-section {
                margin-top: 1rem; padding-top: 0.85rem;
                border-top: 1px dashed #dbe4ee;
            }
            .comments-section-title {
                font-weight: 600; font-size: 0.9rem; color: #0b2a3b;
                display: flex; align-items: center; gap: 8px; margin-bottom: 0.65rem;
            }
            .comments-section-title i { color: #2563eb; }
            .comments-thread {
                max-height: 260px; overflow-y: auto;
                display: flex; flex-direction: column; gap: 10px;
                padding: 0.2rem 0.15rem 0.4rem 0.15rem;
                margin-bottom: 0.65rem;
            }
            .comment-bubble {
                background: #f8fafc; border: 1px solid #e2e8f0;
                border-radius: 12px; padding: 0.65rem 0.8rem;
            }
            .comment-bubble.mine {
                background: #eff6ff; border-color: #bfdbfe;
            }
            .comment-meta {
                display: flex; align-items: center; justify-content: space-between;
                gap: 8px; margin-bottom: 4px; flex-wrap: wrap;
            }
            .comment-author {
                font-weight: 600; font-size: 0.78rem; color: #0b2a3b;
                display: inline-flex; align-items: center; gap: 6px;
            }
            .comment-role {
                font-size: 0.62rem; font-weight: 600; text-transform: uppercase;
                letter-spacing: 0.03em; padding: 2px 7px; border-radius: 40px;
            }
            .comment-role.citizen { background: #dbeafe; color: #1e40af; }
            .comment-role.admin { background: #fef3c7; color: #92400e; }
            .comment-role.maintenance { background: #e0e7ff; color: #3730a3; }
            .comment-time { font-size: 0.65rem; color: #94a3b8; }
            .comment-text {
                font-size: 0.84rem; color: #334155; line-height: 1.45;
                white-space: pre-wrap; word-break: break-word;
            }
            .comments-empty {
                text-align: center; padding: 0.9rem 0.5rem;
                color: #94a3b8; font-size: 0.8rem;
            }
            .comment-compose {
                display: flex; flex-direction: column; gap: 8px;
            }
            .comment-compose textarea {
                width: 100%; min-height: 72px; resize: vertical;
                border: 1px solid #cbd9e8; border-radius: 12px;
                padding: 0.7rem 0.85rem; font-family: inherit;
                font-size: 0.85rem; color: #0b2a3b; background: #fff;
            }
            .comment-compose textarea:focus {
                outline: none; border-color: #2563eb;
                box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
            }
            .comment-compose-actions {
                display: flex; justify-content: flex-end; gap: 8px;
            }

            .empty-state { text-align: center; padding: 2rem 1rem; color: #94a3b8; }
            .empty-state i { font-size: 2.5rem; opacity: 0.4; margin-bottom: 0.6rem; display: block; }
            .empty-state .empty-title { font-weight: 500; font-size: 0.95rem; color: #64748b; }
            .empty-state .empty-desc { font-size: 0.8rem; margin-top: 4px; }

            #nearbyMap { width: 100%; height: 220px; border-radius: 16px; background: #e9eef3; border: 1px solid #cbd9e8; margin-top: 0.5rem; }
            #googleMap { width: 100%; height: 260px; background: #e9eef3; }
            #maintMap { width: 100%; height: 240px; border-radius: 16px; background: #e9eef3; border: 1px solid #cbd9e8; }
            #navMap { width: 100%; height: 200px; border-radius: 16px; background: #e9eef3; border: 1px solid #cbd9e8; margin-bottom: 1rem; }
            .map-container { margin-top: 8px; border-radius: 16px; overflow: hidden; border: 1.5px solid #e2e8f0; position: relative; }
            .map-hint {
                position: absolute; bottom: 10px; left: 10px;
                background: rgba(0,0,0,0.75); backdrop-filter: blur(8px);
                color: white; padding: 6px 12px; border-radius: 40px;
                font-size: 0.72rem; display: flex; align-items: center; gap: 6px; z-index: 5;
            }
            .map-actions { display: flex; gap: 8px; margin-top: 8px; flex-wrap: wrap; }
            .map-legend { margin-top: 0.8rem; display: flex; gap: 8px; flex-wrap: wrap; }

            .btn-map {
                display: inline-flex; align-items: center; gap: 6px;
                padding: 0.5rem 1rem; border-radius: 40px;
                border: 1.5px solid #e2e8f0; background: white;
                color: #1e293b; font-size: 0.8rem; font-weight: 500;
                cursor: pointer; transition: 0.15s ease; font-family: inherit;
            }
            .btn-map:hover { background: #f1f5f9; border-color: #cbd5e1; }
            .btn-map i { color: #2d7a4f; }
            .btn-map:disabled { opacity: 0.6; cursor: not-allowed; }

            .location-coords {
                margin-top: 8px; padding: 8px 12px;
                background: #f0fdf4; border-radius: 10px;
                border: 1px solid #bbf7d0; font-size: 0.8rem;
                color: #166534; display: none; align-items: center; gap: 8px;
            }
            .location-coords.show { display: flex; }

            .modal-overlay {
                display: none; position: fixed; inset: 0;
                background: rgba(0,0,0,0.5); backdrop-filter: blur(4px);
                z-index: 1000; justify-content: center; align-items: center; padding: 20px;
            }
            .modal-overlay.active { display: flex; }

            .modal-box {
                background: white; max-width: 620px; width: 100%;
                border-radius: 32px; padding: 2rem;
                box-shadow: 0 20px 60px rgba(0,0,0,0.2);
                animation: fadeIn 0.25s ease; max-height: 92vh; overflow-y: auto;
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(20px) scale(0.98); }
                to { opacity: 1; transform: translateY(0) scale(1); }
            }
            .modal-box h3 { font-size: 1.3rem; margin-bottom: 0.5rem; display: flex; align-items: center; gap: 10px; color: #0b2a3b; }
            .modal-subtitle { color: #64748b; font-size: 0.9rem; margin-bottom: 1.5rem; }

            .modal-details { background: #f8fafc; border-radius: 16px; padding: 1rem 1.2rem; margin-bottom: 1.2rem; }
            .modal-details .detail-row {
                display: flex; justify-content: space-between;
                padding: 0.4rem 0; border-bottom: 1px solid #e9eef3; font-size: 0.9rem;
            }
            .modal-details .detail-row:last-child { border-bottom: none; }
            .modal-details .detail-label { color: #64748b; font-weight: 500; }
            .modal-details .detail-value { font-weight: 500; color: #0b2a3b; text-align: right; max-width: 60%; }

            .upload-area {
                border: 2px dashed #dce3ec; border-radius: 14px;
                padding: 1.2rem; text-align: center; color: #64748b;
                cursor: pointer; transition: 0.15s ease; background: #fafbfc;
            }
            .upload-area:hover { border-color: #2d7a4f; background: #f8fafc; }
            .upload-area i { font-size: 1.8rem; display: block; margin-bottom: 6px; color: #94a3b8; }
            .upload-area .upload-text { font-size: 0.85rem; }
            .upload-area .upload-hint { font-size: 0.75rem; color: #94a3b8; margin-top: 4px; }

            .photo-preview {
                margin-top: 10px; padding: 10px 14px;
                background: #f0fdf4; border-radius: 12px;
                border: 1px solid #bbf7d0; display: none;
                align-items: center; gap: 10px;
                color: #166534; font-size: 0.85rem;
            }
            .photo-preview.show { display: flex; }
            .photo-preview .remove-photo {
                margin-left: auto; color: #dc2626;
                cursor: pointer; font-weight: 600; font-size: 0.8rem;
            }

            .form-actions {
                display: flex; gap: 10px; justify-content: flex-end;
                margin-top: 1.5rem; padding-top: 1rem;
                border-top: 1px solid #f0f4f9;
            }

            .other-category-wrapper {
                max-height: 0; overflow: hidden;
                transition: max-height 0.3s ease, margin-bottom 0.3s ease;
            }
            .other-category-wrapper.show { max-height: 130px; margin-bottom: 1.2rem; }

            .profile-avatar {
                width: 80px; height: 80px; border-radius: 50%;
                background: linear-gradient(145deg, #2d7a4f, #1a4d33);
                display: flex; align-items: center; justify-content: center;
                font-size: 2.5rem; color: white; margin: 0 auto 1rem;
                box-shadow: 0 4px 20px rgba(45,122,79,0.3);
            }
            .profile-name { text-align: center; font-size: 1.3rem; font-weight: 700; color: #0b2a3b; }
            .profile-role { text-align: center; color: #64748b; font-size: 0.9rem; margin-top: 2px; }
            .profile-stats {
                display: grid; grid-template-columns: repeat(3, 1fr);
                gap: 0.5rem; margin: 1.2rem 0; padding: 1rem;
                background: #f8fafc; border-radius: 16px;
            }
            .profile-stat { text-align: center; }
            .profile-stat .number { font-size: 1.4rem; font-weight: 700; color: #0b2a3b; }
            .profile-stat .label { font-size: 0.7rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.3px; }

            .profile-menu-item {
                display: flex; align-items: center; gap: 12px;
                padding: 0.8rem 1rem; border-radius: 12px;
                cursor: pointer; transition: 0.15s ease;
                border: 1px solid transparent; margin-bottom: 4px;
            }
            .profile-menu-item:hover { background: #f1f5f9; border-color: #e2e8f0; }
            .profile-menu-item i { width: 20px; color: #64748b; }
            .profile-menu-item .menu-text { flex: 1; font-size: 0.9rem; color: #1e293b; }
            .profile-menu-item .menu-arrow { color: #94a3b8; }
            .profile-menu-item.danger .menu-text { color: #dc2626; }
            .profile-menu-item.danger i { color: #dc2626; }

            .nearby-panel {
                margin-top: 0.75rem;
                border-radius: 14px;
                border: 1px solid #fde68a;
                background: #fffbeb;
                padding: 0.75rem 0.85rem;
                display: none;
            }
            .nearby-panel.show { display: block; }
            .nearby-panel h4 {
                margin: 0 0 0.45rem;
                font-size: 0.82rem;
                color: #92400e;
                display: flex;
                align-items: center;
                gap: 6px;
            }
            .nearby-item {
                display: flex;
                justify-content: space-between;
                gap: 8px;
                align-items: flex-start;
                padding: 0.45rem 0;
                border-top: 1px solid #fef3c7;
                font-size: 0.8rem;
                color: #78350f;
            }
            .nearby-item:first-of-type { border-top: none; }
            .nearby-item button {
                border: none;
                background: #fef3c7;
                color: #92400e;
                border-radius: 999px;
                padding: 0.25rem 0.65rem;
                font-size: 0.72rem;
                font-weight: 600;
                cursor: pointer;
                white-space: nowrap;
            }
            .pref-row {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 0.85rem 0;
                border-bottom: 1px solid #e2e8f0;
            }
            .pref-row:last-child { border-bottom: none; }
            .pref-row .pref-label { font-size: 0.9rem; color: #1e293b; font-weight: 600; }
            .pref-row .pref-desc { font-size: 0.75rem; color: #64748b; margin-top: 2px; }
            .pref-toggle {
                position: relative;
                width: 46px;
                height: 26px;
                flex-shrink: 0;
            }
            .pref-toggle input { opacity: 0; width: 0; height: 0; }
            .pref-toggle span {
                position: absolute; inset: 0;
                background: #cbd5e1;
                border-radius: 999px;
                cursor: pointer;
                transition: 0.2s;
            }
            .pref-toggle span:before {
                content: '';
                position: absolute;
                width: 20px; height: 20px;
                left: 3px; top: 3px;
                background: white;
                border-radius: 50%;
                transition: 0.2s;
            }
            .pref-toggle input:checked + span { background: #2d7a4f; }
            .pref-toggle input:checked + span:before { transform: translateX(20px); }
            .nav-route {
                background: #f0fdf4; border-radius: 16px; padding: 1rem;
                margin: 1rem 0; border: 1px solid #bbf7d0;
            }
            .nav-route .route-step {
                display: flex; align-items: center; gap: 10px;
                padding: 6px 0; font-size: 0.9rem;
            }
            .nav-route .route-step i { width: 20px; color: #2d7a4f; }
            .nav-route .route-step .step-desc { color: #1e293b; }
            .nav-route .route-step .step-dist { margin-left: auto; color: #64748b; font-size: 0.8rem; }

            .task-stats {
                display: grid; grid-template-columns: repeat(3, 1fr);
                gap: 0.8rem; margin-bottom: 1.2rem; padding: 1rem;
                background: #f8fafc; border-radius: 16px;
            }
            .task-stat { text-align: center; cursor: pointer; transition: 0.15s ease; padding: 4px; border-radius: 8px; }
            .task-stat:hover { background: #e2e8f0; }
            .task-stat .num { font-size: 1.5rem; font-weight: 700; color: #0b2a3b; }
            .task-stat .lbl { font-size: 0.7rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.3px; margin-top: 2px; }

            .task-search {
                position: relative; display: flex; align-items: center;
                background: #f8fafc; border: 1.5px solid #e2e8f0;
                border-radius: 40px; padding: 4px 12px; min-width: 170px;
            }
            .task-search i { color: #94a3b8; font-size: 0.8rem; }
            .task-search input {
                border: none; background: transparent; outline: none;
                font-family: inherit; font-size: 0.8rem; padding: 4px 6px;
                color: #1e293b; width: 130px;
            }
            .highlight-1s { animation: highlight1s 1s ease; }
            @keyframes highlight1s {
                0% { background-color: rgba(37,99,235,0.30); box-shadow: 0 0 0 2px rgba(37,99,235,0.55); }
                100% { background-color: transparent; box-shadow: none; }
            }
            .btn-icon-only { padding: 0.6rem 0.7rem !important; }
            .btn-sm.btn-icon-only, .track-btn.btn-icon-only { padding: 0.4rem 0.6rem !important; }
            .btn-map.btn-icon-only { padding: 0.5rem 0.7rem !important; }
            .btn-icon-only i { margin: 0 !important; }

            .success-toast {
                position: fixed; top: 20px; right: 20px;
                background: #2d7a4f; color: white;
                padding: 16px 24px; border-radius: 16px;
                box-shadow: 0 8px 30px rgba(0,0,0,0.15);
                display: none; align-items: center; gap: 12px;
                animation: slideIn 0.3s ease; z-index: 2000; max-width: 400px;
            }
            .success-toast.show { display: flex; }
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            .success-toast i { font-size: 1.4rem; }
            .success-toast .toast-content { flex: 1; }
            .success-toast .toast-title { font-weight: 600; font-size: 0.95rem; }
            .success-toast .toast-desc { font-size: 0.8rem; opacity: 0.9; }
            .success-toast .toast-close { background: none; border: none; color: white; font-size: 1.2rem; cursor: pointer; opacity: 0.7; }

            .rating-stars { display: flex; gap: 4px; align-items: center; }
            .rating-stars .star {
                font-size: 1.6rem; color: #d1d5db; cursor: pointer;
                transition: 0.15s ease;
            }
            .rating-stars .star:hover,
            .rating-stars .star.active { color: #f59e0b; }
            .rating-stars .star:hover ~ .star { color: #d1d5db; }

            .action-modal-buttons {
                display: flex; flex-direction: column; gap: 10px;
                margin-top: 1rem;
            }
            .action-modal-buttons .btn {
                width: 100%; justify-content: center;
                padding: 0.8rem 1.4rem; font-size: 0.95rem;
            }

            .edit-profile-actions {
                display: flex; gap: 10px; justify-content: flex-end;
                margin-top: 1.5rem; padding-top: 1rem;
                border-top: 1px solid #f0f4f9;
            }

            .completion-photos {
                display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin: 1.2rem 0;
            }
            .completion-photo-card {
                background: #f8fafc; border-radius: 16px; padding: 1rem; text-align: center; border: 1px solid #e9eef3;
            }
            .completion-photo-card.after {
                background: #f0fdf4; border: 2px solid #2d7a4f;
            }
            .completion-photo-card img {
                border-radius: 12px; width: 100%; height: 150px; object-fit: cover; background: #e9eef3;
            }
            .completion-photo-card .photo-label {
                font-weight: 500; font-size: 0.9rem; margin-top: 8px;
            }
            .completion-photo-card.after .photo-label {
                color: #2d7a4f;
            }

            .stats-modal-box {
                max-width: 700px;
            }
            .stat-section-title {
                font-size: 0.9rem; font-weight: 600; color: #0b2a3b;
                margin: 1.2rem 0 0.6rem 0; display: flex; align-items: center; gap: 8px;
            }
            .stat-section-title i { color: #2d7a4f; }

            .bar-chart {
                display: flex; align-items: flex-end; justify-content: space-around;
                gap: 8px; height: 140px; padding: 0.8rem 0.5rem 0.4rem 0.5rem;
                background: #f8fafc; border-radius: 14px; border: 1px solid #e9eef3;
            }
            .bar-col {
                display: flex; flex-direction: column; align-items: center;
                flex: 1; height: 100%; justify-content: flex-end;
            }
            .bar-col .bar-value {
                font-size: 0.7rem; font-weight: 600; color: #2d7a4f; margin-bottom: 2px;
            }
            .bar-col .bar {
                width: 100%; max-width: 34px; border-radius: 6px 6px 0 0;
                background: linear-gradient(180deg, #4ade80, #2d7a4f);
                transition: height 0.4s ease;
                min-height: 2px;
            }
            .bar-col .bar.empty { background: #e2e8f0; }
            .bar-col .bar-label {
                font-size: 0.7rem; color: #64748b; margin-top: 6px; font-weight: 500;
            }

            .status-row {
                display: flex; align-items: center; gap: 10px; padding: 0.5rem 0;
            }
            .status-row .status-dot {
                width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0;
            }
            .status-row .status-name { font-size: 0.85rem; font-weight: 500; color: #1e293b; width: 100px; }
            .status-row .status-bar-track {
                flex: 1; height: 10px; background: #f1f5f9; border-radius: 40px; overflow: hidden;
            }
            .status-row .status-bar-fill {
                height: 100%; border-radius: 40px; transition: width 0.4s ease;
            }
            .status-row .status-count {
                font-size: 0.8rem; font-weight: 600; color: #0b2a3b; width: 60px; text-align: right;
            }

            .cat-row {
                display: flex; align-items: center; justify-content: space-between;
                padding: 0.55rem 0; border-bottom: 1px solid #f0f4f9;
            }
            .cat-row:last-child { border-bottom: none; }
            .cat-row .cat-name { font-size: 0.85rem; color: #1e293b; font-weight: 500; }
            .cat-row .cat-count {
                font-size: 0.75rem; font-weight: 600; color: #2d7a4f;
                background: #f0fdf4; padding: 2px 12px; border-radius: 40px;
            }

            .metric-grid {
                display: grid; grid-template-columns: 1fr 1fr; gap: 0.8rem;
            }
            .metric-card {
                background: #f8fafc; border-radius: 14px; padding: 0.9rem 1rem;
                border: 1px solid #e9eef3; display: flex; align-items: center; gap: 12px;
            }
            .metric-icon {
                width: 40px; height: 40px; border-radius: 12px;
                display: flex; align-items: center; justify-content: center;
                font-size: 1.1rem; flex-shrink: 0;
            }
            .metric-card .metric-num { font-size: 1.3rem; font-weight: 700; color: #0b2a3b; }
            .metric-card .metric-lbl { font-size: 0.72rem; color: #64748b; text-transform: uppercase; letter-spacing: 0.3px; }

            .rejection-box {
                background: #fef2f2; border: 1px solid #fecaca; border-radius: 14px;
                padding: 1rem 1.2rem; margin: 1rem 0;
            }
            .rejection-box .rejection-title {
                font-weight: 600; font-size: 0.85rem; color: #991b1b;
                display: flex; align-items: center; gap: 8px; margin-bottom: 6px;
            }
            .rejection-box .rejection-text {
                font-size: 0.85rem; color: #7f1d1d; line-height: 1.5;
            }
            .rejection-box .rejection-meta {
                font-size: 0.72rem; color: #b91c1c; margin-top: 8px;
                display: flex; align-items: center; gap: 6px;
            }

            .report-photo-full {
                width: 100%; height: 220px; object-fit: cover;
                border-radius: 16px; background: #e9eef3;
                border: 1px solid #e2e8f0;
            }

            /* Live refresh indicator */
            .live-refresh-badge {
                display: inline-flex; align-items: center; gap: 6px;
                font-size: 0.7rem; font-weight: 500; color: #166534;
                background: #dcfce7; padding: 4px 12px; border-radius: 40px;
                margin-left: 8px;
            }
            .live-refresh-badge .live-dot {
                width: 6px; height: 6px; border-radius: 50%; background: #16a34a;
                animation: livePulse 1.6s ease infinite;
            }

            /* Real-time highlight indicators */
            .notification-highlight {
                animation: notificationPulse 0.5s ease infinite;
            }
            @keyframes notificationPulse {
                0%, 100% { color: #0b2a3b; }
                50% { color: #dc2626; transform: scale(1.1); }
            }

            .highlight-pulse {
                animation: highlightAnimation 2s ease;
            }
            @keyframes highlightAnimation {
                0% { background-color: rgba(45, 122, 79, 0.2); transform: scale(1.02); }
                50% { background-color: rgba(45, 122, 79, 0.4); }
                100% { background-color: transparent; transform: scale(1); }
            }

            .badge-highlight {
                animation: badgePulse 1s ease;
            }
            @keyframes badgePulse {
                0%, 100% { background-color: inherit; }
                50% { background-color: #fbbf24; color: #000; }
            }

            #notificationBadge, #maintenanceNotificationBadge, #adminNotificationBadge {
                position: absolute;
                top: -8px;
                right: -8px;
                background: #dc2626;
                color: white;
                border-radius: 50%;
                width: 20px;
                height: 20px;
                display: none;
                align-items: center;
                justify-content: center;
                font-size: 0.7rem;
                font-weight: 700;
            }

            .notification-item {
                display: flex;
                align-items: center;
                gap: 12px;
                padding: 0.8rem 0;
                border-bottom: 1px solid #f0f4f9;
                cursor: pointer;
                transition: 0.15s ease;
            }
            .notification-item:hover {
                background: #f8fafc;
                margin: 0 -0.5rem;
                padding-left: 0.5rem;
                padding-right: 0.5rem;
                border-radius: 8px;
            }
            .notification-item.unread {
                background: #f0fdf4;
            }
            .notification-item.unread:hover {
                background: #dcfce7;
            }
            body.dark-mode .notification-item {
                background: #171b1d;
                border-bottom-color: #2d3135;
            }
            body.dark-mode .notification-item:hover {
                background: #20252a;
            }
            body.dark-mode .notification-item.unread {
                background: #1b2b22;
            }
            body.dark-mode .notification-item.unread:hover {
                background: #21362c;
            }
            body.dark-mode .notif-title {
                color: #f3f4f6;
            }
            body.dark-mode .notif-message {
                color: #d1d5db;
            }
            body.dark-mode .notif-time {
                color: #e5e7eb;
            }
            .notif-content {
                flex: 1;
            }
            .notif-title {
                font-weight: 600;
                font-size: 0.85rem;
                color: #0b2a3b;
                margin-bottom: 2px;
            }
            .notif-message {
                font-size: 0.8rem;
                color: #64748b;
                margin-bottom: 4px;
            }
            .notif-time {
                font-size: 0.7rem;
                color: #94a3b8;
            }
            .notif-indicator {
                width: 8px;
                height: 8px;
                border-radius: 50%;
                background: #16a34a;
                flex-shrink: 0;
            }

            .chat-panel-btn {
                background: rgba(255,255,255,0.12);
                border: 1px solid rgba(255,255,255,0.18);
                color: white;
                display: inline-flex;
                align-items: center;
                gap: 8px;
            }
            .chat-panel-btn:hover {
                background: rgba(255,255,255,0.18);
                transform: translateY(-1px);
            }
            .chat-panel-btn .chat-unread-count {
                display: none;
                min-width: 19px;
                height: 19px;
                padding: 0 5px;
                border-radius: 999px;
                background: #dc2626;
                color: white;
                align-items: center;
                justify-content: center;
                font-size: 0.68rem;
                font-weight: 700;
            }

            .chat-modal-overlay {
                position: fixed;
                inset: 0;
                background: rgba(15, 23, 42, 0.52);
                backdrop-filter: blur(4px);
                display: none;
                align-items: center;
                justify-content: center;
                z-index: 1300;
                padding: 24px;
            }
            .chat-modal-overlay.active {
                display: flex;
            }
            .chat-modal-box {
                width: min(900px, 100%);
                height: min(80vh, 760px);
                background: #ffffff;
                border-radius: 28px;
                box-shadow: 0 30px 60px rgba(15, 23, 42, 0.3);
                overflow: hidden;
                display: grid;
                grid-template-columns: 300px minmax(0, 1fr);
                grid-template-rows: minmax(0, 1fr);
                border: 1px solid rgba(15, 23, 42, 0.08);
            }
            .chat-sidebar {
                background: linear-gradient(180deg, #f8fafc 0%, #eef5f4 100%);
                border-right: 1px solid #e2e8f0;
                display: flex;
                flex-direction: column;
                min-height: 0;
            }
            .chat-sidebar-header {
                padding: 20px 18px 16px;
                border-bottom: 1px solid #e2e8f0;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
            }
            .chat-sidebar-header h3 {
                font-size: 1.1rem;
                color: #0f172a;
            }
            .chat-sidebar-total-unread {
                display: none;
                background: #dc2626;
                color: white;
                border-radius: 999px;
                padding: 3px 8px;
                font-size: 0.68rem;
                font-weight: 700;
                white-space: nowrap;
            }
            .chat-search {
                padding: 0 18px 12px;
            }
            .chat-search input {
                width: 100%;
                border: 1px solid #dbe5ef;
                background: white;
                border-radius: 12px;
                padding: 0.7rem 0.9rem;
                font: inherit;
            }
            .chat-people-list {
                display: flex;
                flex-direction: column;
                gap: 8px;
                overflow-y: auto;
                padding: 0 10px 12px;
                min-height: 0;
            }
            .chat-person {
                width: 100%;
                background: transparent;
                border: 1px solid transparent;
                border-radius: 16px;
                padding: 12px 10px;
                display: flex;
                align-items: center;
                gap: 12px;
                text-align: left;
                cursor: pointer;
                transition: 0.15s ease;
            }
            .chat-person:hover, .chat-person.active {
                background: white;
                border-color: #d9eaf1;
                box-shadow: 0 8px 18px rgba(15, 23, 42, 0.04);
            }
            .chat-person-avatar {
                width: 42px;
                height: 42px;
                border-radius: 50%;
                background: linear-gradient(135deg, #2d7a4f, #69c5a6);
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 0.85rem;
                font-weight: 700;
            }
            .chat-person-meta {
                flex: 1;
                min-width: 0;
            }
            .chat-person-name {
                font-size: 0.95rem;
                font-weight: 600;
                color: #0f172a;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .chat-person-name-line {
                min-width: 0;
                display: flex;
                align-items: center;
                gap: 6px;
            }
            .chat-person-name-line .chat-person-name {
                flex: 0 1 auto;
            }
            .chat-person-time {
                flex: 0 0 auto;
                margin-left: auto;
                color: #94a3b8;
                font-size: 0.65rem;
            }
            .chat-person-preview {
                margin-top: 3px;
                color: #64748b;
                font-size: 0.72rem;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .chat-person-role {
                font-size: 0.72rem;
                color: #64748b;
                text-transform: capitalize;
            }
            .chat-person-unread {
                min-width: 20px;
                height: 20px;
                padding: 0 5px;
                border-radius: 999px;
                background: #dc2626;
                color: white;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 0.68rem;
                font-weight: 700;
                flex: 0 0 auto;
            }

            .chat-main {
                display: flex;
                flex-direction: column;
                min-width: 0;
                min-height: 0;
            }
            .chat-header {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                padding: 18px 20px;
                border-bottom: 1px solid #e2e8f0;
                background: #fff;
            }
            .chat-header-left {
                display: flex;
                align-items: center;
                gap: 12px;
            }
            .chat-current-avatar {
                width: 42px;
                height: 42px;
                border-radius: 50%;
                background: linear-gradient(135deg, #0b2a3b, #2d7a4f);
                color: white;
                font-weight: 700;
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .chat-current-name {
                font-size: 1rem;
                font-weight: 700;
                color: #111827;
            }
            .chat-current-role {
                font-size: 0.72rem;
                color: #64748b;
                text-transform: capitalize;
            }
            .chat-thread {
                flex: 1 1 0;
                overflow-y: auto;
                min-height: 0;
                padding: 18px 18px 10px;
                background: linear-gradient(180deg, #f8fafc 0%, #f0fdf4 100%);
            }
            .chat-message-row {
                display: flex;
                margin-bottom: 14px;
                width: 100%;
            }
            .chat-message-row.mine {
                justify-content: flex-end;
            }
            .chat-bubble {
                max-width: 75%;
                padding: 12px 14px 10px;
                border-radius: 18px;
                line-height: 1.5;
                font-size: 0.92rem;
                word-break: break-word;
            }
            .chat-message-row.theirs .chat-bubble {
                background: white;
                color: #1e293b;
                border: 1px solid #e2e8f0;
                border-bottom-left-radius: 8px;
            }
            .chat-message-row.mine .chat-bubble {
                background: linear-gradient(135deg, #2d7a4f 0%, #3f9a69 100%);
                color: white;
                border-bottom-right-radius: 8px;
            }
            .chat-message-photo {
                display: block;
                width: min(220px, 100%);
                max-height: 240px;
                object-fit: contain;
                border-radius: 12px;
                margin-top: 8px;
                border: 1px solid rgba(15, 23, 42, 0.08);
                cursor: zoom-in;
            }
            .chat-photo-viewer {
                position: fixed;
                inset: 0;
                z-index: 1450;
                display: none;
                align-items: center;
                justify-content: center;
                padding: 24px;
                background: rgba(8, 15, 20, 0.9);
            }
            .chat-photo-viewer.active { display: flex; }
            .chat-photo-viewer img {
                display: block;
                max-width: min(1100px, 94vw);
                max-height: 88vh;
                width: auto;
                height: auto;
                object-fit: contain;
                border-radius: 8px;
            }
            .chat-photo-viewer-close {
                position: absolute;
                top: 18px;
                right: 18px;
                width: 42px;
                height: 42px;
                border: 1px solid rgba(255,255,255,0.35);
                border-radius: 50%;
                background: rgba(0,0,0,0.4);
                color: white;
                font-size: 1.2rem;
                cursor: pointer;
            }
            .chat-message-time {
                display: block;
                margin-top: 6px;
                font-size: 0.68rem;
                opacity: 0.75;
            }
            .chat-system {
                text-align: center;
                color: #64748b;
                font-size: 0.72rem;
                margin: 12px 0;
            }
            .chat-composer {
                padding: 16px 18px 18px;
                border-top: 1px solid #e2e8f0;
                background: white;
            }
            .chat-photo-picker {
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 12px;
                margin-bottom: 10px;
            }
            .chat-attach {
                display: inline-flex;
                align-items: center;
                gap: 8px;
                cursor: pointer;
                color: #2563eb;
                font-weight: 600;
                font-size: 0.82rem;
            }
            .chat-attach input {
                display: none;
            }
            .chat-input-row {
                display: flex;
                align-items: center;
                gap: 12px;
            }
            .chat-input-row input {
                flex: 1;
                border: 1px solid #dbe5ef;
                background: #f8fafc;
                border-radius: 999px;
                padding: 0.9rem 1rem;
                font: inherit;
            }
            .chat-send-btn {
                border: none;
                background: linear-gradient(135deg, #2d7a4f, #3d9a67);
                color: white;
                padding: 0.9rem 1.2rem;
                border-radius: 999px;
                font-weight: 700;
                cursor: pointer;
            }
            .chat-empty-state {
                display: grid;
                place-items: center;
                height: 100%;
                color: #64748b;
                text-align: center;
                padding: 24px;
            }

            @media (max-width: 1024px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
            @media (max-width: 768px) {
                .header { flex-direction: column; align-items: flex-start; gap: 1rem; }
                .header-right { width: 100%; flex-wrap: wrap; }
                .main-grid { grid-template-columns: 1fr; }
                .stats-grid { grid-template-columns: 1fr 1fr; }
                .chat-modal-box { grid-template-columns: minmax(0, 1fr); grid-template-rows: minmax(0, 220px) minmax(0, 1fr); height: 85vh; }
                .chat-sidebar { border-right: none; border-bottom: 1px solid #e2e8f0; max-height: none; }
                .report-item, .task-item { flex-direction: column; align-items: flex-start; gap: 8px; }
                .modal-box { padding: 1.5rem; }
            }
            @media (max-width: 480px) {
                .stats-grid { grid-template-columns: 1fr; }
                .header-left h1 { font-size: 1.2rem; }
                .card { padding: 1.2rem; }
                #googleMap, #nearbyMap, #maintMap, .live-track-map { height: 200px; }
                .login-container { padding: 2rem 1.2rem; }
                .metric-grid { grid-template-columns: 1fr; }
                .bar-chart { height: 120px; }
            }

            @media (max-width: 520px) {
                .admin-report-searchbar { grid-template-columns: minmax(0, 1fr) auto; }
                .admin-report-search-input { grid-column: 1 / -1; }
                .admin-report-search-button { justify-self: start; }
                .admin-report-filters { grid-template-columns: minmax(0, 1fr); }
                .admin-filter-export { justify-content: flex-start; }
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <body>

    <!-- LOGIN -->
    <div id="pageLogin" class="login-container">
        <div class="logo">
            <h1><i class="fas fa-leaf"></i> GreenSteps</h1>
            <div class="subtitle">Environmental Reporting System</div>
        </div>

        <div class="divider"></div>

        <div class="login-title">Welcome to GreenSteps</div>
        <div class="login-subtitle">Choose how you want to sign in</div>

        <div class="role-buttons" id="roleButtons">
            <button type="button" class="role-btn citizen-role" onclick="selectRole('citizen')">
                <div class="role-icon citizen-icon"><i class="fas fa-user"></i></div>
                <div class="role-info">
                    <div class="role-name">Login as Citizen</div>
                    <div class="role-desc">Report issues & track progress</div>
                </div>
                <i class="fas fa-chevron-right role-arrow"></i>
            </button>

            <button type="button" class="role-btn maintenance-role" onclick="selectRole('maintenance')">
                <div class="role-icon maintenance-icon"><i class="fas fa-hard-hat"></i></div>
                <div class="role-info">
                    <div class="role-name">Login as Maintenance</div>
                    <div class="role-desc">View & complete assigned tasks</div>
                </div>
                <i class="fas fa-chevron-right role-arrow"></i>
            </button>

            <button id="adminRoleButton" type="button" class="role-btn admin-role" style="display:none;" onclick="selectRole('admin')">
                <div class="role-icon admin-icon"><i class="fas fa-user-shield"></i></div>
                <div class="role-info">
                    <div class="role-name">Login as Admin</div>
                    <div class="role-desc">Manage reports, assign teams & give points</div>
                </div>
                <i class="fas fa-chevron-right role-arrow"></i>
            </button>
        </div>

        <div id="loginFormWrapper" style="display:none;">
            <div style="display:flex; align-items:center; gap:10px; margin-bottom:1.2rem;">
                <button type="button" onclick="backToRoles()" style="background:none;border:none;cursor:pointer;color:#64748b;font-size:0.9rem;display:flex;align-items:center;gap:6px;padding:4px 8px;border-radius:8px;">
                    <i class="fas fa-arrow-left"></i> Back
                </button>
                <div id="selectedRoleBadge" style="padding:4px 14px; border-radius:40px; font-size:0.75rem; font-weight:600; background:#dbeafe; color:#1e4a7a;">
                    <i class="fas fa-user"></i> Citizen
                </div>
            </div>

            <div class="login-title" id="formTitle">Citizen Login</div>
            <div class="login-subtitle" id="formSubtitle">Login to report issues and track progress</div>

            <div id="errorMessage" class="error-message">
                <i class="fas fa-exclamation-circle"></i>
                <span id="errorText">Invalid credentials. Please try again.</span>
            </div>

            <form id="loginForm" onsubmit="handleLogin(event)">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" placeholder="Enter your email" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="password" placeholder="Enter your password" required />
                    </div>
                </div>
                <div class="form-options">
                    <label><input type="checkbox" checked /> Remember me</label>
                    <a onclick="forgotPassword()">Forgot password?</a>
                </div>
                <button type="submit" class="btn-login" id="loginBtn">
                    <i class="fas fa-sign-in-alt"></i> <span id="loginBtnText">Login as Citizen</span>
                </button>
            </form>

            <div class="register-link" id="registerLinkBlock">
                Don't have an account? <a onclick="openRegisterModal()">Register here</a>
            </div>
            <div class="register-link" id="adminRegisterLink" style="display:none;">
                First time setup? <a onclick="openAdminRegisterModal()">Register admin account</a>
            </div>

            <div style="display:flex; gap:12px; justify-content:center; margin-top:1.2rem; flex-wrap:wrap;">
                <a href="/community/map" style="color:#2d7a4f; text-decoration:none; font-size:0.85rem; font-weight:500; display:flex; align-items:center; gap:6px;"><i class="fas fa-map-marked-alt"></i> Community Map</a>
                <span style="color:#e2e8f0; height:20px; width:1px;"></span>
                <a href="/community/gallery" style="color:#2d7a4f; text-decoration:none; font-size:0.85rem; font-weight:500; display:flex; align-items:center; gap:6px;"><i class="fas fa-camera-retro"></i> Before & After</a>
            </div>
        </div>
    </div>

    <!-- CITIZEN DASHBOARD -->
    <div id="pageCitizen" class="dashboard-container">
        <header class="header">
            <div class="header-left">
                <h1><i class="fas fa-leaf"></i> GreenSteps</h1>
                <span class="user-badge" onclick="openProfileModal('citizen')">
                    <i class="fas fa-user-circle"></i> <span id="citizenUserName">Citizen</span>
                    <i class="fas fa-chevron-down" style="font-size:0.6rem; opacity:0.7;"></i>
                </span>
                <span class="live-refresh-badge" id="citizenLiveBadge">
                    <span class="live-dot"></span> Live
                </span>
            </div>
             <div class="header-right">
                <button class="btn btn-secondary btn-sm" id="themeToggleBtn" onclick="toggleTheme()" title="Toggle dark mode">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="btn btn-primary" onclick="openReportModal()"><i class="fas fa-plus"></i> New Report</button>
                <button class="btn chat-panel-btn" onclick="openChatPanel()"><i class="fas fa-comments"></i> Chat <span id="citizenChatUnread" class="chat-unread-count"></span></button>
                <button class="btn btn-outline-light" onclick="openStatisticsModal()"><i class="fas fa-chart-bar"></i></button>
                <button class="btn btn-logout" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card"><div class="number" id="citizenTotalReports">0</div><div class="label"><i class="far fa-file-alt"></i> Total Reports</div></div>
            <div class="stat-card"><div class="number" id="citizenPending">0</div><div class="label"><i class="fas fa-hourglass-half" style="color:#f59e0b;"></i> Pending</div></div>
            <div class="stat-card"><div class="number" id="citizenCompleted">0</div><div class="label"><i class="fas fa-check-circle" style="color:#16a34a;"></i> Completed</div></div>
            <div class="stat-card"><div class="number">⭐ <span id="citizenPoints">0</span></div><div class="label"><i class="fas fa-star" style="color:#f59e0b;"></i> Community Points</div></div>
        </div>

        <div class="main-grid">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-list-ul"></i> Recent Reports</h3>
                    <a href="/community/map" class="action-link" title="View community map" style="display:inline-block;"><i class="fas fa-globe-americas"></i></a>
                </div>
                <div id="citizenReportsList">
                    <div class="empty-state">
                        <i class="fas fa-file-alt"></i>
                        <div class="empty-title">No reports yet</div>
                        <div class="empty-desc">Your submitted reports will appear here</div>
                    </div>
                </div>
            </div>

            <div>
                <div class="card" style="margin-bottom:1.5rem;">
                    <div class="card-header">
                        <h3><i class="fas fa-bell" id="notificationIcon" style="position:relative;">
                            <span id="notificationBadge"></span>
                        </i> Notifications</h3>
                        <span class="action-link" onclick="loadNotifications()" title="Refresh notifications"><i class="fas fa-rotate"></i></span>
                    </div>
                    <div id="citizenNotifList">
                        <div class="empty-state">
                            <i class="fas fa-bell-slash"></i>
                            <div class="empty-title">No notifications</div>
                            <div class="empty-desc">Updates on your reports will appear here</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-map-marked-alt"></i> Reported Incidents</h3>
                    </div>
                    <div id="nearbyMap"></div>
                    <div class="map-legend">
                        <span class="badge badge-pending"><i class="fas fa-circle" style="color:#dc2626; font-size:0.5rem;"></i> Critical</span>
                        <span class="badge badge-review"><i class="fas fa-circle" style="color:#f59e0b; font-size:0.5rem;"></i> High</span>
                        <span class="badge badge-assigned"><i class="fas fa-circle" style="color:#2563eb; font-size:0.5rem;"></i> Medium</span>
                        <span class="badge badge-completed"><i class="fas fa-circle" style="color:#22c55e; font-size:0.5rem;"></i> Low</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MAINTENANCE DASHBOARD -->
    <div id="pageMaintenance" class="dashboard-container">
        <header class="header">
            <div class="header-left">
                <h1><i class="fas fa-leaf"></i> GreenSteps</h1>
                <span class="user-badge" onclick="openProfileModal('maintenance')">
                    <i class="fas fa-hard-hat"></i> <span id="maintenanceUserName">Team Alpha</span>
                    <i class="fas fa-chevron-down" style="font-size:0.6rem; opacity:0.7;"></i>
                </span>
                <span id="gpsSharingIndicator" class="gps-indicator" title="Sharing live location with citizens">
                    <span class="gps-dot"></span> Live GPS
                </span>
            </div>
             <div class="header-right">
                <button class="btn btn-secondary btn-sm" id="themeToggleBtn" onclick="toggleTheme()" title="Toggle dark mode">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="btn btn-info" onclick="openNavigateModal()"><i class="fas fa-location-dot"></i> Navigate</button>
                <button class="btn chat-panel-btn" onclick="openChatPanel()"><i class="fas fa-comments"></i> Chat <span id="maintenanceChatUnread" class="chat-unread-count"></span></button>
                <button class="btn btn-logout" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </header>

        <div id="maintenanceApprovalNotice" class="card" style="display:none; margin-bottom:1rem; border-left:4px solid #f59e0b;">
            <strong><i class="fas fa-clock"></i> Application awaiting approval</strong>
            <div style="margin-top:0.35rem;">You can use your account, but task assignments and work actions will be available after an administrator approves your account.</div>
        </div>

        <div class="stats-grid">
            <div class="stat-card"><div class="number" id="maintAssigned">0</div><div class="label"><i class="fas fa-tasks"></i> Assigned</div></div>
            <div class="stat-card"><div class="number" id="maintInProgress">0</div><div class="label"><i class="fas fa-hourglass-half" style="color:#f59e0b;"></i> In Progress</div></div>
            <div class="stat-card"><div class="number" id="maintCompleted">0</div><div class="label"><i class="fas fa-check-circle" style="color:#16a34a;"></i> Completed</div></div>
            <div class="stat-card"><div class="number" id="maintRating">⭐ <span id="maintAvgRating">—</span></div><div class="label"><i class="fas fa-star" style="color:#f59e0b;"></i> Team Rating</div></div>
        </div>

        <div class="main-grid">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-clipboard-list"></i> Assigned Tasks</h3>
                    <div style="display:flex; gap:8px; align-items:center;">
                        <div class="task-search">
                            <i class="fas fa-search"></i>
                            <input type="text" id="taskSearchInput" placeholder="Search tasks…" oninput="renderTasks()" />
                        </div>
                        <button class="btn-sm btn-sm-actions btn-icon-only" title="Show all" onclick="filterTasks('all')"><i class="fas fa-list"></i></button>
                    </div>
                </div>
                <div class="task-stats">
                    <div class="task-stat" onclick="filterTasks('Assigned')">
                        <div class="num" id="tabAssigned" style="color:#0369a1;">0</div>
                        <div class="lbl">Assigned</div>
                    </div>
                    <div class="task-stat" onclick="filterTasks('In Progress')">
                        <div class="num" id="tabInProgress" style="color:#6b21a5;">0</div>
                        <div class="lbl">In Progress</div>
                    </div>
                    <div class="task-stat" onclick="filterTasks('Completed')">
                        <div class="num" id="tabCompleted" style="color:#166534;">0</div>
                        <div class="lbl">Completed</div>
                    </div>
                </div>
                <div id="maintTasksList">
                    <div class="empty-state">
                        <i class="fas fa-clipboard-check"></i>
                        <div class="empty-title">No assigned tasks</div>
                        <div class="empty-desc">New tasks will appear here once assigned</div>
                    </div>
                </div>
            </div>

            <div>
                <div class="card" style="margin-bottom:1.5rem;">
                    <div class="card-header">
                        <h3><i class="fas fa-bell" id="maintenanceNotificationIcon" style="position:relative;">
                            <span id="maintenanceNotificationBadge"></span>
                        </i> Notifications</h3>
                    </div>
                    <div id="maintNotifList">
                        <div class="empty-state">
                            <i class="fas fa-bell-slash"></i>
                            <div class="empty-title">No notifications</div>
                            <div class="empty-desc">Comments and updates will appear here</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-map-marked-alt"></i> Task Locations</h3>
                    </div>
                    <div id="maintMap"></div>
                    <div style="margin-top:0.8rem; display:flex; gap:8px; flex-wrap:wrap;">
                        <span class="badge badge-assigned"><i class="fas fa-circle" style="color:#0369a1; font-size:0.5rem;"></i> Assigned</span>
                        <span class="badge badge-progress"><i class="fas fa-circle" style="color:#6b21a5; font-size:0.5rem;"></i> In Progress</span>
                        <span class="badge badge-completed"><i class="fas fa-circle" style="color:#166534; font-size:0.5rem;"></i> Completed</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ADMIN DASHBOARD -->
    <div id="pageAdmin" class="dashboard-container">
        <header class="header">
            <div class="header-left">
                <h1><i class="fas fa-leaf"></i> GreenSteps</h1>
                <span class="user-badge" onclick="openProfileModal('admin')">
                    <i class="fas fa-user-shield"></i> <span id="adminUserName">Admin</span>
                    <i class="fas fa-chevron-down" style="font-size:0.6rem; opacity:0.7;"></i>
                </span>
                <span class="live-refresh-badge" id="adminLiveBadge">
                    <span class="live-dot"></span> Live
                </span>
            </div>
             <div class="header-right">
                <button class="btn btn-secondary btn-sm" id="themeToggleBtn" onclick="toggleTheme()" title="Toggle dark mode">
                    <i class="fas fa-moon"></i>
                </button>
                <button class="btn chat-panel-btn" onclick="openChatPanel()"><i class="fas fa-comments"></i> Chat <span id="adminChatUnread" class="chat-unread-count"></span></button>
                <button class="btn btn-logout" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card"><div class="number" id="adminTotalReports">0</div><div class="label"><i class="fas fa-file-alt"></i> Total Reports</div></div>
            <div class="stat-card"><div class="number" id="adminPendingReports">0</div><div class="label"><i class="fas fa-clock" style="color:#f59e0b;"></i> Pending</div></div>
            <div class="stat-card"><div class="number" id="adminAssignedReports">0</div><div class="label"><i class="fas fa-user-check" style="color:#2563eb;"></i> Assigned</div></div>
            <div class="stat-card"><div class="number" id="adminCompletedReports">0</div><div class="label"><i class="fas fa-check-double" style="color:#16a34a;"></i> Completed</div></div>
        </div>

        <div class="main-grid" style="grid-template-columns: 1fr 1fr;">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-clipboard-list"></i> All Reports</h3>
                </div>
                <div class="admin-report-searchbar">
                    <div class="admin-report-search-input">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <input id="adminReportSearch" type="search" aria-label="Search reports" placeholder="Search reports" oninput="renderAdminReports()" onkeydown="if (event.key === 'Enter') renderAdminReports()" />
                    </div>
                    <button class="admin-report-search-button" type="button" onclick="renderAdminReports()"><i class="fas fa-search"></i><span>Search</span></button>
                    <button id="adminReportFilterToggle" class="admin-report-filter-toggle" type="button" aria-expanded="false" aria-controls="adminReportFilters" onclick="toggleAdminReportFilters()"><i class="fas fa-sliders-h"></i><span>Filters</span></button>
                    <button class="admin-report-export-button" type="button" onclick="exportAdminReports()" title="Export filtered reports as CSV" aria-label="Export filtered reports as CSV"><i class="fas fa-download"></i></button>
                </div>
                <div id="adminReportFilters" class="admin-report-filters" hidden>
                    <label class="admin-filter-field">
                        <span>Status</span>
                        <select id="adminReportStatus" class="admin-filter-control" onchange="renderAdminReports()">
                        <option value="all">All statuses</option>
                        <option>Pending</option><option>Assigned</option><option>In Progress</option><option>Completed</option><option>Rejected</option>
                        </select>
                    </label>
                    <label class="admin-filter-field">
                        <span>Category</span>
                        <select id="adminReportCategory" class="admin-filter-control" onchange="renderAdminReports()"><option value="all">All categories</option></select>
                    </label>
                    <label class="admin-filter-field">
                        <span>Team</span>
                        <select id="adminReportTeam" class="admin-filter-control" onchange="renderAdminReports()"><option value="all">All teams</option></select>
                    </label>
                    <label class="admin-filter-field">
                        <span>From</span>
                        <input id="adminReportFrom" class="admin-filter-control" type="date" aria-label="From date" onchange="renderAdminReports()" />
                    </label>
                    <label class="admin-filter-field">
                        <span>To</span>
                        <input id="adminReportTo" class="admin-filter-control" type="date" aria-label="To date" onchange="renderAdminReports()" />
                    </label>
                    <div class="admin-filter-export">
                        <button class="admin-filter-clear" type="button" onclick="clearAdminReportFilters()"><i class="fas fa-undo"></i> Clear filters</button>
                    </div>
                </div>
                <div id="adminReportsList">
                    <div class="empty-state">
                        <i class="fas fa-file-alt"></i>
                        <div class="empty-title">No reports available</div>
                        <div class="empty-desc">Citizen reports will appear here</div>
                    </div>
                </div>
            </div>

            <div>
                <div class="card" style="margin-bottom:1.5rem;">
                    <div class="card-header">
                        <h3><i class="fas fa-bell" id="adminNotificationIcon" style="position:relative;">
                            <span id="adminNotificationBadge"></span>
                        </i> Notifications</h3>
                    </div>
                    <div id="adminNotifList">
                        <div class="empty-state">
                            <i class="fas fa-bell-slash"></i>
                            <div class="empty-title">No notifications</div>
                            <div class="empty-desc">Comments and updates will appear here</div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom:1.5rem;">
                    <div class="card-header"><h3><i class="fas fa-user-clock"></i> Maintenance Applications</h3></div>
                    <div id="adminPendingMaintenanceList">
                        <div class="empty-state">
                            <i class="fas fa-user-check"></i>
                            <div class="empty-title">No applications waiting</div>
                            <div class="empty-desc">New maintenance applicants will appear here</div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-bottom:1.5rem;">
                    <div class="card-header">
                        <h3><i class="fas fa-users"></i> Team Assignment</h3>
                        <button class="btn-sm btn-sm-actions" type="button" onclick="openMaintenanceAccountModal()"><i class="fas fa-user-plus"></i> Add member</button>
                    </div>
                    <div id="adminTeamList">
                        <div class="empty-state">
                            <i class="fas fa-users-slash"></i>
                            <div class="empty-title">No teams available</div>
                            <div class="empty-desc">Teams will appear here once registered</div>
                        </div>
                    </div>
                </div>

                <div class="card" style="margin-bottom:1.5rem;">
                    <div class="card-header"><h3><i class="fas fa-trophy" style="color:#f59e0b;"></i> Top Citizens</h3></div>
                    <div id="adminTopCitizens">
                        <div class="empty-state">
                            <i class="fas fa-user-circle"></i>
                            <div class="empty-title">No citizens yet</div>
                            <div class="empty-desc">Leaderboard will appear once citizens earn points</div>
                        </div>
                    </div>
                </div>

                 <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-medal" style="color:#2563eb;"></i> Top Teams</h3>
                    </div>
                    <div id="adminTopTeams">
                        <div class="empty-state">
                            <i class="fas fa-hard-hat"></i>
                            <div class="empty-title">No teams yet</div>
                            <div class="empty-desc">Teams will be ranked by citizen ratings</div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3><i class="fas fa-magic" style="color:#7c3aed;"></i> Auto-Assign Rules</h3>
                        <button class="btn-sm btn-sm-admin" onclick="openAutoAssignModal(null)" title="Add rule"><i class="fas fa-plus"></i> New Rule</button>
                    </div>
                    <div class="map-legend" style="margin-bottom:0.5rem;">
                        <span class="badge badge-assigned"><i class="fas fa-cog"></i> Auto-assign reports to teams based on category</span>
                    </div>
                    <div id="adminAutoAssignList">
                        <div class="empty-state">
                            <i class="fas fa-cog"></i>
                            <div class="empty-title">No rules configured</div>
                            <div class="empty-desc">Create auto-assign rules to automatically route reports to the right team</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- AUTO-ASSIGN RULE MODAL -->
    <div id="autoAssignModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-magic" style="color:#7c3aed;"></i> <span id="autoAssignModalTitle">New Rule</span></h3>
            <div class="modal-subtitle" id="autoAssignModalSubtitle">Route reports to a maintenance team based on category match.</div>
            <form id="autoAssignForm" onsubmit="saveAutoAssign(event)">
                <input type="hidden" id="autoAssignRuleId" />
                <div class="form-group">
                    <label for="autoAssignCategory">Category Match <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <i class="fas fa-tag"></i>
                        <input type="text" id="autoAssignCategory" placeholder="e.g. pothole, graffiti, streetlight" required maxlength="200" />
                    </div>
                    <div style="font-size:0.72rem; color:#d1d5db; margin-top:4px;">Matches if the report category contains this text (case-insensitive).</div>
                </div>
                <div class="form-group">
                    <label for="autoAssignTeam">Team Name <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <i class="fas fa-user-hard-hat"></i>
                        <select id="autoAssignTeam" required></select>
                    </div>
                </div>
                <div class="form-group">
                    <label style="display:flex; align-items:center; gap:8px; font-weight:400; font-size:0.85rem; color:#64748b; cursor:pointer;">
                        <input type="checkbox" id="autoAssignActive" checked style="width:16px; height:16px; accent-color:#2d7a4f;" />
                        Rule is active
                    </label>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeAutoAssignModal()"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveAutoAssignBtn"><i class="fas fa-save"></i> Save Rule</button>
                </div>
            </form>
        </div>
    </div>

    <div id="chatModal" class="chat-modal-overlay" aria-hidden="true">
        <div class="chat-modal-box" role="dialog" aria-modal="true" aria-label="Chat panel">
            <aside class="chat-sidebar">
                <div class="chat-sidebar-header">
                    <h3><i class="fas fa-comments"></i> Messages</h3>
                    <span id="chatSidebarUnread" class="chat-sidebar-total-unread"></span>
                </div>
                <div class="chat-search">
                    <input id="chatSearchInput" type="text" placeholder="Search contacts" oninput="renderChatContacts()" />
                </div>
                <div id="chatPeopleList" class="chat-people-list"></div>
            </aside>

            <section class="chat-main">
                <div class="chat-header">
                    <div class="chat-header-left">
                        <div id="chatCurrentAvatar" class="chat-current-avatar">?</div>
                        <div>
                            <div id="chatCurrentName" class="chat-current-name">Select a chat</div>
                            <div id="chatCurrentRole" class="chat-current-role">online</div>
                        </div>
                    </div>
                    <button class="btn btn-secondary btn-sm" type="button" onclick="closeChatPanel()"><i class="fas fa-times"></i> Close</button>
                </div>

                <div id="chatThread" class="chat-thread">
                    <div class="chat-empty-state">
                        <div>
                            <i class="fas fa-comment-dots" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
                            Start a conversation with a citizen or maintenance team.
                        </div>
                    </div>
                </div>

                <div class="chat-composer">
                    <div class="chat-photo-picker">
                        <label class="chat-attach" for="chatImageInput">
                            <i class="fas fa-image"></i>
                            <span>Add photo</span>
                            <input id="chatImageInput" type="file" accept="image/*" />
                        </label>
                    </div>
                    <div class="chat-input-row">
                        <input id="chatMessageInput" type="text" placeholder="Type a message..." />
                        <button class="chat-send-btn" type="button" onclick="sendChatMessage()"><i class="fas fa-paper-plane"></i> Send</button>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <div id="chatPhotoViewer" class="chat-photo-viewer" aria-hidden="true" onclick="closeChatPhotoViewer(event)">
        <button class="chat-photo-viewer-close" type="button" aria-label="Close photo" onclick="closeChatPhotoViewer(event, true)"><i class="fas fa-times"></i></button>
        <img id="chatPhotoViewerImage" src="" alt="Chat photo" />
    </div>

    <!-- REGISTER MODAL -->
    <div id="registerModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-user-plus" style="color:#2d7a4f;"></i> Create Account</h3>
            <div class="modal-subtitle" id="registerSubtitle">Join GreenSteps and help your community</div>
            <form id="registerForm" onsubmit="handleRegister(event)">
                <div class="form-group" id="registerTeamWrapper" style="display:none;">
                    <label for="regTeam">Team Name <span class="required">*</span></label>
                    <input id="regTeam" type="text" maxlength="150" placeholder="Enter your team name" />
                </div>
                <div class="form-group">
                    <label for="fullName">Full Name <span class="required">*</span></label>
                    <div class="input-wrapper"><i class="fas fa-user"></i><input type="text" id="fullName" placeholder="Enter your full name" required /></div>
                </div>
                <div class="form-group">
                    <label for="regEmail">Email Address <span class="required">*</span></label>
                    <div class="input-wrapper"><i class="fas fa-envelope"></i><input type="email" id="regEmail" placeholder="Enter your email" required /></div>
                </div>
                <div class="form-group">
                    <label for="regPassword">Password <span class="required">*</span></label>
                    <div class="input-wrapper"><i class="fas fa-lock"></i><input type="password" id="regPassword" placeholder="At least 8 characters" required minlength="8" /></div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password <span class="required">*</span></label>
                    <div class="input-wrapper"><i class="fas fa-check-circle"></i><input type="password" id="confirmPassword" placeholder="Confirm password" required /></div>
                </div>
                <div class="form-group">
                    <label for="phone">Phone (optional)</label>
                    <div class="input-wrapper"><i class="fas fa-phone"></i><input type="tel" id="phone" placeholder="Phone number" /></div>
                </div>
                <div class="form-group" style="margin-bottom:0.5rem;">
                    <label style="display:flex; align-items:center; gap:8px; font-weight:400; font-size:0.85rem; color:#64748b; cursor:pointer;">
                        <input type="checkbox" id="termsCheckbox" required style="width:16px; height:16px; accent-color:#2d7a4f;" />
                        I agree to the Terms of Service
                    </label>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeRegisterModal()"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id="registerBtn"><i class="fas fa-user-plus"></i> Create Account</button>
                </div>
            </form>
        </div>
    </div>

    <div id="passwordModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-key" style="color:#2d7a4f;"></i> <span id="passwordModalTitle">Reset password</span></h3>
            <div class="modal-subtitle" id="passwordModalSubtitle">Enter your email and we’ll send a reset link if the account exists.</div>
            <form id="forgotPasswordForm" onsubmit="submitForgotPassword(event)">
                <div class="form-group">
                    <label for="resetRequestEmail">Email Address</label>
                    <input type="email" id="resetRequestEmail" required autocomplete="email" />
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closePasswordModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Send reset link</button>
                </div>
            </form>
            <form id="resetPasswordForm" onsubmit="submitPasswordReset(event)" style="display:none;">
                <input type="hidden" id="resetToken" />
                <div class="form-group">
                    <label for="resetEmail">Email Address</label>
                    <input type="email" id="resetEmail" required autocomplete="email" />
                </div>
                <div class="form-group">
                    <label for="newResetPassword">New Password</label>
                    <input type="password" id="newResetPassword" required minlength="8" autocomplete="new-password" />
                </div>
                <div class="form-group">
                    <label for="confirmResetPassword">Confirm Password</label>
                    <input type="password" id="confirmResetPassword" required minlength="8" autocomplete="new-password" />
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closePasswordModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update password</button>
                </div>
            </form>
        </div>
    </div>

    <div id="adminRegisterModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-user-shield" style="color:#6d28d9;"></i> Register admin account</h3>
            <div class="modal-subtitle">Available only during initial setup, before an administrator account exists.</div>
            <form id="adminRegisterForm" onsubmit="handleAdminRegister(event)">
                <div class="form-group"><label for="adminRegisterName">Full Name</label><input id="adminRegisterName" type="text" required maxlength="150" autocomplete="name" /></div>
                <div class="form-group"><label for="adminRegisterEmail">Email Address</label><input id="adminRegisterEmail" type="email" required autocomplete="email" /></div>
                <div class="form-group"><label for="adminRegisterPassword">Password</label><input id="adminRegisterPassword" type="password" required minlength="8" autocomplete="new-password" /></div>
                <div class="form-group"><label for="adminRegisterPasswordConfirm">Confirm Password</label><input id="adminRegisterPasswordConfirm" type="password" required minlength="8" autocomplete="new-password" /></div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeAdminRegisterModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create admin account</button>
                </div>
            </form>
        </div>
    </div>

    <div id="maintenanceAccountModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-user-plus" style="color:#2563eb;"></i> Create maintenance account</h3>
            <div class="modal-subtitle">Only administrators can add maintenance team members.</div>
            <form id="maintenanceAccountForm" onsubmit="createMaintenanceAccount(event)">
                <div class="form-group"><label for="maintenanceFullName">Full Name</label><input id="maintenanceFullName" type="text" required maxlength="150" /></div>
                <div class="form-group"><label for="maintenanceEmail">Email Address</label><input id="maintenanceEmail" type="email" required autocomplete="email" /></div>
                <div class="form-group"><label for="maintenanceTeam">Team Name</label><input id="maintenanceTeam" type="text" required maxlength="150" /></div>
                <div class="form-group"><label for="maintenancePassword">Temporary Password</label><input id="maintenancePassword" type="password" required minlength="8" autocomplete="new-password" /></div>
                <div class="form-group"><label for="maintenancePasswordConfirm">Confirm Password</label><input id="maintenancePasswordConfirm" type="password" required minlength="8" autocomplete="new-password" /></div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeMaintenanceAccountModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create account</button>
                </div>
            </form>
        </div>
    </div>

    <!-- REPORT MODAL -->
    <div id="reportModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-flag" style="color:#2d7a4f;"></i> Submit New Report</h3>
            <div class="modal-subtitle">Help your community by reporting environmental issues</div>
            <form id="reportForm" onsubmit="submitReport(event)">
                <div class="form-group">
                    <label for="category">Category <span class="required">*</span></label>
                    <select id="category" required onchange="handleCategoryChange(this)">
                        <option value="">Select a category</option>
                        <option value="🕳️ Potholes">🕳️ Potholes</option>
                        <option value="🌳 Fallen Trees">🌳 Fallen Trees</option>
                        <option value="🚧 Road Obstruction">🚧 Road Obstruction</option>
                        <option value="💡 Broken Streetlights">💡 Broken Streetlights</option>
                        <option value="🌊 Flooding">🌊 Flooding</option>
                        <option value="🗑️ Illegal Dumping">🗑️ Illegal Dumping</option>
                        <option value="🚰 Clogged Drainage">🚰 Clogged Drainage</option>
                        <option value="🪨 Landslide">🪨 Landslide</option>
                        <option value="🚦 Damaged Traffic Signs">🚦 Damaged Traffic Signs</option>
                        <option value="🐕 Stray Animal Concern">🐕 Stray Animal Concern</option>
                        <option value="Others">📌 Others</option>
                    </select>
                </div>
                <div class="other-category-wrapper" id="otherCategoryWrapper">
                    <div class="form-group" style="margin-bottom:0;">
                        <label for="otherCategory">Specify category <span class="required">*</span></label>
                        <input type="text" id="otherCategory" placeholder="e.g., Broken sidewalk" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="location">Location <span class="required">*</span></label>
                    <input type="text" id="location" placeholder="Click on the map or type address" required />
                    <div class="map-container">
                        <div id="googleMap"></div>
                        <div class="map-hint"><i class="fas fa-mouse-pointer"></i> Click map to pin</div>
                    </div>
                    <div class="map-actions">
                        <button type="button" class="btn-map" onclick="useMyLocation(event)"><i class="fas fa-location-crosshairs"></i> Use My Location</button>
                        <button type="button" class="btn-map" onclick="clearMapPin()"><i class="fas fa-times-circle"></i> Clear Pin</button>
                    </div>
                    <div class="location-coords" id="locationCoords">
                        <i class="fas fa-check-circle"></i>
                        <span id="coordsText">Pinned location</span>
                    </div>
                    <div class="nearby-panel" id="nearbyPanel">
                        <h4><i class="fas fa-triangle-exclamation"></i> Similar issues nearby</h4>
                        <div id="nearbyList"></div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea id="description" placeholder="Describe the issue in detail..." required></textarea>
                </div>
                <div class="form-group">
                    <label>Upload Photo</label>
                    <div class="upload-area" onclick="document.getElementById('photoUpload').click()">
                        <i class="fas fa-camera"></i>
                        <div class="upload-text">Click to upload a photo</div>
                        <div class="upload-hint">JPG, PNG, GIF, WebP · Max 5MB</div>
                        <input type="file" id="photoUpload" accept="image/*" style="display:none;" onchange="handlePhotoUpload(this)" />
                    </div>
                    <img id="photoThumb" style="display:none; margin-top:10px; border-radius:12px; width:100%; height:140px; object-fit:cover;" />
                    <div id="photoPreview" class="photo-preview">
                        <i class="fas fa-check-circle"></i><span id="photoName">photo.jpg</span>
                        <span class="remove-photo" onclick="removePhoto()">Remove</span>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeReportModal()"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id="submitBtn"><i class="fas fa-paper-plane"></i> Submit Report</button>
                </div>
            </form>
        </div>
    </div>

    <!-- PROFILE MODAL -->
    <div id="profileModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 460px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-user-circle" style="color:#2d7a4f;"></i> My Profile</h3>
                <button class="btn btn-secondary" onclick="closeProfileModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="profile-avatar"><i class="fas fa-user" id="profileIcon"></i></div>
            <div class="profile-name" id="profileName">—</div>
            <div class="profile-role" id="profileRole">—</div>
            <div class="profile-stats">
                <div class="profile-stat"><div class="number" id="profileStat1">0</div><div class="label" id="profileStat1Label">Reports</div></div>
                <div class="profile-stat"><div class="number" id="profileStat2">0</div><div class="label" id="profileStat2Label">Resolved</div></div>
                <div class="profile-stat"><div class="number">⭐ <span id="profilePoints">0</span></div><div class="label">Points</div></div>
            </div>
            <div class="profile-menu-item" onclick="openEditProfileModal()">
                <i class="fas fa-user-edit"></i>
                <span class="menu-text">Edit Profile</span>
                <i class="fas fa-chevron-right menu-arrow"></i>
            </div>
            <div class="profile-menu-item" onclick="openNotifPrefsModal()">
                <i class="fas fa-bell"></i>
                <span class="menu-text">Email Notifications</span>
                <i class="fas fa-chevron-right menu-arrow"></i>
            </div>
        </div>
    </div>

    <!-- EMAIL NOTIFICATION PREFERENCES -->
    <div id="notifPrefsModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 460px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-envelope-open-text" style="color:#2d7a4f;"></i> Email Notifications</h3>
                <button class="btn btn-secondary" onclick="closeNotifPrefsModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle">Choose which GreenSteps emails you want to receive</div>
            <div class="pref-row">
                <div>
                    <div class="pref-label">Status updates</div>
                    <div class="pref-desc">Assigned, started, rejected, and other status changes</div>
                </div>
                <label class="pref-toggle"><input type="checkbox" id="prefEmailStatus" checked><span></span></label>
            </div>
            <div class="pref-row">
                <div>
                    <div class="pref-label">Rating requests</div>
                    <div class="pref-desc">Ask me to rate when a report is completed</div>
                </div>
                <label class="pref-toggle"><input type="checkbox" id="prefEmailRating" checked><span></span></label>
            </div>
            <div class="pref-row">
                <div>
                    <div class="pref-label">Followed reports</div>
                    <div class="pref-desc">Updates for reports I follow</div>
                </div>
                <label class="pref-toggle"><input type="checkbox" id="prefEmailFollowed" checked><span></span></label>
            </div>
            <div class="pref-row" id="prefEscalationRow" style="display:none;">
                <div>
                    <div class="pref-label">Escalation alerts</div>
                    <div class="pref-desc">Pending reports older than 7 days (admins)</div>
                </div>
                <label class="pref-toggle"><input type="checkbox" id="prefEmailEscalation" checked><span></span></label>
            </div>
            <div class="form-actions" style="margin-top:1rem;">
                <button type="button" class="btn btn-secondary" onclick="closeNotifPrefsModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary" id="saveNotifPrefsBtn" onclick="saveNotifPrefs()"><i class="fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>

    <!-- EDIT PROFILE MODAL -->
    <div id="editProfileModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 460px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-user-edit" style="color:#2d7a4f;"></i> Edit Profile</h3>
                <button class="btn btn-secondary" onclick="closeEditProfileModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle">Update your name, email, or password</div>
            <form id="editProfileForm" onsubmit="handleEditProfile(event)">
                <div class="form-group">
                    <label for="editFullName">Full Name</label>
                    <div class="input-wrapper"><i class="fas fa-user"></i><input type="text" id="editFullName" placeholder="Enter your full name" required /></div>
                </div>
                <div class="form-group">
                    <label for="editEmail">Email Address</label>
                    <div class="input-wrapper"><i class="fas fa-envelope"></i><input type="email" id="editEmail" placeholder="Enter your email" required /></div>
                </div>
                <div class="form-group">
                    <label for="editCurrentPassword">Current Password</label>
                    <div class="input-wrapper"><i class="fas fa-lock"></i><input type="password" id="editCurrentPassword" placeholder="Enter current password" required /></div>
                </div>
                <div class="form-group">
                    <label for="editNewPassword">New Password (leave blank to keep current)</label>
                    <div class="input-wrapper"><i class="fas fa-lock"></i><input type="password" id="editNewPassword" placeholder="At least 8 characters" minlength="8" /></div>
                </div>
                <div class="form-group">
                    <label for="editConfirmPassword">Confirm New Password</label>
                    <div class="input-wrapper"><i class="fas fa-check-circle"></i><input type="password" id="editConfirmPassword" placeholder="Confirm new password" /></div>
                </div>
                <div class="edit-profile-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeEditProfileModal()"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary" id="saveProfileBtn"><i class="fas fa-save"></i> Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- START TASK MODAL -->
    <div id="startModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-play-circle" style="color:#2d7a4f;"></i> Start Task</h3>
            <div class="modal-subtitle">Review task details before you begin</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Task</span><span class="detail-value" id="startTaskName">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="startTaskLocation">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Priority</span><span class="detail-value" id="startTaskPriority">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-user"></i> Reported By</span><span class="detail-value" id="startTaskReporter">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-phone"></i> Contact</span><span class="detail-value" id="startTaskPhone">—</span></div>
            </div>
            <div class="form-group">
                <label for="startNotes">Notes before starting</label>
                <textarea id="startNotes" placeholder="Add any notes or observations..."></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeStartModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary" onclick="confirmStartTask()" id="startTaskBtn"><i class="fas fa-play"></i> Start Task</button>
            </div>
        </div>
    </div>

    <!-- COMPLETE TASK MODAL -->
    <div id="completeModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-check-circle" style="color:#16a34a;"></i> Complete Task</h3>
            <div class="modal-subtitle">Upload before/after photos and mark as complete</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Task</span><span class="detail-value" id="completeTaskName">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="completeTaskLocation">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Priority</span><span class="detail-value" id="completeTaskPriority">—</span></div>
            </div>
            <form id="completeForm" onsubmit="submitComplete(event)">
                <div class="form-group">
                    <label>Before Photo</label>
                    <div class="upload-area" onclick="document.getElementById('completeBeforePhoto').click()">
                        <i class="fas fa-image"></i><div class="upload-text">Click to upload before photo</div>
                        <input type="file" id="completeBeforePhoto" accept="image/*" style="display:none;" onchange="handleCompletePhoto(this, 'completeBeforePreview', 'completeBeforeName', 'completeBeforeThumb')" />
                    </div>
                    <img id="completeBeforeThumb" style="display:none; margin-top:10px; border-radius:12px; width:100%; height:140px; object-fit:cover;" />
                    <div id="completeBeforePreview" class="photo-preview">
                        <i class="fas fa-check-circle"></i><span id="completeBeforeName">before.jpg</span>
                        <span class="remove-photo" onclick="removeCompletePhoto('completeBeforePhoto', 'completeBeforePreview', 'completeBeforeThumb')">Remove</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>After Photo <span class="required">*</span></label>
                    <div class="upload-area" onclick="document.getElementById('completeAfterPhoto').click()">
                        <i class="fas fa-image"></i><div class="upload-text">Click to upload after photo</div>
                        <input type="file" id="completeAfterPhoto" accept="image/*" style="display:none;" onchange="handleCompletePhoto(this, 'completeAfterPreview', 'completeAfterName', 'completeAfterThumb')" />
                    </div>
                    <img id="completeAfterThumb" style="display:none; margin-top:10px; border-radius:12px; width:100%; height:140px; object-fit:cover;" />
                    <div id="completeAfterPreview" class="photo-preview">
                        <i class="fas fa-check-circle"></i><span id="completeAfterName">after.jpg</span>
                        <span class="remove-photo" onclick="removeCompletePhoto('completeAfterPhoto', 'completeAfterPreview', 'completeAfterThumb')">Remove</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="completeNotes">Completion Notes</label>
                    <textarea id="completeNotes" placeholder="Describe the work completed..."></textarea>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closeCompleteModal()"><i class="fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success" id="completeBtn"><i class="fas fa-check-circle"></i> Mark Complete</button>
                </div>
            </form>
        </div>
    </div>

    <!-- PHOTO MODAL -->
    <div id="photoModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-images" style="color:#2563eb;"></i> Before & After</h3>
            <div class="modal-subtitle" id="photoModalTask">Task: —</div>
            <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin: 1.2rem 0;">
                <div style="background:#f8fafc; border-radius:16px; padding:1rem; text-align:center; border:1px solid #e9eef3;">
                    <img id="photoBeforeImg" style="border-radius:12px; width:100%; height:150px; object-fit:cover; background:#e9eef3;" />
                    <div style="font-weight:500; font-size:0.9rem; margin-top:8px;">Before</div>
                </div>
                <div style="background:#f0fdf4; border-radius:16px; padding:1rem; text-align:center; border:2px solid #2d7a4f;">
                    <img id="photoAfterImg" style="border-radius:12px; width:100%; height:150px; object-fit:cover; background:#e9eef3;" />
                    <div style="font-weight:500; font-size:0.9rem; margin-top:8px; color:#2d7a4f;">After ✓</div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closePhotoModal()"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>

    <!-- REPORT DETAILS MODAL -->
    <div id="reportDetailsModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 620px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-circle-info" style="color:#2563eb;"></i> Report Details</h3>
                <button class="btn btn-secondary" onclick="closeReportDetailsModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle" id="reportDetailsTitle">—</div>
            <img id="reportDetailsPhoto" class="report-photo-full" src="" alt="Report Photo" />
            <div style="margin-top:1rem;">
                <div class="modal-details">
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Category</span><span class="detail-value" id="reportDetailsCategory">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-user"></i> Reported By</span><span class="detail-value" id="reportDetailsCitizen">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-envelope"></i> Email</span><span class="detail-value" id="reportDetailsEmail">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-phone"></i> Phone</span><span class="detail-value" id="reportDetailsPhone">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="reportDetailsLocation">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Status</span><span class="detail-value" id="reportDetailsStatus">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-clock"></i> Submitted</span><span class="detail-value" id="reportDetailsDate">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-align-left"></i> Description</span><span class="detail-value" id="reportDetailsDescription" style="text-align:left; overflow-wrap:anywhere;">—</span></div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closeReportDetailsModal()" style="width:100%; justify-content:center;"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>

    <!-- NAVIGATE MODAL -->
    <div id="navigateModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-location-dot" style="color:#2563eb;"></i> Navigate to Task</h3>
            <div class="modal-subtitle">Get directions to the nearest task</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Nearest Task</span><span class="detail-value" id="navTaskName">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Destination</span><span class="detail-value" id="navDestination">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Priority</span><span class="detail-value" id="navPriority">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-route"></i> Distance</span><span class="detail-value" id="navDistance">—</span></div>
            </div>
            <div id="navMap"></div>
            <div class="nav-route">
                <div style="font-weight:600; font-size:0.9rem; margin-bottom:6px; color:#0b2a3b;"><i class="fas fa-route"></i> Route Directions</div>
                <div id="navSteps">
                    <div style="text-align:center; padding:1rem; color:#d1d5db; font-size:0.85rem;">
                        <i class="fas fa-route" style="font-size:1.5rem; opacity:0.4; display:block; margin-bottom:6px;"></i>
                        Select a task to see directions
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closeNavigateModal()"><i class="fas fa-times"></i> Close</button>
                <button class="btn btn-primary" onclick="startNavigation()"><i class="fas fa-play"></i> Start Navigation</button>
            </div>
        </div>
    </div>

    <!-- ADMIN ASSIGN MODAL -->
    <div id="assignModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-user-check" style="color:#7c3aed;"></i> Assign to Team</h3>
            <div class="modal-subtitle">Select a maintenance team for this report</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Report</span><span class="detail-value" id="assignReportTitle">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="assignReportLocation">—</span></div>
            </div>
            <div class="form-group">
                <label for="assignTeamSelect">Select Team</label>
                <select id="assignTeamSelect">
                    <option value="">Loading teams...</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeAssignModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-admin" onclick="confirmAssign()"><i class="fas fa-check"></i> Assign Team</button>
            </div>
        </div>
    </div>

    <!-- ADMIN RATING MODAL -->
    <div id="ratingModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-star" style="color:#f59e0b;"></i> Rate Maintenance Team</h3>
            <div class="modal-subtitle" id="rateModalSubtitle">Rate the quality of the work done on your report</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Task</span><span class="detail-value" id="rateTaskName">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-users"></i> Team</span><span class="detail-value" id="rateTeamName">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="rateTaskLocation">—</span></div>
            </div>
            <div class="form-group">
                <label>Rating <span class="required">*</span></label>
                <div class="rating-stars" id="ratingStars">
                    <span class="star" data-value="1" onclick="setRating(1)"><i class="fas fa-star"></i></span>
                    <span class="star" data-value="2" onclick="setRating(2)"><i class="fas fa-star"></i></span>
                    <span class="star" data-value="3" onclick="setRating(3)"><i class="fas fa-star"></i></span>
                    <span class="star" data-value="4" onclick="setRating(4)"><i class="fas fa-star"></i></span>
                    <span class="star" data-value="5" onclick="setRating(5)"><i class="fas fa-star"></i></span>
                    <span style="margin-left:8px; font-weight:500; color:#64748b;" id="ratingLabel">Select rating</span>
                </div>
            </div>
            <div class="form-group">
                <label for="rateComment">Comment (optional)</label>
                <textarea id="rateComment" placeholder="Add feedback for the team..."></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeRatingModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-rate" onclick="submitRating()" id="rateBtn"><i class="fas fa-star"></i> Submit Rating</button>
            </div>
        </div>
    </div>

    <!-- ADMIN REJECT MODAL -->
    <div id="adminRejectModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-ban" style="color:#dc2626;"></i> Reject Report</h3>
            <div class="modal-subtitle">Please provide a reason for rejecting this report</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Report</span><span class="detail-value" id="adminRejectTitle">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="adminRejectLocation">—</span></div>
            </div>
            <div class="form-group">
                <label for="adminRejectReason">Reason for rejection <span class="required">*</span></label>
                <textarea id="adminRejectReason" placeholder="e.g., Duplicate report, Invalid location, Not a valid environmental issue..." required></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeAdminRejectModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmAdminReject()" id="adminRejectBtn"><i class="fas fa-ban"></i> Confirm Rejection</button>
            </div>
        </div>
    </div>

    <!-- MAINTENANCE REJECT MODAL -->
    <div id="maintRejectModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-ban" style="color:#dc2626;"></i> Reject Task</h3>
            <div class="modal-subtitle">Please provide a reason for rejecting this task</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Task</span><span class="detail-value" id="maintRejectTitle">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="maintRejectLocation">—</span></div>
            </div>
            <div class="form-group">
                <label for="maintRejectReason">Reason for rejection <span class="required">*</span></label>
                <textarea id="maintRejectReason" placeholder="e.g., Out of scope, Requires specialized equipment, Duplicate task..." required></textarea>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeMaintRejectModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmMaintReject()" id="maintRejectBtn"><i class="fas fa-ban"></i> Confirm Rejection</button>
            </div>
        </div>
    </div>

    <!-- TRACKING MODAL (citizen) -->
    <div id="trackModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 560px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-truck-fast" style="color:#2563eb;"></i> Track Report</h3>
                <button class="btn btn-secondary" onclick="closeTrackModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle" id="trackModalTitle">—</div>
            <div class="modal-details" style="margin-bottom:0.8rem;">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Category</span><span class="detail-value" id="trackCategory">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="trackLocation">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Status</span><span class="detail-value" id="trackStatusBadge">—</span></div>
            </div>
            <div id="trackTimelineContainer"></div>
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closeTrackModal()" style="width:100%; justify-content:center;"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>

    <!-- COMPLETION INFO MODAL (citizen view) -->
    <div id="completionInfoModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 560px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-circle-check" style="color:#16a34a;"></i> Completion Details</h3>
                <button class="btn btn-secondary" onclick="closeCompletionInfoModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle" id="completionInfoTitle">—</div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Category</span><span class="detail-value" id="completionCategory">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-users"></i> Team</span><span class="detail-value" id="completionTeam">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="completionLocation">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-clock"></i> Completed At</span><span class="detail-value" id="completionDate">—</span></div>
            </div>
            <div class="completion-photos">
                <div class="completion-photo-card">
                    <img id="completionBeforeImg" src="" alt="Before" />
                    <div class="photo-label">Before</div>
                </div>
                <div class="completion-photo-card after">
                    <img id="completionAfterImg" src="" alt="After" />
                    <div class="photo-label">After ✓</div>
                </div>
            </div>
            <div class="modal-details" id="completionNotesBlock" style="display:none;">
                <div style="font-weight:600; font-size:0.85rem; color:#0b2a3b; margin-bottom:4px;"><i class="fas fa-clipboard-list"></i> Completion Notes</div>
                <div id="completionNotes" style="font-size:0.85rem; color:#475569; line-height:1.5;">—</div>
            </div>
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closeCompletionInfoModal()" style="width:100%; justify-content:center;"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>

    <!-- REJECTION REASON MODAL (citizen view) -->
    <div id="rejectionReasonModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 520px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-ban" style="color:#dc2626;"></i> Rejection Reason</h3>
                <button class="btn btn-secondary" onclick="closeRejectionReasonModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle" id="rejectionReasonTitle">—</div>
            <div class="rejection-box">
                <div class="rejection-title"><i class="fas fa-circle-exclamation"></i> Reason for Rejection</div>
                <div class="rejection-text" id="rejectionReasonText">—</div>
                <div class="rejection-meta" id="rejectionReasonMeta">—</div>
            </div>
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closeRejectionReasonModal()" style="width:100%; justify-content:center;"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>

    <!-- STATISTICS MODAL (citizen) -->
    <div id="statisticsModal" class="modal-overlay">
        <div class="modal-box stats-modal-box">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-chart-bar" style="color:#2d7a4f;"></i> My Statistics</h3>
                <button class="btn btn-secondary" onclick="closeStatisticsModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle">Your reporting activity and impact overview</div>

            <div class="stat-section-title"><i class="fas fa-gauge-high"></i> Key Metrics</div>
            <div class="metric-grid" id="statsMetricGrid"></div>

            <div class="stat-section-title"><i class="fas fa-chart-column"></i> Reports Per Month (Last 6 Months)</div>
            <div class="bar-chart" id="statsBarChart"></div>

            <div class="stat-section-title"><i class="fas fa-list-check"></i> Status Breakdown</div>
            <div id="statsStatusBreakdown"></div>

            <div class="stat-section-title"><i class="fas fa-tags"></i> Top Categories Reported</div>
            <div id="statsCategoryBreakdown"></div>

            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closeStatisticsModal()" style="width:100%; justify-content:center;"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>

    <!-- ACTION MODAL (maintenance/admin) -->
    <div id="actionModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 500px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-bolt" style="color:#2563eb;"></i> Available Actions</h3>
                <button class="btn btn-secondary" onclick="closeActionModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle" id="actionModalTitle">—</div>
            <div class="modal-details" style="margin-bottom:0.8rem;">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Item</span><span class="detail-value" id="actionModalItem">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="actionModalLocation">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Status</span><span class="detail-value" id="actionModalStatus">—</span></div>
            </div>
            <div class="action-modal-buttons" id="actionModalButtons"></div>
            <div class="form-actions">
                <button class="btn btn-secondary" onclick="closeActionModal()" style="width:100%; justify-content:center;"><i class="fas fa-times"></i> Close</button>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div id="successToast" class="success-toast">
        <i class="fas fa-check-circle"></i>
        <div class="toast-content">
            <div class="toast-title" id="toastTitle">Success!</div>
            <div class="toast-desc" id="toastDesc"></div>
        </div>
        <button class="toast-close" onclick="closeToast()"><i class="fas fa-times"></i></button>
    </div>

    <script>
        // ===================================================================
        //  GREENSTEPS — FRONTEND CONTROLLER (Laravel API + Real-time Pusher)
        // ===================================================================

        // API Configuration
        // Uses the built-in GreenSteps PHP API served by index.php itself
        // (no external Laravel server on port 8000 required).
        // Every action maps to: index.php?api=<action>
        const API_BASE_URL = '/api/';
        const PUSHER_APP_KEY = 'your-pusher-key';
        const PUSHER_APP_CLUSTER = 'mt1';

        let currentUser = null;
        let authToken = null;
        let selectedRole = null;
        let selectedFileDataUrl = null;
        let selectedLocation = null;
        let map = null, marker = null, mapInitialized = false;
        let nearbyMap = null, nearbyMarkers = [];
        let maintMap = null, maintMarkers = [];
        let navMap = null, navMarkers = [];
        let liveTrackMaps = {};
        let liveTrackPollTimers = {};
        let pusher = null;
        let channels = {};
        let liveTrackActiveReportId = null;
        let gpsWatchId = null;
        let gpsPingTimer = null;
        let gpsLastPosition = null;
        let gpsSharingActive = false;
        let allTasks = [];
        let currentTaskFilter = 'all';
        let activeTask = null;
        let adminActiveReport = null;
        let adminActiveTask = null;
        let maintRejectActiveTask = null;
        let selectedRating = 0;
        let actionModalData = null;
        let cachedReports = [];
        let cachedNotifications = [];
        let cachedTeams = [];
        let cachedAutoAssignRules = [];

        let completeBeforeDataUrl = null;
        let completeAfterDataUrl = null;

        // Real-time polling state
        let globalPollTimer = null;
        let chatUnreadTimer = null;
        let lastKnownReportId = 0;
        let lastKnownNotificationId = 0;
        let lastKnownCommentId = 0;
        let isPolling = false;
        let pollFailures = 0;

        const DEFAULT_CENTER = { lat: 14.5995, lng: 120.9842 };

        async function fetchWithTimeout(url, options, timeoutMs = 20000) {
            const controller = new AbortController();
            const timeoutId = setTimeout(() => controller.abort(), timeoutMs);
            try {
                return await fetch(url, { ...options, signal: controller.signal });
            } finally {
                clearTimeout(timeoutId);
            }
        }

        // Backend API functions (built-in PHP API via index.php?api=<action>)
        async function apiGet(action, params = '') {
            let url = `${API_BASE_URL}${action}`;
            if (params) {
                if (params.startsWith('&') && !url.includes('?')) {
                    params = '?' + params.slice(1);
                } else if (!params.startsWith('?') && !params.startsWith('&')) {
                    params = '?' + params;
                }
            }
            url += params;
            try {
                const res = await fetchWithTimeout(url, {
                    credentials: 'same-origin',
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                }, 15000);
                return await res.json();
            } catch (e) {
                console.error('API GET error:', action, e);
                return { success: false, message: e.name === 'AbortError' ? 'The server took too long to respond. Please try again.' : 'Server request failed.' };
            }
        }

        function getCsrfTokenValue() {
            return document.querySelector('meta[name="csrf-token"]')?.content || '';
        }

        function getXsrfTokenValue() {
            const csrfCookie = document.cookie
                .split('; ')
                .find(row => row.startsWith('XSRF-TOKEN='));

            return csrfCookie ? decodeURIComponent(csrfCookie.split('=').slice(1).join('=')) : '';
        }

        async function refreshCsrfToken() {
            try {
                await fetchWithTimeout('/sanctum/csrf-cookie', {
                    credentials: 'same-origin',
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                }, 8000);
            } catch (e) {
                console.warn('CSRF refresh failed:', e);
            }

            try {
                const response = await fetchWithTimeout('/', {
                    credentials: 'same-origin',
                    cache: 'no-store',
                    headers: { 'Accept': 'text/html', 'X-Requested-With': 'XMLHttpRequest' }
                }, 8000);
                const html = await response.text();
                const refreshedToken = new DOMParser()
                    .parseFromString(html, 'text/html')
                    .querySelector('meta[name="csrf-token"]')?.content;
                if (refreshedToken) {
                    const meta = document.querySelector('meta[name="csrf-token"]');
                    if (meta) meta.setAttribute('content', refreshedToken);
                    return refreshedToken;
                }
            } catch (e) {
                console.warn('CSRF token refresh failed:', e);
            }

            return getCsrfTokenValue();
        }

        async function apiPost(action, data) {
            const url = `${API_BASE_URL}${action}`;
            let csrf = getCsrfTokenValue();
            if (!csrf) {
                csrf = await refreshCsrfToken();
            }
            try {
                const headers = {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': csrf,
                    'X-XSRF-TOKEN': getXsrfTokenValue()
                };

                const res = await fetchWithTimeout(url, {
                    method: 'POST',
                    headers,
                    credentials: 'same-origin',
                    body: JSON.stringify(data)
                }, 30000);

                if (res.status === 419) {
                    const refreshedToken = await refreshCsrfToken();
                    const retry = await fetchWithTimeout(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': refreshedToken,
                            'X-XSRF-TOKEN': getXsrfTokenValue()
                        },
                        credentials: 'same-origin',
                        body: JSON.stringify(data)
                    }, 30000);
                    return await retry.json();
                }
                return await res.json();
            } catch (e) {
                console.error('API POST error:', action, e);
                return { success: false, message: e.name === 'AbortError' ? 'The server took too long to respond. Check your connection and try again.' : 'Server request failed.' };
            }
        }

        async function apiPostFormData(action, formData) {
            const url = `${API_BASE_URL}${action}`;
            let csrf = getCsrfTokenValue();
            if (!csrf) {
                csrf = await refreshCsrfToken();
            }

            const sendRequest = token => fetchWithTimeout(url, {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': token,
                    'X-XSRF-TOKEN': getXsrfTokenValue()
                },
                credentials: 'same-origin',
                body: formData
            }, 60000);

            try {
                let response = await sendRequest(csrf);
                if (response.status === 419) {
                    csrf = await refreshCsrfToken();
                    response = await sendRequest(csrf);
                }
                return await response.json();
            } catch (e) {
                console.error('API multipart POST error:', action, e);
                return { success: false, message: e.name === 'AbortError' ? 'The upload took too long. Try a smaller photo or check your connection.' : 'Server request failed.' };
            }
        }

        function showToast(title, desc) {
            const t = document.getElementById('successToast');
            document.getElementById('toastTitle').textContent = title;
            document.getElementById('toastDesc').textContent = desc;
            t.classList.add('show');
            setTimeout(() => t.classList.remove('show'), 4000);
        }

        // Pusher Real-time Setup
        

        function subscribeToUserChannels() {
            if (!pusher || !currentUser) return;

            // Subscribe to user's private channel
            const userChannel = pusher.subscribe(`private-user.${currentUser.id}`);
            channels[`user.${currentUser.id}`] = userChannel;

            userChannel.bind('App\\Events\\NotificationCreated', (data) => {
                handleRealTimeNotification(data);
            });

            // Subscribe to relevant report channels based on role
            if (currentUser.role === 'citizen') {
                subscribeToReportChannels();
            } else if (currentUser.role === 'maintenance') {
                subscribeToTeamChannels();
            } else if (currentUser.role === 'admin') {
                subscribeToAdminChannels();
            }
        }

        function subscribeToReportChannels() {
            // Subscribe to all user's reports
            apiGet('reports').then(response => {
                if (response.success) {
                    response.reports.forEach(report => {
                        const reportChannel = pusher.subscribe(`private-report.${report.id}`);
                        channels[`report.${report.id}`] = reportChannel;

                        reportChannel.bind('App\\Events\\ReportUpdated', (data) => {
                            handleRealTimeReportUpdate(data);
                        });

                        reportChannel.bind('App\\Events\\ReportCommentCreated', (data) => {
                            handleRealTimeComment(data);
                        });
                    });
                }
            });
        }

        function subscribeToTeamChannels() {
            if (!currentUser.team_name) return;

            const teamChannel = pusher.subscribe(`private-team.${currentUser.team_name}`);
            channels[`team.${currentUser.team_name}`] = teamChannel;

            teamChannel.bind('App\\Events\\TaskUpdated', (data) => {
                handleRealTimeTaskUpdate(data);
            });

            teamChannel.bind('App\\Events\\TeamLocationUpdated', (data) => {
                handleRealTimeLocationUpdate(data);
            });
        }

        function subscribeToAdminChannels() {
            // Admin can subscribe to all report channels
            apiGet('reports').then(response => {
                if (response.success) {
                    response.reports.forEach(report => {
                        const reportChannel = pusher.subscribe(`private-report.${report.id}`);
                        channels[`report.${report.id}`] = reportChannel;

                        reportChannel.bind('App\\Events\\ReportUpdated', (data) => {
                            handleRealTimeReportUpdate(data);
                        });
                    });
                }
            });
        }

        // Real-time event handlers
        function handleRealTimeNotification(data) {
            updateNotificationBadge(data.badge_count);
            highlightNotificationIcon(data.highlight);
            if (data.notification && data.notification.message) {
                showToast('New Notification', data.notification.message);
            }
        }

        function handleRealTimeReportUpdate(data) {
            updateReportStatus(data.report.id, data.report.status);
            highlightReportItem(data.report.id, data.action);
            if (data.action === 'assigned' || data.action === 'completed') {
                showToast('Report Updated', `Status changed to ${data.report.status}`);
            }
        }

        function handleRealTimeComment(data) {
            highlightCommentSection(data.reportId);
            updateCommentCount(data.reportId);
            showToast('New Comment', `${data.comment.user.full_name} commented on a report`);
        }

        function handleRealTimeTaskUpdate(data) {
            updateTaskStatus(data.task.id, data.task.status);
            highlightTaskItem(data.task.id, data.action);
            if (data.action === 'completed') {
                showToast('Task Completed', 'Task has been marked as completed');
            }
        }

        function handleRealTimeLocationUpdate(data) {
            updateLiveLocationOnMap(data);
        }

        // Visual indicator functions
        function updateNotificationBadge(count) {
            const badges = ['notificationBadge', 'maintenanceNotificationBadge', 'adminNotificationBadge'];
            badges.forEach(badgeId => {
                const badge = document.getElementById(badgeId);
                if (badge) {
                    badge.textContent = count > 0 ? count : '';
                    badge.style.display = count > 0 ? 'inline-flex' : 'none';
                }
            });
        }

        function highlightNotificationIcon(highlight) {
            const icon = document.getElementById('notificationIcon');
            if (icon && highlight) {
                icon.classList.add('notification-highlight');
                setTimeout(() => icon.classList.remove('notification-highlight'), 5000);
            }
        }

        function highlightReportItem(reportId, action) {
            const reportItem = document.querySelector(`[data-report-id="${reportId}"]`);
            if (reportItem) {
                reportItem.classList.add('highlight-pulse');
                setTimeout(() => reportItem.classList.remove('highlight-pulse'), 3000);
            }
        }

        function highlightTaskItem(taskId, action) {
            const taskItem = document.querySelector(`[data-task-id="${taskId}"]`);
            if (taskItem) {
                taskItem.classList.add('highlight-pulse');
                setTimeout(() => taskItem.classList.remove('highlight-pulse'), 3000);
            }
        }

        function highlightCommentSection(reportId) {
            const commentSection = document.querySelector(`[data-comments-report-id="${reportId}"]`);
            if (commentSection) {
                commentSection.classList.add('highlight-pulse');
                setTimeout(() => commentSection.classList.remove('highlight-pulse'), 3000);
            }
        }

        function updateReportStatus(reportId, status) {
            const statusElement = document.querySelector(`[data-report-id="${reportId}"] .status-badge`);
            if (statusElement) {
                statusElement.textContent = status;
                statusElement.className = `status-badge badge badge-${status.toLowerCase().replace(' ', '-')}`;
            }
        }

        function updateTaskStatus(taskId, status) {
            const statusElement = document.querySelector(`[data-task-id="${taskId}"] .status-badge`);
            if (statusElement) {
                statusElement.textContent = status;
                statusElement.className = `status-badge badge badge-${status.toLowerCase().replace(' ', '-')}`;
            }
        }

        function updateLiveLocationOnMap(data) {
            // Update live location marker on map if map is visible
            if (maintMap && data.task_id) {
                const existingMarker = maintMarkers.find(m => m.taskId === data.task_id);
                if (existingMarker) {
                    existingMarker.setPosition({ lat: data.latitude, lng: data.longitude });
                }
            }
        }

        function updateCommentCount(reportId) {
            const countElement = document.querySelector(`[data-report-id="${reportId}"] .comment-count`);
            if (countElement) {
                const currentCount = parseInt(countElement.textContent) || 0;
                countElement.textContent = currentCount + 1;
                countElement.classList.add('badge-highlight');
                setTimeout(() => countElement.classList.remove('badge-highlight'), 3000);
            }
        }

        // Load notifications from the API
        async function loadNotifications() {
            const result = await apiGet('notifications');
            if (result.success) {
                const notifications = result.notifications || [];
                if (currentUser?.role === 'maintenance') {
                    renderNotificationsList('maintNotifList', notifications);
                } else if (currentUser?.role === 'admin') {
                    renderNotificationsList('adminNotifList', notifications);
                } else {
                    renderNotificationsList('citizenNotifList', notifications);
                }
                const unread = notifications.filter(n => !Number(n.is_read)).length;
                updateNotificationBadge(unread);
            }
        }

        function renderNotifications(notifications) {
            const citizenList = document.getElementById('citizenNotifList');
            const maintList = document.getElementById('maintNotifList');
            const adminList = document.getElementById('adminNotifList');
            
            const targetList = currentUser?.role === 'citizen' ? citizenList : 
                              currentUser?.role === 'maintenance' ? maintList : adminList;
            
            if (!targetList) return;
            
            if (!notifications || notifications.length === 0) {
                targetList.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-bell-slash"></i>
                        <div class="empty-title">No notifications</div>
                        <div class="empty-desc">Comments and updates will appear here</div>
                    </div>`;
                return;
            }
            
            targetList.innerHTML = notifications.map(n => `
                <div class="notification-item ${n.is_read ? '' : 'unread'}" data-notification-id="${n.id}">
                    <div class="notif-content">
                        <div class="notif-title">${escapeHtml(n.title)}</div>
                        <div class="notif-message">${escapeHtml(n.message)}</div>
                        <div class="notif-time">${formatDateTime(new Date(n.created_at))}</div>
                    </div>
                    ${!n.is_read ? '<div class="notif-indicator"></div>' : ''}
                </div>
            `).join('');
        }
        function closeToast() { document.getElementById('successToast').classList.remove('show'); }

        // ============ REAL-TIME POLLING ENGINE ============
        function startGlobalPolling() {
            stopGlobalPolling();
            if (!currentUser) return;
            isPolling = true;
            pollFailures = 0;
            refreshChatUnreadBadge();
            chatUnreadTimer = setInterval(refreshChatUnreadBadge, 10000);
            globalPollTimer = setInterval(performPoll, 8000); // Poll every 8 seconds
            console.log('%c🔄 Real-time polling started', 'color:#2563eb;');
        }

        function stopGlobalPolling() {
            if (globalPollTimer) {
                clearInterval(globalPollTimer);
                globalPollTimer = null;
            }
            if (chatUnreadTimer) {
                clearInterval(chatUnreadTimer);
                chatUnreadTimer = null;
            }
            isPolling = false;
        }

        async function performPoll() {
            if (!currentUser || !isPolling) return;
            try {
                const result = await apiGet('poll', 
                    `&last_report_id=${lastKnownReportId}&last_notification_id=${lastKnownNotificationId}&last_comment_id=${lastKnownCommentId}`
                );
                
                if (!result.success) {
                    pollFailures++;
                    if (pollFailures > 5) {
                        console.warn('Polling failed too many times, slowing down...');
                        clearInterval(globalPollTimer);
                        globalPollTimer = setInterval(performPoll, 20000);
                    }
                    return;
                }
                pollFailures = 0;

                // Handle new reports
                if (result.reports && result.reports.length > 0) {
                    result.reports.forEach(r => {
                        if (r.id > lastKnownReportId) lastKnownReportId = r.id;
                    });
                    // Refresh dashboard data based on role
                    if (currentUser.role === 'citizen') {
                        await loadCitizenData();
                    } else if (currentUser.role === 'maintenance') {
                        await loadMaintenanceData();
                    } else if (currentUser.role === 'admin') {
                        await loadAdminData();
                    }
                }

                // Handle new notifications
                if (result.notifications && result.notifications.length > 0) {
                    result.notifications.forEach(n => {
                        if (n.id > lastKnownNotificationId) lastKnownNotificationId = n.id;
                    });
                    // Show toast for newest notification
                    const latest = result.notifications[0];
                    showToast('🔔 ' + latest.title, latest.message.substring(0, 80));
                    // Refresh notifications in UI
                    if (currentUser.role === 'citizen') {
                        const nResult = await apiGet('notifications');
                        if (nResult.success) renderNotificationsList('citizenNotifList', nResult.notifications);
                    } else if (currentUser.role === 'maintenance') {
                        const nResult = await apiGet('notifications');
                        if (nResult.success) renderNotificationsList('maintNotifList', nResult.notifications);
                    } else if (currentUser.role === 'admin') {
                        const nResult = await apiGet('notifications');
                        if (nResult.success) renderNotificationsList('adminNotifList', nResult.notifications);
                    }
                }

                // Handle new comments (update open discussion threads)
                if (result.comments && result.comments.length > 0) {
                    result.comments.forEach(c => {
                        if (c.id > lastKnownCommentId) lastKnownCommentId = c.id;
                    });
                    // Refresh any open comment threads
                    document.querySelectorAll('.comments-thread').forEach(thread => {
                        const threadId = thread.id;
                        if (threadId.startsWith('trackCommentThread-')) {
                            const reportId = parseInt(threadId.replace('trackCommentThread-', ''));
                            if (liveTrackActiveReportId === reportId) {
                                loadReportComments(reportId, threadId);
                            }
                        }
                    });
                }

                // Update stats in UI
                if (result.stats) {
                    if (currentUser.role === 'citizen') {
                        document.getElementById('citizenTotalReports').textContent = result.stats.total || 0;
                        document.getElementById('citizenPending').textContent = result.stats.pending || 0;
                        document.getElementById('citizenCompleted').textContent = result.stats.completed || 0;
                        document.getElementById('citizenPoints').textContent = result.stats.points || 0;
                    } else if (currentUser.role === 'maintenance') {
                        document.getElementById('maintAssigned').textContent = (result.stats.assigned || 0) + (result.stats.in_progress || 0);
                        document.getElementById('maintInProgress').textContent = result.stats.in_progress || 0;
                        document.getElementById('maintCompleted').textContent = result.stats.completed || 0;
                        document.getElementById('maintAvgRating').textContent = result.stats.avg_rating && result.stats.avg_rating !== '—' ? result.stats.avg_rating : '—';
                    } else if (currentUser.role === 'admin') {
                        document.getElementById('adminTotalReports').textContent = result.stats.total || 0;
                        document.getElementById('adminPendingReports').textContent = result.stats.pending || 0;
                        document.getElementById('adminAssignedReports').textContent = result.stats.assigned || 0;
                        document.getElementById('adminCompletedReports').textContent = result.stats.completed || 0;
                    }
                }
            } catch (e) {
                console.warn('Poll error:', e);
                pollFailures++;
            }
        }

        // ============ ROLE SELECTION ============
        function selectRole(role) {
            selectedRole = role;
            document.getElementById('roleButtons').style.display = 'none';
            document.getElementById('loginFormWrapper').style.display = 'block';

            const badge = document.getElementById('selectedRoleBadge');
            if (role === 'citizen') {
                badge.style.background = '#dbeafe';
                badge.style.color = '#1e4a7a';
                badge.innerHTML = '<i class="fas fa-user"></i> Citizen';
                document.getElementById('formTitle').textContent = 'Citizen Login';
                document.getElementById('formSubtitle').textContent = 'Login to report issues and track progress';
                document.getElementById('loginBtnText').textContent = 'Login as Citizen';
                document.getElementById('registerLinkBlock').style.display = 'block';
                document.querySelector('#registerLinkBlock a').textContent = 'Register here';
                document.getElementById('adminRegisterLink').style.display = 'none';
                document.getElementById('email').value = '';
                document.getElementById('password').value = '';
            } else if (role === 'maintenance') {
                badge.style.background = '#e0e7ff';
                badge.style.color = '#3730a3';
                badge.innerHTML = '<i class="fas fa-hard-hat"></i> Maintenance';
                document.getElementById('formTitle').textContent = 'Maintenance Login';
                document.getElementById('formSubtitle').textContent = 'Login to view and complete assigned tasks';
                document.getElementById('loginBtnText').textContent = 'Login as Maintenance';
                document.getElementById('registerLinkBlock').style.display = 'block';
                document.querySelector('#registerLinkBlock a').textContent = 'Apply as maintenance';
                document.getElementById('adminRegisterLink').style.display = 'none';
                document.getElementById('email').value = '';
                document.getElementById('password').value = '';
            } else if (role === 'admin') {
                badge.style.background = '#ede9fe';
                badge.style.color = '#6d28d9';
                badge.innerHTML = '<i class="fas fa-user-shield"></i> Admin';
                document.getElementById('formTitle').textContent = 'Admin Login';
                document.getElementById('formSubtitle').textContent = 'Manage reports, assign teams, and award points';
                document.getElementById('loginBtnText').textContent = 'Login as Admin';
                document.getElementById('registerLinkBlock').style.display = 'none';
                document.getElementById('adminRegisterLink').style.display = 'block';
                document.getElementById('email').value = '';
                document.getElementById('password').value = '';
            }
            setTimeout(() => document.getElementById('email').focus(), 200);
        }

        function backToRoles() {
            selectedRole = null;
            document.getElementById('roleButtons').style.display = 'flex';
            document.getElementById('loginFormWrapper').style.display = 'none';
            document.getElementById('errorMessage').classList.remove('show');
            document.getElementById('loginForm').reset();
        }

        // ============ LOGIN ============
        async function handleLogin(event) {
            event.preventDefault();
            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();
            const errorMessage = document.getElementById('errorMessage');
            const errorText = document.getElementById('errorText');
            const loginBtn = document.getElementById('loginBtn');

            if (!email || !password) {
                errorText.textContent = 'Please fill in all fields.';
                errorMessage.classList.add('show');
                return;
            }

            loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Logging in...';
            loginBtn.disabled = true;

            const result = await apiPost('login', { email, password });

            if (!result.success) {
                errorText.textContent = result.message || 'Invalid credentials.';
                errorMessage.classList.add('show');
                loginBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> <span id="loginBtnText">Login</span>';
                loginBtn.disabled = false;
                return;
            }

            if (selectedRole && result.user.role !== selectedRole) {
                errorText.textContent = `This account is registered as ${result.user.role}. Please select "${result.user.role}" role.`;
                errorMessage.classList.add('show');
                loginBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> <span id="loginBtnText">Login</span>';
                loginBtn.disabled = false;
                return;
            }

            errorMessage.classList.remove('show');
            currentUser = result.user;
            authToken = result.token; // Store Laravel API token
            
            // Initialize Pusher for real-time updates
            // initializePusher();

            // Reset poll IDs
            lastKnownReportId = 0;
            lastKnownNotificationId = 0;
            lastKnownCommentId = 0;

            if (currentUser.role === 'maintenance') {
                document.getElementById('maintenanceUserName').textContent = currentUser.team_name || currentUser.full_name;
                showToast('✅ Login Successful!', `Welcome back, ${currentUser.full_name}!`);
                setTimeout(() => showDashboard('maintenance'), 600);
            } else if (currentUser.role === 'admin') {
                document.getElementById('adminUserName').textContent = currentUser.full_name;
                showToast('✅ Login Successful!', `Welcome, Admin!`);
                setTimeout(() => showDashboard('admin'), 600);
            } else {
                document.getElementById('citizenUserName').textContent = currentUser.full_name;
                showToast('✅ Login Successful!', `Welcome back, ${currentUser.full_name}!`);
                setTimeout(() => showDashboard('citizen'), 600);
            }

            loginBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> <span id="loginBtnText">Login</span>';
            loginBtn.disabled = false;
        }

        // ============ PAGE NAV ============
        async function showDashboard(role) {
            document.getElementById('pageLogin').style.display = 'none';
            document.getElementById('pageCitizen').classList.remove('active');
            document.getElementById('pageMaintenance').classList.remove('active');
            document.getElementById('pageAdmin').classList.remove('active');

            if (role === 'citizen') {
                document.getElementById('pageCitizen').classList.add('active');
                await loadCitizenData();
                setTimeout(() => {
                    initNearbyMap();
                    // Initialize Google Maps if not loaded
                    loadGoogleMaps();
                }, 300);
            } else if (role === 'maintenance') {
                document.getElementById('pageMaintenance').classList.add('active');
                document.getElementById('maintenanceApprovalNotice').style.display = currentUser?.is_approved ? 'none' : 'block';
                await loadMaintenanceData();
                setTimeout(() => {
                    initMaintMap();
                    loadGoogleMaps();
                }, 300);
                syncGpsSharing();
            } else if (role === 'admin') {
                document.getElementById('pageAdmin').classList.add('active');
                await loadAdminData();
            }
            if (role !== 'maintenance') stopGpsSharing();
            if (role !== 'citizen') stopAllLiveTracking();
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Start real-time polling
            startGlobalPolling();
        }

        function showLogin() {
            stopGpsSharing();
            stopAllLiveTracking();
            stopGlobalPolling();
            closeChatPanel();
            document.getElementById('pageLogin').style.display = 'block';
            document.getElementById('pageCitizen').classList.remove('active');
            document.getElementById('pageMaintenance').classList.remove('active');
            document.getElementById('pageAdmin').classList.remove('active');
            selectedRole = null;
            currentUser = null;
            document.getElementById('roleButtons').style.display = 'flex';
            document.getElementById('loginFormWrapper').style.display = 'none';
            document.getElementById('errorMessage').classList.remove('show');
            document.getElementById('loginForm').reset();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // ============ CITIZEN DATA ============
        async function loadCitizenData() {
            const stats = await apiGet('stats');
            if (stats.success) {
                document.getElementById('citizenTotalReports').textContent = stats.total || 0;
                document.getElementById('citizenPending').textContent = stats.pending || 0;
                document.getElementById('citizenCompleted').textContent = stats.completed || 0;
                document.getElementById('citizenPoints').textContent = stats.points || 0;
            }

            const reportsResult = await apiGet('reports');
            if (reportsResult.success) {
                cachedReports = reportsResult.reports;
                // Track highest report ID for polling
                cachedReports.forEach(r => {
                    if (r.id > lastKnownReportId) lastKnownReportId = r.id;
                });
                const list = document.getElementById('citizenReportsList');
                if (cachedReports.length === 0) {
                    list.innerHTML = `
                        <div class="empty-state">
                            <i class="fas fa-file-alt"></i>
                            <div class="empty-title">No reports yet</div>
                            <div class="empty-desc">Your submitted reports will appear here</div>
                        </div>`;
                } else {
                    list.innerHTML = cachedReports.slice(0, 8).map(r => {
                        const badge = r.status === 'Pending' ? 'pending' :
                                    r.status === 'Assigned' ? 'assigned' :
                                    r.status === 'In Progress' ? 'progress' :
                                    r.status === 'Completed' ? 'completed' : 'rejected';
                        const timeAgo = getTimeAgo(r.created_at);
                        return `
                            <div class="report-item-wrap" id="report-wrap-${r.id}">
                                <div class="report-item" data-report-id="${r.id}">
                                    <div class="report-info">
                                        <i class="fas fa-flag" style="color:#2563eb;"></i>
                                        <span class="report-title">${r.category}</span>
                                    </div>
                                    <div class="report-meta">
                                        <span class="badge badge-${badge}">${r.status}</span>
                                        <span class="report-time">${timeAgo}</span>
                                        <button class="track-btn" onclick="toggleTracking(${r.id})">
                                            <i class="fas fa-truck-fast"></i> Track
                                        </button>
                                        <button class="track-btn" onclick="openReportDetailsModal(${r.id})" title="View details & discuss">
                                            <i class="fas fa-comments"></i> Discuss
                                        </button>
                                        ${r.status === 'Completed' ? (r.my_rating
                                            ? `<span class="badge badge-rated" title="You rated this team">⭐ ${r.my_rating}/5</span>`
                                            : `<button class="track-btn" style="background:#fef3c7; color:#92400e;" data-rate-id="${r.id}"><i class="fas fa-star" style="color:#f59e0b;"></i> Rate</button>`) : ''}
                                    </div>
                                </div>
                                <div id="track-panel-${r.id}" style="display:none;" class="report-track-expand"></div>
                            </div>
                        `;
                    }).join('');
                }
            }

            const notifsResult = await apiGet('notifications');
            if (notifsResult.success) {
                cachedNotifications = notifsResult.notifications;
                cachedNotifications.forEach(n => {
                    if (n.id > lastKnownNotificationId) lastKnownNotificationId = n.id;
                });
                renderNotificationsList('citizenNotifList', cachedNotifications);
            }
        }

        async function toggleTracking(reportId) {
            const panel = document.getElementById('track-panel-' + reportId);
            if (!panel) return;

            if (panel.style.display === 'block') {
                panel.style.display = 'none';
                stopLiveTracking(reportId);
                if (liveTrackActiveReportId === reportId) liveTrackActiveReportId = null;
                return;
            }

            document.querySelectorAll('.report-track-expand').forEach(p => {
                p.style.display = 'none';
            });
            Object.keys(liveTrackPollTimers).forEach(id => stopLiveTracking(parseInt(id, 10)));
            liveTrackActiveReportId = reportId;

            const result = await apiGet('tracking', '&report_id=' + reportId);
            if (!result.success) return;

            const report = result.report;
            const task = result.task;
            const steps = buildTrackingSteps(report, task);
            const showLiveMap = report.status === 'Assigned' || report.status === 'In Progress';

            panel.innerHTML = `
                <div style="background:#f8fafc; border-radius:14px; padding:0.8rem 1rem; margin:0.2rem 0 0.4rem 0;">
                    <div style="font-weight:600; font-size:0.9rem; color:#0b2a3b; margin-bottom:0.5rem; display:flex; align-items:center; gap:6px;">
                        <i class="fas fa-truck-fast" style="color:#2563eb;"></i> Tracking Timeline
                    </div>
                    <div class="tracking-timeline">
                        ${steps.map(s => `
                            <div class="track-step ${s.state}">
                                <div class="step-icon"><i class="fas ${s.icon}"></i></div>
                                <div class="step-content">
                                    <div class="step-label">${s.label}</div>
                                    <div class="step-desc">${s.desc}</div>
                                    ${s.time ? `<span class="step-time">${s.time}</span>` : ''}
                                    ${s.action ? `<div style="margin-top:6px;">${s.action}</div>` : ''}
                                </div>
                            </div>
                        `).join('')}
                    </div>
                    ${showLiveMap ? `
                    <div class="live-track-wrap">
                        <div class="live-track-header">
                            <div class="live-track-title"><i class="fas fa-satellite-dish"></i> Live Team Map</div>
                            <span class="live-status waiting" id="liveStatus-${reportId}">
                                <span class="live-pulse-dot"></span>
                                <span id="liveStatusText-${reportId}">Connecting…</span>
                            </span>
                        </div>
                        <div id="liveTrackMap-${reportId}" class="live-track-map"></div>
                        <div class="live-track-meta" id="liveTrackMeta-${reportId}">
                            <span><i class="fas fa-flag"></i> Destination: ${report.location || '—'}</span>
                            <span id="liveTeamEta-${reportId}"></span>
                        </div>
                    </div>` : ''}
                    <div class="comments-section">
                        <div class="comments-section-title"><i class="fas fa-comments"></i> Discussion</div>
                        <div class="comments-thread" id="trackCommentThread-${reportId}">
                            <div class="comments-empty">Loading comments…</div>
                        </div>
                        <div class="comment-compose">
                            <textarea id="trackCommentInput-${reportId}" placeholder="Ask a question or reply to admin/team…" maxlength="2000"></textarea>
                            <div class="comment-compose-actions">
                                <button type="button" class="btn btn-primary" onclick="submitReportComment(${reportId})">
                                    <i class="fas fa-paper-plane"></i> Send
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            panel.style.display = 'block';
            await loadReportComments(reportId, 'trackCommentThread-' + reportId);

            if (showLiveMap) {
                setTimeout(() => {
                    initLiveTrackMap(reportId, report);
                    startLiveTracking(reportId);
                }, 250);
            }
        }

        function buildTrackingSteps(report, task) {
            const created = new Date(report.created_at);
            const steps = [];

            steps.push({
                state: 'done',
                icon: 'fa-check',
                label: 'Report Submitted',
                desc: 'Your report has been received.',
                time: formatDateTime(created)
            });

            if (report.status === 'Pending') {
                steps.push({
                    state: 'active',
                    icon: 'fa-hourglass-half',
                    label: 'Under Review',
                    desc: 'Admin is reviewing your report.',
                    time: 'In progress'
                });
            } else if (report.status === 'Rejected') {
                steps.push({
                    state: 'rejected',
                    icon: 'fa-ban',
                    label: 'Report Rejected',
                    desc: 'Your report has been rejected.',
                    time: report.rejected_at ? formatDateTime(new Date(report.rejected_at)) : '',
                    action: `<button class="track-btn" onclick="openRejectionReasonModal(${report.id})" style="background:#fee2e2; color:#991b1b;"><i class="fas fa-circle-info" style="color:#dc2626;"></i> View Reason</button>`
                });
                return steps;
            } else {
                steps.push({
                    state: 'done',
                    icon: 'fa-check',
                    label: 'Report Reviewed',
                    desc: 'Report has been reviewed and approved.',
                    time: report.updated_at ? formatDateTime(new Date(report.updated_at)) : ''
                });
            }

            if (report.status === 'Assigned' || report.status === 'In Progress' || report.status === 'Completed') {
                steps.push({
                    state: report.status === 'Assigned' ? 'active' : 'done',
                    icon: 'fa-user-check',
                    label: 'Team Assigned',
                    desc: report.assigned_team ? `Assigned to ${report.assigned_team}` : 'Team assigned',
                    time: task && task.created_at ? formatDateTime(new Date(task.created_at)) : '—'
                });
            } else {
                steps.push({
                    state: 'pending',
                    icon: 'fa-user-check',
                    label: 'Team Assignment',
                    desc: 'Waiting for team assignment.',
                    time: '—'
                });
            }

            if (report.status === 'In Progress' || report.status === 'Completed') {
                steps.push({
                    state: report.status === 'In Progress' ? 'active' : 'done',
                    icon: 'fa-hard-hat',
                    label: 'Work In Progress',
                    desc: 'Maintenance team is working on it.',
                    time: task && task.status === 'In Progress' ? 'In progress' : (task && task.completed_at ? formatDateTime(new Date(task.completed_at)) : '')
                });
            } else if (report.status === 'Assigned') {
                steps.push({
                    state: 'pending',
                    icon: 'fa-hard-hat',
                    label: 'Work In Progress',
                    desc: 'Waiting for team to start.',
                    time: '—'
                });
            } else {
                steps.push({
                    state: 'pending',
                    icon: 'fa-hard-hat',
                    label: 'Work In Progress',
                    desc: 'Work will begin once assigned.',
                    time: '—'
                });
            }

            if (report.status === 'Completed') {
                const completedAt = task && task.completed_at ? new Date(task.completed_at) : new Date(report.updated_at);
                steps.push({
                    state: 'done',
                    icon: 'fa-flag-checkered',
                    label: 'Completed',
                    desc: 'Issue resolved! ✅',
                    time: formatDateTime(completedAt),
                    action: `<button class="track-btn" onclick="openCompletionInfoModal(${report.id})" style="background:#dcfce7; color:#166534;"><i class="fas fa-circle-info" style="color:#16a34a;"></i> View Info</button>`
                });
            } else {
                steps.push({
                    state: 'pending',
                    icon: 'fa-flag-checkered',
                    label: 'Completed',
                    desc: 'Will be marked complete after work.',
                    time: '—'
                });
            }

            return steps;
        }

        // ============ LIVE TEAM TRACKING (CITIZEN) ============
        function stopLiveTracking(reportId) {
            if (liveTrackPollTimers[reportId]) {
                clearInterval(liveTrackPollTimers[reportId]);
                delete liveTrackPollTimers[reportId];
            }
            if (liveTrackMaps[reportId]) {
                liveTrackMaps[reportId].teamMarker = null;
                liveTrackMaps[reportId].destMarker = null;
                liveTrackMaps[reportId].map = null;
                delete liveTrackMaps[reportId];
            }
        }

        function stopAllLiveTracking() {
            Object.keys(liveTrackPollTimers).forEach(id => stopLiveTracking(parseInt(id, 10)));
            Object.keys(liveTrackMaps).forEach(id => stopLiveTracking(parseInt(id, 10)));
            liveTrackActiveReportId = null;
        }

        function svgDataUri(svg) {
            return 'data:image/svg+xml;charset=UTF-8,' + encodeURIComponent(svg);
        }

        function reportAreaIcon() {
            const svg = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">' +
                '<circle cx="24" cy="24" r="19" fill="#dc2626" stroke="#ffffff" stroke-width="3"/>' +
                '<rect x="21.5" y="11" width="5" height="16" rx="2.5" fill="#ffffff"/>' +
                '<circle cx="24" cy="33" r="3" fill="#ffffff"/>' +
                '</svg>';
            return {
                url: svgDataUri(svg),
                scaledSize: new google.maps.Size(42, 42),
                anchor: new google.maps.Point(21, 21)
            };
        }

        function teamBuilderIcon() {
            const svg = '<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48">' +
                '<circle cx="24" cy="24" r="20" fill="#2563eb" stroke="#ffffff" stroke-width="3"/>' +
                '<text x="24" y="33" font-size="24" text-anchor="middle" ' +
                'font-family="Segoe UI Emoji, Apple Color Emoji, Noto Color Emoji, sans-serif">\uD83D\uDC77</text>' +
                '</svg>';
            return {
                url: svgDataUri(svg),
                scaledSize: new google.maps.Size(42, 42),
                anchor: new google.maps.Point(21, 21)
            };
        }

        function initLiveTrackMap(reportId, report) {
            const el = document.getElementById('liveTrackMap-' + reportId);
            if (!el || typeof google === 'undefined') {
                setLiveStatus(reportId, 'waiting', 'Map unavailable');
                return;
            }

            if (liveTrackMaps[reportId]?.map) return;

            const destLat = report.latitude ? parseFloat(report.latitude) : null;
            const destLng = report.longitude ? parseFloat(report.longitude) : null;
            const center = (destLat && destLng) ? { lat: destLat, lng: destLng } : DEFAULT_CENTER;

            const map = new google.maps.Map(el, {
                center,
                zoom: 14,
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: false,
                zoomControl: true
            });

            let destMarker = null;
            if (destLat && destLng) {
                destMarker = new google.maps.Marker({
                    position: { lat: destLat, lng: destLng },
                    map,
                    title: 'Reported area',
                    icon: reportAreaIcon(),
                    zIndex: 1
                });
            }

            liveTrackMaps[reportId] = {
                map,
                destMarker,
                teamMarker: null,
                dest: (destLat && destLng) ? { lat: destLat, lng: destLng } : null,
                teamName: report.assigned_team || 'Team'
            };
            setLiveStatus(reportId, 'waiting', 'Waiting for team GPS…');
        }

        function setLiveStatus(reportId, mode, text) {
            const el = document.getElementById('liveStatus-' + reportId);
            const textEl = document.getElementById('liveStatusText-' + reportId);
            if (textEl) textEl.textContent = text;
            if (el) {
                el.classList.remove('live', 'waiting');
                el.classList.add(mode === 'live' ? 'live' : 'waiting');
            }
        }

        function haversineKm(a, b) {
            const toRad = d => d * Math.PI / 180;
            const R = 6371;
            const dLat = toRad(b.lat - a.lat);
            const dLng = toRad(b.lng - a.lng);
            const lat1 = toRad(a.lat);
            const lat2 = toRad(b.lat);
            const h = Math.sin(dLat / 2) ** 2 + Math.cos(lat1) * Math.cos(lat2) * Math.sin(dLng / 2) ** 2;
            return R * 2 * Math.atan2(Math.sqrt(h), Math.sqrt(1 - h));
        }

        function updateLiveTrackMarkers(reportId, data) {
            const state = liveTrackMaps[reportId];
            if (!state || !state.map) return;

            const dest = data.destination;
            if (dest && dest.latitude && dest.longitude) {
                const destPos = { lat: parseFloat(dest.latitude), lng: parseFloat(dest.longitude) };
                state.dest = destPos;
                if (state.destMarker) {
                    state.destMarker.setPosition(destPos);
                } else {
                    state.destMarker = new google.maps.Marker({
                        position: destPos,
                        map: state.map,
                        title: 'Reported area',
                        icon: reportAreaIcon()
                    });
                }
            }

            const loc = data.team_location;
            const metaEta = document.getElementById('liveTeamEta-' + reportId);

            if (!loc || !loc.latitude || !loc.longitude) {
                setLiveStatus(reportId, 'waiting', 'Waiting for team GPS…');
                if (metaEta) metaEta.textContent = '';
                return;
            }

            const teamPos = { lat: parseFloat(loc.latitude), lng: parseFloat(loc.longitude) };
            const teamLabel = data.team_name || state.teamName || 'Team';

            if (state.teamMarker) {
                state.teamMarker.setPosition(teamPos);
            } else {
                state.teamMarker = new google.maps.Marker({
                    position: teamPos,
                    map: state.map,
                    title: teamLabel + ' (builder team, live)',
                    icon: teamBuilderIcon(),
                    zIndex: 10
                });
            }

            const bounds = new google.maps.LatLngBounds();
            if (state.dest) bounds.extend(state.dest);
            bounds.extend(teamPos);
            state.map.fitBounds(bounds);
            google.maps.event.addListenerOnce(state.map, 'bounds_changed', () => {
                if (state.map.getZoom() > 16) state.map.setZoom(16);
                if (state.map.getZoom() < 12) state.map.setZoom(12);
            });

            const ago = getTimeAgo(loc.recorded_at);
            setLiveStatus(reportId, 'live', `${teamLabel} · updated ${ago}`);

            if (metaEta && state.dest) {
                const km = haversineKm(teamPos, state.dest);
                const distLabel = km < 1 ? `${Math.round(km * 1000)} m away` : `${km.toFixed(1)} km away`;
                metaEta.innerHTML = `<i class="fas fa-truck"></i> ${teamLabel}: ${distLabel}`;
            }
        }

        function startLiveTracking(reportId) {
            if (liveTrackPollTimers[reportId]) {
                clearInterval(liveTrackPollTimers[reportId]);
                delete liveTrackPollTimers[reportId];
            }
            const poll = async () => {
                if (liveTrackActiveReportId !== reportId) return;
                const result = await apiGet('team-location', '&report_id=' + reportId);
                if (!result.success) return;
                if (!result.live) {
                    setLiveStatus(reportId, 'waiting', 'Tracking ended');
                    if (liveTrackPollTimers[reportId]) {
                        clearInterval(liveTrackPollTimers[reportId]);
                        delete liveTrackPollTimers[reportId];
                    }
                    return;
                }
                updateLiveTrackMarkers(reportId, result);
            };
            poll();
            liveTrackPollTimers[reportId] = setInterval(poll, 10000);
        }
        // ============ MAINTENANCE GPS SHARING ============
        function getActiveGpsTasks() {
            return allTasks.filter(t => t.status === 'Assigned' || t.status === 'In Progress');
        }

        function setGpsIndicator(active) {
            const el = document.getElementById('gpsSharingIndicator');
            if (el) el.classList.toggle('active', !!active);
        }

        function syncGpsSharing() {
            const active = getActiveGpsTasks();
            if (active.length === 0) {
                stopGpsSharing();
                return;
            }
            if (!gpsSharingActive) startGpsSharing();
            else setGpsIndicator(true);
        }

        function startGpsSharing() {
            if (!navigator.geolocation) {
                console.warn('Geolocation not available');
                return;
            }

            const active = getActiveGpsTasks();
            if (active.length === 0) {
                stopGpsSharing();
                return;
            }

            if (gpsSharingActive && gpsPingTimer) {
                setGpsIndicator(true);
                return;
            }

            stopGpsSharing();
            gpsSharingActive = true;
            setGpsIndicator(true);

            gpsWatchId = navigator.geolocation.watchPosition(
                (pos) => {
                    gpsLastPosition = {
                        latitude: pos.coords.latitude,
                        longitude: pos.coords.longitude,
                        accuracy: pos.coords.accuracy
                    };
                },
                (err) => {
                    console.warn('GPS watch error:', err.message);
                    setGpsIndicator(false);
                },
                { enableHighAccuracy: true, maximumAge: 15000, timeout: 20000 }
            );

            sendGpsPings();
            gpsPingTimer = setInterval(sendGpsPings, 30000);
        }

        function stopGpsSharing() {
            gpsSharingActive = false;
            setGpsIndicator(false);
            if (gpsWatchId !== null && navigator.geolocation) {
                navigator.geolocation.clearWatch(gpsWatchId);
                gpsWatchId = null;
            }
            if (gpsPingTimer) {
                clearInterval(gpsPingTimer);
                gpsPingTimer = null;
            }
        }

        async function sendGpsPings() {
            const active = getActiveGpsTasks();
            if (active.length === 0) {
                stopGpsSharing();
                return;
            }
            setGpsIndicator(true);

            const sendWith = async (coords) => {
                for (const task of active) {
                    await apiPost('tasks/' + task.id + '/gps', {
                        task_id: task.id,
                        latitude: coords.latitude,
                        longitude: coords.longitude,
                        accuracy: coords.accuracy || null
                    });
                }
            };

            if (gpsLastPosition) {
                await sendWith(gpsLastPosition);
                return;
            }

            navigator.geolocation.getCurrentPosition(
                async (pos) => {
                    gpsLastPosition = {
                        latitude: pos.coords.latitude,
                        longitude: pos.coords.longitude,
                        accuracy: pos.coords.accuracy
                    };
                    await sendWith(gpsLastPosition);
                },
                (err) => console.warn('GPS ping failed:', err.message),
                { enableHighAccuracy: true, timeout: 15000, maximumAge: 10000 }
            );
        }

        async function openRejectionReasonModal(reportId) {
            const result = await apiGet('tracking', '&report_id=' + reportId);
            if (!result.success) return;
            const report = result.report;

            document.getElementById('rejectionReasonTitle').textContent = report.category;
            document.getElementById('rejectionReasonText').textContent = report.rejection_reason || 'No reason provided.';

            const rejectedBy = report.rejected_by || 'Admin';
            const rejectedAt = report.rejected_at ? formatDateTime(new Date(report.rejected_at)) : '—';
            document.getElementById('rejectionReasonMeta').innerHTML = `<i class="fas fa-user-shield"></i> Rejected by ${rejectedBy} · <i class="fas fa-clock"></i> ${rejectedAt}`;

            document.getElementById('rejectionReasonModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeRejectionReasonModal() {
            document.getElementById('rejectionReasonModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function openCompletionInfoModal(reportId) {
            const result = await apiGet('completion-info', '&report_id=' + reportId);
            if (!result.success) return;
            const data = result.data;

            document.getElementById('completionInfoTitle').textContent = data.category;
            document.getElementById('completionCategory').textContent = data.category;
            document.getElementById('completionTeam').textContent = data.team_name || data.assigned_team || '—';
            document.getElementById('completionLocation').textContent = data.location;
            document.getElementById('completionDate').textContent = data.completed_at ? formatDateTime(new Date(data.completed_at)) : formatDateTime(new Date(data.updated_at));

            const beforeImg = document.getElementById('completionBeforeImg');
            const afterImg = document.getElementById('completionAfterImg');

            if (data.before_photo) {
                beforeImg.src = data.before_photo;
            } else {
                beforeImg.src = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="300" height="200"><rect width="300" height="200" fill="%23e9eef3"/><text x="50%" y="50%" font-family="Inter" font-size="14" fill="%2394a3b8" text-anchor="middle" dy=".3em">No before photo</text></svg>';
            }

            if (data.after_photo) {
                afterImg.src = data.after_photo;
            } else {
                afterImg.src = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="300" height="200"><rect width="300" height="200" fill="%23dcfce7"/><text x="50%" y="50%" font-family="Inter" font-size="14" fill="%23166534" text-anchor="middle" dy=".3em">No after photo</text></svg>';
            }

            const notesBlock = document.getElementById('completionNotesBlock');
            const notesEl = document.getElementById('completionNotes');
            if (data.notes) {
                notesEl.textContent = data.notes;
                notesBlock.style.display = 'block';
            } else {
                notesBlock.style.display = 'none';
            }

            document.getElementById('completionInfoModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeCompletionInfoModal() {
            document.getElementById('completionInfoModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function openReportDetailsModal(reportId) {
            const result = await apiGet('reports/' + reportId, '&report_id=' + reportId);
            if (!result.success) {
                showToast('⚠️ Error', result.message || 'Could not load report details.');
                return;
            }
            const report = result.report;

            document.getElementById('reportDetailsTitle').textContent = report.category;
            document.getElementById('reportDetailsCategory').textContent = report.category;
            document.getElementById('reportDetailsCitizen').textContent = report.citizen_name || '—';
            document.getElementById('reportDetailsEmail').textContent = report.citizen_email || '—';
            document.getElementById('reportDetailsPhone').textContent = report.citizen_phone || '—';
            document.getElementById('reportDetailsLocation').textContent = report.location;
            document.getElementById('reportDetailsDescription').textContent = report.description || 'No description provided.';
            document.getElementById('reportDetailsDate').textContent = formatDateTime(new Date(report.created_at));

            const badge = report.status === 'Pending' ? 'pending' :
                        report.status === 'Assigned' ? 'assigned' :
                        report.status === 'In Progress' ? 'progress' :
                        report.status === 'Completed' ? 'completed' : 'rejected';
            document.getElementById('reportDetailsStatus').innerHTML = `<span class="badge badge-${badge}">${report.status}</span>`;

            const photoImg = document.getElementById('reportDetailsPhoto');
            if (report.photo_url) {
                photoImg.src = report.photo_url;
                photoImg.style.display = 'block';
            } else {
                photoImg.src = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="600" height="220"><rect width="600" height="220" fill="%23e9eef3"/><text x="50%" y="50%" font-family="Inter" font-size="16" fill="%2394a3b8" text-anchor="middle" dy=".3em">No photo uploaded</text></svg>';
                photoImg.style.display = 'block';
            }

            document.getElementById('reportDetailsModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeReportDetailsModal() {
            document.getElementById('reportDetailsModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // ============ REPORT COMMENTS ============
        function escapeHtml(str) {
            return String(str ?? '')
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;');
        }

        function renderCommentsHtml(comments) {
            if (!comments || comments.length === 0) {
                return `<div class="comments-empty"><i class="fas fa-comments" style="display:block;margin-bottom:6px;opacity:0.45;"></i>No messages yet. Start the discussion.</div>`;
            }
            const myId = currentUser?.id;
            return comments.map(c => {
                const isMine = myId && Number(c.user_id) === Number(myId);
                const roleClass = c.role || 'citizen';
                const roleLabel = c.role === 'maintenance'
                    ? (c.team_name || 'Maintenance')
                    : (c.role === 'admin' ? 'Admin' : 'Citizen');
                return `
                    <div class="comment-bubble ${isMine ? 'mine' : ''}">
                        <div class="comment-meta">
                            <span class="comment-author">
                                ${escapeHtml(c.full_name || 'User')}
                                <span class="comment-role ${roleClass}">${escapeHtml(roleLabel)}</span>
                            </span>
                            <span class="comment-time">${getTimeAgo(c.created_at)}</span>
                        </div>
                        <div class="comment-text">${escapeHtml(c.message)}</div>
                    </div>
                `;
            }).join('');
        }

        async function loadReportComments(reportId, threadElId) {
            const thread = document.getElementById(threadElId);
            if (!thread) return;
            const result = await apiGet('reports/' + reportId + '/comments', '&report_id=' + reportId);
            if (!result.success) {
                thread.innerHTML = `<div class="comments-empty">${escapeHtml(result.message || 'Could not load comments.')}</div>`;
                return;
            }
            // Track highest comment ID
            result.comments.forEach(c => {
                if (c.id > lastKnownCommentId) lastKnownCommentId = c.id;
            });
            thread.innerHTML = renderCommentsHtml(result.comments);
            thread.scrollTop = thread.scrollHeight;
        }

        async function submitReportComment(id) {
            if (!id) return;

            const input = document.getElementById('trackCommentInput-' + id);
            const threadId = 'trackCommentThread-' + id;

            const message = (input?.value || '').trim();
            if (!message) {
                alert('⚠️ Please write a comment first.');
                return;
            }

            try {
                const result = await apiPost('reports/' + id + '/comments', { report_id: id, message });

                if (result.success) {
                    if (input) input.value = '';
                    await loadReportComments(id, threadId);
                    showToast('💬 Comment sent', 'The other party has been notified.');
                } else {
                    alert('⚠️ ' + (result.message || 'Could not post comment.'));
                }
            } catch (error) {
                console.error('Comment submission failed:', error);
                showToast('Comment not sent', 'Check your connection and try again.');
            }
        }

        function renderNotificationsList(elId, notifications) {
            const el = document.getElementById(elId);
            if (!el) return;
            const unreadCount = (notifications || []).filter(n => !Number(n.is_read)).length;
            updateNotificationBadge(unreadCount);
            if (!notifications || notifications.length === 0) {
                el.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-bell-slash"></i>
                        <div class="empty-title">No notifications</div>
                        <div class="empty-desc">Comments and updates will appear here</div>
                    </div>`;
                return;
            }
            el.innerHTML = notifications.slice(0, 6).map(n => {
                const unread = !Number(n.is_read);
                const icon = n.title && n.title.toLowerCase().includes('comment') ? 'comments' : 'bell';
                return `
                <div class="notification-item ${unread ? 'unread' : ''}" data-notification-id="${n.id}" data-report-id="${n.report_id || ''}" onclick="handleNotificationClick(this, ${n.id}, '${n.report_id || ''}')">
                    <div class="notif-icon" style="${unread ? 'background:#dcfce7;color:#166534;' : ''}"><i class="fas fa-${icon}"></i></div>
                    <div class="notif-content"><div class="notif-title">${escapeHtml(n.title)}</div><div class="notif-desc">${escapeHtml(n.message)}</div><div class="notif-time">${getTimeAgo(n.created_at)}</div></div>
                    ${unread ? '<div class="notif-indicator" title="Unread"></div>' : ''}
                </div>`;
            }).join('');
        }

        async function handleNotificationClick(el, notifId, reportId) {
            // Mark as read on the server + locally
            if (el && el.classList.contains('unread')) {
                el.classList.remove('unread');
                const dot = el.querySelector('.notif-indicator');
                if (dot) dot.remove();
                await apiPost('notifications/read', { notification_id: notifId });
                const remaining = document.querySelectorAll('#' + el.parentElement.id + ' .notification-item.unread').length;
                updateNotificationBadge(remaining);
            }
            // Redirect to the related report and highlight it for 1s
            if (reportId) {
                const rid = parseInt(reportId, 10);
                await focusReport(rid);
            }
        }

        async function focusReport(reportId) {
            // Close any open overlays first
            document.querySelectorAll('.modal-overlay.active').forEach(m => m.classList.remove('active'));
            document.body.style.overflow = 'auto';

            // Make sure the right dashboard list is visible
            await openReportDetailsModal(reportId);

            // Find the report row in the active dashboard and scroll + highlight for 1s
            setTimeout(() => {
                const wrap = document.getElementById('report-wrap-' + reportId);
                const row = wrap || document.querySelector(`[data-report-id="${reportId}"]`) || document.querySelector(`.report-item[onclick*="${reportId}"]`);
                if (row) {
                    row.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    row.classList.remove('highlight-1s');
                    void row.offsetWidth;
                    row.classList.add('highlight-1s');
                    setTimeout(() => row.classList.remove('highlight-1s'), 1100);
                }
            }, 350);
        }

        async function openStatisticsModal() {
            const result = await apiGet('stats');
            if (!result.success) return;

            const reportsResult = await apiGet('reports');
            const reports = reportsResult.success ? reportsResult.reports : [];

            const total = result.total || 0;
            const resolved = result.completed || 0;
            const rejected = reports.filter(r => r.status === 'Rejected').length;
            const points = result.points || 0;

            document.getElementById('statsMetricGrid').innerHTML = `
                <div class="metric-card">
                    <div class="metric-icon" style="background:#dbeafe; color:#1e4a7a;"><i class="fas fa-file-alt"></i></div>
                    <div>
                        <div class="metric-num">${total}</div>
                        <div class="metric-lbl">Total Reports</div>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon" style="background:#dcfce7; color:#166534;"><i class="fas fa-check-circle"></i></div>
                    <div>
                        <div class="metric-num">${resolved}</div>
                        <div class="metric-lbl">Resolved</div>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon" style="background:#fee2e2; color:#991b1b;"><i class="fas fa-ban"></i></div>
                    <div>
                        <div class="metric-num">${rejected}</div>
                        <div class="metric-lbl">Rejected</div>
                    </div>
                </div>
                <div class="metric-card">
                    <div class="metric-icon" style="background:#fef9c3; color:#854d0e;"><i class="fas fa-star"></i></div>
                    <div>
                        <div class="metric-num">${points}</div>
                        <div class="metric-lbl">Points Earned</div>
                    </div>
                </div>
            `;

            const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            const now = new Date();
            const months = [];
            for (let i = 5; i >= 0; i--) {
                const d = new Date(now.getFullYear(), now.getMonth() - i, 1);
                months.push({
                    key: `${d.getFullYear()}-${d.getMonth()}`,
                    label: monthNames[d.getMonth()],
                    count: 0
                });
            }
            reports.forEach(r => {
                const d = new Date(r.created_at);
                const key = `${d.getFullYear()}-${d.getMonth()}`;
                const m = months.find(x => x.key === key);
                if (m) m.count++;
            });

            const maxCount = Math.max(1, ...months.map(m => m.count));
            document.getElementById('statsBarChart').innerHTML = months.map(m => {
                const pct = m.count === 0 ? 0 : Math.max(8, Math.round((m.count / maxCount) * 100));
                const barClass = m.count === 0 ? 'bar empty' : 'bar';
                const heightStyle = m.count === 0 ? 'height:4px;' : `height:${pct}%;`;
                return `
                    <div class="bar-col">
                        <div class="bar-value">${m.count}</div>
                        <div class="${barClass}" style="${heightStyle}"></div>
                        <div class="bar-label">${m.label}</div>
                    </div>
                `;
            }).join('');

            const statuses = [
                { name: 'Pending', key: 'Pending', color: '#f59e0b' },
                { name: 'Assigned', key: 'Assigned', color: '#2563eb' },
                { name: 'In Progress', key: 'In Progress', color: '#7c3aed' },
                { name: 'Completed', key: 'Completed', color: '#16a34a' },
                { name: 'Rejected', key: 'Rejected', color: '#dc2626' }
            ];
            document.getElementById('statsStatusBreakdown').innerHTML = statuses.map(s => {
                const count = reports.filter(r => r.status === s.key).length;
                const pct = total > 0 ? Math.round((count / total) * 100) : 0;
                return `
                    <div class="status-row">
                        <div class="status-dot" style="background:${s.color};"></div>
                        <div class="status-name">${s.name}</div>
                        <div class="status-bar-track">
                            <div class="status-bar-fill" style="width:${pct}%; background:${s.color};"></div>
                        </div>
                        <div class="status-count">${count} <span style="color:#d1d5db; font-weight:400;">(${pct}%)</span></div>
                    </div>
                `;
            }).join('');

            const catMap = {};
            reports.forEach(r => {
                catMap[r.category] = (catMap[r.category] || 0) + 1;
            });
            const catArr = Object.entries(catMap).sort((a, b) => b[1] - a[1]).slice(0, 6);

            const catContainer = document.getElementById('statsCategoryBreakdown');
            if (catArr.length === 0) {
                catContainer.innerHTML = `<div style="text-align:center; padding:1rem; color:#d1d5db; font-size:0.85rem;"><i class="fas fa-tags" style="opacity:0.4;"></i><br>No categories yet</div>`;
            } else {
                catContainer.innerHTML = catArr.map(([name, count]) => `
                    <div class="cat-row">
                        <div class="cat-name">${name}</div>
                        <div class="cat-count">${count} report${count > 1 ? 's' : ''}</div>
                    </div>
                `).join('');
            }

            document.getElementById('statisticsModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeStatisticsModal() {
            document.getElementById('statisticsModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function formatDateTime(date) {
            if (!date || isNaN(date.getTime())) return '—';
            return date.toLocaleString('en-US', { month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit' });
        }

        function getTimeAgo(dateStr) {
            if (!dateStr) return '—';
            const date = new Date(typeof dateStr === 'string' ? dateStr : (dateStr?.$date || dateStr?.toISOString?.() || JSON.stringify(dateStr)));
            if (Number.isNaN(date.getTime())) return '—';
            const diff = Date.now() - date.getTime();
            const mins = Math.floor(diff / 60000);
            if (mins < 60) return mins + 'm ago';
            const hrs = Math.floor(mins / 60);
            if (hrs < 24) return hrs + 'h ago';
            return Math.floor(hrs / 24) + 'd ago';
        }

        // ============ REGISTER ============
        function openRegisterModal() {
            document.getElementById('registerModal').classList.add('active');
            document.getElementById('registerForm').reset();

            const teamWrapper = document.getElementById('registerTeamWrapper');
            const subtitle = document.getElementById('registerSubtitle');
            const isMaintenance = selectedRole === 'maintenance';
            teamWrapper.style.display = isMaintenance ? 'block' : 'none';
            document.getElementById('regTeam').required = isMaintenance;
            subtitle.textContent = isMaintenance
                ? 'Apply to join a maintenance team. An admin must approve your account.'
                : 'Create a citizen account to help your community';

            document.body.style.overflow = 'hidden';
        }
        function closeRegisterModal() {
            document.getElementById('registerModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        async function handleRegister(event) {
            event.preventDefault();
            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const password = document.getElementById('regPassword').value;
            const confirm = document.getElementById('confirmPassword').value;
            const phone = document.getElementById('phone').value.trim();
            const role = selectedRole === 'maintenance' ? 'maintenance' : 'citizen';
            const teamName = document.getElementById('regTeam').value.trim();
            const btn = document.getElementById('registerBtn');

            if (!fullName) return alert('⚠️ Please enter your full name.');
            if (!email || !email.includes('@')) return alert('⚠️ Please enter a valid email.');
            if (password.length < 8) return alert('⚠️ Password must be at least 8 characters.');
            if (role === 'maintenance' && !teamName) return alert('⚠️ Please enter your team name.');
            if (password !== confirm) return alert('⚠️ Passwords do not match.');
            if (!document.getElementById('termsCheckbox').checked) return alert('⚠️ Please agree to the Terms.');

            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Creating...';
            btn.disabled = true;

            try {
                const result = await apiPost('register', {
                    full_name: fullName,
                    email: email,
                    password: password,
                    phone: phone,
                    role: role,
                    team_name: role === 'maintenance' ? teamName : null
                });

                if (result.success) {
                    showToast(
                        role === 'maintenance' ? 'Application submitted' : 'Account created',
                        role === 'maintenance'
                            ? 'You can sign in now. An administrator must approve your account before you can receive or work on tasks.'
                            : `Welcome, ${fullName}!`
                    );
                    closeRegisterModal();
                    document.getElementById('email').value = email;
                    document.getElementById('password').value = password;
                } else {
                    alert('⚠️ ' + (result.message || 'Could not create the account.'));
                }
            } catch (error) {
                console.error('Registration failed:', error);
                alert('⚠️ Registration failed. Check your connection and try again.');
            } finally {
                btn.innerHTML = '<i class="fas fa-user-plus"></i> Create Account';
                btn.disabled = false;
            }
        }

        function openAdminRegisterModal() {
            document.getElementById('adminRegisterForm').reset();
            document.getElementById('adminRegisterModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeAdminRegisterModal() {
            document.getElementById('adminRegisterModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function handleAdminRegister(event) {
            event.preventDefault();
            const result = await apiPost('admin/register', {
                full_name: document.getElementById('adminRegisterName').value.trim(),
                email: document.getElementById('adminRegisterEmail').value.trim(),
                password: document.getElementById('adminRegisterPassword').value,
                password_confirmation: document.getElementById('adminRegisterPasswordConfirm').value
            });

            if (!result.success) {
                showToast('Admin account not created', result.message || 'Check the details and try again.');
                return;
            }

            document.getElementById('email').value = document.getElementById('adminRegisterEmail').value.trim();
            document.getElementById('password').value = document.getElementById('adminRegisterPassword').value;
            closeAdminRegisterModal();
            showToast('Admin account created', 'You can now sign in with the new account.');
        }

        // ============ PROFILE ============
        async function openProfileModal(role) {
            if (!currentUser) return;
            const name = document.getElementById('profileName');
            const roleEl = document.getElementById('profileRole');

            if (role === 'maintenance') {
                document.getElementById('profileIcon').className = 'fas fa-hard-hat';
                name.textContent = currentUser.full_name;
                roleEl.innerHTML = `<i class="fas fa-hard-hat"></i> ${currentUser.team_name || 'Maintenance Team'}`;
                const stats = await apiGet('stats');
                document.getElementById('profileStat1Label').textContent = 'Tasks';
                document.getElementById('profileStat2Label').textContent = 'Rating';
                document.getElementById('profileStat1').textContent = stats.total || 0;
                document.getElementById('profileStat2').textContent = stats.avg_rating && stats.avg_rating !== '—' ? stats.avg_rating + ' ⭐' : '—';
                document.getElementById('profilePoints').textContent = 0;
            } else if (role === 'admin') {
                document.getElementById('profileIcon').className = 'fas fa-user-shield';
                name.textContent = currentUser.full_name;
                roleEl.innerHTML = '<i class="fas fa-user-shield"></i> Administrator';
                const stats = await apiGet('stats');
                document.getElementById('profileStat1Label').textContent = 'Reports';
                document.getElementById('profileStat2Label').textContent = 'Resolved';
                document.getElementById('profileStat1').textContent = stats.total || 0;
                document.getElementById('profileStat2').textContent = stats.completed || 0;
                document.getElementById('profilePoints').textContent = 0;
            } else {
                document.getElementById('profileIcon').className = 'fas fa-user';
                name.textContent = currentUser.full_name;
                roleEl.innerHTML = '<i class="fas fa-user"></i> Citizen · Member since 2024';
                const stats = await apiGet('stats');
                document.getElementById('profileStat1Label').textContent = 'Reports';
                document.getElementById('profileStat2Label').textContent = 'Resolved';
                document.getElementById('profileStat1').textContent = stats.total || 0;
                document.getElementById('profileStat2').textContent = stats.completed || 0;
                document.getElementById('profilePoints').textContent = stats.points || 0;
            }

            document.getElementById('profileModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeProfileModal() {
            document.getElementById('profileModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function openEditProfileModal() {
            closeProfileModal();
            if (!currentUser) return;
            document.getElementById('editFullName').value = currentUser.full_name;
            document.getElementById('editEmail').value = currentUser.email;
            document.getElementById('editCurrentPassword').value = '';
            document.getElementById('editNewPassword').value = '';
            document.getElementById('editConfirmPassword').value = '';

            document.getElementById('editProfileModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeEditProfileModal() {
            document.getElementById('editProfileModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function openNotifPrefsModal() {
            closeProfileModal();
            if (!currentUser) return;

            const result = await apiGet('notification-preferences');
            const prefs = result.success ? result.preferences : {
                email_on_status: currentUser.email_on_status !== false,
                email_on_rating: currentUser.email_on_rating !== false,
                email_on_followed: currentUser.email_on_followed !== false,
                email_on_escalation: currentUser.email_on_escalation !== false,
            };

            document.getElementById('prefEmailStatus').checked = !!prefs.email_on_status;
            document.getElementById('prefEmailRating').checked = !!prefs.email_on_rating;
            document.getElementById('prefEmailFollowed').checked = !!prefs.email_on_followed;
            document.getElementById('prefEmailEscalation').checked = !!prefs.email_on_escalation;
            document.getElementById('prefEscalationRow').style.display = currentUser.role === 'admin' ? 'flex' : 'none';

            document.getElementById('notifPrefsModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeNotifPrefsModal() {
            document.getElementById('notifPrefsModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function saveNotifPrefs() {
            const btn = document.getElementById('saveNotifPrefsBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
            try {
                const payload = {
                    email_on_status: document.getElementById('prefEmailStatus').checked,
                    email_on_rating: document.getElementById('prefEmailRating').checked,
                    email_on_followed: document.getElementById('prefEmailFollowed').checked,
                    email_on_escalation: document.getElementById('prefEmailEscalation').checked,
                };
                const result = await apiPost('notification-preferences', payload);
                if (!result.success) {
                    showToast('Not saved', result.message || 'Could not update preferences.');
                    return;
                }
                Object.assign(currentUser, payload);
                showToast('Preferences saved', 'Email notification settings updated.');
                closeNotifPrefsModal();
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-save"></i> Save';
            }
        }

        async function handleEditProfile(event) {
            event.preventDefault();
            const fullName = document.getElementById('editFullName').value.trim();
            const email = document.getElementById('editEmail').value.trim();
            const currentPassword = document.getElementById('editCurrentPassword').value;
            const newPassword = document.getElementById('editNewPassword').value;
            const confirmPassword = document.getElementById('editConfirmPassword').value;
            const btn = document.getElementById('saveProfileBtn');

            if (!fullName) return alert('⚠️ Please enter your full name.');
            if (!email || !email.includes('@')) return alert('⚠️ Please enter a valid email.');

            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Saving...';
            btn.disabled = true;

            try {
                const result = await apiPost('profile', {
                    full_name: fullName,
                    email: email,
                    current_password: currentPassword,
                    new_password: newPassword,
                    confirm_password: confirmPassword
                });

                if (result.success) {
                    currentUser.full_name = fullName;
                    currentUser.email = email;
                    if (currentUser.role === 'citizen') {
                        document.getElementById('citizenUserName').textContent = fullName;
                    } else if (currentUser.role === 'maintenance') {
                        document.getElementById('maintenanceUserName').textContent = currentUser.team_name || fullName;
                    } else if (currentUser.role === 'admin') {
                        document.getElementById('adminUserName').textContent = fullName;
                    }
                    showToast('✅ Profile Updated!', 'Your changes have been saved.');
                    closeEditProfileModal();
                } else {
                    alert('⚠️ ' + (result.message || 'Could not save profile changes.'));
                }
            } catch (error) {
                console.error('Profile update failed:', error);
                alert('⚠️ Profile update failed. Check your connection and try again.');
            } finally {
                btn.innerHTML = '<i class="fas fa-save"></i> Save Changes';
                btn.disabled = false;
            }
        }

        // ============ ACTION MODAL ============
        function openActionModal(type, id) {
            actionModalData = { type, id };

            if (type === 'maint') {
                const task = allTasks.find(t => t.id === id);
                if (!task) return;
                document.getElementById('actionModalTitle').textContent = task.title;
                document.getElementById('actionModalItem').textContent = task.title;
                document.getElementById('actionModalLocation').textContent = task.location;
                const badge = task.status === 'Assigned' ? 'assigned' :
                            task.status === 'In Progress' ? 'progress' :
                            task.status === 'Completed' ? 'completed' :
                            task.status === 'Rejected' ? 'rejected' : 'pending';
                document.getElementById('actionModalStatus').innerHTML = `<span class="badge badge-${badge}">${task.status}</span>`;

                const buttons = [];
                buttons.push(`<button class="btn btn-info" onclick="closeActionModal(); openReportDetailsModal(${task.report_id})"><i class="fas fa-eye"></i> View Details</button>`);

                if (task.status === 'Assigned') {
                    buttons.push(`<button class="btn btn-primary" onclick="closeActionModal(); openStartModal(${task.id})"><i class="fas fa-play"></i> Start Task</button>`);
                    buttons.push(`<button class="btn btn-danger" onclick="closeActionModal(); openMaintRejectModal(${task.id})"><i class="fas fa-ban"></i> Reject Task</button>`);
                } else if (task.status === 'In Progress') {
                    buttons.push(`<button class="btn btn-success" onclick="closeActionModal(); openCompleteModal(${task.id})"><i class="fas fa-check"></i> Complete Task</button>`);
                    buttons.push(`<button class="btn btn-danger" onclick="closeActionModal(); openMaintRejectModal(${task.id})"><i class="fas fa-ban"></i> Reject Task</button>`);
                } else if (task.status === 'Completed') {
                    buttons.push(`<button class="btn btn-info" onclick="closeActionModal(); openPhotoModal(${task.id})"><i class="fas fa-images"></i> View Photos</button>`);
                } else if (task.status === 'Rejected') {
                    buttons.push(`<div style="text-align:center; padding:0.5rem; font-size:0.85rem; color:#991b1b;"><i class="fas fa-ban"></i> Task already rejected</div>`);
                }
                document.getElementById('actionModalButtons').innerHTML = buttons.join('');
            } else if (type === 'admin') {
                const report = cachedReports.find(r => r.id === id);
                if (!report) return;
                document.getElementById('actionModalTitle').textContent = report.category;
                document.getElementById('actionModalItem').textContent = report.category;
                document.getElementById('actionModalLocation').textContent = report.location;
                const badge = report.status === 'Pending' ? 'pending' :
                            report.status === 'Assigned' ? 'assigned' :
                            report.status === 'In Progress' ? 'progress' :
                            report.status === 'Completed' ? 'completed' : 'rejected';
                document.getElementById('actionModalStatus').innerHTML = `<span class="badge badge-${badge}">${report.status}</span>`;

                const buttons = [];
                buttons.push(`<button class="btn btn-info" onclick="closeActionModal(); openReportDetailsModal(${report.id})"><i class="fas fa-eye"></i> View Details</button>`);

                if (report.status === 'Pending') {
                    buttons.push(`<button class="btn btn-admin" onclick="closeActionModal(); openAssignModal(${report.id})"><i class="fas fa-user-check"></i> Assign Team</button>`);
                    buttons.push(`<button class="btn btn-danger" onclick="closeActionModal(); openAdminRejectModal(${report.id})"><i class="fas fa-ban"></i> Reject Report</button>`);
                } else if (report.status === 'Completed') {
                    buttons.push(`<div style="text-align:center; padding:0.5rem; font-size:0.85rem; color:#166534;"><i class="fas fa-circle-check"></i> Rated by the citizen after completion</div>`);
                } else if (report.status === 'Rejected') {
                    buttons.push(`<div style="text-align:center; padding:0.5rem; font-size:0.85rem; color:#991b1b;"><i class="fas fa-ban"></i> Report already rejected</div>`);
                }
                document.getElementById('actionModalButtons').innerHTML = buttons.join('');
            }

            document.getElementById('actionModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeActionModal() {
            document.getElementById('actionModal').classList.remove('active');
            document.body.style.overflow = 'auto';
            actionModalData = null;
        }

        // ============ ADMIN REJECT ============
        function openAdminRejectModal(reportId) {
            const report = cachedReports.find(r => r.id === reportId);
            if (!report) return;
            adminActiveReport = report;
            document.getElementById('adminRejectTitle').textContent = report.category;
            document.getElementById('adminRejectLocation').textContent = report.location;
            document.getElementById('adminRejectReason').value = '';
            document.getElementById('adminRejectModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeAdminRejectModal() {
            document.getElementById('adminRejectModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        async function confirmAdminReject() {
            if (!adminActiveReport) return;
            const reason = document.getElementById('adminRejectReason').value.trim();
            if (!reason) return alert('⚠️ Please provide a reason for rejection.');

            const btn = document.getElementById('adminRejectBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Rejecting...';
            btn.disabled = true;

            try {
                const result = await apiPost('reports/' + adminActiveReport.id + '/reject', { report_id: adminActiveReport.id, reason: reason });

                if (result.success) {
                    closeAdminRejectModal();
                    showToast('❌ Report Rejected', 'The citizen has been notified with the reason.');
                    try {
                        await loadAdminData();
                    } catch (refreshError) {
                        console.error('Report rejected but dashboard refresh failed:', refreshError);
                    }
                } else {
                    alert('⚠️ ' + (result.message || 'Could not reject the report.'));
                }
            } catch (error) {
                console.error('Report rejection failed:', error);
                alert('⚠️ Could not reject the report. Check your connection and try again.');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-ban"></i> Confirm Rejection';
            }
        }

        // ============ MAINTENANCE REJECT ============
        function openMaintRejectModal(taskId) {
            const task = allTasks.find(t => t.id === taskId);
            if (!task) return;
            maintRejectActiveTask = task;
            document.getElementById('maintRejectTitle').textContent = task.title;
            document.getElementById('maintRejectLocation').textContent = task.location;
            document.getElementById('maintRejectReason').value = '';
            document.getElementById('maintRejectModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeMaintRejectModal() {
            document.getElementById('maintRejectModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        async function confirmMaintReject() {
            if (!maintRejectActiveTask) return;
            const reason = document.getElementById('maintRejectReason').value.trim();
            if (!reason) return alert('⚠️ Please provide a reason for rejection.');

            const btn = document.getElementById('maintRejectBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Rejecting...';
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + maintRejectActiveTask.id + '/reject', { task_id: maintRejectActiveTask.id, reason: reason });

                if (result.success) {
                    closeMaintRejectModal();
                    showToast('❌ Task Rejected', 'The citizen has been notified with the reason.');
                    try {
                        await loadMaintenanceData();
                    } catch (refreshError) {
                        console.error('Task rejected but dashboard refresh failed:', refreshError);
                    }
                } else {
                    alert('⚠️ ' + (result.message || 'Could not reject the task.'));
                }
            } catch (error) {
                console.error('Task rejection failed:', error);
                alert('⚠️ Could not reject the task. Check your connection and try again.');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-ban"></i> Confirm Rejection';
            }
        }

        // ============ GOOGLE MAPS LOADER ============
        function loadGoogleMaps() {
            if (window._gmapsLoaded) {
                if (document.getElementById('reportModal').classList.contains('active')) initMap();
                return;
            }
            if (window._gmapsLoading) return;
            window._gmapsLoading = true;

            const script = document.createElement('script');
             script.src = `https://maps.googleapis.com/maps/api/js?key=AIzaSyBn1yFHTEWLvnsjSfPRdtMgKhhProHkCwY&libraries=markerclusterer&callback=onGoogleMapsReady`;
            script.async = true;
            script.defer = true;
            document.head.appendChild(script);

            window.onGoogleMapsReady = () => {
                window._gmapsLoading = false;
                window._gmapsLoaded = true;
                mapInitialized = true;
                if (document.getElementById('reportModal').classList.contains('active')) initMap();
                initNearbyMap();
                if (document.getElementById('pageMaintenance').classList.contains('active')) initMaintMap();
            };
        }

        // ============ REPORT MODAL ============
        function openReportModal() {
            document.getElementById('reportModal').classList.add('active');
            document.getElementById('reportForm').reset();
            document.getElementById('photoPreview').classList.remove('show');
            document.getElementById('photoThumb').style.display = 'none';
            document.getElementById('locationCoords').classList.remove('show');
            document.getElementById('otherCategoryWrapper').classList.remove('show');
            selectedFileDataUrl = null;
            selectedLocation = null;
            if (marker) { marker.setMap(null); marker = null; }
            document.body.style.overflow = 'hidden';
            // Load Google Maps (only once) and initialize the report map after the modal is visible
            loadGoogleMaps();
            ensureReportMap();
        }

        // Initializes the report-pin map reliably (fixes "all maps load / no map" bug)
        function ensureReportMap() {
            if (typeof google === 'undefined') return;
            const el = document.getElementById('googleMap');
            if (!el) return;
            // Skip if already built AND bound to this element
            if (map) {
                google.maps.event.trigger(map, 'resize');
                if (selectedLocation) map.setCenter(selectedLocation);
                return;
            }
            requestAnimationFrame(() => {
                const freshEl = document.getElementById('googleMap');
                if (!freshEl) return;
                map = new google.maps.Map(freshEl, {
                    center: selectedLocation || DEFAULT_CENTER,
                    zoom: 14,
                    mapTypeControl: false,
                    streetViewControl: false,
                    fullscreenControl: false
                });
                map.addListener('click', e => placeMarker(e.latLng));
            });
        }
        function closeReportModal() {
            document.getElementById('reportModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }
        function handleCategoryChange(select) {
            const wrapper = document.getElementById('otherCategoryWrapper');
            if (select.value === 'Others') {
                wrapper.classList.add('show');
                document.getElementById('otherCategory').required = true;
            } else {
                wrapper.classList.remove('show');
                document.getElementById('otherCategory').required = false;
                document.getElementById('otherCategory').value = '';
            }
            checkNearbyReports();
        }

        function handlePhotoUpload(input) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!allowedTypes.includes(file.type) || file.size > 5 * 1024 * 1024) {
                    input.value = '';
                    showToast('Photo not added', 'Choose a JPG, PNG, GIF, or WebP image no larger than 5 MB.');
                    return;
                }
                const reader = new FileReader();
                reader.onload = (e) => {
                    selectedFileDataUrl = e.target.result;
                    document.getElementById('photoName').textContent = file.name;
                    const thumb = document.getElementById('photoThumb');
                    thumb.src = e.target.result;
                    thumb.style.display = 'block';
                    document.getElementById('photoPreview').classList.add('show');
                };
                reader.onerror = () => {
                    input.value = '';
                    selectedFileDataUrl = null;
                    showToast('Photo could not be read', 'Choose another image and try again.');
                };
                reader.readAsDataURL(file);
            }
        }
        function removePhoto() {
            selectedFileDataUrl = null;
            document.getElementById('photoUpload').value = '';
            document.getElementById('photoThumb').style.display = 'none';
            document.getElementById('photoPreview').classList.remove('show');
        }

        async function submitReport(event) {
            event.preventDefault();
            const cat = document.getElementById('category');
            const otherCat = document.getElementById('otherCategory').value.trim();
            const location = document.getElementById('location').value.trim();
            const description = document.getElementById('description').value.trim();

            if (!cat.value) return alert('⚠️ Please select a category.');
            if (cat.value === 'Others' && !otherCat) return alert('⚠️ Please specify the category name.');
            if (!location) return alert('⚠️ Please pin a location.');
            if (description.length < 10) return alert('⚠️ Description must be at least 10 characters.');

            const categoryText = cat.value === 'Others' ? `📌 ${otherCat}` : cat.value;
            const btn = document.getElementById('submitBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            btn.disabled = true;
            try {
                const result = await apiPost('reports', {
                    category: categoryText,
                    description: description,
                    location: location,
                    latitude: selectedLocation ? selectedLocation.lat : null,
                    longitude: selectedLocation ? selectedLocation.lng : null,
                    photo_data: selectedFileDataUrl
                });

                if (!result.success) {
                    alert('⚠️ ' + (result.message || 'Could not submit the report.'));
                    return;
                }

                closeReportModal();
                document.getElementById('reportForm').reset();
                selectedFileDataUrl = null;
                const nearbyPanel = document.getElementById('nearbyPanel');
                if (nearbyPanel) nearbyPanel.classList.remove('show');
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Report';
                btn.disabled = false;
                showToast('✅ Report Submitted!', `${categoryText} — Pending review. +5 points!${result.share_url ? ' Share link ready in report details.' : ''}`);

                try {
                    await loadCitizenData();
                } catch (refreshError) {
                    console.error('Report submitted but dashboard refresh failed:', refreshError);
                    showToast('Report submitted', 'Your report was saved. The dashboard could not refresh; reload it to see the update.');
                }
            } catch (error) {
                console.error('Report submission failed:', error);
                alert('⚠️ ' + (error.message || 'Could not submit the report. Please try again.'));
            } finally {
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Report';
                btn.disabled = false;
            }
        }

        // ============ REPORT MAP ============
        function initMap() {
            if (map) return;
            const el = document.getElementById('googleMap');
            if (!el || typeof google === 'undefined') return;

            map = new google.maps.Map(el, {
                center: DEFAULT_CENTER,
                zoom: 14,
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: false
            });

            map.addListener('click', e => placeMarker(e.latLng));
        }

        function placeMarker(latLng) {
            if (marker) {
                marker.setPosition(latLng);
            } else {
                marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    draggable: true,
                    animation: google.maps.Animation.DROP
                });
                marker.addListener('dragend', e => updateLocation(e.latLng));
            }
            updateLocation(latLng);
        }

        function updateLocation(latLng) {
            selectedLocation = { lat: latLng.lat(), lng: latLng.lng() };
            const coords = `${latLng.lat().toFixed(5)}° N, ${latLng.lng().toFixed(5)}° E`;
            document.getElementById('location').value = coords;
            document.getElementById('coordsText').textContent = 'Pinned: ' + coords;
            document.getElementById('locationCoords').classList.add('show');
            reverseGeocode(latLng.lat(), latLng.lng());
            checkNearbyReports();
        }

        function reverseGeocode(lat, lng) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18`)
                .then(r => r.json())
                .then(d => {
                    if (d && d.display_name) {
                        document.getElementById('location').value = d.display_name;
                        document.getElementById('coordsText').textContent = d.display_name;
                    }
                })
                .catch(() => {});
        }

        function useMyLocation(event) {
            if (!navigator.geolocation) return showToast('⚠️ Not supported', 'Please tap on the map.');
            const btn = event?.target?.closest('.btn-map');
            if (btn) { btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Locating...'; btn.disabled = true; }

            navigator.geolocation.getCurrentPosition(
                pos => {
                    const p = { lat: pos.coords.latitude, lng: pos.coords.longitude };
                    if (map) { map.setCenter(p); map.setZoom(16); }
                    if (map && typeof google !== 'undefined') placeMarker(new google.maps.LatLng(p.lat, p.lng));
                    if (btn) { btn.innerHTML = '<i class="fas fa-location-crosshairs"></i> Use My Location'; btn.disabled = false; }
                    showToast('📍 Location Found', 'Your location is pinned.');
                },
                err => {
                    let msg = 'Unable to get location.';
                    if (err.code === 1) msg = 'Permission denied.';
                    if (err.code === 3) msg = 'Request timed out.';
                    showToast('⚠️ ' + msg, 'Please tap on the map instead.');
                    if (btn) { btn.innerHTML = '<i class="fas fa-location-crosshairs"></i> Use My Location'; btn.disabled = false; }
                },
                { enableHighAccuracy: false, timeout: 15000, maximumAge: 60000 }
            );
        }

        function clearMapPin() {
            if (marker) { marker.setMap(null); marker = null; }
            selectedLocation = null;
            document.getElementById('location').value = '';
            document.getElementById('locationCoords').classList.remove('show');
            const panel = document.getElementById('nearbyPanel');
            if (panel) panel.classList.remove('show');
        }

        async function checkNearbyReports() {
            const panel = document.getElementById('nearbyPanel');
            const list = document.getElementById('nearbyList');
            if (!panel || !list || !selectedLocation) {
                if (panel) panel.classList.remove('show');
                return;
            }

            const cat = document.getElementById('category')?.value || '';
            const otherCat = document.getElementById('otherCategory')?.value?.trim() || '';
            const category = cat === 'Others' ? (otherCat ? `📌 ${otherCat}` : '') : cat;

            const params = `latitude=${encodeURIComponent(selectedLocation.lat)}&longitude=${encodeURIComponent(selectedLocation.lng)}&radius_m=500`
                + (category ? `&category=${encodeURIComponent(category)}` : '');

            const result = await apiGet('reports/nearby', params);
            if (!result.success) {
                panel.classList.remove('show');
                return;
            }

            const dups = result.duplicates || [];
            const nearby = (result.nearby || []).filter(n => !dups.some(d => d.id === n.id)).slice(0, 4);
            const items = [...dups.map(d => ({ ...d, kind: 'duplicate' })), ...nearby.map(n => ({ ...n, kind: 'nearby' }))];

            if (items.length === 0) {
                panel.classList.remove('show');
                return;
            }

            list.innerHTML = items.map(item => `
                <div class="nearby-item">
                    <div>
                        <strong>${item.kind === 'duplicate' ? 'Possible duplicate' : 'Nearby'}:</strong>
                        ${escapeHtml(item.category)} · ${item.distance_m}m · ${escapeHtml(item.status)}
                        ${item.upvote_count ? `· <i class="fas fa-thumbs-up" style="color:#2d7a4f;"></i> ${item.upvote_count}` : ''}
                    </div>
                    <button type="button" onclick="openNearbyReport(${item.id})">View / Follow</button>
                </div>
            `).join('');
            panel.classList.add('show');
        }

        async function openNearbyReport(reportId) {
            closeReportModal();
            await openReportDetailsModal(reportId);
        }

        // ============ NEARBY MAP ============
        let nearbyMapInitialized = false;

        async function initNearbyMap() {
            const el = document.getElementById('nearbyMap');
            if (!el || typeof google === 'undefined') return;
            if (nearbyMapInitialized && nearbyMap) return;

            const result = await apiGet('reports');
            const reports = result.success ? result.reports.filter(r => r.latitude && r.longitude) : [];
            if (reports.length === 0) {
                el.innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#d1d5db;font-size:0.85rem;"><i class="fas fa-map" style="margin-right:8px;"></i> No incidents with coordinates</div>';
                return;
            }

            const avgLat = reports.reduce((s, i) => s + parseFloat(i.latitude), 0) / reports.length;
            const avgLng = reports.reduce((s, i) => s + parseFloat(i.longitude), 0) / reports.length;

            nearbyMap = new google.maps.Map(el, {
                center: { lat: avgLat, lng: avgLng },
                zoom: 13,
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: false
            });

            reports.forEach(report => {
                const priority = report.priority || 'Medium';
                const marker = new google.maps.Marker({
                    position: { lat: parseFloat(report.latitude), lng: parseFloat(report.longitude) },
                    map: nearbyMap,
                    title: report.category,
                    animation: google.maps.Animation.DROP,
                    icon: getMarkerIcon(priority)
                });

                const infoWindow = new google.maps.InfoWindow({
                    content: `
                        <div style="font-family:Inter,sans-serif; padding:6px 4px; min-width:180px;">
                            <div style="font-weight:600; font-size:0.95rem; margin-bottom:4px; color:#0b2a3b;">${report.category}</div>
                            <div style="font-size:0.85rem; color:#1e293b; margin-bottom:6px;">📍 ${report.location}</div>
                            <div style="font-size:0.72rem; color:#d1d5db;">🕒 ${getTimeAgo(report.created_at)}</div>
                        </div>
                    `
                });

                marker.addListener('click', () => {
                    nearbyMarkers.forEach(m => m.infoWindow?.close());
                    infoWindow.open(nearbyMap, marker);
                });
                nearbyMarkers.push({ marker, infoWindow });
            });

            if (nearbyMarkers.length > 2 && google.maps.marker.MarkerClusterer) {
                new google.maps.marker.MarkerClusterer({
                    map: nearbyMap,
                    markers: nearbyMarkers.map(m => m.marker)
                });
            }

            const bounds = new google.maps.LatLngBounds();
            reports.forEach(i => bounds.extend({ lat: parseFloat(i.latitude), lng: parseFloat(i.longitude) }));
            nearbyMap.fitBounds(bounds);
            google.maps.event.addListenerOnce(nearbyMap, 'bounds_changed', () => {
                if (nearbyMap.getZoom() > 15) nearbyMap.setZoom(15);
            });

            nearbyMapInitialized = true;
        }

        function getMarkerIcon(priority) {
            const colors = {
                'Critical': 'http://maps.google.com/mapfiles/ms/icons/red-dot.png',
                'High': 'http://maps.google.com/mapfiles/ms/icons/orange-dot.png',
                'Medium': 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png',
                'Low': 'http://maps.google.com/mapfiles/ms/icons/green-dot.png'
            };
            return colors[priority] || colors['Medium'];
        }

        // ============ MAINTENANCE ============
        async function loadMaintenanceData() {
            const result = await apiGet('tasks');
            allTasks = result.success ? result.tasks : [];
            if (result.team_name) {
                document.getElementById('maintenanceUserName').textContent = result.team_name;
            }
            updateTaskStats();
            renderTasks();
            updateMaintMap();
            updateMaintRating();
            if (document.getElementById('pageMaintenance').classList.contains('active')) {
                syncGpsSharing();
            }
            const notifsResult = await apiGet('notifications');
            if (notifsResult.success) {
                notifsResult.notifications.forEach(n => {
                    if (n.id > lastKnownNotificationId) lastKnownNotificationId = n.id;
                });
                renderNotificationsList('maintNotifList', notifsResult.notifications);
            }
        }

        function updateTaskStats() {
            const assigned = allTasks.filter(t => t.status === 'Assigned').length;
            const inProgress = allTasks.filter(t => t.status === 'In Progress').length;
            const completed = allTasks.filter(t => t.status === 'Completed').length;

            document.getElementById('maintAssigned').textContent = assigned + inProgress;
            document.getElementById('maintInProgress').textContent = inProgress;
            document.getElementById('maintCompleted').textContent = completed;

            document.getElementById('tabAssigned').textContent = assigned;
            document.getElementById('tabInProgress').textContent = inProgress;
            document.getElementById('tabCompleted').textContent = completed;
        }

        async function updateMaintRating() {
            const stats = await apiGet('stats');
            if (stats.success) {
                document.getElementById('maintAvgRating').textContent = stats.avg_rating && stats.avg_rating !== '—' ? stats.avg_rating : '—';
            }
        }

        function filterTasks(status) {
            currentTaskFilter = status;
            renderTasks();
        }

        function renderTasks() {
            const list = document.getElementById('maintTasksList');
            let tasks = allTasks;
            if (currentTaskFilter !== 'all') {
                tasks = allTasks.filter(t => t.status === currentTaskFilter);
            }
            const q = (document.getElementById('taskSearchInput')?.value || '').trim().toLowerCase();
            if (q) {
                tasks = tasks.filter(t =>
                    (t.title || '').toLowerCase().includes(q) ||
                    (t.location || '').toLowerCase().includes(q) ||
                    (t.priority || '').toLowerCase().includes(q) ||
                    (t.status || '').toLowerCase().includes(q) ||
                    (t.citizen_name || '').toLowerCase().includes(q)
                );
            }

            if (!tasks.length) {
                list.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-clipboard-check"></i>
                        <div class="empty-title">No ${q ? 'matching ' : (currentTaskFilter === 'all' ? '' : currentTaskFilter.toLowerCase() + ' ')}tasks</div>
                        <div class="empty-desc">${q ? 'Try a different search term' : 'Tasks will appear here once assigned'}</div>
                    </div>`;
                return;
            }

            list.innerHTML = tasks.map(t => {
                const badge = t.status === 'Assigned' ? 'assigned' :
                            t.status === 'In Progress' ? 'progress' :
                            t.status === 'Completed' ? 'completed' :
                            t.status === 'Rejected' ? 'rejected' : 'pending';
                const ratingBadge = t.rating ? `<span class="badge badge-rated" style="font-size:0.65rem;">⭐ ${t.rating.rating}/5</span>` : '';
                return `
                    <div class="task-item">
                        <div class="task-info">
                            <i class="fas fa-map-pin" style="color:#b45309;"></i>
                            <div>
                                <div class="task-title">${t.title}</div>
                                <div class="task-location">📍 ${t.location}</div>
                            </div>
                        </div>
                        <div class="task-meta">
                            <span class="badge badge-${badge}">${t.status}</span>
                            ${ratingBadge}
                            <button class="btn-sm btn-sm-actions btn-icon-only" title="Actions" onclick="openActionModal('maint', ${t.id})">
                                <i class="fas fa-bolt"></i>
                            </button>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function initMaintMap() {
            const el = document.getElementById('maintMap');
            if (!el || typeof google === 'undefined') return;
            if (maintMap) { updateMaintMap(); return; }

            maintMap = new google.maps.Map(el, {
                center: DEFAULT_CENTER,
                zoom: 12,
                mapTypeControl: false,
                streetViewControl: false,
                fullscreenControl: false
            });
            updateMaintMap();
        }

        function updateMaintMap() {
            if (!maintMap) return;
            maintMarkers.forEach(m => m.setMap(null));
            maintMarkers = [];

            const tasksWithCoords = allTasks.filter(t => t.latitude && t.longitude);
            if (tasksWithCoords.length === 0) {
                document.getElementById('maintMap').innerHTML = '<div style="display:flex;align-items:center;justify-content:center;height:100%;color:#d1d5db;font-size:0.85rem;"><i class="fas fa-map" style="margin-right:8px;"></i> No task locations</div>';
                return;
            }

            const bounds = new google.maps.LatLngBounds();
            tasksWithCoords.forEach(t => {
                const coords = { lat: parseFloat(t.latitude), lng: parseFloat(t.longitude) };
                const color = t.status === 'Assigned' ? 'blue' :
                            t.status === 'In Progress' ? 'purple' :
                            t.status === 'Completed' ? 'green' : 'red';
                const marker = new google.maps.Marker({
                    position: coords,
                    map: maintMap,
                    title: t.title,
                    icon: `http://maps.google.com/mapfiles/ms/icons/${color}-dot.png`
                });

                const iw = new google.maps.InfoWindow({
                    content: `
                        <div style="font-family:Inter,sans-serif;padding:6px;min-width:180px;">
                            <div style="font-weight:600;margin-bottom:4px;">${t.title}</div>
                            <div style="font-size:0.85rem;margin-bottom:4px;">📍 ${t.location}</div>
                            <div style="font-size:0.72rem;color:#64748b;">Status: ${t.status}</div>
                        </div>
                    `
                });

                marker.addListener('click', () => {
                    maintMarkers.forEach(m => m._iw?.close());
                    iw.open(maintMap, marker);
                    marker._iw = iw;
                });
                maintMarkers.push(marker);
                bounds.extend(coords);
            });

            if (maintMarkers.length > 0) {
                maintMap.fitBounds(bounds);
                google.maps.event.addListenerOnce(maintMap, 'bounds_changed', () => {
                    if (maintMap.getZoom() > 15) maintMap.setZoom(15);
                });
            }
        }

        // ============ START TASK ============
        function openStartModal(taskId) {
            const task = allTasks.find(t => t.id === taskId);
            if (!task) return;
            activeTask = task;

            document.getElementById('startTaskName').textContent = task.title;
            document.getElementById('startTaskLocation').textContent = task.location;
            document.getElementById('startTaskPriority').textContent = task.priority || 'Medium';
            document.getElementById('startTaskReporter').textContent = task.citizen_name || 'Citizen';
            document.getElementById('startTaskPhone').textContent = task.citizen_phone || 'N/A';
            document.getElementById('startNotes').value = '';
            document.getElementById('startModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeStartModal() {
            document.getElementById('startModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function confirmStartTask() {
            if (!activeTask) return;
            const btn = document.getElementById('startTaskBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Starting...';
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + activeTask.id + '/start', { task_id: activeTask.id });

                if (result.success) {
                    closeStartModal();
                    showToast('✅ Task Started!', 'Status changed to In Progress');
                    try {
                        await loadMaintenanceData();
                    } catch (refreshError) {
                        console.error('Task started but dashboard refresh failed:', refreshError);
                    }
                } else {
                    alert('⚠️ ' + (result.message || 'Could not start the task.'));
                }
            } catch (error) {
                console.error('Starting task failed:', error);
                alert('⚠️ Could not start the task. Check your connection and try again.');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-play"></i> Start Task';
            }
        }

        // ============ COMPLETE TASK ============
        function openCompleteModal(taskId) {
            const task = allTasks.find(t => t.id === taskId);
            if (!task) return;
            activeTask = task;

            document.getElementById('completeTaskName').textContent = task.title;
            document.getElementById('completeTaskLocation').textContent = task.location;
            document.getElementById('completeTaskPriority').textContent = task.priority || 'Medium';
            document.getElementById('completeForm').reset();
            document.getElementById('completeBeforePreview').classList.remove('show');
            document.getElementById('completeAfterPreview').classList.remove('show');
            document.getElementById('completeBeforeThumb').style.display = 'none';
            document.getElementById('completeAfterThumb').style.display = 'none';
            completeBeforeDataUrl = null;
            completeAfterDataUrl = null;
            document.getElementById('completeModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeCompleteModal() {
            document.getElementById('completeModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function handleCompletePhoto(input, previewId, nameId, thumbId) {
            if (input.files && input.files[0]) {
                const file = input.files[0];
                const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!allowedTypes.includes(file.type) || file.size > 5 * 1024 * 1024) {
                    input.value = '';
                    showToast('Photo not added', 'Choose a JPG, PNG, GIF, or WebP image no larger than 5 MB.');
                    return;
                }
                const reader = new FileReader();
                reader.onload = (e) => {
                    if (previewId === 'completeBeforePreview') {
                        completeBeforeDataUrl = e.target.result;
                    } else {
                        completeAfterDataUrl = e.target.result;
                    }
                    document.getElementById(nameId).textContent = file.name;
                    const thumb = document.getElementById(thumbId);
                    thumb.src = e.target.result;
                    thumb.style.display = 'block';
                    document.getElementById(previewId).classList.add('show');
                };
                reader.onerror = () => {
                    input.value = '';
                    if (previewId === 'completeBeforePreview') completeBeforeDataUrl = null;
                    else completeAfterDataUrl = null;
                    showToast('Photo could not be read', 'Choose another image and try again.');
                };
                reader.readAsDataURL(file);
            }
        }

        function removeCompletePhoto(inputId, previewId, thumbId) {
            document.getElementById(inputId).value = '';
            document.getElementById(previewId).classList.remove('show');
            document.getElementById(thumbId).style.display = 'none';
            if (inputId === 'completeBeforePhoto') completeBeforeDataUrl = null;
            if (inputId === 'completeAfterPhoto') completeAfterDataUrl = null;
        }

        async function submitComplete(event) {
            event.preventDefault();
            if (!activeTask) return;

            if (!completeAfterDataUrl) return alert('⚠️ Please upload an after photo.');

            const btn = document.getElementById('completeBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Completing...';
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + activeTask.id + '/complete', {
                    task_id: activeTask.id,
                    before_photo_data: completeBeforeDataUrl,
                    after_photo_data: completeAfterDataUrl,
                    notes: document.getElementById('completeNotes').value.trim()
                });

                if (result.success) {
                    closeCompleteModal();
                    showToast('✅ Task Completed!', 'Great work! Photos saved.');
                    try {
                        await loadMaintenanceData();
                    } catch (refreshError) {
                        console.error('Task completed but dashboard refresh failed:', refreshError);
                    }
                } else {
                    alert('⚠️ ' + (result.message || 'Could not complete the task.'));
                }
            } catch (error) {
                console.error('Completing task failed:', error);
                alert('⚠️ Could not complete the task. Check your connection and try again.');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-check-circle"></i> Mark Complete';
            }
        }

        // ============ PHOTO MODAL ============
        function openPhotoModal(taskId) {
            const task = allTasks.find(t => t.id === taskId);
            if (!task) return;
            document.getElementById('photoModalTask').textContent = 'Task: ' + task.title;

            const beforeImg = document.getElementById('photoBeforeImg');
            const afterImg = document.getElementById('photoAfterImg');

            if (task.before_photo) {
                beforeImg.src = task.before_photo;
            } else {
                beforeImg.src = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="150"><rect width="200" height="150" fill="%23e9eef3"/><text x="50%" y="50%" font-family="Inter" font-size="12" fill="%2394a3b8" text-anchor="middle" dy=".3em">No before photo</text></svg>';
            }

            if (task.after_photo) {
                afterImg.src = task.after_photo;
            } else {
                afterImg.src = 'data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="200" height="150"><rect width="200" height="150" fill="%23dcfce7"/><text x="50%" y="50%" font-family="Inter" font-size="12" fill="%23166534" text-anchor="middle" dy=".3em">No after photo</text></svg>';
            }

            document.getElementById('photoModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePhotoModal() {
            document.getElementById('photoModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // ============ NAVIGATE MODAL ============
        function openNavigateModal() {
            const active = allTasks.filter(t => t.status === 'Assigned' || t.status === 'In Progress');
            if (!active.length) {
                showToast('📍 No Active Tasks', 'You have no tasks to navigate to.');
                return;
            }

            const task = active[0];
            document.getElementById('navTaskName').textContent = task.title;
            document.getElementById('navDestination').textContent = task.location;
            document.getElementById('navPriority').textContent = task.priority || 'Medium';
            document.getElementById('navDistance').textContent = '3.2 km';

            const el = document.getElementById('navMap');
            if (typeof google !== 'undefined' && el) {
                if (navMap) {
                    navMarkers.forEach(m => m.setMap(null));
                    navMarkers = [];
                }
                navMap = new google.maps.Map(el, {
                    center: DEFAULT_CENTER,
                    zoom: 14,
                    mapTypeControl: false,
                    streetViewControl: false,
                    fullscreenControl: false
                });
                const marker = new google.maps.Marker({
                    position: DEFAULT_CENTER,
                    map: navMap,
                    animation: google.maps.Animation.DROP
                });
                navMarkers.push(marker);
            }

            document.getElementById('navSteps').innerHTML = `
                <div class="route-step"><i class="fas fa-arrow-right"></i><span class="step-desc">Head toward ${task.location}</span><span class="step-dist">1.2 km</span></div>
                <div class="route-step"><i class="fas fa-arrow-right"></i><span class="step-desc">Continue straight</span><span class="step-dist">2.0 km</span></div>
                <div class="route-step" style="border-top:1px solid #bbf7d0; padding-top:8px; margin-top:4px;"><i class="fas fa-flag-checkered" style="color:#16a34a;"></i><span class="step-desc" style="font-weight:600; color:#2d7a4f;">Arrive at destination</span><span class="step-dist">✓</span></div>
            `;

            activeTask = task;
            document.getElementById('navigateModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeNavigateModal() {
            document.getElementById('navigateModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function startNavigation() {
            if (!activeTask) return;
            showToast('🧭 Navigation Started', `Heading to ${activeTask.location}`);
            window.open(`https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(activeTask.location)}`, '_blank');
            closeNavigateModal();
        }

        // ============ ADMIN ============
        function openMaintenanceAccountModal() {
            document.getElementById('maintenanceAccountForm').reset();
            document.getElementById('maintenanceAccountModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMaintenanceAccountModal() {
            document.getElementById('maintenanceAccountModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function createMaintenanceAccount(event) {
            event.preventDefault();
            const result = await apiPost('users/maintenance', {
                full_name: document.getElementById('maintenanceFullName').value.trim(),
                email: document.getElementById('maintenanceEmail').value.trim(),
                team_name: document.getElementById('maintenanceTeam').value.trim(),
                password: document.getElementById('maintenancePassword').value,
                password_confirmation: document.getElementById('maintenancePasswordConfirm').value
            });
            if (!result.success) {
                showToast('Account not created', result.message || 'Check the account details and try again.');
                return;
            }
            closeMaintenanceAccountModal();
            await loadAdminData();
            showToast('Maintenance account created', 'The member can now sign in with their team account.');
        }

        async function loadAdminData() {
            const usersResult = await apiGet('users');
            if (usersResult.success) renderPendingMaintenanceUsers(usersResult.users || []);

            const stats = await apiGet('stats');
            if (stats.success) {
                document.getElementById('adminTotalReports').textContent = stats.total || 0;
                document.getElementById('adminPendingReports').textContent = stats.pending || 0;
                document.getElementById('adminAssignedReports').textContent = stats.assigned || 0;
                document.getElementById('adminCompletedReports').textContent = stats.completed || 0;
            }

            const reportsResult = await apiGet('reports');
            if (reportsResult.success) {
                cachedReports = reportsResult.reports;
                populateAdminReportFilters();
                cachedReports.forEach(r => {
                    if (r.id > lastKnownReportId) lastKnownReportId = r.id;
                });
                renderAdminReports();
            }

            await loadTeams();
            await loadLeaderboard();
            await loadAutoAssignRules();

            const notifsResult = await apiGet('notifications');
            if (notifsResult.success) {
                notifsResult.notifications.forEach(n => {
                    if (n.id > lastKnownNotificationId) lastKnownNotificationId = n.id;
                });
                renderNotificationsList('adminNotifList', notifsResult.notifications);
            }
        }

        function renderPendingMaintenanceUsers(users) {
            const list = document.getElementById('adminPendingMaintenanceList');
            if (!list) return;
            const pending = users.filter(user => user.role === 'maintenance' && !user.is_approved && !user.is_rejected);
            if (!pending.length) {
                list.innerHTML = '<div class="empty-state"><i class="fas fa-user-check"></i><div class="empty-title">No applications waiting</div><div class="empty-desc">New maintenance applicants will appear here</div></div>';
                return;
            }

            list.innerHTML = pending.map(user => `
                <div class="task-item">
                    <div class="task-info">
                        <i class="fas fa-user-clock" style="color:#d97706;"></i>
                        <div>
                            <div class="task-title">${escapeHtml(user.full_name)}</div>
                            <div class="task-location">${escapeHtml(user.email)} · ${escapeHtml(user.team_name || 'No team')}</div>
                        </div>
                    </div>
                    <div class="applicant-actions">
                        <button class="applicant-action applicant-approve" type="button" title="Approve applicant" aria-label="Approve ${escapeHtml(user.full_name)}" onclick="approveMaintenanceUser(${Number(user.id)})"><i class="fas fa-check"></i></button>
                        <button class="applicant-action applicant-reject" type="button" title="Reject applicant" aria-label="Reject ${escapeHtml(user.full_name)}" onclick="rejectMaintenanceUser(${Number(user.id)})"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            `).join('');
        }

        async function approveMaintenanceUser(userId) {
            const result = await apiPost(`users/${userId}/approve`, {});
            if (!result.success) {
                showToast('Approval failed', result.message || 'Please try again.');
                return;
            }
            await loadAdminData();
            showToast('Maintenance account approved', 'The worker can now log in and receive assigned tasks.');
        }

        async function rejectMaintenanceUser(userId) {
            const result = await apiPost(`users/${userId}/reject`, {});
            if (!result.success) {
                showToast('Application not rejected', result.message || 'Please try again.');
                return;
            }
            await loadAdminData();
            showToast('Application rejected', 'The applicant can no longer sign in.');
        }

        async function loadTeams() {
            const result = await apiGet('teams');
            cachedTeams = result.success ? result.teams : [];
            renderAdminTeams();
        }

        function renderAdminTeams() {
            const list = document.getElementById('adminTeamList');
            if (cachedTeams.length === 0) {
                list.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-users-slash"></i>
                        <div class="empty-title">No teams available</div>
                        <div class="empty-desc">Teams will appear here once registered</div>
                    </div>`;
                return;
            }

            list.innerHTML = cachedTeams.map(t => {
                const tasks = cachedReports.filter(r => r.assigned_team === t.team_name && r.status !== 'Completed' && r.status !== 'Rejected');
                const busy = tasks.length;
                const statusBadge = busy > 0
                    ? `<span class="badge badge-progress">Busy</span>`
                    : `<span class="badge badge-completed">Available</span>`;
                return `
                    <div class="task-item">
                        <div class="task-info">
                            <i class="fas fa-hard-hat" style="color:#2563eb;"></i>
                            <div>
                                <div class="task-title">${t.team_name}</div>
                                <div class="task-location">👷 ${t.members} member${t.members > 1 ? 's' : ''} · ${busy} active</div>
                            </div>
                        </div>
                        ${statusBadge}
                    </div>
                `;
            }).join('');
        }

        async function loadAutoAssignRules() {
            const result = await apiGet('auto-assign-rules');
            cachedAutoAssignRules = result.success ? result.rules : [];
            renderAutoAssignRules();
        }

        function renderAutoAssignRules() {
            const list = document.getElementById('adminAutoAssignList');
            if (!list) return;
            if (cachedAutoAssignRules.length === 0) {
                list.innerHTML = `<div class="empty-state">
                    <i class="fas fa-cog"></i>
                    <div class="empty-title">No rules configured</div>
                    <div class="empty-desc">Create auto-assign rules to automatically route reports to the right team</div>
                </div>`;
                return;
            }
            list.innerHTML = cachedAutoAssignRules.map(rule => `
                <div class="task-item">
                    <div class="task-info">
                        <i class="fas fa-magic" style="color:#7c3aed;"></i>
                        <div>
                            <div class="task-title">${escapeHtml(rule.category_pattern)}</div>
                            <div class="task-location">→ Team: ${escapeHtml(rule.team_name)} · ${rule.is_active ? 'Active' : 'Inactive'}</div>
                        </div>
                    </div>
                    <div class="applicant-actions">
                        <button class="applicant-action" type="button" title="Edit rule" onclick="editAutoAssignRule(${rule.id})"><i class="fas fa-edit"></i></button>
                        <button class="applicant-action applicant-reject" type="button" title="Delete rule" onclick="deleteAutoAssignRule(${rule.id})"><i class="fas fa-trash"></i></button>
                    </div>
                </div>
            `).join('');
        }

        function populateAutoAssignTeamDropdown() {
            const select = document.getElementById('autoAssignTeam');
            if (!select) return;
            const teamNames = [...new Set(cachedTeams.map(t => t.team_name))].sort();
            select.innerHTML = '<option value="">Select a team...</option>';
            teamNames.forEach(name => {
                select.add(new Option(name, name));
            });
        }

        function openAutoAssignModal(rule) {
            populateAutoAssignTeamDropdown();
            const isNew = !rule;
            document.getElementById('autoAssignModalTitle').textContent = isNew ? 'New Rule' : 'Edit Rule';
            document.getElementById('autoAssignModalSubtitle').textContent = isNew
                ? 'Route reports to a maintenance team based on category match.'
                : 'Update this auto-assign rule.';
            if (!isNew) {
                document.getElementById('autoAssignRuleId').value = rule.id;
                document.getElementById('autoAssignCategory').value = rule.category_pattern || '';
                document.getElementById('autoAssignTeam').value = rule.team_name || '';
                document.getElementById('autoAssignActive').checked = rule.is_active;
            } else {
                document.getElementById('autoAssignForm').reset();
                document.getElementById('autoAssignRuleId').value = '';
                document.getElementById('autoAssignActive').checked = true;
            }
            document.getElementById('autoAssignModal').style.display = 'flex';
        }

        function closeAutoAssignModal() {
            document.getElementById('autoAssignModal').style.display = 'none';
        }

        async function saveAutoAssign(event) {
            event.preventDefault();
            const id = document.getElementById('autoAssignRuleId').value;
            const formData = {
                category_pattern: document.getElementById('autoAssignCategory').value.trim(),
                team_name: document.getElementById('autoAssignTeam').value,
                is_active: document.getElementById('autoAssignActive').checked
            };

            let result;
            if (id) {
                result = await apiPost(`auto-assign-rules/${id}`, formData);
            } else {
                result = await apiPost('auto-assign-rules', formData);
            }

            if (!result.success) {
                showToast('Failed to save rule', result.message || 'Please check the form and try again.');
                return;
            }
            showToast('Rule saved', result.message || '');
            closeAutoAssignModal();
            await loadAutoAssignRules();
        }

                        async function deleteAutoAssignRule(ruleId) {
            if (!confirm('Delete auto-assign rule?\n\nThis will stop automatic routing for matching reports. This cannot be undone.')) return;

            const result = await apiDelete(`auto-assign-rules/${ruleId}`);
            if (!result.success && !result.deleted) {
                showToast('Failed to delete rule', result.message || 'Please try again.');
                return;
            }
            showToast('Rule deleted', 'Auto-assign rule removed.');
            await loadAutoAssignRules();
        }

        function editAutoAssignRule(ruleId) {
            const rule = cachedAutoAssignRules.find(r => r.id === ruleId);
            if (rule) openAutoAssignModal(rule);
        }

        async function loadLeaderboard() {
            const result = await apiGet('leaderboard');
            if (!result.success) return;

            const citizens = result.citizens || [];
            const citizenList = document.getElementById('adminTopCitizens');
            if (citizenList) {
                if (citizens.length === 0) {
                    citizenList.innerHTML = `
                        <div class="empty-state">
                            <i class="fas fa-user-circle"></i>
                            <div class="empty-title">No citizens yet</div>
                            <div class="empty-desc">Leaderboard will appear once citizens earn points</div>
                        </div>`;
                } else {
                    citizenList.innerHTML = citizens.map((c, i) => {
                        const medal = i === 0 ? '🥇' : i === 1 ? '🥈' : i === 2 ? '🥉' : `<span style="font-weight:700;color:#d1d5db;">#${i + 1}</span>`;
                        return `
                            <div class="task-item">
                                <div class="task-info">
                                    <span style="width:26px; text-align:center; font-size:1rem;">${medal}</span>
                                    <div>
                                        <div class="task-title">${escapeHtml(c.full_name)}</div>
                                        <div class="task-location">${c.reports || 0} report${(c.reports || 0) !== 1 ? 's' : ''}</div>
                                    </div>
                                </div>
                                <span class="badge badge-rated">⭐ ${c.points || 0} pts</span>
                            </div>
                        `;
                    }).join('');
                }
            }

            const teams = result.teams || [];
            const teamList = document.getElementById('adminTopTeams');
            if (teamList) {
                if (teams.length === 0) {
                    teamList.innerHTML = `
                        <div class="empty-state">
                            <i class="fas fa-hard-hat"></i>
                            <div class="empty-title">No teams yet</div>
                            <div class="empty-desc">Teams will be ranked by citizen ratings</div>
                        </div>`;
                } else {
                    teamList.innerHTML = teams.map((t, i) => {
                        const medal = i === 0 ? '🥇' : i === 1 ? '🥈' : i === 2 ? '🥉' : `<span style="font-weight:700;color:#d1d5db;">#${i + 1}</span>`;
                        const rating = parseFloat(t.avg_rating) > 0 ? `${t.avg_rating}⭐` : '—';
                        return `
                            <div class="task-item">
                                <div class="task-info">
                                    <span style="width:26px; text-align:center; font-size:1rem;">${medal}</span>
                                    <div>
                                        <div class="task-title">${escapeHtml(t.team_name)}</div>
                                        <div class="task-location">${t.jobs || 0} rated job${(t.jobs || 0) !== 1 ? 's' : ''} · avg ${rating}</div>
                                    </div>
                                </div>
                                <span class="badge badge-completed">⭐ ${t.total_points || 0} pts</span>
                            </div>
                        `;
                    }).join('');
                }
            }
        }

        function populateAdminReportFilters() {
            [
                ['adminReportCategory', 'All categories', cachedReports.map(report => report.category)],
                ['adminReportTeam', 'All teams', cachedReports.map(report => report.assigned_team)]
            ].forEach(([id, label, values]) => {
                const select = document.getElementById(id);
                if (!select) return;
                const selected = select.value;
                select.replaceChildren(new Option(label, 'all'));
                [...new Set(values.filter(Boolean))].sort().forEach(value => select.add(new Option(value, value)));
                if ([...select.options].some(option => option.value === selected)) select.value = selected;
            });
        }

        function toggleAdminReportFilters() {
            const filters = document.getElementById('adminReportFilters');
            const toggle = document.getElementById('adminReportFilterToggle');
            const isOpen = !filters.hidden;
            filters.hidden = isOpen;
            toggle.setAttribute('aria-expanded', String(!isOpen));
        }

        function clearAdminReportFilters() {
            document.getElementById('adminReportStatus').value = 'all';
            document.getElementById('adminReportCategory').value = 'all';
            document.getElementById('adminReportTeam').value = 'all';
            document.getElementById('adminReportFrom').value = '';
            document.getElementById('adminReportTo').value = '';
            renderAdminReports();
        }

        function getFilteredAdminReports() {
            const query = (document.getElementById('adminReportSearch')?.value || '').trim().toLowerCase();
            const status = document.getElementById('adminReportStatus')?.value || 'all';
            const category = document.getElementById('adminReportCategory')?.value || 'all';
            const team = document.getElementById('adminReportTeam')?.value || 'all';
            const from = document.getElementById('adminReportFrom')?.value || '';
            const to = document.getElementById('adminReportTo')?.value || '';
            return cachedReports.filter(report => {
                if (status !== 'all' && report.status !== status) return false;
                if (category !== 'all' && report.category !== category) return false;
                if (team !== 'all' && report.assigned_team !== team) return false;
                const reportDate = String(report.created_at || '').slice(0, 10);
                if (from && reportDate < from) return false;
                if (to && reportDate > to) return false;
                const searchable = `${report.category || ''} ${report.location || ''} ${report.citizen_name || ''} ${report.assigned_team || ''}`.toLowerCase();
                return searchable.includes(query);
            });
        }

        function renderAdminReports() {
            const list = document.getElementById('adminReportsList');
            const reports = getFilteredAdminReports();

            if (reports.length === 0) {
                list.innerHTML = `
                    <div class="empty-state">
                        <i class="fas fa-file-alt"></i>
                        <div class="empty-title">No matching reports</div>
                        <div class="empty-desc">Adjust the filters or search terms.</div>
                    </div>`;
                return;
            }

            list.innerHTML = reports.map(r => {
                const badge = r.status === 'Pending' ? 'pending' :
                            r.status === 'Assigned' ? 'assigned' :
                            r.status === 'In Progress' ? 'progress' :
                            r.status === 'Completed' ? 'completed' : 'rejected';
                const upvoteHtml = (r.upvote_count > 0) ? `<span style="display:inline-flex;align-items:center;gap:3px;font-size:0.72rem;color:#2d7a4f;background:#f0fdf4;padding:2px 8px;border-radius:40px;border:1px solid #bbf7d0;"><i class="fas fa-thumbs-up"></i> ${r.upvote_count}</span>` : '';
                return `
                    <div class="report-item" data-report-id="${r.id}">
                        <div class="report-info">
                            <i class="fas fa-flag" style="color:#2563eb;"></i>
                            <div>
                                <div class="report-title">${escapeHtml(r.category)}</div>
                                <div class="report-time" style="margin-top:2px;">📍 ${escapeHtml(r.location)}</div>
                            </div>
                        </div>
                        <div class="report-meta">
                            <span class="badge badge-${badge}">${escapeHtml(r.status)}</span>
                            ${upvoteHtml}
                            <button class="btn-sm btn-sm-actions btn-icon-only" title="Actions" onclick="openActionModal('admin', ${r.id})">
                                <i class="fas fa-bolt"></i>
                            </button>
                        </div>
                    </div>
                `;
            }).join('');
        }

        function exportAdminReports() {
            const reports = getFilteredAdminReports();
            const columns = ['id', 'category', 'status', 'priority', 'upvote_count', 'assigned_team', 'location', 'citizen_name', 'created_at'];
            const csvValue = value => {
                let text = String(value ?? '');
                if (/^[=+\-@]/.test(text)) text = `'${text}`;
                return `"${text.replace(/"/g, '""')}"`;
            };
            const csv = [columns.join(','), ...reports.map(report => columns.map(column => csvValue(report[column])).join(','))].join('\r\n');
            const url = URL.createObjectURL(new Blob(['\uFEFF' + csv], { type: 'text/csv;charset=utf-8' }));
            const link = document.createElement('a');
            link.href = url;
            link.download = 'greensteps-reports.csv';
            link.click();
            URL.revokeObjectURL(url);
        }

        async function openAssignModal(reportId) {
            const report = cachedReports.find(r => r.id === reportId);
            if (!report) return;
            adminActiveReport = report;

            const teamsResult = await apiGet('teams');
            const teams = teamsResult.success ? teamsResult.teams : [];

            const select = document.getElementById('assignTeamSelect');
            if (teams.length === 0) {
                select.innerHTML = '<option value="">No teams available</option>';
            } else {
                select.innerHTML = teams.map(t => `<option value="${t.team_name}">${t.team_name} (${t.members} member${t.members > 1 ? 's' : ''})</option>`).join('');
            }

            document.getElementById('assignReportTitle').textContent = report.category;
            document.getElementById('assignReportLocation').textContent = report.location;
            document.getElementById('assignModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeAssignModal() {
            document.getElementById('assignModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function confirmAssign() {
            if (!adminActiveReport) return;
            const team = document.getElementById('assignTeamSelect').value;
            if (!team) return alert('⚠️ Please select a team.');

            const result = await apiPost('reports/' + adminActiveReport.id + '/assign', {
                report_id: adminActiveReport.id,
                team_name: team
            });

            if (result.success) {
                showToast('✅ Team Assigned!', `${team} assigned to ${adminActiveReport.category}`);
                closeAssignModal();
                await loadAdminData();
            } else {
                alert('⚠️ ' + result.message);
            }
        }

        // ============ CITIZEN RATING (rate the maintenance team) ============
        async function openCitizenRating(reportId) {
            const report = cachedReports.find(r => r.id === reportId);
            if (!report) return;
            if (!report.task_id) {
                showToast('⚠️ Not available', 'No task is linked to this report yet.');
                return;
            }
            adminActiveTask = { id: report.task_id, title: report.category, location: report.location, team_name: report.assigned_team || 'Maintenance Team' };
            selectedRating = 0;

            document.getElementById('rateTaskName').textContent = report.category;
            document.getElementById('rateTeamName').textContent = report.assigned_team || 'Maintenance Team';
            document.getElementById('rateTaskLocation').textContent = report.location;
            document.getElementById('rateComment').value = '';
            document.getElementById('ratingLabel').textContent = 'Select rating';

            document.querySelectorAll('#ratingStars .star').forEach(s => s.classList.remove('active'));

            document.getElementById('ratingModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeRatingModal() {
            document.getElementById('ratingModal').classList.remove('active');
            document.body.style.overflow = 'auto';
            adminActiveTask = null;
            selectedRating = 0;
        }

        function setRating(value) {
            selectedRating = value;
            document.querySelectorAll('#ratingStars .star').forEach(s => {
                const starVal = parseInt(s.dataset.value);
                if (starVal <= value) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
            const labels = { 1: 'Poor', 2: 'Fair', 3: 'Good', 4: 'Very Good', 5: 'Excellent' };
            document.getElementById('ratingLabel').textContent = labels[value] || value + ' star' + (value > 1 ? 's' : '');
        }

        async function submitRating() {
            if (!adminActiveTask) return;
            if (selectedRating === 0) return alert('⚠️ Please select a rating (1-5 stars).');

            const comment = document.getElementById('rateComment').value.trim();
            const btn = document.getElementById('rateBtn');
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + adminActiveTask.id + '/rate', {
                    task_id: adminActiveTask.id,
                    rating: selectedRating,
                    comment: comment
                });

                if (result.success) {
                    closeRatingModal();
                    showToast('⭐ Thanks for rating!', `${adminActiveTask.team_name} received ${selectedRating}/5 stars.`);
                    try {
                        await loadCitizenData();
                    } catch (refreshError) {
                        console.error('Rating saved but dashboard refresh failed:', refreshError);
                    }
                } else {
                    alert('⚠️ ' + (result.message || 'Could not submit the rating.'));
                }
            } catch (error) {
                console.error('Rating submission failed:', error);
                alert('⚠️ Could not submit the rating. Check your connection and try again.');
            } finally {
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-star"></i> Submit Rating';
            }
        }

        // ============ LOGOUT ============
        async function handleLogout() {
            if (confirm('Are you sure you want to logout?')) {
                stopGpsSharing();
                stopAllLiveTracking();
                stopGlobalPolling();
                await apiGet('logout');
                closeProfileModal();
                closeEditProfileModal();
                closeStatisticsModal();
                closeCompletionInfoModal();
                closeRejectionReasonModal();
                closeReportDetailsModal();
                showToast('👋 Logged Out', 'Returning to login page...');
                setTimeout(() => showLogin(), 800);
            }
        }

         // ============ THEME TOGGLE ============
        function toggleTheme() {
            document.body.classList.toggle('dark-mode');
            const isDark = document.body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            const btn = document.getElementById('themeToggleBtn');
            if (btn) {
                const icon = btn.querySelector('i');
                if (icon) icon.className = isDark ? 'fas fa-sun' : 'fas fa-moon';
            }
            showToast(isDark ? 'Dark mode enabled' : 'Light mode enabled', '');
        }

        function applyTheme() {
            const savedTheme = localStorage.getItem('theme');
            if (savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.body.classList.add('dark-mode');
                const btn = document.getElementById('themeToggleBtn');
                if (btn) {
                    const icon = btn.querySelector('i');
                    if (icon) icon.className = 'fas fa-sun';
                }
            }
        }

        // ============ MISC ============
        function forgotPassword() {
            const email = document.getElementById('email').value.trim();
            document.getElementById('forgotPasswordForm').style.display = 'block';
            document.getElementById('resetPasswordForm').style.display = 'none';
            document.getElementById('passwordModalTitle').textContent = 'Reset password';
            document.getElementById('passwordModalSubtitle').textContent = 'Enter your email and we’ll send a reset link if the account exists.';
            document.getElementById('resetRequestEmail').value = email;
            document.getElementById('passwordModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePasswordModal() {
            document.getElementById('passwordModal').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        async function submitForgotPassword(event) {
            event.preventDefault();
            const result = await apiPost('forgot-password', {
                email: document.getElementById('resetRequestEmail').value.trim()
            });
            if (!result.success) {
                showToast('Unable to request reset', result.message || 'Check the email address and try again.');
                return;
            }
            closePasswordModal();
            showToast('Check your email', result.message);
        }

        async function submitPasswordReset(event) {
            event.preventDefault();
            const result = await apiPost('reset-password', {
                token: document.getElementById('resetToken').value,
                email: document.getElementById('resetEmail').value.trim(),
                password: document.getElementById('newResetPassword').value,
                password_confirmation: document.getElementById('confirmResetPassword').value
            });
            if (!result.success) {
                showToast('Password not updated', result.message || 'The reset link may have expired.');
                return;
            }
            document.getElementById('email').value = document.getElementById('resetEmail').value.trim();
            closePasswordModal();
            window.history.replaceState({}, document.title, window.location.pathname);
            showToast('Password updated', 'You can now sign in with your new password.');
        }

        let chatPeople = [];
        let selectedChatUserId = null;
        let chatPollTimer = null;

        function escapeHtml(value = '') {
            return String(value)
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;')
                .replace(/'/g, '&#039;');
        }

        function formatChatTime(isoString) {
            if (!isoString) return '';
            const date = new Date(isoString);
            if (Number.isNaN(date.getTime())) return '';
            return date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' });
        }

        async function openChatPanel() {
            const modal = document.getElementById('chatModal');
            if (!modal) return;
            modal.classList.add('active');
            modal.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
            await loadChatContacts();
            if (!chatPollTimer) {
                chatPollTimer = setInterval(() => {
                    if (document.getElementById('chatModal')?.classList.contains('active')) loadChatContacts();
                }, 5000);
            }
        }

        function closeChatPanel() {
            const modal = document.getElementById('chatModal');
            if (!modal) return;
            modal.classList.remove('active');
            modal.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = 'auto';
            if (chatPollTimer) {
                clearInterval(chatPollTimer);
                chatPollTimer = null;
            }
        }

        async function loadChatContacts() {
            const result = await apiGet('chat/contacts');
            if (!result.success) {
                return;
            }

            chatPeople = (result.users || []).sort((first, second) => {
                const firstTime = first.last_message_time ? new Date(first.last_message_time).getTime() : 0;
                const secondTime = second.last_message_time ? new Date(second.last_message_time).getTime() : 0;
                if (firstTime !== secondTime) return secondTime - firstTime;
                return String(first.full_name || '').localeCompare(String(second.full_name || ''));
            });
            updateChatUnreadBadge(chatPeople.reduce((total, user) => total + Number(user.unread_count || 0), 0));
            renderChatContacts();

            if (!selectedChatUserId && chatPeople.length) {
                await selectChatUser(chatPeople[0].id);
            } else if (selectedChatUserId) {
                const existing = chatPeople.find(user => user.id === selectedChatUserId);
                if (existing) {
                    await selectChatUser(selectedChatUserId);
                }
            }
        }

        function renderChatContacts() {
            const list = document.getElementById('chatPeopleList');
            const searchInput = document.getElementById('chatSearchInput');
            const query = (searchInput?.value || '').trim().toLowerCase();

            if (!list) return;
            const filtered = chatPeople.filter(user => {
                const text = `${user.full_name || ''} ${user.role || ''} ${user.team_name || ''}`.toLowerCase();
                return text.includes(query);
            });

            if (!filtered.length) {
                list.innerHTML = '<div class="chat-empty-state"><div>No contacts found.</div></div>';
                return;
            }

            list.innerHTML = filtered.map(user => {
                const initial = (user.full_name || 'U').split(' ').map(piece => piece[0]).slice(0, 2).join('').toUpperCase();
                const active = selectedChatUserId === user.id ? 'active' : '';
                const unreadCount = Number(user.unread_count || 0);
                const preview = user.last_message_image && !user.last_message
                    ? 'Photo'
                    : (user.last_message || `${user.role || 'Member'}${user.team_name ? ` · ${user.team_name}` : ''}`);
                return `
                    <button type="button" class="chat-person ${active}" data-user-id="${user.id}">
                        <div class="chat-person-avatar">${initial}</div>
                        <div class="chat-person-meta">
                            <div class="chat-person-name-line">
                                <span class="chat-person-name">${escapeHtml(user.full_name || 'User')}</span>
                                ${unreadCount ? `<span class="chat-person-unread" aria-label="${unreadCount} unread messages">${unreadCount > 99 ? '99+' : unreadCount}</span>` : ''}
                                <time class="chat-person-time">${escapeHtml(formatContactTime(user.last_message_time))}</time>
                            </div>
                            <div class="chat-person-preview">${escapeHtml(preview)}</div>
                        </div>
                    </button>
                `;
            }).join('');

            document.querySelectorAll('.chat-person').forEach(button => {
                button.addEventListener('click', () => {
                    const userId = Number(button.dataset.userId);
                    if (userId) selectChatUser(userId);
                });
            });
        }

        async function selectChatUser(userId) {
            const user = chatPeople.find(person => person.id === userId);
            if (!user) return;

            selectedChatUserId = userId;
            renderChatContacts();

            const avatar = document.getElementById('chatCurrentAvatar');
            const name = document.getElementById('chatCurrentName');
            const role = document.getElementById('chatCurrentRole');
            const thread = document.getElementById('chatThread');

            if (avatar) avatar.textContent = (user.full_name || 'U').split(' ').map(part => part[0]).slice(0, 2).join('').toUpperCase();
            if (name) name.textContent = user.full_name || 'User';
            if (role) role.textContent = user.role || 'member';

            if (!user.conversation_id) {
                thread.innerHTML = '<div class="chat-system">No conversation yet. Start the chat by sending a message.</div>';
                return;
            }

            const result = await apiGet(`chat/conversations/${user.conversation_id}/messages`);
            if (!result.success) {
                thread.innerHTML = '<div class="chat-system">Unable to load messages right now.</div>';
                return;
            }

            user.unread_count = 0;
            updateChatUnreadBadge(chatPeople.reduce((total, person) => total + Number(person.unread_count || 0), 0));
            renderChatContacts();
            renderChatThread(result.messages || []);
        }

        function updateChatUnreadBadge(count) {
            ['citizenChatUnread', 'maintenanceChatUnread', 'adminChatUnread'].forEach(id => {
                const badge = document.getElementById(id);
                if (!badge) return;
                badge.textContent = count > 99 ? '99+' : String(count || '');
                badge.style.display = count > 0 ? 'inline-flex' : 'none';
            });
            const panelBadge = document.getElementById('chatSidebarUnread');
            if (panelBadge) {
                panelBadge.textContent = count ? `${count > 99 ? '99+' : count} new` : '';
                panelBadge.style.display = count > 0 ? 'inline-flex' : 'none';
            }
        }

        function formatContactTime(isoString) {
            if (!isoString) return '';
            const date = new Date(isoString);
            if (Number.isNaN(date.getTime())) return '';
            const today = new Date();
            if (date.toDateString() === today.toDateString()) {
                return date.toLocaleTimeString([], { hour: 'numeric', minute: '2-digit' });
            }
            const yesterday = new Date(today);
            yesterday.setDate(today.getDate() - 1);
            if (date.toDateString() === yesterday.toDateString()) return 'Yesterday';
            return date.toLocaleDateString([], { month: 'short', day: 'numeric' });
        }

        async function refreshChatUnreadBadge() {
            if (!currentUser) return;
            const result = await apiGet('chat/unread');
            if (result.success) updateChatUnreadBadge(Number(result.unread_count || 0));
        }

        function renderChatThread(messages) {
            const thread = document.getElementById('chatThread');
            if (!thread) return;

            if (!messages.length) {
                thread.innerHTML = '<div class="chat-system">No messages yet. Say hello.</div>';
                return;
            }

            thread.innerHTML = messages.map(message => {
                const isMine = Number(message.sender_id) === Number(currentUser?.id);
                const text = message.message ? escapeHtml(message.message) : '';
                const imageHtml = message.image_url ? `<img class="chat-message-photo" src="${message.image_url}" alt="Chat attachment" />` : '';
                return `
                    <div class="chat-message-row ${isMine ? 'mine' : 'theirs'}">
                        <div class="chat-bubble">
                            ${text ? `<div>${text}</div>` : ''}
                            ${imageHtml}
                            <span class="chat-message-time">${formatChatTime(message.created_at)}</span>
                        </div>
                    </div>
                `;
            }).join('');

            thread.scrollTop = thread.scrollHeight;
        }

        async function sendChatMessage() {
            if (!selectedChatUserId) {
                showToast('⚠️ Select a person to chat with.', 'Choose a contact first.');
                return;
            }

            const input = document.getElementById('chatMessageInput');
            const fileInput = document.getElementById('chatImageInput');
            const message = input ? input.value.trim() : '';
            const file = fileInput?.files?.[0] || null;

            if (!message && !file) {
                showToast('⚠️ Message empty', 'Type a message or choose a photo first.');
                return;
            }

            const formData = new FormData();
            formData.append('recipient_id', String(selectedChatUserId));
            formData.append('message', message);
            if (file) {
                formData.append('photo', file);
            }

            const result = await apiPostFormData('chat/send', formData);
            if (!result.success) {
                showToast('⚠️ Chat not sent', result.message || 'Please try again.');
                return;
            }

            if (input) input.value = '';
            if (fileInput) {
                fileInput.value = '';
            }

            await loadChatContacts();
            await selectChatUser(selectedChatUserId);
            showToast('💬 Sent', 'Message delivered successfully.');
        }

        document.getElementById('chatModal')?.addEventListener('click', e => {
            if (e.target && e.target.id === 'chatModal') {
                closeChatPanel();
            }
        });

        ['adminRegisterModal','maintenanceAccountModal','passwordModal','chatModal','registerModal','reportModal','profileModal','editProfileModal','notifPrefsModal','startModal','completeModal','photoModal','navigateModal','assignModal','ratingModal','trackModal','actionModal','completionInfoModal','statisticsModal','rejectionReasonModal','adminRejectModal','maintRejectModal','reportDetailsModal'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('click', e => {
                if (e.target === el) {
                    el.classList.remove('active');
                    document.body.style.overflow = 'auto';
                }
            });
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
        document.getElementById('autoAssignModal')?.addEventListener('click', e => {
            if (e.target && e.target.id === 'autoAssignModal') closeAutoAssignModal();
        });

        ['adminRegisterModal','maintenanceAccountModal','passwordModal','chatModal','registerModal','reportModal','profileModal','editProfileModal','notifPrefsModal','startModal','completeModal','photoModal','navigateModal','assignModal','ratingModal','trackModal','actionModal','completionInfoModal','statisticsModal','rejectionReasonModal','adminRejectModal','maintRejectModal','reportDetailsModal'].forEach(id => {
                    document.getElementById(id)?.classList.remove('active');
                });
                document.body.style.overflow = 'auto';
            }
        });

        // ============ INIT ============
        applyTheme();
        (async function init() {
            const query = new URLSearchParams(window.location.search);
            const resetToken = query.get('reset_token');
            const resetEmail = query.get('email');
            if (resetToken && resetEmail) {
                document.getElementById('forgotPasswordForm').style.display = 'none';
                document.getElementById('resetPasswordForm').style.display = 'block';
                document.getElementById('passwordModalTitle').textContent = 'Choose a new password';
                document.getElementById('passwordModalSubtitle').textContent = 'Use at least 8 characters for your new password.';
                document.getElementById('resetToken').value = resetToken;
                document.getElementById('resetEmail').value = resetEmail;
                document.getElementById('passwordModal').classList.add('active');
                document.body.style.overflow = 'hidden';
            }

            const sessionResult = await apiGet('session');
            if (sessionResult.success) {
                currentUser = sessionResult.user;
                if (currentUser.role === 'citizen') {
                    document.getElementById('citizenUserName').textContent = currentUser.full_name;
                    showDashboard('citizen');
                } else if (currentUser.role === 'maintenance') {
                    document.getElementById('maintenanceUserName').textContent = currentUser.team_name || currentUser.full_name;
                    showDashboard('maintenance');
                } else if (currentUser.role === 'admin') {
                    document.getElementById('adminUserName').textContent = currentUser.full_name;
                    showDashboard('admin');
                }
            } else if (window.location.pathname.replace(/\/+$/, '').endsWith('/admin')) {
                selectRole('admin');
            }
            // Load Google Maps API on page load
            loadGoogleMaps();
            console.log('%c🌱 GreenSteps ready — MySQL backend + Real-time polling', 'color:#2d7a4f;font-weight:bold;');
        })();
        </script>

    </body>
    </html>