
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
            body.app-booting #pageHome,
            body.app-booting #pageLogin,
            body.app-booting .dashboard-container { visibility: hidden; }
            .app-boot-loader {
                position: fixed; inset: 0; z-index: 900;
                display: flex; flex-direction: column; align-items: center; justify-content: center;
                gap: 12px; background: linear-gradient(145deg, #f0f4f8 0%, #e2eaf1 100%);
                color: #334155; font-size: 0.9rem;
            }
            .app-boot-loader i { color: #2d7a4f; font-size: 1.4rem; }
            body.dark-mode .app-boot-loader {
                background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%);
                color: #e7efea;
            }

            /* DARK MODE */
            body.dark-mode {
                background: linear-gradient(145deg, #0f172a 0%, #1e293b 100%);
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
                background: #1e293b;
                border: 1px solid #334155;
                color: #f3f4f6;
            }
            body.dark-mode .form-group,
            body.dark-mode .input-wrapper {
                border: none;
            }
            body.dark-mode .card-header {
                background: #334155;
                border-bottom: 1px solid #334155;
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
                background: #334155;
                color: #f3f4f6;
                border-color: #475569;
            }
            body.dark-mode .btn-secondary { background: #2b2f33; color: #f3f4f6; }
            body.dark-mode .admin-report-search-input input,
            body.dark-mode .admin-report-filter-toggle,
            body.dark-mode .admin-filter-control,
            body.dark-mode .search-box input,
            body.dark-mode .team-selector select,
            body.dark-mode input,
            body.dark-mode select,
            body.dark-mode textarea,
            body.dark-mode .input-wrapper input,
            body.dark-mode .form-group input,
            body.dark-mode .form-group select {
                background: rgba(255, 255, 255, 0.08);
                color: #f3f4f6;
                border: none;
            }
            body.dark-mode .admin-report-search-input input:focus,
            body.dark-mode .search-box input:focus,
            body.dark-mode .team-selector select:focus,
            body.dark-mode input:focus,
            body.dark-mode select:focus,
            body.dark-mode textarea:focus,
            body.dark-mode .input-wrapper input:focus,
            body.dark-mode .form-group input:focus,
            body.dark-mode .form-group select:focus {
                background: rgba(255, 255, 255, 0.12);
                outline: none;
            }
            body.dark-mode input::placeholder,
            body.dark-mode textarea::placeholder,
            body.dark-mode .form-group input::placeholder,
            body.dark-mode select option {
                color: #6b7280;
            }
            body.dark-mode .logo h1,
            body.dark-mode .login-title { color: #f3f4f6; }
            body.dark-mode .logo .subtitle,
            body.dark-mode .login-subtitle,
            body.dark-mode .form-options label,
            body.dark-mode .register-link { color: #cbd5e1; }
            body.dark-mode .form-options a,
            body.dark-mode .register-link a { color: #86efac; }


            body.dark-mode .user-badge {
                background: rgba(255,255,255,0.05);
                color: #f3f4f6;
            }
            body.dark-mode .list-expansion-control {
                color: #86efac;
                border-top-color: #334155;
            }
            body.dark-mode .badge {
                filter: grayscale(1) brightness(1.05);
            }
            body.dark-mode .badge-bg {
                background: #334155;
                color: #f3f4f6;
            }
            body.dark-mode .report-card .info h4 { color: #f3f4f6; }
            body.dark-mode .report-card .meta { color: #d1d5db; }
            body.dark-mode .report-actions .btn { background: #2b2f33; color: #f3f4f6; }
            body.dark-mode .header { background: rgba(17,19,21,0.85); }
            body.dark-mode .header-menu-panel {
                background: #1e293b;
                border-color: #334155;
            }
            body.dark-mode .header-menu-item {
                color: #f3f4f6;
            }
            body.dark-mode .header-menu-item:hover {
                background: #334155;
            }
            body.dark-mode .header-menu-item i {
                color: #d1d5db;
            }
            body.dark-mode .header-menu-theme {
                border-bottom-color: #334155;
            }
            body.dark-mode .header-menu-theme-title {
                color: #d1d5db;
            }
            body.dark-mode .header-theme-toggle span {
                background: #475569;
            }
            body.dark-mode .header-theme-toggle input:checked + span {
                background: #9ca3af;
            }
            body.dark-mode .empty-desc { color: #d1d5db; }
            body.dark-mode .empty-title { color: #f3f4f6; }
            body.dark-mode .task-item {
                border-bottom-color: #334155;
            }
            body.dark-mode .task-stats {
                background: #334155;
                border: 1px solid #334155;
            }
            body.dark-mode .task-stat:hover {
                background: #334155;
            }
            body.dark-mode .task-stat .num {
                color: #f3f4f6 !important;
            }
            body.dark-mode .task-stat .lbl {
                color: #d1d5db;
            }
            body.dark-mode .task-search {
                background: #334155;
                border-color: #475569;
            }
            body.dark-mode .task-search input {
                color: #f3f4f6;
            }
            body.dark-mode .task-search input::placeholder {
                color: #d1d5db;
            }
            body.dark-mode #notificationBell {
                color: #f3f4f6;
            }
            body.dark-mode .report-priority-badge {
                color: #f3f4f6;
            }
            body.dark-mode .applicant-action {
                background: #334155;
                color: #f3f4f6;
                border-color: #475569;
            }
            body.dark-mode .map-legend span {
                color: #f3f4f6;
            }
            body.dark-mode .map-popup,
            body.dark-mode .map-popup-content {
                background: #1e293b;
                color: #f3f4f6;
            }
            body.dark-mode .modal-overlay {
                background: rgba(0,0,0,0.72);
            }
            body.dark-mode .progress-bar-bg {
                background: #334155;
            }
            body.dark-mode .progress-bar-fill {
                background: #d1d5db;
            }
            body.dark-mode .table-row {
                border-bottom-color: #334155;
            }
            body.dark-mode .table-header {
                background: #334155;
                border-bottom: 1px solid #334155;
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
                background: #334155;
                color: #f3f4f6;
                border: 1px solid #475569;
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
            body.dark-mode .badge-pending { background: #43351a; color: #fcd34d; border-color: #725a28; filter: none; }
            body.dark-mode .badge-progress { background: #33244e; color: #d8b4fe; border-color: #5b427e; filter: none; }
            body.dark-mode .badge-completed { background: #173b2b; color: #86efac; border-color: #2f6b47; filter: none; }
            body.dark-mode .badge-rejected { background: #442426; color: #fca5a5; border-color: #704044; filter: none; }
            body.dark-mode .task-location-legend .badge { filter: none; }
            body.dark-mode .task-location-legend i.task-location-dot { color: var(--task-location-color) !important; }
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
                background: #475569;
                color: #f3f4f6;
                border: 1px solid #52575d;
            }
            body.dark-mode .priority-critical,
            body.dark-mode .priority-high,
            body.dark-mode .priority-medium,
            body.dark-mode .priority-low {
                background: #334155;
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
                background: #334155;
                color: #f3f4f6;
                border-color: #475569;
            }
            body.dark-mode .pref-toggle span:before {
                background: #d1d5db;
            }
            body.dark-mode .chat-person:hover,
            body.dark-mode .chat-person.active {
                background: #334155;
                border-color: #475569;
            }
            body.dark-mode .chat-person-name {
                color: #f3f4f6 !important;
            }
            body.dark-mode .chat-person-preview {
                color: #d1d5db !important;
            }
            body.dark-mode .chat-person-role {
                color: #d1d5db !important;
            }
            body.dark-mode .chat-person-time {
                color: #9ca3af !important;
            }
            body.dark-mode .chat-message-row.theirs .chat-bubble {
                background: #334155;
                color: #f3f4f6;
                border-color: #475569;
            }
            body.dark-mode .chat-message-row.mine .chat-bubble {
                background: linear-gradient(135deg, #2d7a4f 0%, #3f9a69 100%);
                color: white;
            }
            body.dark-mode .chat-sidebar-header {
                background: #334155;
                border-bottom-color: #334155;
            }
            body.dark-mode .chat-sidebar-header h3 {
                color: #f3f4f6;
            }
            body.dark-mode .chat-sidebar-close {
                border-color: #475569;
                background: #334155;
                color: #f3f4f6;
            }
            body.dark-mode .chat-sidebar-close:hover {
                background: #475569;
                color: #fca5a5;
                border-color: rgba(220, 38, 38, 0.5);
            }
            body.dark-mode .chat-header {
                background: #334155;
                border-bottom-color: #334155;
            }
            body.dark-mode .chat-current-name {
                color: #f3f4f6;
            }
            body.dark-mode .chat-header-actions button {
                color: #d1d5db;
            }
            body.dark-mode .chat-header-actions button:hover {
                background: #334155;
                color: #f3f4f6;
            }
            body.dark-mode .chat-header-actions button:first-child:hover {
                background: rgba(220, 38, 38, 0.3);
                color: #fca5a5;
                border-color: rgba(220, 38, 38, 0.5);
            }
            body.dark-mode .chat-message-time {
                color: #9ca3af !important;
            }
            body.dark-mode .chat-message-row.theirs .chat-message-time {
                color: #9ca3af !important;
            }
            body.dark-mode .chat-message-row.mine .chat-message-time {
                color: rgba(255,255,255,0.75) !important;
            }
            body.dark-mode .chat-messages {
                background: #1e293b;
            }
            body.dark-mode .chat-thread {
                background: #1e293b !important;
            }
            body.dark-mode .chat-empty-state {
                color: #d1d5db !important;
            }
            body.dark-mode .chat-composer {
                background: #1e293b !important;
                border-top-color: #334155 !important;
            }
            body.dark-mode .chat-attach {
                color: #2d7a4f !important;
            }
            body.dark-mode .chat-image-preview {
                background: #334155;
                border-color: #475569;
            }
            body.dark-mode .chat-image-preview-remove {
                background: #1e293b;
                color: #e2e8f0;
            }
            body.dark-mode .chat-attach:hover {
                color: #3d9a67 !important;
            }
            body.dark-mode .chat-input-row input {
                background: #334155 !important;
                color: #f3f4f6 !important;
                border-color: #475569 !important;
            }
            body.dark-mode .chat-input-row input::placeholder {
                color: #9ca3af !important;
            }
            body.dark-mode .chat-send-btn {
                background: linear-gradient(135deg, #2d7a4f, #3d9a67) !important;
                color: white !important;
            }
            body.dark-mode .chat-send-btn:hover {
                background: linear-gradient(135deg, #23673f, #2d7a4f) !important;
            }
            body.dark-mode .chat-sidebar {
                background: #334155;
                border-right-color: #334155;
            }
            body.dark-mode .chat-search {
                background: #334155;
                border-bottom-color: #334155;
            }
            body.dark-mode .chat-search input {
                background: transparent !important;
                color: #f3f4f6 !important;
                border-color: transparent !important;
            }
            body.dark-mode .chat-search input::placeholder {
                color: #9ca3af !important;
            }
            body.dark-mode textarea,
            body.dark-mode .form-group textarea,
            body.dark-mode .comment-compose textarea,
            body.dark-mode #trackCommentInput,
            body.dark-mode #trackDiscussionInput,
            body.dark-mode #reportDetailsCommentInput,
            body.dark-mode #rateComment,
            body.dark-mode #adminRejectReason,
            body.dark-mode #maintRejectReason,
            body.dark-mode #startNotes,
            body.dark-mode #completeNotes,
            body.dark-mode #description {
                background: rgba(255, 255, 255, 0.08) !important;
                color: #f3f4f6 !important;
                border: none !important;
            }
            body.dark-mode textarea::placeholder,
            body.dark-mode .comment-compose textarea::placeholder,
            body.dark-mode #trackDiscussionInput::placeholder {
                color: #9ca3af !important;
            }
            body.dark-mode textarea:focus,
            body.dark-mode .form-group textarea:focus,
            body.dark-mode .comment-compose textarea:focus,
            body.dark-mode #trackCommentInput:focus,
            body.dark-mode #trackDiscussionInput:focus,
            body.dark-mode #reportDetailsCommentInput:focus,
            body.dark-mode #rateComment:focus,
            body.dark-mode #adminRejectReason:focus,
            body.dark-mode #maintRejectReason:focus,
            body.dark-mode #startNotes:focus,
            body.dark-mode #completeNotes:focus,
            body.dark-mode #description:focus {
                background: rgba(255, 255, 255, 0.12) !important;
                outline: none !important;
            }

            /* DISCUSSION DARK MODE */
            body.dark-mode .comments-thread {
                background: #1e293b !important;
                border: 1px solid #334155;
                border-radius: 14px;
                padding: 10px !important;
            }
            body.dark-mode .comment-bubble {
                background: #202428 !important;
                border: 1px solid #334155 !important;
                color: #f3f4f6 !important;
            }
            body.dark-mode .comment-bubble.mine {
                background: #334155 !important;
                border-color: #2b4365 !important;
            }
            body.dark-mode .comment-author {
                color: #f3f4f6 !important;
            }
            body.dark-mode .comment-text {
                color: #e2e8f0 !important;
            }
            body.dark-mode .comment-time {
                color: #94a3b8 !important;
            }
            body.dark-mode .comments-empty {
                color: #94a3b8 !important;
            }
            body.dark-mode .comment-avatar {
                background: #2b3036 !important;
                border: 2px solid #3d434a !important;
                box-shadow: 0 2px 5px rgba(0,0,0,0.4) !important;
            }
            body.dark-mode .comment-avatar i {
                color: #cbd5e1 !important;
            }
            body.dark-mode .comment-avatar.admin {
                background: #382c16 !important;
                border-color: #5c441c !important;
            }
            body.dark-mode .comment-avatar.admin i {
                color: #fcd34d !important;
            }
            body.dark-mode .comment-avatar.maintenance {
                background: #262744 !important;
                border-color: #3b3d6c !important;
            }
            body.dark-mode .comment-avatar.maintenance i {
                color: #a5b4fc !important;
            }
            body.dark-mode .comment-avatar.citizen {
                background: #334155 !important;
                border-color: #27456d !important;
            }
            body.dark-mode .comment-avatar.citizen i {
                color: #93c5fd !important;
            }
            body.dark-mode .comment-role.citizen {
                background: #334155 !important;
                color: #93c5fd !important;
            }
            body.dark-mode .comment-role.admin {
                background: #4a3818 !important;
                color: #fcd34d !important;
            }
            body.dark-mode .comment-role.maintenance {
                background: #2d305e !important;
                color: #c7d2fe !important;
            }
            body.dark-mode .comment-compose {
                background: transparent !important;
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
            body.dark-mode .form-group .input-wrapper .password-toggle,
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
                background: #334155 !important;
                border: 1px solid #334155;
            }
            body.dark-mode .modal-details .detail-row {
                border-bottom-color: #334155;
            }
            body.dark-mode .modal-details .detail-label {
                color: #d1d5db !important;
            }
            body.dark-mode .modal-details .detail-value {
                color: #f3f4f6 !important;
            }
            body.dark-mode .report-details-map-fallback {
                background: #334155;
                border-color: #475569;
                color: #d1d5db;
            }
            body.dark-mode .tracking-timeline,
            body.dark-mode .track-step,
            body.dark-mode .report-track-expand,
            body.dark-mode .live-track-wrap,
            body.dark-mode .nav-route {
                background: #334155 !important;
                border-color: #2d3135 !important;
            }
            body.dark-mode .track-step .step-label,
            body.dark-mode .track-step .step-desc,
            body.dark-mode .track-step .step-time,
            body.dark-mode .tracking-timeline-title,
            body.dark-mode .live-track-title,
            body.dark-mode .live-track-meta,
            body.dark-mode .nav-route .route-step .step-desc,
            body.dark-mode .nav-route .route-step .step-dist {
                color: #f3f4f6 !important;
            }
            body.dark-mode .track-step.done .step-icon,
            body.dark-mode .track-step.active .step-icon,
            body.dark-mode .track-step.rejected .step-icon {
                background: #334155 !important;
                color: #f3f4f6 !important;
                border: 1px solid #475569;
            }
            body.dark-mode .track-step::before {
                background: #475569 !important;
            }
            body.dark-mode .track-step.done::before,
            body.dark-mode .track-step.active::before,
            body.dark-mode .track-step.rejected::before {
                background: #475569 !important;
            }
            body.dark-mode .live-status {
                background: #334155 !important;
                color: #f3f4f6 !important;
            }
            body.dark-mode .live-status.live {
                background: #334155 !important;
                color: #d1d5db !important;
            }
            body.dark-mode .live-status.waiting {
                background: #332e26 !important;
                color: #f3f4f6 !important;
            }
            body.dark-mode .live-track-map {
                background: #1e293b !important;
                border-color: #475569 !important;
            }
            body.dark-mode .profile-name,
            body.dark-mode .profile-stat .number,
            body.dark-mode .profile-menu-item .menu-text {
                color: #f3f4f6 !important;
            }
            body.dark-mode .profile-role,
            body.dark-mode .profile-menu-item i {
                color: #d1d5db !important;
            }
            body.dark-mode .profile-menu-item:hover {
                background: #252a2e;
                border-color: #475569;
            }
            body.dark-mode .admin-report-filters {
                background: #334155;
                border-color: #334155;
            }
            body.dark-mode .admin-filter-field > span {
                color: #d1d5db !important;
            }
            body.dark-mode .admin-filter-control:focus {
                background: #334155;
                border-color: #6b7280;
                box-shadow: 0 0 0 3px rgba(209,213,219,0.1);
            }
            body.dark-mode .admin-report-filter-toggle[aria-expanded="true"] {
                background: #334155;
                border-color: #6b7280;
                color: #f3f4f6;
            }
            body.dark-mode .admin-filter-clear,
            body.dark-mode .admin-filter-clear:hover {
                color: #e5e7eb;
            }
            body.dark-mode .admin-header-nav-item {
                color: #d1d5db;
            }
            body.dark-mode .admin-header-nav-item:hover {
                background: rgba(45,122,79,0.15); color: #2d7a4f;
            }
            body.dark-mode .admin-header-nav-item.active {
                background: #2d7a4f; color: white;
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
            /* Dark mode for Statistics Modal */
            body.dark-mode .stats-modal-box {
                background: #1e293b !important;
                border: 1px solid #334155 !important;
            }
            body.dark-mode .stats-modal-box h3 {
                color: #f3f4f6 !important;
            }
            body.dark-mode .stats-modal-box h3 i {
                color: #4ade80 !important;
            }
            body.dark-mode .stat-section-title {
                color: #f3f4f6 !important;
            }
            body.dark-mode .stat-section-title i {
                color: #4ade80 !important;
            }
            body.dark-mode .metric-card {
                background: #334155 !important;
                border: 1px solid #334155 !important;
            }
            body.dark-mode .metric-card .metric-num {
                color: #f3f4f6 !important;
            }
            body.dark-mode .metric-card .metric-lbl {
                color: #9ca3af !important;
            }
            body.dark-mode .metric-card:nth-child(1) .metric-icon {
                background: rgba(59, 130, 246, 0.2) !important;
                color: #93c5fd !important;
            }
            body.dark-mode .metric-card:nth-child(2) .metric-icon {
                background: rgba(34, 197, 94, 0.2) !important;
                color: #86efac !important;
            }
            body.dark-mode .metric-card:nth-child(3) .metric-icon {
                background: rgba(239, 68, 68, 0.2) !important;
                color: #fca5a5 !important;
            }
            body.dark-mode .metric-card:nth-child(4) .metric-icon {
                background: rgba(234, 179, 8, 0.2) !important;
                color: #fde047 !important;
            }
            body.dark-mode .bar-chart {
                background: #334155 !important;
                border: 1px solid #334155 !important;
            }
            body.dark-mode .bar-col .bar-value {
                color: #4ade80 !important;
            }
            body.dark-mode .bar-col .bar.empty {
                background: #2b3036 !important;
            }
            body.dark-mode .bar-col .bar-label {
                color: #9ca3af !important;
            }
            body.dark-mode .status-row .status-name {
                color: #e5e7eb !important;
            }
            body.dark-mode .status-row .status-bar-track {
                background: #282d33 !important;
            }
            body.dark-mode .status-row .status-count {
                color: #f3f4f6 !important;
            }
            body.dark-mode .status-row .status-count span {
                color: #9ca3af !important;
            }
            body.dark-mode .cat-row {
                border-bottom: 1px solid #282d33 !important;
            }
            body.dark-mode .cat-row .cat-name {
                color: #e5e7eb !important;
            }
            body.dark-mode .cat-row .cat-count {
                color: #4ade80 !important;
                background: rgba(45, 122, 79, 0.25) !important;
                border: 1px solid rgba(74, 222, 128, 0.2) !important;
            }
            body.dark-mode #statsCategoryBreakdown div {
                color: #9ca3af !important;
            }
            body.dark-mode .avatar-edit-preview {
                border-color: #4ade80;
                background: #334155;
            }
            body.dark-mode .avatar-edit-preview .avatar-edit-overlay {
                background: rgba(0,0,0,0.65);
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

            .home-page {
                width: calc(100% + 40px);
                color: #183b3a;
                background: #ffffff;
            }
            .home-hero {
                position: relative;
                min-height: 540px;
                height: min(740px, 72svh);
                display: flex;
                align-items: center;
                overflow: hidden;
                isolation: isolate;
                background: #183b32;
                color: #ffffff;
            }
            .home-hero-image {
                position: absolute;
                inset: 0;
                z-index: -2;
                width: 100%;
                height: 100%;
                object-fit: cover;
                object-position: center 48%;
            }
            .home-hero-shade { position: absolute; inset: 0; z-index: -1; background: rgba(8, 27, 22, 0.52); }
            .home-nav {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                z-index: 2;
                max-width: 1280px;
                margin: 0 auto;
                padding: 22px 40px;
                display: flex;
                align-items: center;
                justify-content: space-between;
                gap: 20px;
            }
            .home-brand { display: inline-flex; align-items: center; gap: 10px; color: #ffffff; text-decoration: none; font-size: 1.15rem; font-weight: 700; }
            .home-brand i { color: #a7d8a0; font-size: 1.25rem; }
            .home-nav-links { display: flex; align-items: center; gap: 26px; }
            .home-nav-links a { color: #f0f5f0; text-decoration: none; font-size: 0.86rem; font-weight: 500; }
            .home-nav-links a:hover { color: #c2e6ba; }
            .home-nav-login { padding: 10px 16px; border: 1px solid rgba(255,255,255,0.72); border-radius: 7px; background: rgba(8,27,22,0.16); color: #ffffff; font: inherit; font-size: 0.84rem; font-weight: 600; cursor: pointer; }
            .home-nav-login:hover { background: rgba(255,255,255,0.14); }
            .home-hero-content { width: min(1120px, 100%); margin: 0 auto; padding: 105px 40px 40px; }
            .home-eyebrow { margin-bottom: 18px; color: #c2e6ba; font-size: 0.82rem; font-weight: 700; }
            .home-hero h1 { max-width: 680px; margin: 0; color: #ffffff; font-size: 3.5rem; line-height: 1.08; font-weight: 700; }
            .home-hero-copy { max-width: 560px; margin: 20px 0 28px; color: #eef4ef; font-size: 1.08rem; line-height: 1.65; }
            .home-hero-actions { display: flex; flex-wrap: wrap; align-items: center; gap: 12px; }
            .home-cta { min-height: 48px; display: inline-flex; align-items: center; justify-content: center; gap: 9px; padding: 0 19px; border-radius: 7px; text-decoration: none; font: inherit; font-size: 0.9rem; font-weight: 700; cursor: pointer; }
            .home-cta-primary { border: 1px solid #a9d8a0; background: #a9d8a0; color: #183b32; }
            .home-cta-primary:hover { background: #c2e6ba; border-color: #c2e6ba; }
            .home-cta-secondary { border: 1px solid rgba(255,255,255,0.72); background: rgba(8,27,22,0.16); color: #ffffff; }
            .home-cta-secondary:hover { background: rgba(255,255,255,0.14); }
            .home-hero-note { margin-top: 36px; color: #e1ebe3; font-size: 0.8rem; }
            .home-section { max-width: 1200px; margin: 0 auto; padding: 74px 40px; }
            .home-section-heading { max-width: 680px; margin-bottom: 38px; }
            .home-kicker { margin-bottom: 10px; color: #2d7a4f; font-size: 0.78rem; font-weight: 700; }
            .home-section h2 { margin: 0; color: #183b3a; font-size: 2rem; line-height: 1.2; }
            .home-section-intro { margin: 13px 0 0; color: #60736f; font-size: 0.98rem; line-height: 1.65; }
            .home-feature-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); border-top: 1px solid #dce7e0; }
            .home-feature { padding: 25px 26px 10px 0; border-bottom: 1px solid #dce7e0; }
            .home-feature + .home-feature { padding-left: 25px; border-left: 1px solid #dce7e0; }
            .home-feature-icon { width: 40px; height: 40px; display: grid; place-items: center; margin-bottom: 18px; border-radius: 10px; background: #edf6ef; color: #2d7a4f; font-size: 1rem; }
            .home-feature h3 { margin: 0 0 8px; color: #183b3a; font-size: 1.08rem; }
            .home-feature p { margin: 0; color: #60736f; font-size: 0.88rem; line-height: 1.6; }
            .home-benefits { background: #edf4ef; }
            .home-benefits-inner { max-width: 1200px; margin: 0 auto; padding: 66px 40px; display: grid; grid-template-columns: minmax(0, 1fr) minmax(260px, 0.72fr); gap: 64px; align-items: center; }
            .home-benefits h2 { max-width: 580px; margin: 0; color: #183b3a; font-size: 2rem; line-height: 1.22; }
            .home-benefits-copy { margin: 16px 0 0; color: #536b62; font-size: 0.94rem; line-height: 1.7; }
            .home-benefit-list { display: grid; gap: 16px; margin: 0; padding: 0; list-style: none; }
            .home-benefit-list li { display: grid; grid-template-columns: 25px minmax(0, 1fr); gap: 11px; align-items: start; color: #345249; font-size: 0.9rem; line-height: 1.55; }
            .home-benefit-list i { padding-top: 3px; color: #2d7a4f; }
            .home-final-cta { max-width: 1200px; margin: 0 auto; padding: 58px 40px 66px; display: flex; align-items: center; justify-content: space-between; gap: 30px; }
            .home-final-cta h2 { margin: 0; color: #183b3a; font-size: 1.65rem; }
            .home-final-cta p { margin: 8px 0 0; color: #60736f; font-size: 0.9rem; }
            .home-final-cta .home-cta { flex: 0 0 auto; background: #2d7a4f; border-color: #2d7a4f; color: #ffffff; }
            .home-final-cta .home-cta:hover { background: #23673f; }
            .home-footer { padding: 22px 40px; border-top: 1px solid #e0e9e4; color: #748780; text-align: center; font-size: 0.75rem; }
            body.dark-mode .home-page { background: #0f172a; color: #e7efea; }
            body.dark-mode .home-section { background: #0f172a; }
            body.dark-mode .home-kicker { color: #a7d8a0; }
            body.dark-mode .home-section h2,
            body.dark-mode .home-benefits h2,
            body.dark-mode .home-feature h3,
            body.dark-mode .home-final-cta h2 { color: #f3f4f6 !important; }
            body.dark-mode .home-section-intro,
            body.dark-mode .home-feature p,
            body.dark-mode .home-benefits-copy,
            body.dark-mode .home-final-cta p { color: #c1cec7; }
            body.dark-mode .home-feature-grid,
            body.dark-mode .home-feature { border-color: #334155; }
            body.dark-mode .home-feature-icon { background: #334155; color: #a7d8a0; }
            body.dark-mode .home-benefits { background: #1e293b; }
            body.dark-mode .home-benefit-list li { color: #d3ddd7; }
            body.dark-mode .home-benefit-list i { color: #a7d8a0; }
            body.dark-mode .home-final-cta { background: #0f172a; }
            body.dark-mode .home-footer { border-top-color: #334155; color: #aab8b1; }
            @media (max-width: 700px) {
                .home-hero { min-height: 420px; height: min(660px, 72svh); }
                .home-nav { padding: 18px 20px; }
                .home-nav-links { gap: 14px; }
                .home-nav-links a:not(.home-nav-login) { display: none; }
                .home-hero-content { padding: 78px 24px 20px; }
                .home-hero h1 { font-size: 2.45rem; }
                .home-hero-copy { font-size: 0.96rem; }
                .home-hero-note { display: none; }
                .home-section { padding: 54px 24px; }
                .home-section h2, .home-benefits h2 { font-size: 1.65rem; }
                .home-feature-grid { grid-template-columns: 1fr; }
                .home-feature, .home-feature + .home-feature { padding: 21px 0; border-left: 0; }
                .home-benefits-inner { grid-template-columns: 1fr; gap: 28px; padding: 52px 24px; }
                .home-final-cta { align-items: flex-start; flex-direction: column; padding: 48px 24px; }
                .home-footer { padding: 20px 24px; }
            }

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
                transition: transform 0.2s ease, box-shadow 0.2s ease, border-color 0.2s ease;
            }
            .role-btn:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(0,0,0,0.06); }
            .role-btn.citizen-role:hover { border-color: #2d7a4f; background: #f0fdf4; }
            .role-btn.maintenance-role:hover { border-color: #2563eb; background: #eff6ff; }
            .role-btn.admin-role:hover { border-color: #7c3aed; background: #f5f3ff; }
            body.dark-mode .role-btn.citizen-role:hover { border-color: #4b9b64; background: #334155; }
            body.dark-mode .role-btn.maintenance-role:hover { border-color: #5790cf; background: #334155; }
            body.dark-mode .role-btn.admin-role:hover { border-color: #9874d3; background: #334155; }
            body.dark-mode .role-btn:hover .role-arrow { color: #f3f4f6 !important; }
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
            .form-group .input-wrapper i { position: absolute; left: 14px; color: #94a3b8; font-size: 1rem; z-index: 1; pointer-events: none; }
            .form-group .input-wrapper .password-toggle {
                position: absolute; right: 10px; top: 50%; transform: translateY(-50%);
                width: 28px; height: 28px; display: flex; align-items: center; justify-content: center;
                color: #94a3b8; font-size: 1rem; cursor: pointer; background: transparent; border: none;
                border-radius: 999px; padding: 0; transition: color 0.15s ease, background 0.15s ease;
                z-index: 2; pointer-events: auto;
            }
            .form-group .input-wrapper .password-toggle:hover {
                color: #2d7a4f; background: rgba(45, 122, 79, 0.06);
            }
            body.dark-mode .form-group .input-wrapper .password-toggle:hover { color: #cbd5e1; }
            .form-group input, .form-group select, .form-group textarea {
                width: 100%; padding: 0.8rem 1rem 0.8rem 2.8rem;
                border-radius: 16px; border: none;
                font-family: inherit; font-size: 0.95rem;
                transition: 0.15s ease; background: #f8fafc;
            }
            .form-group input.has-password-toggle { padding-right: 2.8rem; }
            .form-group textarea { padding: 0.8rem 1rem; resize: vertical; min-height: 60px; }
            .form-group select { padding: 0.8rem 2.8rem 0.8rem 2.8rem; }
            .form-group .input-wrapper select {
                padding-left: 2.8rem;
                padding-right: 2.8rem;
            }
            .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
                outline: none; background: white;
            }
            .form-group .input-wrapper input,
            .form-group .input-wrapper select {
                position: relative; z-index: 0;
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
            .header-menu { position: relative; }
            .header-menu > summary {
                list-style: none;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                width: 40px;
                height: 40px;
            }
            .header-menu > summary::-webkit-details-marker { display: none; }
            .header-menu-panel {
                position: absolute;
                top: calc(100% + 8px);
                right: 0;
                z-index: 9999;
                min-width: 190px;
                display: grid;
                gap: 4px;
                padding: 8px;
                background: white;
                border: 1px solid #e2e8f0;
                border-radius: 12px;
                box-shadow: 0 12px 28px rgba(0,0,0,0.16);
            }
            .header-menu-item {
                width: 100%;
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 9px 10px;
                border: 0;
                border-radius: 8px;
                background: transparent;
                color: #1e293b;
                font: inherit;
                text-align: left;
                cursor: pointer;
            }
            .header-menu-item:hover { background: #f1f5f9; }
            .header-menu-item > i { width: 18px; text-align: center; color: #64748b; }
            .header-menu-theme { display: flex; align-items: center; justify-content: space-between; gap: 14px; padding: 8px 10px 10px; border-bottom: 1px solid #e2e8f0; margin-bottom: 4px; }
            .header-menu-theme-title { color: #334155; font-size: 0.84rem; font-weight: 600; }
            .header-theme-toggle { position: relative; display: block; width: 38px; height: 22px; flex-shrink: 0; cursor: pointer; }
            .header-theme-toggle input { position: absolute; opacity: 0; width: 1px; height: 1px; }
            .header-theme-toggle span { position: absolute; inset: 0; background: #cbd5e1; border-radius: 999px; transition: background 0.2s ease; }
            .header-theme-toggle span::before { content: ''; position: absolute; width: 16px; height: 16px; left: 3px; top: 3px; background: white; border-radius: 50%; transition: transform 0.2s ease; }
            .header-theme-toggle input:checked + span { background: #6b7280; }
            .header-theme-toggle input:checked + span::before { transform: translateX(16px); }
            .header-theme-toggle input:focus-visible + span { outline: 2px solid #6b7280; outline-offset: 2px; }

            .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; margin-bottom: 2rem; }
            #pageCitizen .stats-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); }
            .stat-card { background: white; border-radius: 20px; padding: 1.5rem; border: 1px solid #e9eef3; box-shadow: 0 2px 8px rgba(0,0,0,0.02); }
            .stat-card .number { font-size: 2.2rem; font-weight: 700; color: #0b2a3b; }
            .stat-card .label { font-size: 0.85rem; color: #64748b; margin-top: 4px; display: flex; align-items: center; gap: 6px; }
            .data-refresh-transition { animation: dataRefreshIn 0.35s ease-out; }
            @keyframes dataRefreshIn { from { opacity: 0.45; } to { opacity: 1; } }
            @media (prefers-reduced-motion: reduce) {
                .data-refresh-transition { animation: none; }
            }

            .admin-header-nav { display: flex; gap: 0.4rem; align-items: center; flex-wrap: wrap; }
            .admin-header-nav-item {
                padding: 0.6rem 1rem; border: none; background: transparent;
                border-radius: 10px; font-size: 0.82rem; font-weight: 600;
                color: #64748b; cursor: pointer; display: flex; align-items: center; gap: 6px;
                transition: all 0.2s ease;
            }
            .admin-header-nav-item:hover { background: rgba(45,122,79,0.1); color: #2d7a4f; }
            .admin-header-nav-item.active { background: #2d7a4f; color: white; }
            .admin-tab-content { min-height: 400px; }
            .admin-tab-pane { display: none; }
            .admin-tab-pane.active { display: block; }

            .main-grid { display: grid; grid-template-columns: 2fr 1fr; gap: 1.5rem; }
            .card { background: white; border-radius: 24px; padding: 1.5rem 1.8rem; border: 1px solid #e9eef3; box-shadow: 0 2px 8px rgba(0,0,0,0.02); }
            .card-header { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 0.75rem; margin-bottom: 1rem; }
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
                border: none; border-radius: 12px; background: #f8fafc;
                color: #1e293b; font: inherit; font-size: 0.85rem;
            }
            .admin-report-search-input input:focus { outline: none; background: white; }
            .admin-report-search-button, .admin-report-filter-toggle {
                display: inline-flex; align-items: center; justify-content: center; gap: 0.4rem;
                min-height: 42px; padding: 0.55rem 0.8rem; border: 1px solid #e2e8f0;
                border-radius: 12px; font: inherit; font-size: 0.82rem; font-weight: 600; cursor: pointer;
            }
            .admin-report-search-button { background: #2d7a4f; border-color: #2d7a4f; color: white; }
            .admin-report-search-button:hover { background: #246641; }
            .admin-report-filter-toggle { background: white; color: #334155; }
            .admin-report-filter-toggle[aria-expanded="true"] { border-color: #2d7a4f; color: #246641; background: #f0fdf4; }
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
            .list-expansion-control {
                width: 100%; display: flex; align-items: center; justify-content: center; gap: 7px;
                margin-top: 0.35rem; padding: 0.7rem 0.5rem; border: 0;
                border-top: 1px solid #f0f4f9; background: transparent;
                color: #2563eb; font: inherit; font-size: 0.82rem; font-weight: 600; cursor: pointer;
            }
            .list-expansion-control:hover { background: #f8fafc; }

            .badge { display: inline-block; padding: 4px 14px; border-radius: 40px; font-size: 0.7rem; font-weight: 600; letter-spacing: 0.3px; text-transform: uppercase; }
            .badge-pending { background: #fef9c3; color: #854d0e; }
            .badge-review { background: #dbeafe; color: #1e4a7a; }
            .badge-assigned { background: #e0f2fe; color: #0369a1; }
            .badge-progress { background: #f3e8ff; color: #6b21a5; }
            .badge-completed { background: #dcfce7; color: #166534; }
            .badge-rejected { background: #fee2e2; color: #991b1b; }
            .badge-rated { background: #fef3c7; color: #92400e; }

            .report-time, .task-time { font-size: 0.75rem; color: #94a3b8; }
            .report-send-pending { opacity: 0.78; }
            .report-send-state { display: inline-flex; align-items: center; gap: 5px; color: #64748b; font-size: 0.72rem; }
            body.dark-mode .report-send-state { color: #cbd5e1; }

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
            .track-step.review .step-icon { animation: reviewPulse 1.2s ease-in-out infinite; }
            @keyframes reviewPulse {
                0%, 100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(229,231,235,0.45); }
                50% { transform: scale(1.14); box-shadow: 0 0 0 9px rgba(229,231,235,0); }
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
            .track-btn.report-rate-btn { width: 34px; height: 18px; flex: 0 0 34px; justify-content: center; padding: 0; }
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
            .gps-indicator.error { display: inline-flex; color: #92400e; background: #fef3c7; border-color: #fde68a; }
            .gps-indicator .gps-dot {
                width: 7px; height: 7px; border-radius: 50%; background: #16a34a;
                animation: livePulse 1.6s ease infinite;
            }
            .gps-indicator.error .gps-dot { background: #d97706; animation: none; }
            #gpsSharingIndicator { display: none !important; }
            #gpsSharingText { display: none; }

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
                border-bottom: 1px solid #f0f4f9; transition: all 0.2s ease;
                border-left: 3px solid transparent;
            }
            .notification-item:last-child { border-bottom: none; }
            .notification-item .notif-icon {
                width: 32px; height: 32px; border-radius: 50%; background: #dbeafe;
                display: flex; align-items: center; justify-content: center;
                color: #1e4a7a; font-size: 0.8rem; flex-shrink: 0;
            }
            body.dark-mode .notification-item .notif-icon {
                background: rgba(75, 155, 100, 0.2);
                color: #4b9b64;
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
                border-radius: 14px; padding: 0.8rem 0.95rem;
            }
            .comment-bubble.mine {
                background: #eff6ff; border-color: #bfdbfe;
            }
            .comment-meta {
                display: flex; align-items: center; justify-content: space-between;
                gap: 10px; margin-bottom: 6px; flex-wrap: wrap;
            }
            .comment-author {
                font-weight: 600; font-size: 0.88rem; color: #0b2a3b;
                display: inline-flex; align-items: center; gap: 10px;
            }
            .comment-avatar {
                width: 42px; height: 42px; border-radius: 50%;
                overflow: hidden; flex-shrink: 0;
                display: inline-flex; align-items: center; justify-content: center;
                background: #e2e8f0; border: 2px solid #fff;
                box-shadow: 0 2px 5px rgba(0,0,0,0.12);
            }
            .comment-avatar img {
                width: 100%; height: 100%; object-fit: cover; display: block;
            }
            .comment-avatar i {
                font-size: 1.15rem; color: #64748b;
            }
            .comment-avatar.admin {
                background: #fef3c7; color: #92400e; border-color: #fde68a;
            }
            .comment-avatar.admin i { color: #92400e; }
            .comment-avatar.maintenance {
                background: #e0e7ff; color: #3730a3; border-color: #c7d2fe;
            }
            .comment-avatar.maintenance i { color: #3730a3; }
            .comment-avatar.citizen {
                background: #dbeafe; color: #1e40af; border-color: #bfdbfe;
            }
            .comment-avatar.citizen i { color: #1e40af; }
            .comment-role {
                font-size: 0.65rem; font-weight: 600; text-transform: uppercase;
                letter-spacing: 0.03em; padding: 3px 8px; border-radius: 40px;
            }
            .comment-role.citizen { background: #dbeafe; color: #1e40af; }
            .comment-role.admin { background: #fef3c7; color: #92400e; }
            .comment-role.maintenance { background: #e0e7ff; color: #3730a3; }
            .comment-time { font-size: 0.65rem; color: #94a3b8; }
            .comment-bubble.pending { opacity: 0.72; }
            .comment-bubble.pending .comment-time { font-style: italic; }
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
                border: none; border-radius: 12px;
                padding: 0.7rem 0.85rem; font-family: inherit;
                font-size: 0.85rem; color: #0b2a3b; background: #f8fafc;
            }
            .comment-compose textarea:focus {
                outline: none; background: #fff;
            }
            .comment-compose-actions {
                display: flex; justify-content: flex-end; gap: 8px;
            }

            .empty-state { text-align: center; padding: 2rem 1rem; color: #94a3b8; }
            .empty-state i { font-size: 2.5rem; opacity: 0.4; margin-bottom: 0.6rem; display: block; }
            .empty-state .empty-title { font-weight: 500; font-size: 0.95rem; color: #64748b; }
            .empty-state .empty-desc { font-size: 0.8rem; margin-top: 4px; }
            .data-loading-state,
            .data-load-error {
                min-height: 68px; display: flex; align-items: center; justify-content: center;
                gap: 10px; padding: 1rem; color: #64748b; font-size: 0.85rem;
            }
            .data-loading-state i { color: #2d7a4f; animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite; }
            .data-load-error { flex-wrap: wrap; }
            body.dark-mode .data-loading-state,
            body.dark-mode .data-load-error { color: #cbd5e1; }
            .metric-loading-spinner { color: #2d7a4f; font-size: 0.65em; animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite; }

            /* Enhanced Loading Animations */
            @keyframes pulse-spin {
                0% { transform: scale(1) rotate(0deg); opacity: 1; }
                50% { transform: scale(1.1) rotate(180deg); opacity: 0.8; }
                100% { transform: scale(1) rotate(360deg); opacity: 1; }
            }

            @keyframes fade-pulse {
                0%, 100% { opacity: 0.4; }
                50% { opacity: 1; }
            }

            @keyframes shimmer {
                0% { background-position: -200% 0; }
                100% { background-position: 200% 0; }
            }

            @keyframes blue-glow {
                0% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0.7); }
                50% { box-shadow: 0 0 20px 10px rgba(59, 130, 246, 0.5); }
                100% { box-shadow: 0 0 0 0 rgba(59, 130, 246, 0); }
            }

            @keyframes red-glow {
                0% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.7); }
                50% { box-shadow: 0 0 20px 10px rgba(239, 68, 68, 0.5); }
                100% { box-shadow: 0 0 0 0 rgba(239, 68, 68, 0); }
            }

            @keyframes green-glow {
                0% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0.7); }
                50% { box-shadow: 0 0 20px 10px rgba(34, 197, 94, 0.5); }
                100% { box-shadow: 0 0 0 0 rgba(34, 197, 94, 0); }
            }

            @keyframes violet-glow {
                0% { box-shadow: 0 0 0 0 rgba(124, 58, 237, 0.7); }
                50% { box-shadow: 0 0 20px 10px rgba(124, 58, 237, 0.5); }
                100% { box-shadow: 0 0 0 0 rgba(124, 58, 237, 0); }
            }

            .task-glow-blue { animation: blue-glow 1s ease-out; }
            .task-glow-red { animation: red-glow 1s ease-out; }
            .task-glow-green { animation: green-glow 1s ease-out; }
            .task-glow-violet { animation: violet-glow 1s ease-out; }

            .loading-skeleton {
                background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
                background-size: 200% 100%;
                animation: shimmer 1.5s infinite;
                border-radius: 4px;
            }

            body.dark-mode .loading-skeleton {
                background: linear-gradient(90deg, #334155 25%, #475569 50%, #334155 75%);
                background-size: 200% 100%;
            }

            .loading-dots::after {
                content: '';
                animation: dots 1.5s steps(4, end) infinite;
            }

            @keyframes dots {
                0%, 20% { content: ''; }
                40% { content: '.'; }
                60% { content: '..'; }
                80%, 100% { content: '...'; }
            }

            .btn-loading {
                position: relative;
                pointer-events: none;
            }

            .btn-loading::before {
                content: '';
                position: absolute;
                inset: 0;
                background: rgba(255, 255, 255, 0.3);
                border-radius: inherit;
                animation: btn-pulse 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            }

            @keyframes btn-pulse {
                0%, 100% { opacity: 0; }
                50% { opacity: 1; }
            }

            #nearbyMap { width: 100%; height: 220px; border-radius: 16px; background: #e9eef3; border: 1px solid #cbd9e8; margin-top: 0.5rem; }
            .incident-map-marker { background: none; border: 0; }
            .incident-map-marker svg { overflow: visible; }
            .live-destination-marker, .live-team-marker { background: none; border: 0; }
            .live-destination-marker svg, .live-team-marker svg { overflow: visible; }
            @media (prefers-reduced-motion: reduce) {
                .incident-map-marker animate, .incident-map-marker animateTransform,
                .live-destination-marker animate, .live-destination-marker animateTransform,
                .live-team-marker animate, .live-team-marker animateTransform { display: none; }
            }
            #reportLocationMap { width: 100%; height: 260px; background: #e9eef3; }
            .report-details-map { width: 100%; height: 220px; margin-top: 0.6rem; border: 1px solid #cbd9e8; border-radius: 12px; background: #e9eef3; overflow: hidden; }
            .report-details-map-fallback { display: none; margin-top: 0.6rem; padding: 0.75rem; border: 1px solid #e2e8f0; border-radius: 10px; background: #f8fafc; color: #64748b; font-size: 0.82rem; }
            #maintMap { width: 100%; height: 240px; border-radius: 16px; background: #e9eef3; border: 1px solid #cbd9e8; }
            .task-map-marker-icon { background: transparent; border: 0; }
            .task-map-marker { position: relative; display: block; width: 24px; height: 24px; --task-marker-color: #3b82f6; }
            .task-map-marker-pulse { position: absolute; inset: 2px; border-radius: 50%; background: var(--task-marker-color); animation: taskMapPulse 1.8s ease-out infinite; }
            .task-map-marker-dot { position: absolute; inset: 6px; border: 2px solid white; border-radius: 50%; background: var(--task-marker-color); box-shadow: 0 1px 4px rgba(15,23,42,0.35); }
            @keyframes taskMapPulse { from { opacity: 0.65; transform: scale(0.45); } to { opacity: 0; transform: scale(1.8); } }
            @keyframes taskMapPulseReduced { 0%, 100% { opacity: 0.24; } 50% { opacity: 0.58; } }
            @media (prefers-reduced-motion: reduce) { .task-map-marker-pulse { animation: taskMapPulseReduced 2.4s ease-in-out infinite; } }
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
            .modal-overlay.stack-modal { z-index: 1100; }

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
            .complete-photo-change { display: inline-flex; align-items: center; gap: 5px; padding: 4px 8px; border: 0; border-radius: 6px; background: #e2e8f0; color: #334155; font: inherit; font-size: 0.75rem; cursor: pointer; }
            .complete-photo-change:hover { background: #cbd5e1; }
            .photo-preview .remove-photo {
                margin-left: auto; color: #dc2626;
                cursor: pointer; font-weight: 600; font-size: 0.8rem;
            }

            .form-actions {
                display: flex; gap: 10px; justify-content: flex-end;
                margin-top: 1.5rem; padding-top: 1rem;
                border-top: 1px solid #f0f4f9;
            }

            .category-input-row { display: grid; grid-template-columns: 46px minmax(0, 1fr); gap: 10px; align-items: center; }
            .category-icon-preview { width: 46px; height: 46px; display: grid; place-items: center; border: 1px solid #bbd6c4; border-radius: 12px; background: #f0fdf4; color: #2d7a4f; font-size: 1.15rem; }
            .category-input-row input { width: 100%; min-width: 0; min-height: 46px; padding: 0.7rem 0.85rem; border: none; border-radius: 12px; background: #f8fafc; color: #183b3a; font: inherit; }
            .category-input-row input:focus { outline: none; background: #fff; }
            .category-detection { min-height: 1rem; margin-top: 0.4rem; color: #64748b; font-size: 0.75rem; }
            body.dark-mode .category-icon-preview { border-color: #475569; background: #334155; color: #86efac; }
            body.dark-mode .category-input-row input { border: none; background: rgba(255, 255, 255, 0.08); color: #f3f4f6; }
            body.dark-mode .category-input-row input:focus { background: rgba(255, 255, 255, 0.12); }
            body.dark-mode .category-detection { color: #aab7b2; }

            .profile-avatar {
                width: 80px; height: 80px; border-radius: 50%;
                background: linear-gradient(145deg, #2d7a4f, #1a4d33);
                display: flex; align-items: center; justify-content: center;
                font-size: 2.5rem; color: white; margin: 0 auto 1rem;
                box-shadow: 0 4px 20px rgba(45,122,79,0.3);
                position: relative; overflow: hidden;
            }
            .profile-avatar img {
                width: 100%; height: 100%; object-fit: cover; display: block; border-radius: 50%;
            }
            .user-badge-avatar {
                display: inline-flex; align-items: center; justify-content: center;
            }
            .user-badge-img {
                width: 24px; height: 24px; border-radius: 50%; object-fit: cover; display: inline-block; vertical-align: middle;
            }
            .avatar-edit-wrap {
                display: flex; flex-direction: column; align-items: center; gap: 8px; margin-bottom: 1.2rem;
            }
            .avatar-edit-preview {
                width: 88px; height: 88px; border-radius: 50%;
                background: linear-gradient(145deg, #2d7a4f, #1a4d33);
                display: flex; align-items: center; justify-content: center;
                font-size: 2.6rem; color: white; overflow: hidden;
                box-shadow: 0 4px 16px rgba(0,0,0,0.12);
                border: 3px solid #2d7a4f; cursor: pointer; position: relative;
            }
            .avatar-edit-preview img {
                width: 100%; height: 100%; object-fit: cover; display: block;
            }
            .avatar-edit-overlay {
                position: absolute; inset: 0; background: rgba(0,0,0,0.5);
                display: flex; align-items: center; justify-content: center;
                opacity: 0; transition: opacity 0.2s ease; color: white; font-size: 1.2rem;
                border-radius: 50%;
            }
            .avatar-edit-preview:hover .avatar-edit-overlay { opacity: 1; }
            .avatar-btn-row {
                display: flex; gap: 8px; align-items: center; margin-top: 4px;
            }
            .profile-name { text-align: center; font-size: 1.3rem; font-weight: 700; color: #0b2a3b; }
            .profile-role { text-align: center; color: #64748b; font-size: 0.9rem; margin-top: 2px; }

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
                border-radius: 40px; padding: 4px 12px; width: 240px; min-width: 0;
            }
            .task-search i { color: #94a3b8; font-size: 0.8rem; }
            .task-search input {
                border: none; background: transparent; outline: none;
                font-family: inherit; font-size: 0.8rem; padding: 4px 6px;
                color: #1e293b; width: 100%; min-width: 0;
            }
            .task-toolbar { display: flex; align-items: center; gap: 8px; min-width: 0; }
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
                position: fixed; top: 24px; right: 24px;
                background: rgba(255, 255, 255, 0.95);
                backdrop-filter: blur(10px);
                color: #1e293b;
                padding: 12px 16px;
                border-radius: 12px;
                box-shadow: 0 4px 20px rgba(0,0,0,0.08);
                border: 1px solid rgba(0,0,0,0.06);
                display: none; align-items: center; gap: 10px;
                animation: slideIn 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                z-index: 2000; max-width: 320px;
                font-size: 0.85rem;
            }
            .success-toast.show { display: flex; }
            @keyframes slideIn {
                from { transform: translateX(20px); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            .success-toast i { font-size: 1rem; color: #2d7a4f; }
            .success-toast .toast-content { flex: 1; min-width: 0; }
            .success-toast .toast-title { font-weight: 500; font-size: 0.85rem; color: #1e293b; }
            .success-toast .toast-desc { font-size: 0.75rem; color: #64748b; margin-top: 2px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
            .success-toast .toast-close {
                background: none; border: none;
                color: #94a3b8; font-size: 0.9rem;
                cursor: pointer; opacity: 0.6;
                padding: 4px; border-radius: 6px;
                transition: all 0.2s ease;
            }
            .success-toast .toast-close:hover {
                opacity: 1; background: rgba(0,0,0,0.05);
                color: #64748b;
            }
            body.dark-mode .success-toast {
                background: rgba(30, 41, 59, 0.95);
                backdrop-filter: blur(10px);
                color: #f1f5f9;
                border-color: rgba(255,255,255,0.08);
                box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            }
            body.dark-mode .success-toast i { color: #86efac; }
            body.dark-mode .success-toast .toast-title { color: #f1f5f9; }
            body.dark-mode .success-toast .toast-desc { color: #94a3b8; }
            body.dark-mode .success-toast .toast-close {
                color: #64748b;
            }
            body.dark-mode .success-toast .toast-close:hover {
                background: rgba(255,255,255,0.08);
                color: #94a3b8;
            }

            @media (max-width: 768px) {
                .success-toast {
                    top: 16px; right: 16px; left: 16px;
                    max-width: none;
                    padding: 10px 14px;
                    font-size: 0.8rem;
                }
                .success-toast i { font-size: 0.9rem; }
                .success-toast .toast-title { font-size: 0.8rem; }
                .success-toast .toast-desc { font-size: 0.7rem; }
                .success-toast .toast-close { font-size: 0.85rem; padding: 3px; }
            }

            .rating-stars { display: flex; gap: 4px; align-items: center; }
            .rating-stars .star {
                padding: 0; border: 0; background: transparent; line-height: 1;
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
            .rating-photos { gap: 0.65rem; margin: 0.7rem 0 1rem; }
            .rating-photos .completion-photo-card { padding: 0.65rem; border-radius: 12px; }
            .rating-photos .completion-photo-card img,
            .rating-photo-empty { height: 104px; }
            .rating-photo-empty {
                display: grid; place-items: center; width: 100%;
                border-radius: 12px; background: #e9eef3; color: #64748b;
                font-size: 0.76rem;
            }
            .rating-photo-empty.after { background: #dcfce7; color: #166534; }
            body.dark-mode .rating-photos .completion-photo-card { background: #1e293b; border-color: #334155; }
            body.dark-mode .rating-photos .completion-photo-card.after { background: #173b2b; border-color: #2f6b47; }
            body.dark-mode .rating-photo-empty { background: #334155; color: #cbd5e1; }
            body.dark-mode .rating-photo-empty.after { background: #244832; color: #86efac; }

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
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            }
            body.dark-mode #notificationBadge,
            body.dark-mode #maintenanceNotificationBadge,
            body.dark-mode #adminNotificationBadge {
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.4);
            }
            #notificationBadge, #maintenanceNotificationBadge, #adminNotificationBadge {
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
                transition: all 0.2s ease;
                border-left: 3px solid transparent;
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
                border-left: 3px solid #4b9b64;
            }
            .notification-item.unread:hover {
                background: #dcfce7;
            }
            body.dark-mode .notification-item {
                background: transparent;
                border-bottom-color: #334155;
            }
            body.dark-mode .notification-item:hover {
                background: rgba(255, 255, 255, 0.05);
            }
            body.dark-mode .notification-item.unread {
                background: transparent;
                border-left: 3px solid #4b9b64;
            }
            body.dark-mode .notification-item.unread:hover {
                background: rgba(75, 155, 100, 0.1);
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

            .header-icon-btn {
                position: relative;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 38px;
                height: 38px;
                border-radius: 10px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                background: rgba(255, 255, 255, 0.12);
                color: #ffffff;
                font-size: 1rem;
                cursor: pointer;
                transition: all 0.2s ease;
                padding: 0;
            }
            .header-icon-btn:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: translateY(-1px);
            }
            .header-icon-badge {
                position: absolute;
                top: -5px;
                right: -6px;
                min-width: 18px;
                height: 18px;
                padding: 0 4px;
                border-radius: 999px;
                background: #dc2626;
                color: #ffffff;
                font-size: 0.65rem;
                font-weight: 700;
                display: none;
                align-items: center;
                justify-content: center;
                border: 2px solid #2d7a4f;
                line-height: 1;
                pointer-events: none;
            }
            body.dark-mode .header-icon-btn {
                background: #334155;
                border-color: #475569;
                color: #f3f4f6;
            }
            body.dark-mode .header-icon-btn:hover {
                background: #2e343a;
                border-color: #4b525a;
            }
            body.dark-mode .header-icon-badge {
                border-color: #1e293b;
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
            .chat-modal-overlay.minimized {
                inset: auto 18px 18px auto;
                display: block;
                width: auto;
                height: auto;
                padding: 0;
                background: transparent;
                backdrop-filter: none;
                pointer-events: none;
            }
            .chat-modal-overlay.minimized .chat-modal-box { display: none; }
            .chat-modal-overlay.minimized .chat-minimized-launcher { display: inline-flex; }
            .chat-minimized-launcher {
                display: none;
                align-items: center;
                gap: 10px;
                padding: 12px 16px;
                border: 0;
                border-radius: 999px;
                background: #2d7a4f;
                color: #fff;
                box-shadow: 0 8px 24px rgba(15, 23, 42, 0.24);
                font: inherit;
                font-weight: 700;
                cursor: pointer;
                pointer-events: auto;
            }
            .chat-minimized-unread {
                display: none;
                min-width: 20px;
                height: 20px;
                padding: 0 5px;
                align-items: center;
                justify-content: center;
                border-radius: 999px;
                background: #dc2626;
                color: #fff;
                font-size: 0.7rem;
            }
            body.dark-mode .chat-minimized-launcher { background: #2d7a4f; color: #fff; }
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
            .chat-sidebar-close {
                display: none;
                width: 32px;
                height: 32px;
                align-items: center;
                justify-content: center;
                border: 1px solid #dbe5ef;
                border-radius: 50%;
                background: #f8fafc;
                color: #334155;
                cursor: pointer;
                font-size: 0.9rem;
            }
            .chat-sidebar-close:hover {
                background: #e2e8f0;
                color: #dc2626;
                border-color: rgba(220, 38, 38, 0.3);
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
                color: #1e293b;
            }
            .chat-search input::placeholder {
                color: #94a3b8;
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
            .chat-header-actions { display: flex; align-items: center; gap: 8px; flex-shrink: 0; }
            .chat-window-control,
            .chat-mobile-back {
                width: 36px;
                height: 36px;
                display: inline-grid;
                place-items: center;
                border: 1px solid #dbe5ef;
                border-radius: 50%;
                background: #f8fafc;
                color: #334155;
                cursor: pointer;
            }
            .chat-header-actions button:first-child:hover {
                background: rgba(220, 38, 38, 0.1);
                color: #dc2626;
                border-color: rgba(220, 38, 38, 0.3);
            }
            .chat-mobile-back { display: none; }
            body.dark-mode .chat-window-control,
            body.dark-mode .chat-mobile-back {
                border-color: #475569;
                background: #334155;
                color: #f3f4f6;
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
            .chat-message-row.pending { opacity: 0.72; }
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
                color: #64748b;
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
            .chat-image-preview {
                display: flex;
                align-items: center;
                gap: 10px;
                margin-bottom: 10px;
                padding: 8px;
                border: 1px solid #dbe5ef;
                border-radius: 12px;
                background: #f8fafc;
            }
            .chat-image-preview[hidden] { display: none; }
            .chat-image-preview img {
                display: block;
                width: 64px;
                height: 52px;
                flex: 0 0 auto;
                border-radius: 8px;
                object-fit: cover;
                background: #e2e8f0;
            }
            .chat-image-preview-meta { flex: 1; min-width: 0; }
            .chat-image-preview-title { color: #334155; font-size: 0.78rem; font-weight: 700; }
            .chat-image-preview-name {
                overflow: hidden;
                color: #64748b;
                font-size: 0.72rem;
                text-overflow: ellipsis;
                white-space: nowrap;
            }
            .chat-image-preview-remove {
                width: 32px;
                height: 32px;
                flex: 0 0 auto;
                border: 0;
                border-radius: 50%;
                background: #e2e8f0;
                color: #334155;
                cursor: pointer;
            }
            body.dark-mode .chat-image-preview-title { color: #f3f4f6; }
            body.dark-mode .chat-image-preview-name { color: #cbd5e1; }
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
                color: #1e293b;
            }
            .chat-input-row input::placeholder {
                color: #94a3b8;
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

            @media (max-width: 1024px) {
                .stats-grid { grid-template-columns: repeat(2, 1fr); }
                #pageCitizen .stats-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            }
            @media (max-width: 768px) {
                .header { flex-direction: row; align-items: center; gap: 0.5rem; }
                .header-right { width: auto; flex-wrap: nowrap; }
                .header-menu-panel {
                    position: fixed;
                    right: 8px;
                    top: 50px;
                    left: auto;
                    max-width: 180px;
                    width: auto;
                }
                .header-left h1 { font-size: 0; }
                .header-left h1 i { font-size: 1.3rem; }
                .header-left h1::after { content: ''; }
                .user-badge { padding: 3px 8px; font-size: 0.7rem; gap: 4px; }
                .user-badge-avatar { display: none; }
                .fa-chevron-down { display: none; }
                .header-icon-btn { padding: 8px; }
                .header-icon-btn i { font-size: 0.9rem; }
                .btn-sm { padding: 0.3rem 0.6rem; font-size: 0.75rem; }
                .main-grid { grid-template-columns: 1fr; }
                .stats-grid { grid-template-columns: 1fr 1fr; }
                .chat-modal-overlay { padding: 0; align-items: stretch; }
            }
            @media (max-width: 480px) {
                .header-left h1 { font-size: 0 !important; }
                .header-left h1 i { font-size: 1.2rem; }
            }
                .chat-modal-box {
                    width: 100%;
                    height: 100vh;
                    height: 100dvh;
                    max-height: 100dvh;
                    grid-template-columns: minmax(0, 1fr);
                    grid-template-rows: minmax(0, 1fr);
                    border: 0;
                    border-radius: 0;
                }
                .chat-modal-overlay[data-mobile-view="contacts"] .chat-main { display: none; }
                .chat-modal-overlay[data-mobile-view="thread"] .chat-sidebar { display: none; }
                .chat-modal-overlay[data-mobile-view="thread"] .chat-mobile-back { display: inline-grid !important; }
                .chat-modal-overlay[data-mobile-view="contacts"] .chat-sidebar-close { display: inline-flex !important; }
                .chat-sidebar { border: 0; max-height: none; min-height: 0; }
                .chat-header { padding: 12px 14px; gap: 8px; }
                .chat-header-left { min-width: 0; gap: 8px; }
                .chat-mobile-back { display: inline-grid; flex: 0 0 auto; }
                .chat-window-control { width: 34px; height: 34px; }
                .chat-current-name { max-width: 42vw; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; }
                .chat-thread { padding: 14px 12px 8px; }
                .chat-bubble { max-width: 88%; font-size: 0.9rem; }
                .chat-composer { padding: 12px 12px calc(12px + env(safe-area-inset-bottom)); }
                .chat-image-preview img { width: 56px; height: 48px; }
                .chat-photo-picker { margin-bottom: 8px; }
                .chat-input-row { gap: 8px; }
                .chat-input-row input { min-width: 0; padding: 0.75rem 0.9rem; }
                .chat-send-btn { width: 44px; height: 44px; padding: 0; display: inline-grid; place-items: center; flex: 0 0 auto; }
                .chat-send-btn span { display: none; }
                .chat-modal-overlay.minimized { inset: auto 12px calc(12px + env(safe-area-inset-bottom)) auto; }
                .report-item, .task-item { flex-direction: column; align-items: flex-start; gap: 8px; }
                .modal-box { padding: 1.5rem; }
            }
            @media (max-width: 600px) {
                .task-toolbar { width: 100%; }
                .task-search { flex: 1; width: auto; }
            }
            @media (max-width: 480px) {
                .stats-grid { grid-template-columns: 1fr; }
                #pageCitizen .stats-grid { grid-template-columns: 1fr; }
                .header-left h1 { font-size: 1.2rem; }
                .card { padding: 1.2rem; }
                #reportLocationMap, #nearbyMap, #maintMap, .live-track-map { height: 200px; }
                .login-container { padding: 2rem 1.2rem; }
                .metric-grid { grid-template-columns: 1fr; }
                .bar-chart { height: 120px; }
            }

            @media (max-width: 520px) {
                .admin-report-searchbar { grid-template-columns: minmax(0, 1fr) auto; }
                .admin-report-search-input { grid-column: 1 / -1; }
                .admin-report-search-button { justify-self: start; }
                .admin-report-filters { grid-template-columns: minmax(0, 1fr); }
                .admin-header-nav { gap: 0.3rem; }
                .admin-header-nav-item { padding: 0.5rem 0.8rem; font-size: 0.75rem; }
            }

            /* Shared GreenSteps finish for the existing sign-in and dashboard layouts */
            body:not(.dark-mode) { background: #eef4ef; color: #183b3a; }
            .login-container {
                border: 1px solid #dce7e0;
                border-radius: 16px;
                box-shadow: 0 18px 48px rgba(24,59,50,0.09);
            }
            .logo h1 { color: #183b3a; letter-spacing: 0; }
            .divider { height: 1px; background: #e2ebe5; }
            .role-buttons { gap: 10px; }
            .role-btn {
                border: 1px solid #dce7e0;
                border-radius: 12px;
                box-shadow: 0 2px 8px rgba(24,59,50,0.035);
            }
            .role-btn:hover { transform: translateY(-1px); box-shadow: 0 7px 18px rgba(24,59,50,0.09); }
            .role-icon { border-radius: 11px; }
            .form-group input, .form-group select, .form-group textarea { border-radius: 10px; }
            .form-group input:focus, .form-group select:focus, .form-group textarea:focus { outline: none; }
            .btn { border-radius: 8px; box-shadow: none; }
            .btn:hover { transform: translateY(-1px); }
            .btn-sm, .btn-sm-admin, .admin-header-nav-item { border-radius: 7px; }
            .btn-map { border-radius: 8px; }
            .dashboard-container .header {
                background: #1d4e3c;
                border: 1px solid rgba(255,255,255,0.08);
                border-radius: 12px;
                padding: 1.25rem 1.6rem;
                box-shadow: 0 8px 22px rgba(24,59,50,0.12);
            }
            .dashboard-container .header-left h1 { color: #ffffff; }
            .dashboard-container .card {
                border: 1px solid #dce7e0;
                border-radius: 12px;
                box-shadow: 0 4px 16px rgba(24,59,50,0.045);
            }
            .dashboard-container .card-header {
                padding-bottom: 12px;
                border-bottom: 1px solid #edf2ee;
            }
            .dashboard-container .card-header h3 { color: #183b3a; font-size: 1.05rem; }
            .dashboard-container .stats-grid { gap: 1rem; }
            .dashboard-container .stat-card {
                border: 1px solid #dce7e0;
                border-radius: 12px;
                box-shadow: 0 3px 12px rgba(24,59,50,0.035);
            }
            .dashboard-container .stat-card .number { color: #214c3d; }
            .modal-box { border-radius: 16px; box-shadow: 0 22px 56px rgba(17,39,31,0.2); }
            .modal-details { border: 1px solid #e0e9e3; border-radius: 10px; }
            .report-item, .task-item { gap: 14px; }
            .report-item:hover, .task-item:hover { background: #f5f9f6; }
            .header-menu-panel { border-radius: 10px; }
            .map-container { border-color: #dce7e0; }

            body.dark-mode { background: #0f172a; color: #e7efea; }
            body.dark-mode .login-container,
            body.dark-mode .dashboard-container .card,
            body.dark-mode .dashboard-container .stat-card,
            body.dark-mode .modal-box {
                background: #1e293b;
                border-color: #334155;
                box-shadow: 0 8px 24px rgba(0,0,0,0.18);
            }
            body.dark-mode .dashboard-container .header { background: #1e293b; border-color: #334155; }
            body.dark-mode .dashboard-container .card-header { background: transparent; border-bottom-color: #334155; }
            body.dark-mode .dashboard-container .card-header h3,
            body.dark-mode .dashboard-container .stat-card .number { color: #e7efea; }
            body.dark-mode .dashboard-container .stat-card .label { color: #b9c9c0; }
            body.dark-mode #pageMaintenance .maintenance-task-status { filter: none !important; border: 1px solid transparent; }
            body.dark-mode #pageMaintenance .maintenance-task-status.badge-assigned { background: #1e3a5f; color: #93c5fd; border-color: #3b82f6; }
            body.dark-mode #pageMaintenance .maintenance-task-status.badge-progress { background: #33244e; color: #d8b4fe; border-color: #5b427e; }
            body.dark-mode #pageMaintenance .maintenance-task-status.badge-completed { background: #1e3a5f; color: #86efac; border-color: #3b82f6; }
            body.dark-mode #pageMaintenance .maintenance-task-status.badge-rejected { background: #442426; color: #fca5a5; border-color: #704044; }
            body.dark-mode #pageMaintenance .maintenance-task-status.badge-pending { background: #43351a; color: #fcd34d; border-color: #725a28; }
            body.dark-mode .role-btn { background: #1e293b; border-color: #334155; }
            body.dark-mode .role-name { color: #f3f7f4 !important; }
            body.dark-mode .role-desc { color: #c1cec7 !important; }
            body.dark-mode .role-btn.citizen-role:hover { background: #334155; border-color: #4b9b64; }
            body.dark-mode .role-btn.maintenance-role:hover { background: #334155; border-color: #5790cf; }
            body.dark-mode .role-btn.admin-role:hover { background: #334155; border-color: #9874d3; }
            body.dark-mode .form-group label { color: #e1e9e4 !important; }
            body.dark-mode .report-item:hover, body.dark-mode .task-item:hover { background: #334155; }
            body.dark-mode .modal-details { background: #1e293b !important; border-color: #334155; }
            body.dark-mode .header-menu-panel { background: #1e293b; border-color: #334155; }

            @media (max-width: 768px) {
                .dashboard-container .header { padding: 1.1rem 1.2rem; }
                .dashboard-container .card { padding: 1.2rem; }
                .dashboard-container .stat-card { padding: 1.1rem; }
            }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <body class="app-booting">
    <div id="appBootLoader" class="app-boot-loader" role="status" aria-live="polite">
        <i class="fas fa-circle-notch" aria-hidden="true" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>
    </div>

    <!-- PUBLIC HOMEPAGE -->
    <div id="pageHome" class="home-page">
        <main>
            <section class="home-hero" aria-labelledby="homeHeroTitle">
                <img class="home-hero-image" src="https://images.unsplash.com/photo-1441974231531-c6227db76b6e?auto=format&amp;fit=crop&amp;w=2200&amp;q=85" alt="Sunlight filtering through a healthy green forest" fetchpriority="high" />
                <div class="home-hero-shade" aria-hidden="true"></div>
                <nav class="home-nav" aria-label="Main navigation">
                    <a class="home-brand" href="#pageHome"><i class="fas fa-leaf" aria-hidden="true"></i><span>GreenSteps</span></a>
                    <div class="home-nav-links">
                        <a href="#homeFeatures">How it works</a>
                        <a href="#homeBenefits">Why GreenSteps</a>
                        <button type="button" class="home-nav-login" onclick="openLoginPage()">Sign in</button>
                    </div>
                </nav>
                <div class="home-hero-content">
                    <p class="home-eyebrow">A better way to care for your community</p>
                    <h1 id="homeHeroTitle">GreenSteps</h1>
                    <p class="home-hero-copy">Spot a local issue? Report it, follow its progress, and help your neighborhood move toward a cleaner, safer place.</p>
                    <div class="home-hero-actions">
                        <button type="button" class="home-cta home-cta-primary" onclick="openLoginPage()"><i class="fas fa-plus" aria-hidden="true"></i> Report an issue</button>
                        <a class="home-cta home-cta-secondary" href="#homeFeatures">Explore GreenSteps <i class="fas fa-arrow-down" aria-hidden="true"></i></a>
                    </div>
                    <p class="home-hero-note">Local reports. Clear updates. Shared progress.</p>
                </div>
            </section>

            <section id="homeFeatures" class="home-section" aria-labelledby="homeFeaturesTitle">
                <div class="home-section-heading">
                    <p class="home-kicker">From report to resolution</p>
                    <h2 id="homeFeaturesTitle">One clear path from noticing to improving.</h2>
                    <p class="home-section-intro">GreenSteps brings residents, coordinators, and maintenance teams into one shared view of local environmental work.</p>
                </div>
                <div class="home-feature-grid">
                    <article class="home-feature">
                        <div class="home-feature-icon"><i class="fas fa-location-dot" aria-hidden="true"></i></div>
                        <h3>Report what you see</h3>
                        <p>Describe an issue, pin its location, and add a photo so the right people can understand it quickly.</p>
                    </article>
                    <article class="home-feature">
                        <div class="home-feature-icon"><i class="fas fa-route" aria-hidden="true"></i></div>
                        <h3>Follow every step</h3>
                        <p>See when a report is reviewed, assigned to a team, underway, and completed.</p>
                    </article>
                    <article class="home-feature">
                        <div class="home-feature-icon"><i class="fas fa-people-carry-box" aria-hidden="true"></i></div>
                        <h3>Coordinate local work</h3>
                        <p>Give maintenance teams clear task details, locations, and a direct way to share progress.</p>
                    </article>
                </div>
            </section>

            <section id="homeBenefits" class="home-benefits" aria-labelledby="homeBenefitsTitle">
                <div class="home-benefits-inner">
                    <div>
                        <p class="home-kicker">Better visibility for everyone</p>
                        <h2 id="homeBenefitsTitle">Small actions add up to visible community care.</h2>
                        <p class="home-benefits-copy">No wondering whether an issue reached the right team. GreenSteps keeps the report, location, conversation, and status together so everyone can stay informed.</p>
                    </div>
                    <ul class="home-benefit-list">
                        <li><i class="fas fa-circle-check" aria-hidden="true"></i><span>Residents can see progress and receive updates on their reports.</span></li>
                        <li><i class="fas fa-circle-check" aria-hidden="true"></i><span>Coordinators can prioritize, assign, and track local tasks.</span></li>
                        <li><i class="fas fa-circle-check" aria-hidden="true"></i><span>Maintenance teams can navigate, document work, and close the loop.</span></li>
                    </ul>
                </div>
            </section>

            <section class="home-final-cta" aria-label="Get started">
                <div>
                    <h2>Ready to take the next step?</h2>
                    <p>Sign in to report an issue or manage community work.</p>
                </div>
                <button type="button" class="home-cta" onclick="openLoginPage()">Get started <i class="fas fa-arrow-right" aria-hidden="true"></i></button>
            </section>
        </main>
        <footer class="home-footer">GreenSteps · Environmental Reporting System</footer>
    </div>

    <!-- LOGIN -->
    <div id="pageLogin" class="login-container" style="display:none;">
        <div class="logo">
            <h1><i class="fas fa-leaf"></i> GreenSteps</h1>
            <div class="subtitle">Environmental Reporting System</div>
        </div>

        <div class="divider"></div>

        <div class="login-title">Welcome to GreenSteps</div>
        <div class="login-subtitle">Sign in to your account</div>

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
                    <input type="password" id="password" placeholder="Enter your password" required class="has-password-toggle" />
                    <button type="button" class="password-toggle" onclick="togglePassword('password')" aria-label="Toggle password visibility">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            <div class="form-options">
                <label><input type="checkbox" checked /> Remember me</label>
                <a onclick="forgotPassword()">Forgot password?</a>
            </div>
            <button type="submit" class="btn-login" id="loginBtn">
                <i class="fas fa-sign-in-alt"></i> <span>Sign In</span>
            </button>
        </form>

        <div class="register-link" id="registerLinkBlock">
            Don't have an account? <a onclick="openRegisterModal()">Register here</a>
        </div>
        <div class="register-link" id="adminRegisterLink" style="display:none;">
            First time setup? <a onclick="openAdminRegisterModal()">Register admin account</a>
        </div>
    </div>

    <!-- CITIZEN DASHBOARD -->
    <div id="pageCitizen" class="dashboard-container">
        <header class="header">
            <div class="header-left">
                <h1><i class="fas fa-leaf"></i> GreenSteps</h1>
                <span class="user-badge" onclick="openProfileModal('citizen')">
                    <span id="citizenBadgeAvatar" class="user-badge-avatar"><i class="fas fa-user-circle"></i></span> <span id="citizenUserName">User</span>
                    <i class="fas fa-chevron-down" style="font-size:0.6rem; opacity:0.7;"></i>
                </span>
            </div>
             <div class="header-right">
                <button class="btn btn-primary" onclick="openReportModal()"><i class="fas fa-plus"></i> New Report</button>
                <button type="button" class="header-icon-btn" onclick="openChatPanel()" title="Chat" aria-label="Open Chat">
                    <i class="fas fa-comments"></i>
                    <span id="citizenChatNavUnread" class="header-icon-badge"></span>
                </button>
                <details class="header-menu">
                    <summary class="btn btn-secondary btn-sm" title="More options" aria-label="More options"><i class="fas fa-bars"></i></summary>
                    <div class="header-menu-panel">
                        <button type="button" class="header-menu-item" onclick="openStatisticsModal(); this.closest('details').open = false;"><i class="fas fa-chart-bar"></i> Statistics</button>
                        <div class="header-menu-theme">
                            <span class="header-menu-theme-title">Dark Mode</span>
                            <label class="header-theme-toggle" title="Toggle dark mode">
                                <input type="checkbox" role="switch" aria-label="Dark Mode" onchange="setTheme(this.checked ? 'dark' : 'light')">
                                <span></span>
                            </label>
                        </div>
                        <button type="button" class="header-menu-item" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </div>
                </details>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card"><div class="number" id="citizenTotalReports">0</div><div class="label"><i class="far fa-file-alt"></i> Total Reports</div></div>
            <div class="stat-card"><div class="number" id="citizenPending">0</div><div class="label"><i class="fas fa-hourglass-half" style="color:#f59e0b;"></i> Pending</div></div>
            <div class="stat-card"><div class="number" id="citizenCompleted">0</div><div class="label"><i class="fas fa-check-circle" style="color:#16a34a;"></i> Completed</div></div>
        </div>

        <div class="main-grid">
            <div class="card">
                <div class="card-header">
                    <h3><i class="fas fa-list-ul"></i> Recent Reports</h3>
                </div>
                <div id="pendingReportList" aria-live="polite"></div>
                <div id="citizenReportsList">
                    <div class="data-loading-state" role="status">
                        <i class="fas fa-circle-notch" aria-hidden="true" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>
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
                    <div class="map-legend task-location-legend" aria-label="Incident status legend">
                        <span class="badge badge-pending"><i class="fas fa-circle task-location-dot" style="--task-location-color:#fbbf24; color:#b45309; font-size:0.5rem;"></i> Pending</span>
                        <span class="badge badge-assigned"><i class="fas fa-circle task-location-dot" style="--task-location-color:#60a5fa; color:#0369a1; font-size:0.5rem;"></i> Assigned</span>
                        <span class="badge badge-progress"><i class="fas fa-circle task-location-dot" style="--task-location-color:#c084fc; color:#6b21a5; font-size:0.5rem;"></i> In Progress</span>
                        <span class="badge badge-completed"><i class="fas fa-circle task-location-dot" style="--task-location-color:#4ade80; color:#166534; font-size:0.5rem;"></i> Completed</span>
                        <span class="badge badge-rejected"><i class="fas fa-circle task-location-dot" style="--task-location-color:#f87171; color:#b91c1c; font-size:0.5rem;"></i> Rejected</span>
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
                    <span id="maintBadgeAvatar" class="user-badge-avatar"><i class="fas fa-hard-hat"></i></span> <span id="maintenanceUserName">Maintenance</span>
                    <i class="fas fa-chevron-down" style="font-size:0.6rem; opacity:0.7;"></i>
                </span>
            </div>
             <div class="header-right" style="display:flex; align-items:center; gap:8px;">
                     <button type="button" class="btn btn-info" onclick="openNavigateModal()"><i class="fas fa-location-dot"></i> Navigate</button>
                <button type="button" class="header-icon-btn" onclick="openChatPanel()" title="Chat" aria-label="Open Chat">
                    <i class="fas fa-comments"></i>
                    <span id="maintenanceChatNavUnread" class="header-icon-badge"></span>
                </button>
                <span id="gpsSharingIndicator" class="gps-indicator" role="status" aria-live="polite">
                    <span class="gps-dot"></span>
                    <span id="gpsSharingText">Sharing location</span>
                </span>
                <details class="header-menu">
                    <summary class="btn btn-secondary btn-sm" title="More options" aria-label="More options"><i class="fas fa-bars"></i></summary>
                    <div class="header-menu-panel">
                        <div class="header-menu-theme">
                            <span class="header-menu-theme-title">Dark Mode</span>
                            <label class="header-theme-toggle" title="Toggle dark mode">
                                <input type="checkbox" role="switch" aria-label="Dark Mode" onchange="setTheme(this.checked ? 'dark' : 'light')">
                                <span></span>
                            </label>
                        </div>
                        <button type="button" class="header-menu-item" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </div>
                </details>
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
                    <div class="task-toolbar">
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
                    <div class="task-location-legend" style="margin-top:0.8rem; display:flex; gap:8px; flex-wrap:wrap;">
                        <span class="badge badge-assigned"><i class="fas fa-circle task-location-dot" style="--task-location-color:#60a5fa; color:#0369a1; font-size:0.5rem;"></i> Assigned</span>
                        <span class="badge badge-progress"><i class="fas fa-circle task-location-dot" style="--task-location-color:#c084fc; color:#6b21a5; font-size:0.5rem;"></i> In Progress</span>
                        <span class="badge badge-completed"><i class="fas fa-circle task-location-dot" style="--task-location-color:#4ade80; color:#166534; font-size:0.5rem;"></i> Completed</span>
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
                    <span id="adminBadgeAvatar" class="user-badge-avatar"><i class="fas fa-user-shield"></i></span> <span id="adminUserName">User</span>
                    <i class="fas fa-chevron-down" style="font-size:0.6rem; opacity:0.7;"></i>
                </span>
            </div>
             <div class="header-right">
                <button type="button" class="header-icon-btn" onclick="openChatPanel()" title="Chat" aria-label="Open Chat">
                    <i class="fas fa-comments"></i>
                    <span id="adminChatNavUnread" class="header-icon-badge"></span>
                </button>
                <details class="header-menu">
                    <summary class="btn btn-secondary btn-sm" title="More options" aria-label="More options"><i class="fas fa-bars"></i></summary>
                    <div class="header-menu-panel">
                        <button type="button" class="header-menu-item" onclick="switchAdminTab('reports'); this.closest('details').open = false;"><i class="fas fa-clipboard-list"></i> Reports</button>
                        <button type="button" class="header-menu-item" onclick="switchAdminTab('notifications'); this.closest('details').open = false;"><i class="fas fa-bell"></i> Notifications</button>
                        <button type="button" class="header-menu-item" onclick="switchAdminTab('applications'); this.closest('details').open = false;"><i class="fas fa-user-clock"></i> Applications</button>
                        <button type="button" class="header-menu-item" onclick="switchAdminTab('teams'); this.closest('details').open = false;"><i class="fas fa-users"></i> Teams</button>
                        <button type="button" class="header-menu-item" onclick="switchAdminTab('leaderboard'); this.closest('details').open = false;"><i class="fas fa-trophy"></i> Leaderboard</button>
                        <button type="button" class="header-menu-item" onclick="switchAdminTab('autoassign'); this.closest('details').open = false;"><i class="fas fa-magic"></i> Auto-Assign</button>
                        <div class="header-menu-theme">
                            <span class="header-menu-theme-title">Dark Mode</span>
                            <label class="header-theme-toggle" title="Toggle dark mode">
                                <input type="checkbox" role="switch" aria-label="Dark Mode" onchange="setTheme(this.checked ? 'dark' : 'light')">
                                <span></span>
                            </label>
                        </div>
                        <button type="button" class="header-menu-item" onclick="handleLogout()"><i class="fas fa-sign-out-alt"></i> Logout</button>
                    </div>
                </details>
            </div>
        </header>

        <div class="stats-grid">
            <div class="stat-card"><div class="number" id="adminTotalReports">0</div><div class="label"><i class="fas fa-file-alt"></i> Total Reports</div></div>
            <div class="stat-card"><div class="number" id="adminPendingReports">0</div><div class="label"><i class="fas fa-clock" style="color:#f59e0b;"></i> Pending</div></div>
            <div class="stat-card"><div class="number" id="adminAssignedReports">0</div><div class="label"><i class="fas fa-user-check" style="color:#2563eb;"></i> Assigned</div></div>
            <div class="stat-card"><div class="number" id="adminCompletedReports">0</div><div class="label"><i class="fas fa-check-double" style="color:#16a34a;"></i> Completed</div></div>
        </div>

        <div class="admin-tab-content">
            <div id="admin-tab-reports" class="admin-tab-pane active">
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
                        <div style="grid-column: 1 / -1; display: flex; justify-content: flex-end;">
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
            </div>

            <div id="admin-tab-notifications" class="admin-tab-pane">
                <div class="card">
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
            </div>

            <div id="admin-tab-applications" class="admin-tab-pane">
                <div class="card">
                    <div class="card-header"><h3><i class="fas fa-user-clock"></i> Maintenance Applications</h3></div>
                    <div id="adminPendingMaintenanceList">
                        <div class="empty-state">
                            <i class="fas fa-user-check"></i>
                            <div class="empty-title">No applications waiting</div>
                            <div class="empty-desc">New maintenance applicants will appear here</div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="admin-tab-teams" class="admin-tab-pane">
                <div class="card">
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
            </div>

            <div id="admin-tab-leaderboard" class="admin-tab-pane">
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
            </div>

            <div id="admin-tab-autoassign" class="admin-tab-pane">
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
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <span id="chatSidebarUnread" class="chat-sidebar-total-unread"></span>
                        <button class="chat-sidebar-close" type="button" onclick="closeChatPanel()" aria-label="Close chat" title="Close chat"><i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="chat-search">
                    <input id="chatSearchInput" type="text" placeholder="Search contacts" oninput="renderChatContacts()" />
                </div>
                <div id="chatPeopleList" class="chat-people-list"></div>
            </aside>

            <section class="chat-main">
                <div class="chat-header">
                    <div class="chat-header-left">
                        <button class="chat-mobile-back" type="button" onclick="showChatContacts()" aria-label="Back to conversations" title="Back to conversations"><i class="fas fa-arrow-left"></i></button>
                        <div id="chatCurrentAvatar" class="chat-current-avatar">?</div>
                        <div>
                            <div id="chatCurrentName" class="chat-current-name">Select a chat</div>
                            <div id="chatCurrentRole" class="chat-current-role">online</div>
                        </div>
                    </div>
                    <div class="chat-header-actions">
                        <button class="chat-window-control" type="button" onclick="deleteChatConversation()" aria-label="Delete conversation" title="Delete conversation"><i class="fas fa-trash"></i></button>
                        <button class="chat-window-control" type="button" onclick="closeChatPanel()" aria-label="Close chat" title="Close chat"><i class="fas fa-times"></i></button>
                    </div>
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
                    <div id="chatImagePreview" class="chat-image-preview" hidden>
                        <img id="chatImagePreviewImage" src="" alt="Selected chat photo preview" />
                        <div class="chat-image-preview-meta">
                            <div class="chat-image-preview-title">Photo attached</div>
                            <div id="chatImagePreviewName" class="chat-image-preview-name"></div>
                        </div>
                        <button class="chat-image-preview-remove" type="button" onclick="removeChatPhoto()" aria-label="Remove attached photo" title="Remove photo"><i class="fas fa-times" aria-hidden="true"></i></button>
                    </div>
                    <div class="chat-photo-picker">
                        <label class="chat-attach" for="chatImageInput">
                            <i class="fas fa-image"></i>
                            <span>Add photo</span>
                            <input id="chatImageInput" type="file" accept="image/jpeg,image/png,image/gif,image/webp" onchange="previewChatPhoto(this)" />
                        </label>
                    </div>
                    <div class="chat-input-row">
                        <input id="chatMessageInput" type="text" placeholder="Type a message..." />
                        <button class="chat-send-btn" type="button" onclick="sendChatMessage()" aria-label="Send message"><i class="fas fa-paper-plane"></i><span>Send</span></button>
                    </div>
                </div>
            </section>
        </div>
        <button id="chatMinimizedLauncher" class="chat-minimized-launcher" type="button" onclick="restoreChatPanel()" aria-label="Restore messages" title="Restore messages">
            <i class="fas fa-comments" aria-hidden="true"></i>
            <span>Messages</span>
            <span id="chatMinimizedUnread" class="chat-minimized-unread"></span>
        </button>
    </div>

    <div id="chatPhotoViewer" class="chat-photo-viewer" aria-hidden="true" onclick="closeChatPhotoViewer(event)">
        <button class="chat-photo-viewer-close" type="button" aria-label="Close photo" onclick="closeChatPhotoViewer(event, true)"><i class="fas fa-times"></i></button>
        <img id="chatPhotoViewerImage" src="" alt="Chat photo" />
    </div>

    <!-- DELETE CONVERSATION CONFIRMATION MODAL -->
    <div id="deleteChatModal" class="modal-overlay" style="z-index: 1400;">
        <div class="modal-box" style="max-width: 420px;">
            <h3><i class="fas fa-trash" style="color:#dc2626;"></i> Delete Conversation</h3>
            <div class="modal-subtitle">Are you sure you want to delete this conversation? This action cannot be undone.</div>
            <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 1.5rem;">
                <button type="button" class="btn btn-secondary" onclick="closeDeleteChatModal()">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmDeleteChat()">Delete</button>
            </div>
        </div>
    </div>

    <!-- LOGOUT CONFIRMATION MODAL -->
    <div id="logoutModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 420px;">
            <h3><i class="fas fa-sign-out-alt" style="color:#dc2626;"></i> Logout</h3>
            <div class="modal-subtitle">Are you sure you want to logout?</div>
            <div style="display: flex; gap: 12px; justify-content: flex-end; margin-top: 1.5rem;">
                <button type="button" class="btn btn-secondary" onclick="closeLogoutModal()">Cancel</button>
                <button type="button" class="btn btn-danger" onclick="confirmLogout()">Logout</button>
            </div>
        </div>
    </div>

    <!-- REGISTER MODAL -->
    <div id="registerModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-user-plus" style="color:#2d7a4f;"></i> Create Account</h3>
            <div class="modal-subtitle" id="registerSubtitle">Join GreenSteps and help your community</div>
            <form id="registerForm" onsubmit="handleRegister(event)">
                <div class="form-group">
                    <label for="regRole">I want to sign up as <span class="required">*</span></label>
                    <div class="input-wrapper">
                        <i class="fas fa-user-tag"></i>
                        <select id="regRole" required onchange="toggleTeamField()">
                            <option value="citizen">Citizen</option>
                            <option value="maintenance">Maintenance</option>
                        </select>
                    </div>
                </div>
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
                    <div class="input-wrapper"><i class="fas fa-lock"></i><input type="password" id="regPassword" placeholder="At least 8 characters" required minlength="8" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('regPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div>
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password <span class="required">*</span></label>
                    <div class="input-wrapper"><i class="fas fa-check-circle"></i><input type="password" id="confirmPassword" placeholder="Confirm password" required class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('confirmPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div>
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
                    <div class="input-wrapper"><i class="fas fa-lock"></i><input type="password" id="newResetPassword" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('newResetPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div>
                </div>
                <div class="form-group">
                    <label for="confirmResetPassword">Confirm Password</label>
                    <div class="input-wrapper"><i class="fas fa-check-circle"></i><input type="password" id="confirmResetPassword" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('confirmResetPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closePasswordModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update password</button>
                </div>
            </form>
            <form id="changePasswordForm" onsubmit="submitChangePassword(event)" style="display:none;">
                <div class="form-group">
                    <label for="currentPassword">Current Password</label>
                    <div class="input-wrapper"><i class="fas fa-lock"></i><input type="password" id="currentPassword" required autocomplete="current-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('currentPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div>
                </div>
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <div class="input-wrapper"><i class="fas fa-lock"></i><input type="password" id="newPassword" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('newPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div>
                </div>
                <div class="form-group">
                    <label for="confirmNewPassword">Confirm New Password</label>
                    <div class="input-wrapper"><i class="fas fa-check-circle"></i><input type="password" id="confirmNewPassword" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('confirmNewPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div>
                </div>
                <div class="form-actions">
                    <button type="button" class="btn btn-secondary" onclick="closePasswordModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">Change Password</button>
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
                <div class="form-group"><label for="adminRegisterPassword">Password</label><div class="input-wrapper"><i class="fas fa-lock"></i><input id="adminRegisterPassword" type="password" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('adminRegisterPassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div></div>
                <div class="form-group"><label for="adminRegisterPasswordConfirm">Confirm Password</label><div class="input-wrapper"><i class="fas fa-check-circle"></i><input id="adminRegisterPasswordConfirm" type="password" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('adminRegisterPasswordConfirm')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div></div>
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
                <div class="form-group"><label for="maintenancePassword">Temporary Password</label><div class="input-wrapper"><i class="fas fa-lock"></i><input id="maintenancePassword" type="password" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('maintenancePassword')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div></div>
                <div class="form-group"><label for="maintenancePasswordConfirm">Confirm Password</label><div class="input-wrapper"><i class="fas fa-check-circle"></i><input id="maintenancePasswordConfirm" type="password" required minlength="8" autocomplete="new-password" class="has-password-toggle" /><button type="button" class="password-toggle" onclick="togglePassword('maintenancePasswordConfirm')" aria-label="Toggle password visibility"><i class="fas fa-eye"></i></button></div></div>
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
                    <div class="category-input-row">
                        <span class="category-icon-preview" aria-hidden="true"><i id="categoryPreviewIcon" class="fas fa-map-pin"></i></span>
                        <input type="text" id="category" placeholder="Describe the issue, e.g. pothole or flooding" required maxlength="200" autocomplete="off" oninput="handleCategoryInput()" />
                    </div>
                    <div id="categoryDetection" class="category-detection" aria-live="polite">The icon will match the words you enter.</div>
                </div>
                <div class="form-group">
                    <label>Location <span class="required">*</span></label>
                    <div class="map-container">
                        <div id="reportLocationMap"></div>
                        <div class="map-hint"><i class="fas fa-location-crosshairs"></i> Detecting your location...</div>
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
                    <div class="upload-area" id="photoUploadArea" onclick="document.getElementById('photoUpload').click()">
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
            <div class="profile-avatar" id="profileAvatarBox">
                <img id="profileImg" src="" style="display:none;" alt="Profile Photo" />
                <i class="fas fa-user" id="profileIcon"></i>
            </div>
            <div class="profile-name" id="profileName">—</div>
            <div class="profile-role" id="profileRole">—</div>
            <div class="profile-menu-item" onclick="openEditProfileModal()">
                <i class="fas fa-user-edit"></i>
                <span class="menu-text">Edit Profile</span>
                <i class="fas fa-chevron-right menu-arrow"></i>
            </div>
            <div class="profile-menu-item" onclick="openPasswordModal()">
                <i class="fas fa-lock"></i>
                <span class="menu-text">Security</span>
                <i class="fas fa-chevron-right menu-arrow"></i>
            </div>
            <div class="profile-menu-item" onclick="openLogoutModal()" style="color:#dc2626;">
                <i class="fas fa-sign-out-alt"></i>
                <span class="menu-text">Logout</span>
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
                    <div class="pref-desc">When a report is received, assigned, started, completed, or rejected</div>
                </div>
                <label class="pref-toggle"><input type="checkbox" id="prefEmailStatus" checked><span></span></label>
            </div>
            <div class="pref-row">
                <div>
                    <div class="pref-label">Notification emails</div>
                    <div class="pref-desc">Email copies of comments and other in-app notifications</div>
                </div>
                <label class="pref-toggle"><input type="checkbox" id="prefEmailNotifications" checked><span></span></label>
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
            <div class="modal-subtitle">Update your name and email</div>
            <form id="editProfileForm" onsubmit="handleEditProfile(event)">
                <div class="avatar-edit-wrap">
                    <div class="avatar-edit-preview" onclick="document.getElementById('editPhotoInput').click()" title="Click to upload profile photo">
                        <img id="editPhotoPreview" src="" style="display:none;" alt="Preview" />
                        <i class="fas fa-user" id="editPhotoIcon"></i>
                        <div class="avatar-edit-overlay"><i class="fas fa-camera"></i></div>
                    </div>
                    <input type="file" id="editPhotoInput" accept="image/jpeg,image/png,image/webp,image/gif" style="display:none;" onchange="handleProfilePhotoSelect(event)" />
                    <div class="avatar-btn-row">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('editPhotoInput').click()">
                            <i class="fas fa-camera"></i> <span id="photoBtnLabel">Upload Photo</span>
                        </button>
                        <button type="button" class="btn btn-sm btn-danger" id="removePhotoBtn" onclick="handleProfilePhotoRemove()" style="display:none;">
                            <i class="fas fa-trash-alt"></i> Remove
                        </button>
                    </div>
                    <div style="font-size:0.75rem; color:#64748b; margin-top:2px;">JPG, PNG, GIF, or WebP (max 5MB)</div>
                </div>
                <div class="form-group">
                    <label for="editFullName">Full Name</label>
                    <div class="input-wrapper"><i class="fas fa-user"></i><input type="text" id="editFullName" placeholder="Enter your full name" required /></div>
                </div>
                <div class="form-group">
                    <label for="editEmail">Email Address</label>
                    <div class="input-wrapper"><i class="fas fa-envelope"></i><input type="email" id="editEmail" placeholder="Enter your email" required /></div>
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
                    <div class="upload-area" id="completeBeforeUploadArea" onclick="chooseCompletePhoto('completeBeforePhoto')">
                        <i class="fas fa-image"></i><div class="upload-text">Click to upload before photo</div>
                        <input type="file" id="completeBeforePhoto" accept="image/*" style="display:none;" onclick="event.stopPropagation()" onchange="handleCompletePhoto(this, 'completeBeforePreview', 'completeBeforeName', 'completeBeforeThumb')" />
                    </div>
                    <img id="completeBeforeThumb" style="display:none; margin-top:10px; border-radius:12px; width:100%; height:140px; object-fit:cover;" />
                    <div id="completeBeforePreview" class="photo-preview">
                        <i class="fas fa-check-circle"></i><span id="completeBeforeName">before.jpg</span>
                        <button type="button" class="complete-photo-change" onclick="chooseCompletePhoto('completeBeforePhoto')" aria-label="Change before photo"><i class="fas fa-rotate"></i> Change</button>
                        <span class="remove-photo" onclick="removeCompletePhoto('completeBeforePhoto', 'completeBeforePreview', 'completeBeforeThumb')">Remove</span>
                    </div>
                </div>
                <div class="form-group">
                    <label>After Photo <span class="required">*</span></label>
                    <div class="upload-area" id="completeAfterUploadArea" onclick="chooseCompletePhoto('completeAfterPhoto')">
                        <i class="fas fa-image"></i><div class="upload-text">Click to upload after photo</div>
                        <input type="file" id="completeAfterPhoto" accept="image/*" style="display:none;" onclick="event.stopPropagation()" onchange="handleCompletePhoto(this, 'completeAfterPreview', 'completeAfterName', 'completeAfterThumb')" />
                    </div>
                    <img id="completeAfterThumb" style="display:none; margin-top:10px; border-radius:12px; width:100%; height:140px; object-fit:cover;" />
                    <div id="completeAfterPreview" class="photo-preview">
                        <i class="fas fa-check-circle"></i><span id="completeAfterName">after.jpg</span>
                        <button type="button" class="complete-photo-change" onclick="chooseCompletePhoto('completeAfterPhoto')" aria-label="Change after photo"><i class="fas fa-rotate"></i> Change</button>
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
                <button type="button" class="btn btn-secondary" onclick="closeReportDetailsModal()" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="modal-subtitle" id="reportDetailsTitle">—</div>
            <img id="reportDetailsPhoto" class="report-photo-full" src="" alt="Report Photo" />
            <div style="margin-top:1rem;">
                <button type="button" class="btn btn-secondary" onclick="toggleReportDetails()" style="width:100%; justify-content:center; margin-bottom:1rem;">
                    <i class="fas fa-eye" id="reportDetailsToggleIcon"></i>
                    <span id="reportDetailsToggleText">Show Details</span>
                </button>
                <div class="modal-details" id="reportDetailsContent" style="display:none;">
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Category</span><span class="detail-value" id="reportDetailsCategory">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-user"></i> Reported By</span><span class="detail-value" id="reportDetailsCitizen">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-envelope"></i> Email</span><span class="detail-value" id="reportDetailsEmail">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-phone"></i> Phone</span><span class="detail-value" id="reportDetailsPhone">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Location</span><span class="detail-value" id="reportDetailsLocation">—</span></div>
                    <div id="reportDetailsMap" class="report-details-map" role="img" aria-label="Map showing the report location"></div>
                    <div id="reportDetailsMapFallback" class="report-details-map-fallback" role="status"></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Status</span><span class="detail-value" id="reportDetailsStatus">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-clock"></i> Submitted</span><span class="detail-value" id="reportDetailsDate">—</span></div>
                    <div class="detail-row"><span class="detail-label"><i class="fas fa-align-left"></i> Description</span><span class="detail-value" id="reportDetailsDescription" style="text-align:left; overflow-wrap:anywhere;">—</span></div>
                </div>
            </div>
            <div class="form-actions" style="margin-top:1.2rem; display:flex; justify-content:flex-start;">
                <button type="button" class="btn btn-primary" onclick="openDiscussionFromReportDetails()" style="display:inline-flex; align-items:center; gap:6px;">
                    <i class="fas fa-comments"></i> Discussion
                </button>
            </div>
        </div>
    </div>

    <div id="navigateModal" class="modal-overlay">
        <div class="modal-box">
            <h3><i class="fas fa-location-dot" style="color:#2563eb;"></i> Navigate to Task</h3>
            <div class="modal-subtitle">Choose an active task to view its location.</div>
            <div class="form-group">
                <label for="navTaskSelect">Active task</label>
                <select id="navTaskSelect" onchange="selectNavigationTask(this.value)"></select>
            </div>
            <div class="modal-details">
                <div class="detail-row"><span class="detail-label"><i class="fas fa-tag"></i> Task</span><span class="detail-value" id="navTaskName">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-map-pin"></i> Destination</span><span class="detail-value" id="navDestination">—</span></div>
                <div class="detail-row"><span class="detail-label"><i class="fas fa-flag"></i> Priority</span><span class="detail-value" id="navPriority">—</span></div>
            </div>
            <div id="navMap"></div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeNavigateModal()"><i class="fas fa-times"></i> Close</button>
                <button type="button" class="btn btn-primary" onclick="startNavigation()"><i class="fas fa-location-arrow"></i> Open Directions</button>
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
                    <option value="">Select a team...</option>
                </select>
            </div>
            <div class="form-actions">
                <button type="button" class="btn btn-secondary" onclick="closeAssignModal()"><i class="fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-admin" id="assignBtn" onclick="confirmAssign()"><i class="fas fa-user-check"></i> Assign Team</button>
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
            <div class="completion-photos rating-photos" aria-label="Maintenance work photos">
                <div class="completion-photo-card">
                    <img id="rateBeforePhoto" src="" alt="Before maintenance work" style="display:none;" />
                    <div id="rateBeforePhotoEmpty" class="rating-photo-empty">No before photo</div>
                    <div class="photo-label">Before</div>
                </div>
                <div class="completion-photo-card after">
                    <img id="rateAfterPhoto" src="" alt="After maintenance work" style="display:none;" />
                    <div id="rateAfterPhotoEmpty" class="rating-photo-empty after">No after photo</div>
                    <div class="photo-label">After</div>
                </div>
            </div>
            <div class="form-group">
                <label>Rating <span class="required">*</span></label>
                <div class="rating-stars" id="ratingStars" role="group" aria-label="Choose a rating from zero to five stars">
                    <button type="button" class="star" data-value="1" onclick="setRating(1)" aria-label="1 star, click again to rate zero stars" title="Click again to choose 0 stars"><i class="fas fa-star"></i></button>
                    <button type="button" class="star" data-value="2" onclick="setRating(2)" aria-label="2 stars"><i class="fas fa-star"></i></button>
                    <button type="button" class="star" data-value="3" onclick="setRating(3)" aria-label="3 stars"><i class="fas fa-star"></i></button>
                    <button type="button" class="star" data-value="4" onclick="setRating(4)" aria-label="4 stars"><i class="fas fa-star"></i></button>
                    <button type="button" class="star" data-value="5" onclick="setRating(5)" aria-label="5 stars"><i class="fas fa-star"></i></button>
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

    <div id="trackDiscussionModal" class="modal-overlay">
        <div class="modal-box" style="max-width: 620px;">
            <div style="display:flex; justify-content:space-between; align-items:flex-start; margin-bottom:0.5rem;">
                <h3><i class="fas fa-comments"></i> Discussion</h3>
                <button type="button" class="btn btn-secondary" onclick="closeTrackDiscussionModal()" aria-label="Close discussion" style="padding:0.3rem 0.8rem;"><i class="fas fa-times"></i></button>
            </div>
            <div class="comments-thread" id="trackDiscussionThread">
                <div class="comments-empty">Select a report to view its discussion.</div>
            </div>
            <div class="comment-compose">
                <textarea id="trackDiscussionInput" placeholder="Ask a question or reply to admin/team…" maxlength="2000"></textarea>
                <div class="comment-compose-actions">
                    <button type="button" class="btn btn-primary" onclick="submitTrackDiscussionComment()">
                        <i class="fas fa-paper-plane"></i> Send
                    </button>
                </div>
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
        let selectedFileDataUrl = null;
        let selectedLocation = null;
        let categoryLookupTimer = null;
        let map = null, marker = null;
        let nearbyMap = null, nearbyMarkers = [];
        let maintMap = null, maintMarkers = [];
        let reportDetailsMap = null, reportDetailsMapMarker = null;
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
        let citizenReportsLoaded = false;
        let cachedNotifications = [];
        let cachedTeams = [];
        let cachedAutoAssignRules = [];
        let loadedChatThreadUserId = null;
        let activeTrackDiscussionReportId = null;

        let completeBeforeDataUrl = null;
        let completeAfterDataUrl = null;

        // Real-time polling state
        let globalPollTimer = null;
        let chatUnreadTimer = null;
        let dashboardRefreshTimer = null;
        let dashboardRefreshInProgress = false;
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
            console.log('API GET requesting:', url);
            try {
                const res = await fetchWithTimeout(url, {
                    credentials: 'same-origin',
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                }, 15000);
                console.log('API GET response status:', res.status, res.statusText);
                const data = await res.json();
                console.log('API GET response data:', data);
                return data;
            } catch (e) {
                console.error('API GET error:', action, e);
                console.error('Error details:', e.name, e.message, e.stack);
                return { success: false, message: e.name === 'AbortError' ? 'The server took too long to respond. Please try again.' : 'Server request failed: ' + e.message };
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

        async function apiDelete(action) {
            const url = `${API_BASE_URL}${action}`;
            let csrf = getCsrfTokenValue();
            if (!csrf) csrf = await refreshCsrfToken();

            const sendRequest = token => fetchWithTimeout(url, {
                method: 'DELETE',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': token,
                    'X-XSRF-TOKEN': getXsrfTokenValue()
                },
                credentials: 'same-origin'
            }, 30000);

            try {
                let response = await sendRequest(csrf);
                if (response.status === 419) {
                    csrf = await refreshCsrfToken();
                    response = await sendRequest(csrf);
                }
                return await response.json();
            } catch (error) {
                console.error('API DELETE error:', action, error);
                return { success: false, message: error.name === 'AbortError' ? 'The server took too long to respond. Please try again.' : 'Server request failed.' };
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

            // Reset any existing swipe
            t.style.transform = '';
            t.style.opacity = '';

            setTimeout(() => t.classList.remove('show'), 4000);
        }

        // Swipe to dismiss functionality
        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('successToast');
            if (!toast) return;

            let touchStartX = 0;
            let touchStartY = 0;
            let isSwiping = false;

            toast.addEventListener('touchstart', function(e) {
                touchStartX = e.touches[0].clientX;
                touchStartY = e.touches[0].clientY;
                isSwiping = true;
                toast.style.transition = 'none';
            }, { passive: true });

            toast.addEventListener('touchmove', function(e) {
                if (!isSwiping) return;

                const touchX = e.touches[0].clientX;
                const touchY = e.touches[0].clientY;
                const diffX = touchX - touchStartX;
                const diffY = touchY - touchStartY;

                // Only swipe horizontally
                if (Math.abs(diffX) > Math.abs(diffY)) {
                    e.preventDefault();
                    toast.style.transform = `translateX(${diffX}px)`;
                    toast.style.opacity = 1 - (Math.abs(diffX) / 200);
                }
            }, { passive: false });

            toast.addEventListener('touchend', function(e) {
                if (!isSwiping) return;
                isSwiping = false;

                const touchX = e.changedTouches[0].clientX;
                const diffX = touchX - touchStartX;

                toast.style.transition = 'transform 0.3s ease, opacity 0.3s ease';

                // Swipe threshold to dismiss
                if (Math.abs(diffX) > 80) {
                    toast.style.transform = `translateX(${diffX > 0 ? 100 : -100}%)`;
                    toast.style.opacity = '0';
                    setTimeout(() => {
                        toast.classList.remove('show');
                        toast.style.transform = '';
                        toast.style.opacity = '';
                    }, 300);
                } else {
                    // Reset position
                    toast.style.transform = '';
                    toast.style.opacity = '';
                }
            });

            // Close header menu when clicking outside
            document.addEventListener('click', function(e) {
                const headerMenus = document.querySelectorAll('.header-menu');
                headerMenus.forEach(menu => {
                    const panel = menu.querySelector('.header-menu-panel');
                    if (!panel) return;

                    // Check if click is outside the menu
                    if (!menu.contains(e.target)) {
                        menu.removeAttribute('open');
                    }
                });
            });
        });

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
            const listId = currentUser?.role === 'maintenance' ? 'maintNotifList' :
                currentUser?.role === 'admin' ? 'adminNotifList' : 'citizenNotifList';
            showDataLoading(listId, 'Loading notifications...');
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
            } else {
                showDataLoadError(listId, 'Could not load notifications.', () => loadNotifications());
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
            chatUnreadTimer = setInterval(refreshChatUnreadBadge, 3000);
            globalPollTimer = setInterval(performPoll, 3000); // Poll every 3 seconds
            dashboardRefreshTimer = setInterval(refreshCurrentDashboardData, 15000);
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
            if (dashboardRefreshTimer) {
                clearInterval(dashboardRefreshTimer);
                dashboardRefreshTimer = null;
            }
            isPolling = false;
        }

        function resolveDataContainer(target) {
            return typeof target === 'string' ? document.getElementById(target) : target;
        }

        function showDataLoading(target, message, force = false) {
            const element = resolveDataContainer(target);
            if (!element || (element.dataset.dataLoaded === 'true' && !force)) return element;
            if (force) delete element.dataset.dataLoaded;

            const state = document.createElement('div');
            state.className = 'data-loading-state';
            state.setAttribute('role', 'status');
            state.innerHTML = '<i class="fas fa-circle-notch" aria-hidden="true" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            element.replaceChildren(state);
            return element;
        }

        function showMetricLoading(ids) {
            ids.forEach(id => {
                const element = document.getElementById(id);
                if (element && element.dataset.metricLoaded !== 'true') {
                    element.innerHTML = '<i class="fas fa-circle-notch metric-loading-spinner" aria-label="Loading" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
                }
            });
        }

        function setMetricValue(id, value, onlyIfUnloaded = false) {
            const element = document.getElementById(id);
            if (!element || (onlyIfUnloaded && element.dataset.metricLoaded === 'true')) return;
            element.textContent = String(value);
            element.dataset.metricLoaded = 'true';
            element.classList.remove('data-refresh-transition');
            void element.offsetWidth;
            element.classList.add('data-refresh-transition');
        }

        function markDataLoaded(target, animate = true) {
            const element = resolveDataContainer(target);
            if (!element) return;
            element.dataset.dataLoaded = 'true';
            if (!animate) return;
            element.classList.remove('data-refresh-transition');
            void element.offsetWidth;
            element.classList.add('data-refresh-transition');
        }

        function showDataLoadError(target, message, retry) {
            const element = resolveDataContainer(target);
            if (!element || element.dataset.dataLoaded === 'true') return;
            const state = document.createElement('div');
            state.className = 'data-load-error';
            state.setAttribute('role', 'alert');
            const label = document.createElement('span');
            label.textContent = message;
            state.append(label);
            if (retry) {
                const button = document.createElement('button');
                button.type = 'button';
                button.className = 'track-btn';
                button.textContent = 'Try again';
                button.addEventListener('click', retry, { once: true });
                state.append(button);
            }
            element.replaceChildren(state);
        }

        function animateDashboardData() {
            const selectors = {
                citizen: ['#pageCitizen .stat-card', '#citizenReportsList', '#citizenNotifList'],
                maintenance: ['#pageMaintenance .stat-card', '#maintTasksList', '#maintNotifList'],
                admin: ['#pageAdmin .stat-card', '#adminReportsList', '#adminNotifList', '#adminPendingMaintenanceList', '#adminTeamList', '#adminTopCitizens', '#adminTopTeams', '#adminAutoAssignList']
            }[currentUser?.role] || [];

            if (selectors.length === 0) return;
            document.querySelectorAll(selectors.join(',')).forEach(element => {
                element.classList.remove('data-refresh-transition');
                void element.offsetWidth;
                element.classList.add('data-refresh-transition');
            });
        }

        async function refreshCurrentDashboardData() {
            if (!currentUser || dashboardRefreshInProgress || document.hidden) return;
            dashboardRefreshInProgress = true;
            try {
                if (currentUser.role === 'citizen') {
                    await loadCitizenData();
                } else if (currentUser.role === 'maintenance') {
                    await loadMaintenanceData();
                } else if (currentUser.role === 'admin') {
                    await loadAdminData();
                }
            } finally {
                dashboardRefreshInProgress = false;
            }
        }

        document.addEventListener('visibilitychange', () => {
            if (!document.hidden) refreshCurrentDashboardData();
        });

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
                        globalPollTimer = setInterval(performPoll, 5000);
                    }
                    return;
                }
                pollFailures = 0;

                let shouldRefreshDashboard = false;

                // Handle new reports
                if (result.reports && result.reports.length > 0) {
                    result.reports.forEach(r => {
                        if (r.id > lastKnownReportId) lastKnownReportId = r.id;
                    });
                    shouldRefreshDashboard = true;
                }

                // Handle new notifications
                if (result.notifications && result.notifications.length > 0) {
                    result.notifications.forEach(n => {
                        if (n.id > lastKnownNotificationId) lastKnownNotificationId = n.id;
                    });
                    shouldRefreshDashboard = true;
                    // Show toast for newest notification
                    const latest = result.notifications[0];
                    showToast('🔔 ' + latest.title, latest.message.substring(0, 80));
                }

                if (shouldRefreshDashboard) await refreshCurrentDashboardData();

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
                            if (liveTrackActiveReportId === reportId || activeTrackDiscussionReportId === reportId) {
                                loadReportComments(reportId, threadId);
                            }
                        } else if (threadId === 'trackDiscussionThread' && activeTrackDiscussionReportId && document.getElementById('trackDiscussionModal')?.classList.contains('active')) {
                            loadReportComments(activeTrackDiscussionReportId, threadId);
                        }
                    });
                }

                // Update stats in UI
                if (result.stats) {
                    if (currentUser.role === 'citizen') {
                        document.getElementById('citizenTotalReports').textContent = result.stats.total || 0;
                        document.getElementById('citizenPending').textContent = result.stats.pending || 0;
                        document.getElementById('citizenCompleted').textContent = result.stats.completed || 0;
                    } else if (currentUser.role === 'maintenance') {
                        document.getElementById('maintAssigned').textContent = (result.stats.assigned || 0) + (result.stats.in_progress || 0);
                        document.getElementById('maintInProgress').textContent = result.stats.in_progress || 0;
                        document.getElementById('maintCompleted').textContent = result.stats.completed || 0;
                        document.getElementById('maintAvgRating').textContent = result.stats.avg_rating !== null && result.stats.avg_rating !== '—' ? result.stats.avg_rating : '—';
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
        function openLoginPage(role = null) {
            document.getElementById('pageHome').style.display = 'none';
            document.getElementById('pageLogin').style.display = 'block';
            document.getElementById('errorMessage').classList.remove('show');
            document.getElementById('loginForm').reset();
            window.scrollTo({ top: 0, behavior: 'smooth' });
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

            loginBtn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            loginBtn.classList.add('btn-loading');
            loginBtn.disabled = true;

            const result = await apiPost('login', { email, password });

            if (!result.success) {
                errorText.textContent = result.message || 'Invalid credentials.';
                errorMessage.classList.add('show');
                loginBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> <span>Sign In</span>';
                loginBtn.classList.remove('btn-loading');
                loginBtn.disabled = false;
                return;
            }

            errorMessage.classList.remove('show');
            currentUser = result.user;
            authToken = result.token; // Store Laravel API token
            updateUserBadges();
            
            // Initialize Pusher for real-time updates
            // initializePusher();

            // Reset poll IDs
            lastKnownReportId = 0;
            lastKnownNotificationId = 0;
            lastKnownCommentId = 0;

            if (currentUser.role === 'maintenance') {
                document.getElementById('maintenanceUserName').textContent = currentUser.full_name;
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

            loginBtn.innerHTML = '<i class="fas fa-sign-in-alt"></i> <span>Sign In</span>';
            loginBtn.classList.remove('btn-loading');
            loginBtn.disabled = false;
        }

        // ============ PAGE NAV ============
        async function showDashboard(role) {
            document.getElementById('pageHome').style.display = 'none';
            document.getElementById('pageLogin').style.display = 'none';
            document.getElementById('pageCitizen').classList.remove('active');
            document.getElementById('pageMaintenance').classList.remove('active');
            document.getElementById('pageAdmin').classList.remove('active');

            if (role === 'citizen') {
                document.getElementById('pageCitizen').classList.add('active');
                await loadCitizenData();
                setTimeout(() => {
                    initNearbyMap();
                }, 300);
            } else if (role === 'maintenance') {
                document.getElementById('pageMaintenance').classList.add('active');
                document.getElementById('maintenanceApprovalNotice').style.display = currentUser?.is_approved ? 'none' : 'block';
                await loadMaintenanceData();
                setTimeout(() => {
                    initMaintMap();
                }, 300);
            } else if (role === 'admin') {
                document.getElementById('pageAdmin').classList.add('active');
                await loadAdminData();
            }
            if (role !== 'citizen') stopAllLiveTracking();
            window.scrollTo({ top: 0, behavior: 'smooth' });

            // Start real-time polling
            startGlobalPolling();
        }

        function showLogin() {
            stopAllLiveTracking();
            stopGlobalPolling();
            closeChatPanel();
            document.getElementById('pageHome').style.display = 'block';
            document.getElementById('pageLogin').style.display = 'none';
            document.getElementById('pageCitizen').classList.remove('active');
            document.getElementById('pageMaintenance').classList.remove('active');
            document.getElementById('pageAdmin').classList.remove('active');
            currentUser = null;
            document.getElementById('errorMessage').classList.remove('show');
            document.getElementById('loginForm').reset();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        // ============ CITIZEN DATA ============
        async function loadCitizenData() {
            const reportsList = document.getElementById('citizenReportsList');
            showMetricLoading(['citizenTotalReports', 'citizenPending', 'citizenCompleted']);
            showDataLoading(reportsList, 'Loading recent reports...');
            showDataLoading('citizenNotifList', 'Loading notifications...');

            const [stats, reportsResult, notifsResult] = await Promise.all([
                apiGet('stats'),
                apiGet('reports'),
                apiGet('notifications')
            ]);
            if (stats.success) {
                setMetricValue('citizenTotalReports', stats.total || 0);
                setMetricValue('citizenPending', stats.pending || 0);
                setMetricValue('citizenCompleted', stats.completed || 0);
            } else {
                ['citizenTotalReports', 'citizenPending', 'citizenCompleted'].forEach(id => setMetricValue(id, '—', true));
            }

            if (reportsResult.success) {
                const nextReports = reportsResult.reports || [];
                const reportsChanged = !citizenReportsLoaded || JSON.stringify(cachedReports) !== JSON.stringify(nextReports);
                const activePanel = liveTrackActiveReportId
                    ? document.getElementById('track-panel-' + liveTrackActiveReportId)
                    : null;
                const preserveActivePanel = reportsChanged && activePanel?.style.display === 'block' &&
                    nextReports.some(report => Number(report.id) === Number(liveTrackActiveReportId));
                cachedReports = nextReports;
                citizenReportsLoaded = true;
                // Track highest report ID for polling
                cachedReports.forEach(r => {
                    if (r.id > lastKnownReportId) lastKnownReportId = r.id;
                });
                if (reportsChanged) {
                    const list = reportsList;
                    if (cachedReports.length === 0) {
                        list.innerHTML = `
                            <div class="empty-state">
                                <i class="fas fa-file-alt"></i>
                                <div class="empty-title">No reports yet</div>
                                <div class="empty-desc">Your submitted reports will appear here</div>
                            </div>`;
                    } else {
                        list.innerHTML = cachedReports.map(r => {
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
                                            <button class="track-btn" onclick="openReportDetailsModal(${r.id})" title="View report details" aria-label="View report details">
                                                <i class="fas fa-circle-info" aria-hidden="true"></i>
                                            </button>
                                            ${r.status === 'Completed' ? (r.my_rating !== null && r.my_rating !== undefined
                                                ? `<span class="badge badge-rated" title="You rated this team">⭐ ${Number(r.my_rating)}/5</span>`
                                                : `<button type="button" class="track-btn report-rate-btn" data-rate-id="${r.id}" onclick="openCitizenRating(${r.id})" aria-label="Rate maintenance team" title="Rate maintenance team"><i class="fas fa-star" aria-hidden="true"></i></button>`) : ''}
                                        </div>
                                    </div>
                                    <div id="track-panel-${r.id}" style="display:none;" class="report-track-expand"></div>
                                </div>
                            `;
                        }).join('');
                    }
                    updateListExpansion(list, '.report-item-wrap');

                    if (preserveActivePanel) {
                        const replacementPanel = document.getElementById('track-panel-' + liveTrackActiveReportId);
                        if (replacementPanel) {
                            replacementPanel.replaceWith(activePanel);
                            requestAnimationFrame(() => {
                                const map = liveTrackMaps[liveTrackActiveReportId]?.map;
                                if (map?.invalidateSize) map.invalidateSize();
                            });
                        }
                    }
                }
                markDataLoaded(reportsList);
            } else if (!citizenReportsLoaded && reportsList) {
                showDataLoadError(reportsList, 'Could not load recent reports.', () => loadCitizenData());
            }

            if (nearbyMapInitialized && nearbyMap) await initNearbyMap(cachedReports);

            if (notifsResult.success) {
                cachedNotifications = notifsResult.notifications;
                cachedNotifications.forEach(n => {
                    if (n.id > lastKnownNotificationId) lastKnownNotificationId = n.id;
                });
                renderNotificationsList('citizenNotifList', cachedNotifications);
            } else {
                showDataLoadError('citizenNotifList', 'Could not load notifications.', () => loadCitizenData());
            }
            animateDashboardData();
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
                <div style="padding:0.8rem 1rem; margin:0.2rem 0 0.4rem 0;">
                    <div class="tracking-timeline-title" style="font-weight:600; font-size:0.9rem; color:#0b2a3b; margin-bottom:0.5rem; display:flex; align-items:center; gap:6px;">
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
                    <div class="form-actions" style="justify-content:flex-start; border-top:0; padding-top:0; margin-top:0.8rem;">
                        <button type="button" class="btn btn-secondary" onclick="openTrackDiscussionModal(${reportId})">
                            <i class="fas fa-comments"></i> Discussion
                        </button>
                    </div>
                </div>
            `;
            panel.style.display = 'block';

            if (showLiveMap) {
                setTimeout(() => {
                    initLiveTrackMap(reportId, report).then(initialized => {
                        if (initialized) startLiveTracking(reportId);
                    });
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
                    state: 'active review',
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
                liveTrackMaps[reportId].map?.remove();
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

        /* Animated Leaflet icons for live destination and team markers */
        function reportAreaIcon() {
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                <circle cx="30" cy="30" r="10" fill="none" stroke="#ef4444" stroke-width="2.5" opacity="0.8">
                    <animate attributeName="r" values="10;28;28" dur="1.8s" repeatCount="indefinite" />
                    <animate attributeName="opacity" values="0.85;0.05;0" dur="1.8s" repeatCount="indefinite" />
                </circle>
                <circle cx="30" cy="30" r="14" fill="#ef4444" opacity="0.25">
                    <animate attributeName="r" values="12;16;12" dur="1.8s" repeatCount="indefinite" />
                </circle>
                <circle cx="30" cy="30" r="13" fill="#dc2626" stroke="#ffffff" stroke-width="2.5"/>
                <path d="M30 22 L30 29 M30 33 L30 34" stroke="#ffffff" stroke-width="2.4" stroke-linecap="round"/>
            </svg>`;
            return L.divIcon({ className: 'live-destination-marker', html: svg, iconSize: [46, 46], iconAnchor: [23, 23] });
        }

        function teamBuilderIcon() {
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60">
                <circle cx="30" cy="30" r="12" fill="none" stroke="#3b82f6" stroke-width="2.5" opacity="0.85">
                    <animate attributeName="r" values="12;28;28" dur="1.6s" repeatCount="indefinite" />
                    <animate attributeName="opacity" values="0.9;0;0" dur="1.6s" repeatCount="indefinite" />
                </circle>
                <circle cx="30" cy="30" r="15" fill="#2563eb" stroke="#ffffff" stroke-width="2.5"/>
                <text x="30" y="37" font-size="16" text-anchor="middle" font-family="Segoe UI Emoji, Apple Color Emoji, Noto Color Emoji, sans-serif">&#128119;</text>
            </svg>`;
            return L.divIcon({ className: 'live-team-marker', html: svg, iconSize: [46, 46], iconAnchor: [23, 23] });
        }

        /* Animated Pin for citizen reporting location selector */
        function getCitizenPinIcon() {
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="74" viewBox="0 0 60 74">
                <!-- Live ground pulse ring -->
                <ellipse cx="30" cy="67" rx="6" ry="3" fill="none" stroke="#10b981" stroke-width="2">
                    <animate attributeName="rx" values="6;22;22" dur="1.8s" repeatCount="indefinite" />
                    <animate attributeName="ry" values="3;10;10" dur="1.8s" repeatCount="indefinite" />
                    <animate attributeName="opacity" values="0.8;0;0" dur="1.8s" repeatCount="indefinite" />
                </ellipse>
                <!-- Ground shadow -->
                <ellipse cx="30" cy="67" rx="8" ry="3.5" fill="#0f172a" opacity="0.25" />
                <!-- Modern Teardrop Pin with float animation -->
                <g>
                    <animateTransform attributeName="transform" type="translate" values="0,0; 0,-3; 0,0" dur="2.2s" repeatCount="indefinite" ease="ease-in-out"/>
                    <path d="M30 65 C21 51 12 39 12 26 C12 14.5 20.0 6 30 6 C40.0 6 48 14.5 48 26 C48 39 39 51 30 65 Z"
                          fill="url(#greenGrad)" stroke="#ffffff" stroke-width="2" filter="drop-shadow(0 4px 6px rgba(0,0,0,0.35))"/>
                    <!-- Inner glow circle -->
                    <circle cx="30" cy="26" r="11" fill="#ffffff" />
                    <!-- Eco / target marker icon -->
                    <circle cx="30" cy="26" r="6" fill="#059669">
                        <animate attributeName="r" values="5;7;5" dur="1.8s" repeatCount="indefinite" />
                    </circle>
                    <circle cx="30" cy="26" r="2.5" fill="#ffffff" />
                </g>
                <defs>
                    <linearGradient id="greenGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#10b981"/>
                        <stop offset="100%" stop-color="#047857"/>
                    </linearGradient>
                </defs>
            </svg>`;
            return {
                url: svgDataUri(svg),
                scaledSize: new google.maps.Size(46, 56),
                anchor: new google.maps.Point(23, 51)
            };
        }

        /* Animated Pin for Incidents / Tasks based on priority or status */
        function getAnimatedMarkerPin({ color = '#10b981', pulse = true, iconType = 'dot', badge = '' } = {}) {
            const pulseRings = pulse ? `
                <ellipse cx="30" cy="67" rx="6" ry="3" fill="none" stroke="${color}" stroke-width="2.4">
                    <animate attributeName="rx" values="6;22;22" dur="1.7s" repeatCount="indefinite" />
                    <animate attributeName="ry" values="3;10;10" dur="1.7s" repeatCount="indefinite" />
                    <animate attributeName="opacity" values="0.85;0;0" dur="1.7s" repeatCount="indefinite" />
                </ellipse>
                <ellipse cx="30" cy="67" rx="8" ry="3.5" fill="#0f172a" opacity="0.22" />
            ` : `
                <ellipse cx="30" cy="67" rx="8" ry="3.5" fill="#0f172a" opacity="0.2" />
            `;

            let innerContent = '';
            if (iconType === 'alert') {
                innerContent = `
                    <circle cx="30" cy="26" r="11" fill="#ffffff"/>
                    <path d="M30 19 L30 27 M30 31 L30 32.5" stroke="${color}" stroke-width="2.5" stroke-linecap="round"/>
                `;
            } else if (iconType === 'wrench') {
                innerContent = `
                    <circle cx="30" cy="26" r="11" fill="#ffffff"/>
                    <path d="M26 23 L33 30 M31 21 L35 25 M25 31 L29 27" stroke="${color}" stroke-width="2.2" stroke-linecap="round"/>
                `;
            } else if (iconType === 'check') {
                innerContent = `
                    <circle cx="30" cy="26" r="11" fill="#ffffff"/>
                    <path d="M25 26.5 L28.5 30 L35 22" fill="none" stroke="${color}" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round"/>
                `;
            } else {
                innerContent = `
                    <circle cx="30" cy="26" r="11" fill="#ffffff"/>
                    <circle cx="30" cy="26" r="6" fill="${color}">
                        <animate attributeName="r" values="5;7.5;5" dur="1.6s" repeatCount="indefinite"/>
                    </circle>
                    <circle cx="30" cy="26" r="2.2" fill="#ffffff"/>
                `;
            }

            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="74" viewBox="0 0 60 74">
                ${pulseRings}
                <g>
                    <animateTransform attributeName="transform" type="translate" values="0,0; 0,-2.5; 0,0" dur="2.4s" repeatCount="indefinite" ease="ease-in-out"/>
                    <path d="M30 65 C21 51 12 39 12 26 C12 14.5 20.0 6 30 6 C40.0 6 48 14.5 48 26 C48 39 39 51 30 65 Z"
                          fill="${color}" stroke="#ffffff" stroke-width="2.2" filter="drop-shadow(0 4px 6px rgba(0,0,0,0.35))"/>
                    ${innerContent}
                </g>
            </svg>`;

            return {
                url: svgDataUri(svg),
                scaledSize: new google.maps.Size(46, 56),
                anchor: new google.maps.Point(23, 51)
            };
        }

        async function initLiveTrackMap(reportId, report) {
            document.getElementById('liveTrackMap-' + reportId);
            if (!el) return false;

            try {
                await loadLeaflet();
            } catch (error) {
                setLiveStatus(reportId, 'waiting', 'Map unavailable');
                el.textContent = 'The live team map is temporarily unavailable.';
                console.error('Live team map failed to load:', error);
                return false;
            }

            if (liveTrackMaps[reportId]?.map) {
                liveTrackMaps[reportId].map.invalidateSize();
                return true;
            }

            const destLat = report.latitude ? parseFloat(report.latitude) : null;
            const destLng = report.longitude ? parseFloat(report.longitude) : null;
            const center = (destLat && destLng) ? [destLat, destLng] : [DEFAULT_CENTER.lat, DEFAULT_CENTER.lng];

            el.replaceChildren();
            const map = L.map(el).setView(center, 14);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
            }).addTo(map);

            let destMarker = null;
            if (destLat && destLng) {
                destMarker = L.marker([destLat, destLng], { title: 'Reported area', icon: reportAreaIcon(), zIndexOffset: 1 }).addTo(map);
            }

            liveTrackMaps[reportId] = {
                map,
                destMarker,
                teamMarker: null,
                dest: (destLat && destLng) ? { lat: destLat, lng: destLng } : null,
                teamName: report.assigned_team || 'Team'
            };
            setLiveStatus(reportId, 'waiting', 'Waiting for team GPS…');
            requestAnimationFrame(() => map.invalidateSize());
            return true;
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
                    state.destMarker.setLatLng([destPos.lat, destPos.lng]);
                } else {
                    state.destMarker = L.marker([destPos.lat, destPos.lng], { title: 'Reported area', icon: reportAreaIcon() }).addTo(state.map);
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
                state.teamMarker.setLatLng([teamPos.lat, teamPos.lng]);
            } else {
                state.teamMarker = L.marker([teamPos.lat, teamPos.lng], {
                    title: teamLabel + ' (maintenance team, live)',
                    icon: teamBuilderIcon(),
                    zIndexOffset: 10
                }).addTo(state.map);
            }

            if (!state.hasFittedTeamBounds) {
                const bounds = state.dest ? L.latLngBounds([state.dest, teamPos]) : L.latLngBounds([teamPos]);
                state.map.fitBounds(bounds, { padding: [20, 20], minZoom: 12, maxZoom: 16 });
                state.hasFittedTeamBounds = true;
            } else if (!state.map.getBounds().pad(-0.2).contains([teamPos.lat, teamPos.lng])) {
                state.map.panTo([teamPos.lat, teamPos.lng], { animate: true, duration: 0.5 });
            }

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
            liveTrackPollTimers[reportId] = setInterval(poll, 3000);
        }
        // ============ MAINTENANCE GPS SHARING ============
        function getActiveGpsTasks() {
            return allTasks.filter(t => t.status === 'Assigned' || t.status === 'In Progress');
        }

        function setGpsIndicator(active) {
            const el = document.getElementById('gpsSharingIndicator');
            if (!el) return;
            el.classList.toggle('active', !!active);
            el.classList.remove('error');
            const text = document.getElementById('gpsSharingText');
            if (text) text.textContent = 'Sharing location';
        }

        function setGpsError(message) {
            const el = document.getElementById('gpsSharingIndicator');
            if (!el) return;
            el.classList.remove('active');
            el.classList.add('error');
            const text = document.getElementById('gpsSharingText');
            if (text) text.textContent = message;
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
                setGpsError('Location unavailable');
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
                    setGpsIndicator(true);
                },
                (err) => {
                    console.warn('GPS watch error:', err.message);
                    setGpsError(err.code === 1 ? 'Allow location access' : 'Location unavailable');
                },
                { enableHighAccuracy: true, maximumAge: 15000, timeout: 20000 }
            );

            sendGpsPings();
            gpsPingTimer = setInterval(sendGpsPings, 10000);
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
            const sendWith = async (coords) => {
                for (const task of active) {
                    const result = await apiPost('tasks/' + task.id + '/gps', {
                        task_id: task.id,
                        latitude: coords.latitude,
                        longitude: coords.longitude,
                        accuracy: coords.accuracy || null
                    });
                    if (!result.success) setGpsError('GPS update failed');
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
                    setGpsIndicator(true);
                    await sendWith(gpsLastPosition);
                },
                (err) => {
                    console.warn('GPS ping failed:', err.message);
                    setGpsError(err.code === 1 ? 'Allow location access' : 'Location unavailable');
                },
                { enableHighAccuracy: true, timeout: 15000, maximumAge: 10000 }
            );
        }

        async function openRejectionReasonModal(reportId) {
            clearModalStack();
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
            closeModalWithStack('rejectionReasonModal');
        }

        async function openCompletionInfoModal(reportId) {
            clearModalStack();
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
            closeModalWithStack('completionInfoModal');
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

            currentReportDetailsId = reportId;

            // Check if actionModal is open, if not clear the stack
            const actionModal = document.getElementById('actionModal');
            if (actionModal && actionModal.classList.contains('active')) {
                openModalWithStack('reportDetailsModal', 'actionModal');
            } else {
                clearModalStack();
                document.getElementById('reportDetailsModal').classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            requestAnimationFrame(() => initReportDetailsMap(report));
        }

        async function initReportDetailsMap(report) {
            const mapElement = document.getElementById('reportDetailsMap');
            const fallback = document.getElementById('reportDetailsMapFallback');
            const latitude = Number(report.latitude);
            const longitude = Number(report.longitude);
            const hasCoordinates = report.latitude !== null && report.latitude !== undefined && String(report.latitude).trim() !== '' &&
                report.longitude !== null && report.longitude !== undefined && String(report.longitude).trim() !== '' &&
                Number.isFinite(latitude) && Number.isFinite(longitude);

            if (!hasCoordinates) {
                mapElement.style.display = 'none';
                fallback.textContent = 'No map coordinates were saved for this report.';
                fallback.style.display = 'block';
                return;
            }

            fallback.style.display = 'none';
            mapElement.style.display = 'block';
            try {
                await loadLeaflet();
            } catch (error) {
                mapElement.style.display = 'none';
                fallback.textContent = 'The location map is temporarily unavailable.';
                fallback.style.display = 'block';
                console.error('Report location map failed to load:', error);
                return;
            }

            const position = [latitude, longitude];
            if (!reportDetailsMap) {
                mapElement.replaceChildren();
                reportDetailsMap = L.map(mapElement, { scrollWheelZoom: false }).setView(position, 15);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
                }).addTo(reportDetailsMap);
                reportDetailsMapMarker = L.marker(position, {
                    icon: getLeafletIncidentPin(report.priority || 'Medium')
                }).addTo(reportDetailsMap);
            } else {
                reportDetailsMap.setView(position, 15);
                reportDetailsMapMarker.setLatLng(position);
                reportDetailsMapMarker.setIcon(getLeafletIncidentPin(report.priority || 'Medium'));
                reportDetailsMap.invalidateSize();
            }
        }

        function closeReportDetailsModal() {
            closeModalWithStack('reportDetailsModal');
            currentReportDetailsId = null;
            // Reset details visibility
            const detailsContent = document.getElementById('reportDetailsContent');
            const toggleIcon = document.getElementById('reportDetailsToggleIcon');
            const toggleText = document.getElementById('reportDetailsToggleText');
            if (detailsContent) detailsContent.style.display = 'none';
            if (toggleIcon) toggleIcon.className = 'fas fa-eye';
            if (toggleText) toggleText.textContent = 'Show Details';

            // If we came from notifications tab (admin), switch back to it
            if (window.cameFromNotifications && currentUser?.role === 'admin') {
                window.cameFromNotifications = false;
                switchAdminTab('notifications');
            }
        }

        function toggleReportDetails() {
            const detailsContent = document.getElementById('reportDetailsContent');
            const toggleIcon = document.getElementById('reportDetailsToggleIcon');
            const toggleText = document.getElementById('reportDetailsToggleText');

            if (detailsContent.style.display === 'none') {
                detailsContent.style.display = 'block';
                toggleIcon.className = 'fas fa-eye-slash';
                toggleText.textContent = 'Hide Details';
            } else {
                detailsContent.style.display = 'none';
                toggleIcon.className = 'fas fa-eye';
                toggleText.textContent = 'Show Details';
            }
        }

        function openDiscussionFromReportDetails() {
            if (!currentReportDetailsId) return;
            const rid = currentReportDetailsId;
            openTrackDiscussionModal(rid, 'reportDetailsModal');
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
                const pending = Boolean(c.pending);
                const isMine = myId && Number(c.user_id) === Number(myId);
                const roleClass = c.role || 'citizen';
                const roleLabel = c.role === 'maintenance'
                    ? (c.team_name || 'Maintenance')
                    : (c.role === 'admin' ? 'Admin' : 'Citizen');
                const roleIcon = c.role === 'admin'
                    ? 'fa-user-shield'
                    : (c.role === 'maintenance' ? 'fa-tools' : 'fa-user');
                const avatarHtml = c.photo_url
                    ? `<span class="comment-avatar ${roleClass}"><img src="${escapeHtml(c.photo_url)}" alt="${escapeHtml(c.full_name || 'User')}" onerror="this.onerror=null; this.parentElement.innerHTML='<i class=\\\'fas ${roleIcon}\\\'></i>';" /></span>`
                    : `<span class="comment-avatar ${roleClass}"><i class="fas ${roleIcon}"></i></span>`;

                return `
                    <div class="comment-bubble ${isMine ? 'mine' : ''} ${pending ? 'pending' : ''}">
                        <div class="comment-meta">
                            <span class="comment-author">
                                ${avatarHtml}
                                <span>${escapeHtml(c.full_name || 'User')}</span>
                                <span class="comment-role ${roleClass}">${escapeHtml(roleLabel)}</span>
                            </span>
                            <span class="comment-time">${pending ? '<i class="fas fa-circle-notch" aria-hidden="true" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>' : getTimeAgo(c.created_at)}</span>
                        </div>
                        <div class="comment-text">${escapeHtml(c.message)}</div>
                    </div>
                `;
            }).join('');
        }

        async function openTrackDiscussionModal(reportId, parentModalId = null) {
            activeTrackDiscussionReportId = reportId;
            const thread = document.getElementById('trackDiscussionThread');
            document.getElementById('trackDiscussionInput').value = '';
            thread.innerHTML = '<div class="comments-empty" role="status"><i class="fas fa-circle-notch" aria-hidden="true" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i></div>';
            if (parentModalId) {
                openModalWithStack('trackDiscussionModal', parentModalId);
            } else {
                clearModalStack();
                document.getElementById('trackDiscussionModal').classList.add('active');
                document.body.style.overflow = 'hidden';
            }
            await loadReportComments(reportId, 'trackDiscussionThread');
        }

        function closeTrackDiscussionModal() {
            closeModalWithStack('trackDiscussionModal');
            activeTrackDiscussionReportId = null;
        }

        async function submitTrackDiscussionComment() {
            if (!activeTrackDiscussionReportId) return;
            await submitReportComment(activeTrackDiscussionReportId, 'trackDiscussionInput', 'trackDiscussionThread');
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

        async function submitReportComment(id, inputId = `trackCommentInput-${id}`, threadId = `trackCommentThread-${id}`) {
            if (!id) return;

            const input = document.getElementById(inputId);
            const message = (input?.value || '').trim();
            if (!message) {
                alert('⚠️ Please write a comment first.');
                return;
            }

            const thread = document.getElementById(threadId);
            const hadComments = Boolean(thread?.querySelector('.comment-bubble'));
            thread?.querySelector('.comments-empty')?.remove();
            const optimisticComment = {
                user_id: currentUser?.id,
                role: currentUser?.role,
                full_name: currentUser?.full_name,
                team_name: currentUser?.team_name,
                photo_url: currentUser?.photo_url,
                message,
                created_at: new Date().toISOString(),
                pending: true
            };
            const pendingWrapper = document.createElement('div');
            pendingWrapper.innerHTML = renderCommentsHtml([optimisticComment]);
            const pendingComment = pendingWrapper.firstElementChild;
            thread?.append(pendingComment);
            if (thread) thread.scrollTop = thread.scrollHeight;
            if (input) input.value = '';

            try {
                const result = await apiPost('reports/' + id + '/comments', { report_id: id, message });

                if (result.success) {
                    if (pendingComment?.isConnected && result.comment) {
                        const confirmedWrapper = document.createElement('div');
                        confirmedWrapper.innerHTML = renderCommentsHtml([result.comment]);
                        pendingComment.replaceWith(confirmedWrapper.firstElementChild);
                    } else {
                        pendingComment?.classList.remove('pending');
                    }
                    if (result.comment?.id > lastKnownCommentId) lastKnownCommentId = result.comment.id;
                    showToast('💬 Comment sent', 'The other party has been notified.');
                } else {
                    pendingComment?.remove();
                    if (!hadComments && thread && !thread.children.length) {
                        thread.innerHTML = renderCommentsHtml([]);
                    }
                    if (input && !input.value) input.value = message;
                    showToast('Comment not sent', result.message || 'Please try again.');
                }
            } catch (error) {
                console.error('Comment submission failed:', error);
                pendingComment?.remove();
                if (!hadComments && thread && !thread.children.length) {
                    thread.innerHTML = renderCommentsHtml([]);
                }
                if (input && !input.value) input.value = message;
                showToast('Comment not sent', 'Check your connection and try again.');
            }
        }

        function updateListExpansion(container, itemSelector, visibleCount = 5) {
            if (!container) return;

            container.querySelector(':scope > .list-expansion-control')?.remove();
            const items = [...container.querySelectorAll(`:scope > ${itemSelector}`)];
            if (items.length <= visibleCount) container.dataset.listExpanded = 'false';
            const expanded = container.dataset.listExpanded === 'true';
            items.forEach((item, index) => {
                const hidden = !expanded && index >= visibleCount;
                item.hidden = hidden;
                item.style.display = hidden ? 'none' : '';
            });

            if (items.length <= visibleCount) return;

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'list-expansion-control';
            button.setAttribute('aria-controls', container.id);
            button.setAttribute('aria-expanded', String(expanded));
            const icon = document.createElement('i');
            icon.className = `fas fa-chevron-${expanded ? 'up' : 'down'}`;
            icon.setAttribute('aria-hidden', 'true');
            const label = document.createElement('span');
            label.textContent = expanded ? 'Show less' : `See more (${items.length - visibleCount})`;
            button.append(icon, label);
            button.addEventListener('click', () => {
                container.dataset.listExpanded = String(!expanded);
                updateListExpansion(container, itemSelector, visibleCount);
            });
            container.append(button);
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
                el.dataset.listExpanded = 'false';
                markDataLoaded(el);
                return;
            }
            el.innerHTML = notifications.map(n => {
                const unread = !Number(n.is_read);
                const icon = n.title && n.title.toLowerCase().includes('comment') ? 'comments' : 'bell';
                return `
                <div class="notification-item ${unread ? 'unread' : ''}" data-notification-id="${n.id}" data-report-id="${n.report_id || ''}" onclick="handleNotificationClick(this, ${n.id}, '${n.report_id || ''}')">
                    <div class="notif-icon" style="${unread ? 'background:#dcfce7;color:#166534;' : ''}"><i class="fas fa-${icon}"></i></div>
                    <div class="notif-content"><div class="notif-title">${escapeHtml(n.title)}</div><div class="notif-desc">${escapeHtml(n.message)}</div><div class="notif-time">${getTimeAgo(n.created_at)}</div></div>
                    ${unread ? '<div class="notif-indicator" title="Unread"></div>' : ''}
                </div>`;
            }).join('');
            updateListExpansion(el, '.notification-item');
            markDataLoaded(el);
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
                // Store that we came from notifications tab (for admin)
                if (currentUser?.role === 'admin') {
                    const activeTab = document.querySelector('.admin-header-nav-item.active');
                    if (activeTab && activeTab.dataset.tab === 'notifications') {
                        window.cameFromNotifications = true;
                    }
                }
                await focusReport(rid);
            }
        }

        async function focusReport(reportId) {
            // Clear modal stack before opening report details
            clearModalStack();

            // Make sure the right dashboard list is visible
            await openReportDetailsModal(reportId);

            // Find the report row in the active dashboard and scroll + highlight for 1s
            setTimeout(() => {
                const wrap = document.getElementById('report-wrap-' + reportId);
                const row = wrap || document.querySelector(`[data-report-id="${reportId}"]`) || document.querySelector(`.report-item[onclick*="${reportId}"]`);
                if (row?.hidden) {
                    const list = wrap ? document.getElementById('citizenReportsList') : document.getElementById('adminReportsList');
                    if (list) {
                        list.dataset.listExpanded = 'true';
                        updateListExpansion(list, wrap ? '.report-item-wrap' : '.report-item');
                    }
                }
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
            clearModalStack();
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
            closeModalWithStack('statisticsModal');
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
            clearModalStack();
            document.getElementById('registerModal').classList.add('active');
            document.getElementById('registerForm').reset();
            document.getElementById('regRole').value = 'citizen';
            toggleTeamField();
            document.body.style.overflow = 'hidden';
        }

        function toggleTeamField() {
            const role = document.getElementById('regRole').value;
            const teamWrapper = document.getElementById('registerTeamWrapper');
            const subtitle = document.getElementById('registerSubtitle');
            const isMaintenance = role === 'maintenance';
            teamWrapper.style.display = isMaintenance ? 'block' : 'none';
            document.getElementById('regTeam').required = isMaintenance;
            subtitle.textContent = isMaintenance
                ? 'Apply to join a maintenance team. An admin must approve your account.'
                : 'Create a citizen account to help your community';
        }
        function closeRegisterModal() {
            closeModalWithStack('registerModal');
        }
        async function handleRegister(event) {
            event.preventDefault();
            const fullName = document.getElementById('fullName').value.trim();
            const email = document.getElementById('regEmail').value.trim();
            const password = document.getElementById('regPassword').value;
            const confirm = document.getElementById('confirmPassword').value;
            const phone = document.getElementById('phone').value.trim();
            const role = document.getElementById('regRole').value;
            const teamName = document.getElementById('regTeam').value.trim();
            const btn = document.getElementById('registerBtn');

            if (!fullName) return alert('⚠️ Please enter your full name.');
            if (!email || !email.includes('@')) return alert('⚠️ Please enter a valid email.');
            if (password.length < 8) return alert('⚠️ Password must be at least 8 characters.');
            if (role === 'maintenance' && !teamName) return alert('⚠️ Please enter your team name.');
            if (password !== confirm) return alert('⚠️ Passwords do not match.');
            if (!document.getElementById('termsCheckbox').checked) return alert('⚠️ Please agree to the Terms.');

            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
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
                btn.classList.remove('btn-loading');
                btn.disabled = false;
            }
        }

        function openAdminRegisterModal() {
            clearModalStack();
            document.getElementById('adminRegisterForm').reset();
            document.getElementById('adminRegisterModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeAdminRegisterModal() {
            closeModalWithStack('adminRegisterModal');
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

        let selectedProfilePhotoBase64 = null;
        let removeProfilePhotoFlag = false;

        function updateUserBadges() {
            if (!currentUser) return;
            const photo = currentUser.photo_url;
            
            const citizenAvatar = document.getElementById('citizenBadgeAvatar');
            if (citizenAvatar) {
                citizenAvatar.innerHTML = photo
                    ? `<img src="${photo}" class="user-badge-img" alt="Avatar" />`
                    : `<i class="fas fa-user-circle"></i>`;
            }

            const maintAvatar = document.getElementById('maintBadgeAvatar');
            if (maintAvatar) {
                maintAvatar.innerHTML = photo
                    ? `<img src="${photo}" class="user-badge-img" alt="Avatar" />`
                    : `<i class="fas fa-hard-hat"></i>`;
            }

            const adminAvatar = document.getElementById('adminBadgeAvatar');
            if (adminAvatar) {
                adminAvatar.innerHTML = photo
                    ? `<img src="${photo}" class="user-badge-img" alt="Avatar" />`
                    : `<i class="fas fa-user-shield"></i>`;
            }
        }

        function updateProfileModalAvatar() {
            if (!currentUser) return;
            const img = document.getElementById('profileImg');
            const icon = document.getElementById('profileIcon');
            if (!img || !icon) return;

            if (currentUser.photo_url) {
                img.src = currentUser.photo_url;
                img.style.display = 'block';
                icon.style.display = 'none';
            } else {
                img.style.display = 'none';
                icon.style.display = 'block';
            }
        }

        function handleProfilePhotoSelect(event) {
            const file = event.target.files && event.target.files[0];
            if (!file) return;

            if (file.size > 5 * 1024 * 1024) {
                alert('⚠️ Profile photo must be less than 5 MB.');
                event.target.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                selectedProfilePhotoBase64 = e.target.result;
                removeProfilePhotoFlag = false;

                const preview = document.getElementById('editPhotoPreview');
                const icon = document.getElementById('editPhotoIcon');
                const removeBtn = document.getElementById('removePhotoBtn');
                const label = document.getElementById('photoBtnLabel');

                if (preview) { preview.src = e.target.result; preview.style.display = 'block'; }
                if (icon) icon.style.display = 'none';
                if (removeBtn) removeBtn.style.display = 'inline-flex';
                if (label) label.textContent = 'Change Photo';
            };
            reader.readAsDataURL(file);
        }

        function handleProfilePhotoRemove() {
            selectedProfilePhotoBase64 = null;
            removeProfilePhotoFlag = true;

            const input = document.getElementById('editPhotoInput');
            if (input) input.value = '';

            const preview = document.getElementById('editPhotoPreview');
            const icon = document.getElementById('editPhotoIcon');
            const removeBtn = document.getElementById('removePhotoBtn');
            const label = document.getElementById('photoBtnLabel');

            if (preview) { preview.src = ''; preview.style.display = 'none'; }
            if (icon) icon.style.display = 'block';
            if (removeBtn) removeBtn.style.display = 'none';
            if (label) label.textContent = 'Upload Photo';
        }

        // ============ PROFILE ============
        async function openProfileModal(role) {
            if (!currentUser) return;
            clearModalStack();
            updateProfileModalAvatar();
            const name = document.getElementById('profileName');
            const roleEl = document.getElementById('profileRole');

            if (role === 'maintenance') {
                document.getElementById('profileIcon').className = 'fas fa-hard-hat';
                name.textContent = currentUser.full_name;
                roleEl.innerHTML = `<i class="fas fa-hard-hat"></i> Maintenance Team`;
            } else if (role === 'admin') {
                document.getElementById('profileIcon').className = 'fas fa-user-shield';
                name.textContent = currentUser.full_name;
                roleEl.innerHTML = '<i class="fas fa-user-shield"></i> Administrator';
            } else {
                document.getElementById('profileIcon').className = 'fas fa-user';
                name.textContent = currentUser.full_name;
                roleEl.innerHTML = '<i class="fas fa-user"></i> Citizen · Member since 2024';
            }

            document.getElementById('profileModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeProfileModal() {
            closeModalWithStack('profileModal');
            clearModalStack();
        }

        function openEditProfileModal() {
            if (!currentUser) return;
            selectedProfilePhotoBase64 = null;
            removeProfilePhotoFlag = false;

            const input = document.getElementById('editPhotoInput');
            if (input) input.value = '';

            const preview = document.getElementById('editPhotoPreview');
            const icon = document.getElementById('editPhotoIcon');
            const removeBtn = document.getElementById('removePhotoBtn');
            const label = document.getElementById('photoBtnLabel');

            if (currentUser.photo_url) {
                if (preview) { preview.src = currentUser.photo_url; preview.style.display = 'block'; }
                if (icon) icon.style.display = 'none';
                if (removeBtn) removeBtn.style.display = 'inline-flex';
                if (label) label.textContent = 'Change Photo';
            } else {
                if (preview) { preview.src = ''; preview.style.display = 'none'; }
                if (icon) icon.style.display = 'block';
                if (removeBtn) removeBtn.style.display = 'none';
                if (label) label.textContent = 'Upload Photo';
            }

            document.getElementById('editFullName').value = currentUser.full_name;
            document.getElementById('editEmail').value = currentUser.email;

            openModalWithStack('editProfileModal', 'profileModal');
        }
        function closeEditProfileModal() {
            closeModalWithStack('editProfileModal');
        }

        async function openNotifPrefsModal() {
            if (!currentUser) return;

            const result = await apiGet('notification-preferences');
            const prefs = result.success ? result.preferences : {
                email_on_notifications: currentUser.email_on_notifications !== false,
                email_on_status: currentUser.email_on_status !== false,
            };

            document.getElementById('prefEmailNotifications').checked = !!prefs.email_on_notifications;
            document.getElementById('prefEmailStatus').checked = !!prefs.email_on_status;

            openModalWithStack('notifPrefsModal', 'profileModal');
        }

        function closeNotifPrefsModal() {
            closeModalWithStack('notifPrefsModal');
        }

        async function saveNotifPrefs() {
            const btn = document.getElementById('saveNotifPrefsBtn');
            btn.disabled = true;
            btn.classList.add('btn-loading');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            try {
                const payload = {
                    email_on_notifications: document.getElementById('prefEmailNotifications').checked,
                    email_on_status: document.getElementById('prefEmailStatus').checked,
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
                btn.classList.remove('btn-loading');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-save"></i> Save';
            }
        }

        async function handleEditProfile(event) {
            event.preventDefault();
            const fullName = document.getElementById('editFullName').value.trim();
            const email = document.getElementById('editEmail').value.trim();
            const btn = document.getElementById('saveProfileBtn');

            if (!fullName) return alert('⚠️ Please enter your full name.');
            if (!email || !email.includes('@')) return alert('⚠️ Please enter a valid email.');

            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;

            try {
                const payload = {
                    full_name: fullName,
                    email: email,
                    current_password: ''
                };
                if (selectedProfilePhotoBase64) {
                    payload.photo_data = selectedProfilePhotoBase64;
                }
                if (removeProfilePhotoFlag) {
                    payload.remove_photo = 1;
                }

                const result = await apiPost('profile', payload);

                if (result.success) {
                    currentUser.full_name = fullName;
                    currentUser.email = email;
                    if (result.user && result.user.photo_url !== undefined) {
                        currentUser.photo_url = result.user.photo_url;
                    } else if (removeProfilePhotoFlag) {
                        currentUser.photo_url = null;
                    }
                    if (currentUser.role === 'citizen') {
                        document.getElementById('citizenUserName').textContent = fullName;
                    } else if (currentUser.role === 'maintenance') {
                        document.getElementById('maintenanceUserName').textContent = fullName;
                    } else if (currentUser.role === 'admin') {
                        document.getElementById('adminUserName').textContent = fullName;
                    }
                    updateUserBadges();
                    updateProfileModalAvatar();
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
                btn.classList.remove('btn-loading');
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
                buttons.push(`<button class="btn btn-info" onclick="openReportDetailsModal(${task.report_id})"><i class="fas fa-eye"></i> View Details</button>`);

                if (task.status === 'Assigned') {
                    buttons.push(`<button class="btn btn-primary" onclick="openStartModal(${task.id})"><i class="fas fa-play"></i> Start Task</button>`);
                    buttons.push(`<button class="btn btn-danger" onclick="openMaintRejectModal(${task.id})"><i class="fas fa-ban"></i> Reject Task</button>`);
                } else if (task.status === 'In Progress') {
                    buttons.push(`<button class="btn btn-success" onclick="openCompleteModal(${task.id})"><i class="fas fa-check"></i> Complete Task</button>`);
                    buttons.push(`<button class="btn btn-danger" onclick="openMaintRejectModal(${task.id})"><i class="fas fa-ban"></i> Reject Task</button>`);
                } else if (task.status === 'Completed') {
                    buttons.push(`<button class="btn btn-info" onclick="openPhotoModal(${task.id})"><i class="fas fa-images"></i> View Photos</button>`);
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
                buttons.push(`<button class="btn btn-info" onclick="openReportDetailsModal(${report.id})"><i class="fas fa-eye"></i> View Details</button>`);

                if (report.status === 'Pending') {
                    buttons.push(`<button class="btn btn-admin" onclick="openAssignModal(${report.id})"><i class="fas fa-user-check"></i> Assign Team</button>`);
                    buttons.push(`<button class="btn btn-danger" onclick="openAdminRejectModal(${report.id})"><i class="fas fa-ban"></i> Reject Report</button>`);
                } else if (report.status === 'Completed') {
                    buttons.push(`<div style="text-align:center; padding:0.5rem; font-size:0.85rem; color:#166534;"><i class="fas fa-circle-check"></i> Rated by the citizen after completion</div>`);
                } else if (report.status === 'Rejected') {
                    buttons.push(`<div style="text-align:center; padding:0.5rem; font-size:0.85rem; color:#991b1b;"><i class="fas fa-ban"></i> Report already rejected</div>`);
                }
                document.getElementById('actionModalButtons').innerHTML = buttons.join('');
            }

            openModalWithStack('actionModal');
        }

        function closeActionModal() {
            closeModalWithStack('actionModal');
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
            openModalWithStack('adminRejectModal', 'actionModal');
        }
        function closeAdminRejectModal() {
            closeModalWithStack('adminRejectModal');
        }
        async function confirmAdminReject() {
            if (!adminActiveReport) return;
            const reason = document.getElementById('adminRejectReason').value.trim();
            if (!reason) return alert('⚠️ Please provide a reason for rejection.');

            const btn = document.getElementById('adminRejectBtn');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;

            try {
                const result = await apiPost('reports/' + adminActiveReport.id + '/reject', { report_id: adminActiveReport.id, reason: reason });

                if (result.success) {
                    const reportId = adminActiveReport.id;
                    closeAdminRejectModal();
                    closeActionModal();
                    glowReportItem(reportId, 'red');
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
                btn.classList.remove('btn-loading');
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
            openModalWithStack('maintRejectModal', 'actionModal');
        }
        function closeMaintRejectModal() {
            closeModalWithStack('maintRejectModal');
        }
        async function confirmMaintReject() {
            if (!maintRejectActiveTask) return;
            const reason = document.getElementById('maintRejectReason').value.trim();
            if (!reason) return alert('⚠️ Please provide a reason for rejection.');

            const btn = document.getElementById('maintRejectBtn');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + maintRejectActiveTask.id + '/reject', { task_id: maintRejectActiveTask.id, reason: reason });

                if (result.success) {
                    const taskId = maintRejectActiveTask.id;
                    closeMaintRejectModal();
                    closeActionModal();
                    glowTaskItem(taskId, 'red');
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
                btn.classList.remove('btn-loading');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-ban"></i> Confirm Rejection';
            }
        }

        // ============ REPORT MODAL ============
        function openReportModal() {
            clearModalStack();
            document.getElementById('reportModal').classList.add('active');
            document.getElementById('reportForm').reset();
            document.getElementById('photoPreview').classList.remove('show');
            document.getElementById('photoThumb').style.display = 'none';
            document.getElementById('photoUploadArea').style.display = '';
            document.getElementById('locationCoords').classList.remove('show');
            if (categoryLookupTimer) clearTimeout(categoryLookupTimer);
            updateCategoryPreview();
            selectedFileDataUrl = null;
            selectedLocation = null;
            if (marker) { marker.remove(); marker = null; }
            document.body.style.overflow = 'hidden';
            ensureReportMap();
            detectCurrentLocation();
        }

        async function ensureReportMap() {
            const el = document.getElementById('reportLocationMap');
            if (!el) return;
            try {
                await loadLeaflet();
            } catch (error) {
                el.textContent = 'The location map is temporarily unavailable.';
                console.error('Report location map failed to load:', error);
                return;
            }

            const center = selectedLocation
                ? [selectedLocation.lat, selectedLocation.lng]
                : [DEFAULT_CENTER.lat, DEFAULT_CENTER.lng];
            if (map) {
                map.invalidateSize();
                if (selectedLocation) map.setView(center, 16);
                return;
            }

            el.replaceChildren();
            map = L.map(el).setView(center, selectedLocation ? 16 : 14);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
            }).addTo(map);
            map.on('click', event => placeMarker(event.latlng));
            requestAnimationFrame(() => map?.invalidateSize());
            if (selectedLocation) {
                placeMarker(L.latLng(selectedLocation.lat, selectedLocation.lng));
            }
        }

        function closeReportModal() {
            closeModalWithStack('reportModal');
        }
        function getCategoryIcon(value) {
            const text = String(value || '').toLowerCase();
            const categories = [
                { pattern: /pothole|road|sidewalk|pavement|obstruction|blocked lane/, icon: 'fa-road', label: 'Road issue' },
                { pattern: /tree|branch|root|fallen log/, icon: 'fa-tree', label: 'Tree or vegetation issue' },
                { pattern: /light|lamp|streetlight|electric|power line/, icon: 'fa-lightbulb', label: 'Lighting or electrical issue' },
                { pattern: /flood|water|drain|sewer|clog|leak/, icon: 'fa-water', label: 'Water or drainage issue' },
                { pattern: /dump|trash|garbage|waste|litter|rubbish/, icon: 'fa-trash', label: 'Waste issue' },
                { pattern: /landslide|erosion|soil|mudslide/, icon: 'fa-mountain', label: 'Landslide or erosion issue' },
                { pattern: /sign|traffic|signal|crosswalk/, icon: 'fa-traffic-light', label: 'Traffic or signage issue' },
                { pattern: /animal|dog|cat|stray|bite/, icon: 'fa-paw', label: 'Animal concern' },
                { pattern: /smoke|fire|burn|air|pollution/, icon: 'fa-smog', label: 'Air or fire concern' }
            ];
            return categories.find(category => category.pattern.test(text)) || { icon: 'fa-map-pin', label: 'General issue' };
        }

        function updateCategoryPreview() {
            const input = document.getElementById('category');
            if (!input) return;
            const match = getCategoryIcon(input.value);
            document.getElementById('categoryPreviewIcon').className = `fas ${match.icon}`;
            document.getElementById('categoryDetection').textContent = input.value.trim()
                ? `Detected: ${match.label}`
                : 'The icon will match the words you enter.';
        }

        function handleCategoryInput() {
            updateCategoryPreview();
            if (categoryLookupTimer) clearTimeout(categoryLookupTimer);
            categoryLookupTimer = setTimeout(checkNearbyReports, 400);
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
                    document.getElementById('photoUploadArea').style.display = 'none';
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
            document.getElementById('photoUploadArea').style.display = '';
        }

        function addOptimisticReport(category, location) {
            const container = document.getElementById('pendingReportList');
            const emptyState = document.querySelector('#citizenReportsList .empty-state');
            if (emptyState) emptyState.hidden = true;

            const item = document.createElement('div');
            item.className = 'report-item-wrap report-send-pending';
            item.innerHTML = `
                <div class="report-item">
                    <div class="report-info">
                        <i class="fas fa-flag" style="color:#2563eb;"></i>
                        <div>
                            <div class="report-title">${escapeHtml(category)}</div>
                            <div class="report-time" style="margin-top:2px;">${escapeHtml(location)}</div>
                        </div>
                    </div>
                    <div class="report-meta">
                        <span class="badge badge-review">Sending</span>
                        <span class="report-send-state"><i class="fas fa-circle-notch" aria-hidden="true" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i></span>
                    </div>
                </div>`;
            container?.prepend(item);
            return { item, emptyState };
        }

        function removeOptimisticReport(pendingReport) {
            pendingReport?.item?.remove();
            if (pendingReport?.emptyState && !cachedReports.length) pendingReport.emptyState.hidden = false;
        }

        async function submitReport(event) {
            event.preventDefault();
            const cat = document.getElementById('category');
            const categoryText = cat.value.trim();
            const description = document.getElementById('description').value.trim();

            if (!categoryText) return alert('Please enter a category.');
            if (!selectedLocation) return alert('⚠️ Please wait for location detection.');
            if (description.length < 10) return alert('⚠️ Description must be at least 10 characters.');

            const btn = document.getElementById('submitBtn');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;
            const locationText = document.getElementById('coordsText').textContent;
            const pendingReport = addOptimisticReport(categoryText, locationText);
            closeReportModal();
            showToast('Sending report', 'Your report is appearing while we finish saving it.');
            try {
                const result = await apiPost('reports', {
                    category: categoryText,
                    description: description,
                    location: locationText,
                    latitude: selectedLocation ? selectedLocation.lat : null,
                    longitude: selectedLocation ? selectedLocation.lng : null,
                    photo_data: selectedFileDataUrl
                });

                if (!result.success) {
                    removeOptimisticReport(pendingReport);
                    document.getElementById('reportModal').classList.add('active');
                    document.body.style.overflow = 'hidden';
                    showToast('Report not submitted', result.message || 'Please check the report and try again.');
                    return;
                }

                document.getElementById('reportForm').reset();
                selectedFileDataUrl = null;
                removePhoto();
                const nearbyPanel = document.getElementById('nearbyPanel');
                if (nearbyPanel) nearbyPanel.classList.remove('show');
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Report';
                btn.classList.remove('btn-loading');
                btn.disabled = false;
                const status = result.assigned_team ? 'Assigned' : 'Pending';
                const statusBadge = pendingReport.item.querySelector('.badge');
                const sendingState = pendingReport.item.querySelector('.report-send-state');
                if (statusBadge) {
                    statusBadge.className = `badge badge-${status === 'Assigned' ? 'assigned' : 'pending'}`;
                    statusBadge.textContent = status;
                }
                if (sendingState) sendingState.textContent = 'Submitted just now';
                pendingReport.item.classList.remove('report-send-pending');
                showToast('Report submitted', `${categoryText} — ${status === 'Assigned' ? `assigned to ${result.assigned_team}` : 'pending review'}.`);

                loadCitizenData().then(() => {
                    if (cachedReports.some(report => Number(report.id) === Number(result.report_id))) {
                        pendingReport.item.remove();
                    }
                }).catch(refreshError => {
                    console.error('Report submitted but dashboard refresh failed:', refreshError);
                    showToast('Report submitted', 'Your report was saved. The dashboard could not refresh; reload it to see the update.');
                });
            } catch (error) {
                console.error('Report submission failed:', error);
                removeOptimisticReport(pendingReport);
                document.getElementById('reportModal').classList.add('active');
                document.body.style.overflow = 'hidden';
                showToast('Report not submitted', error.message || 'Check your connection and try again.');
            } finally {
                btn.innerHTML = '<i class="fas fa-paper-plane"></i> Submit Report';
                btn.classList.remove('btn-loading');
                btn.disabled = false;
            }
        }

        function placeMarker(latLng) {
            if (marker) {
                marker.setLatLng(latLng);
            } else {
                marker = L.marker(latLng, {
                    draggable: true,
                    icon: getLeafletIncidentPin('Low')
                }).addTo(map);
                marker.on('dragend', event => updateLocation(event.target.getLatLng()));
            }
            updateLocation(latLng);
        }

        function updateLocation(latLng) {
            selectedLocation = { lat: latLng.lat, lng: latLng.lng };
            const coords = `${latLng.lat.toFixed(5)}° N, ${latLng.lng.toFixed(5)}° E`;
            document.getElementById('coordsText').textContent = 'Pinned: ' + coords;
            document.getElementById('locationCoords').classList.add('show');
            reverseGeocode(latLng.lat, latLng.lng);
            checkNearbyReports();
        }

        function reverseGeocode(lat, lng) {
            fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}&zoom=18`)
                .then(r => r.json())
                .then(d => {
                    if (d && d.display_name) {
                        document.getElementById('coordsText').textContent = d.display_name;
                    }
                })
                .catch(() => {});
        }

        function detectCurrentLocation() {
            if (!navigator.geolocation) {
                showToast('Location unavailable', 'Your browser does not support location detection.');
                return;
            }
            navigator.geolocation.getCurrentPosition(
                pos => {
                    const p = { lat: pos.coords.latitude, lng: pos.coords.longitude };
                    selectedLocation = p;
                    ensureReportMap();
                    if (map) {
                        map.setView([p.lat, p.lng], 16);
                        placeMarker(L.latLng(p.lat, p.lng));
                    }
                    const hint = document.querySelector('.map-hint');
                    if (hint) hint.innerHTML = '<i class="fas fa-check-circle"></i> Location detected!';
                },
                err => {
                    let msg = 'Unable to get location.';
                    if (err.code === 1) msg = 'Location permission denied.';
                    if (err.code === 3) msg = 'Location request timed out.';
                    showToast('Location unavailable', msg);
                    const hint = document.querySelector('.map-hint');
                    if (hint) hint.innerHTML = '<i class="fas fa-exclamation-triangle"></i> ' + msg;
                },
                { enableHighAccuracy: false, timeout: 15000, maximumAge: 60000 }
            );
        }

        async function checkNearbyReports() {
            const panel = document.getElementById('nearbyPanel');
            const list = document.getElementById('nearbyList');
            if (!panel || !list || !selectedLocation) {
                if (panel) panel.classList.remove('show');
                return;
            }

            const category = document.getElementById('category')?.value?.trim() || '';

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
        let nearbyMapReportIds = '';
        let leafletLoaderPromise = null;

        function loadLeaflet() {
            if (window.L) return Promise.resolve();
            if (leafletLoaderPromise) return leafletLoaderPromise;

            const stylesheet = document.createElement('link');
            stylesheet.rel = 'stylesheet';
            stylesheet.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
            document.head.appendChild(stylesheet);

            leafletLoaderPromise = new Promise((resolve, reject) => {
                const script = document.createElement('script');
                script.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
                script.onload = resolve;
                script.onerror = () => reject(new Error('Leaflet could not be loaded.'));
                document.head.appendChild(script);
            });
            return leafletLoaderPromise;
        }

        async function initNearbyMap(reports = null) {
            const el = document.getElementById('nearbyMap');
            if (!el) return;

            try {
                await loadLeaflet();
            } catch (error) {
                el.textContent = 'The incident map is temporarily unavailable.';
                console.error('Incident map failed to load:', error);
                return;
            }

            if (!Array.isArray(reports)) {
                const result = await apiGet('reports');
                reports = result.success ? result.reports : [];
            }
            reports = reports.filter(report => report.latitude && report.longitude);
            const reportIds = reports.map(report => `${Number(report.id)}:${report.status}`).sort().join(',');
            if (nearbyMapInitialized && nearbyMap && reportIds === nearbyMapReportIds) return;

            nearbyMarkers.forEach(marker => marker.remove());
            nearbyMarkers = [];

            if (reports.length === 0) {
                nearbyMapReportIds = reportIds;
                if (!nearbyMap) {
                    el.textContent = 'No incidents with coordinates';
                }
                return;
            }

            const avgLat = reports.reduce((s, i) => s + parseFloat(i.latitude), 0) / reports.length;
            const avgLng = reports.reduce((s, i) => s + parseFloat(i.longitude), 0) / reports.length;

            if (!nearbyMap) {
                el.replaceChildren();
                nearbyMap = L.map(el).setView([avgLat, avgLng], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
                }).addTo(nearbyMap);
            }

            reports.forEach(report => {
                const marker = L.circleMarker([parseFloat(report.latitude), parseFloat(report.longitude)], {
                    radius: 10,
                    color: '#ffffff',
                    weight: 2,
                    fillColor: getReportStatusColor(report.status),
                    fillOpacity: 1
                }).addTo(nearbyMap);
                marker.bindPopup(`
                    <strong>${escapeHtml(report.category)}</strong><br>
                    ${escapeHtml(report.location)}<br>
                    <small>${escapeHtml(report.status)} · ${escapeHtml(getTimeAgo(report.created_at))}</small>
                `);
                nearbyMarkers.push(marker);
            });

            nearbyMap.fitBounds(L.latLngBounds(reports.map(report => [parseFloat(report.latitude), parseFloat(report.longitude)])), { padding: [18, 18], maxZoom: 15 });
            nearbyMapInitialized = true;
            nearbyMapReportIds = reportIds;
        }

        function getReportStatusColor(status) {
            const colors = {
                Pending: '#f59e0b',
                Assigned: '#3b82f6',
                'In Progress': '#8b5cf6',
                Completed: '#10b981',
                Rejected: '#ef4444'
            };
            return colors[status] || '#64748b';
        }

        function getLeafletIncidentPin(priority = 'Medium') {
            const colors = {
                Critical: '#ef4444',
                High: '#f97316',
                Medium: '#0ea5e9',
                Low: '#10b981'
            };
            const color = colors[priority] || colors.Medium;
            const isHighPriority = priority === 'Critical' || priority === 'High';
            const centerIcon = isHighPriority
                ? '<path d="M30 19 L30 27 M30 31 L30 32.5" stroke="' + color + '" stroke-width="2.5" stroke-linecap="round"/>'
                : '<circle cx="30" cy="26" r="6" fill="' + color + '"><animate attributeName="r" values="5;7.5;5" dur="1.6s" repeatCount="indefinite"/></circle><circle cx="30" cy="26" r="2.2" fill="#ffffff"/>';
            const svg = `<svg xmlns="http://www.w3.org/2000/svg" width="60" height="74" viewBox="0 0 60 74">
                <ellipse cx="30" cy="67" rx="6" ry="3" fill="none" stroke="${color}" stroke-width="2.4">
                    <animate attributeName="rx" values="6;22;22" dur="1.7s" repeatCount="indefinite"/>
                    <animate attributeName="ry" values="3;10;10" dur="1.7s" repeatCount="indefinite"/>
                    <animate attributeName="opacity" values="0.85;0;0" dur="1.7s" repeatCount="indefinite"/>
                </ellipse>
                <ellipse cx="30" cy="67" rx="8" ry="3.5" fill="#0f172a" opacity="0.22"/>
                <g>
                    <animateTransform attributeName="transform" type="translate" values="0,0;0,-2.5;0,0" dur="2.4s" repeatCount="indefinite"/>
                    <path d="M30 65 C21 51 12 39 12 26 C12 14.5 20 6 30 6 C40 6 48 14.5 48 26 C48 39 39 51 30 65 Z" fill="${color}" stroke="#ffffff" stroke-width="2.2" filter="drop-shadow(0 4px 6px rgba(0,0,0,0.35))"/>
                    <circle cx="30" cy="26" r="11" fill="#ffffff"/>
                    ${centerIcon}
                </g>
            </svg>`;

            return L.divIcon({
                className: 'incident-map-marker',
                html: svg,
                iconSize: [46, 56],
                iconAnchor: [23, 51],
                popupAnchor: [0, -48]
            });
        }

        function getMarkerIcon(priority) {
            const config = {
                'Critical': { color: '#ef4444', iconType: 'alert' },
                'High': { color: '#f97316', iconType: 'alert' },
                'Medium': { color: '#0ea5e9', iconType: 'dot' },
                'Low': { color: '#10b981', iconType: 'dot' }
            };
            const item = config[priority] || config['Medium'];
            return getAnimatedMarkerPin({
                color: item.color,
                pulse: true,
                iconType: item.iconType
            });
        }

        // ============ MAINTENANCE ============
        async function loadMaintenanceData() {
            showMetricLoading(['maintAssigned', 'maintInProgress', 'maintCompleted', 'maintAvgRating']);
            showDataLoading('maintTasksList', 'Loading assigned tasks...');
            showDataLoading('maintNotifList', 'Loading notifications...');
            console.log('Current user:', currentUser);
            try {
                const result = await apiGet('tasks');
                console.log('Tasks API result:', result);
                if (result.success) {
                    allTasks = result.tasks || [];
                    console.log('Loaded tasks:', allTasks.length);
                    syncGpsSharing();
                    if (result.team_name) {
                        document.getElementById('maintenanceUserName').textContent = currentUser.full_name;
                    }
                    updateTaskStats();
                    renderTasks();
                    updateMaintMap();
                    updateMaintRating();
                } else {
                    console.error('Tasks API failed:', result.message);
                    ['maintAssigned', 'maintInProgress', 'maintCompleted'].forEach(id => setMetricValue(id, '—', true));
                    showDataLoadError('maintTasksList', result.message || 'Could not load assigned tasks.', () => loadMaintenanceData());
                }
            } catch (error) {
                console.error('Tasks API error:', error);
                ['maintAssigned', 'maintInProgress', 'maintCompleted'].forEach(id => setMetricValue(id, '—', true));
                showDataLoadError('maintTasksList', 'Network error loading tasks: ' + (error.message || 'Unknown error'), () => loadMaintenanceData());
            }
            try {
                const notifsResult = await apiGet('notifications');
                if (notifsResult.success) {
                    notifsResult.notifications.forEach(n => {
                        if (n.id > lastKnownNotificationId) lastKnownNotificationId = n.id;
                    });
                    renderNotificationsList('maintNotifList', notifsResult.notifications);
                } else {
                    showDataLoadError('maintNotifList', notifsResult.message || 'Could not load notifications.', () => loadMaintenanceData());
                }
            } catch (error) {
                console.error('Notifications API error:', error);
                showDataLoadError('maintNotifList', 'Network error loading notifications.', () => loadMaintenanceData());
            }
            animateDashboardData();
        }

        function updateTaskStats() {
            const assigned = allTasks.filter(t => t.status === 'Assigned').length;
            const inProgress = allTasks.filter(t => t.status === 'In Progress').length;
            const completed = allTasks.filter(t => t.status === 'Completed').length;

            setMetricValue('maintAssigned', assigned + inProgress);
            setMetricValue('maintInProgress', inProgress);
            setMetricValue('maintCompleted', completed);

            document.getElementById('tabAssigned').textContent = assigned;
            document.getElementById('tabInProgress').textContent = inProgress;
            document.getElementById('tabCompleted').textContent = completed;
        }

        async function updateMaintRating() {
            showMetricLoading(['maintAvgRating']);
            const stats = await apiGet('stats');
            if (stats.success) {
                setMetricValue('maintAvgRating', stats.avg_rating !== null && stats.avg_rating !== '—' ? stats.avg_rating : '—');
            } else {
                setMetricValue('maintAvgRating', '—', true);
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
                list.dataset.listExpanded = 'false';
                markDataLoaded(list, false);
                return;
            }

            list.innerHTML = tasks.map(t => {
                const badge = t.status === 'Assigned' ? 'assigned' :
                            t.status === 'In Progress' ? 'progress' :
                            t.status === 'Completed' ? 'completed' :
                            t.status === 'Rejected' ? 'rejected' : 'pending';
                const ratingBadge = t.rating ? `<span class="badge badge-rated" style="font-size:0.65rem;">⭐ ${t.rating.rating}/5</span>` : '';
                return `
                    <div class="task-item" data-task-id="${t.id}">
                        <div class="task-info">
                            <i class="fas fa-map-pin" style="color:#b45309;"></i>
                            <div>
                                <div class="task-title">${t.title}</div>
                                <div class="task-location">📍 ${t.location}</div>
                            </div>
                        </div>
                        <div class="task-meta">
                            <span class="badge badge-${badge} maintenance-task-status">${t.status}</span>
                            ${ratingBadge}
                            <button class="btn-sm btn-sm-actions btn-icon-only" title="Actions" onclick="openActionModal('maint', ${t.id})">
                                <i class="fas fa-bolt"></i>
                            </button>
                        </div>
                    </div>
                `;
            }).join('');
            updateListExpansion(list, '.task-item');
            markDataLoaded(list, false);
        }

        function glowTaskItem(taskId, glowType) {
            const taskItem = document.querySelector(`.task-item[data-task-id="${taskId}"]`);
            if (!taskItem) return;

            // Remove any existing glow classes
            taskItem.classList.remove('task-glow-blue', 'task-glow-red', 'task-glow-green', 'task-glow-violet');

            // Add the requested glow class
            if (glowType === 'blue') {
                taskItem.classList.add('task-glow-blue');
            } else if (glowType === 'red') {
                taskItem.classList.add('task-glow-red');
            } else if (glowType === 'green') {
                taskItem.classList.add('task-glow-green');
            } else if (glowType === 'violet') {
                taskItem.classList.add('task-glow-violet');
            }

            // Remove the class after animation completes (1 second)
            setTimeout(() => {
                taskItem.classList.remove('task-glow-blue', 'task-glow-red', 'task-glow-green', 'task-glow-violet');
            }, 1000);
        }

        function glowReportItem(reportId, glowType) {
            const reportItem = document.querySelector(`.report-item[data-report-id="${reportId}"]`);
            if (!reportItem) return;

            // Remove any existing glow classes
            reportItem.classList.remove('task-glow-blue', 'task-glow-red', 'task-glow-green', 'task-glow-violet');

            // Add the requested glow class
            if (glowType === 'blue') {
                reportItem.classList.add('task-glow-blue');
            } else if (glowType === 'red') {
                reportItem.classList.add('task-glow-red');
            } else if (glowType === 'green') {
                reportItem.classList.add('task-glow-green');
            } else if (glowType === 'violet') {
                reportItem.classList.add('task-glow-violet');
            }

            // Remove the class after animation completes (1 second)
            setTimeout(() => {
                reportItem.classList.remove('task-glow-blue', 'task-glow-red', 'task-glow-green', 'task-glow-violet');
            }, 1000);
        }

        async function initMaintMap() {
            const el = document.getElementById('maintMap');
            if (!el) return;

            try {
                await loadLeaflet();
            } catch (error) {
                el.textContent = 'The task map is temporarily unavailable.';
                console.error('Task map failed to load:', error);
                return;
            }

            if (!maintMap) {
                el.replaceChildren();
                maintMap = L.map(el).setView([DEFAULT_CENTER.lat, DEFAULT_CENTER.lng], 12);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
                }).addTo(maintMap);
            } else {
                maintMap.invalidateSize();
            }
            updateMaintMap();
        }

        function updateMaintMap() {
            if (!maintMap) return;
            maintMarkers.forEach(marker => marker.remove());
            maintMarkers = [];

            const tasksWithCoords = allTasks.filter(task =>
                task.latitude !== null && task.latitude !== undefined &&
                task.longitude !== null && task.longitude !== undefined &&
                Number.isFinite(Number(task.latitude)) && Number.isFinite(Number(task.longitude))
            );
            tasksWithCoords.forEach(t => {
                const coords = [Number(t.latitude), Number(t.longitude)];
                const isAssigned = t.status === 'Assigned';
                const isInProgress = t.status === 'In Progress';
                const isCompleted = t.status === 'Completed';
                const color = getReportStatusColor(t.status);
                const marker = L.marker(coords, {
                    icon: L.divIcon({
                        className: 'task-map-marker-icon',
                        html: `<span class="task-map-marker" style="--task-marker-color:${color}"><span class="task-map-marker-pulse"></span><span class="task-map-marker-dot"></span></span>`,
                        iconSize: [24, 24],
                        iconAnchor: [12, 12],
                        popupAnchor: [0, -12]
                    })
                }).addTo(maintMap);
                marker.bindPopup(`
                    <strong>${escapeHtml(t.title || 'Task')}</strong><br>
                    ${escapeHtml(t.location || 'Location unavailable')}<br>
                    <small>${escapeHtml(t.status || 'Unknown')} · ${escapeHtml(t.priority || 'Normal')}</small>
                `);
                maintMarkers.push(marker);
            });

            if (maintMarkers.length > 0) {
                maintMap.fitBounds(L.latLngBounds(tasksWithCoords.map(task => [Number(task.latitude), Number(task.longitude)])), {
                    padding: [24, 24],
                    maxZoom: 15
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
            openModalWithStack('startModal', 'actionModal');
        }

        function closeStartModal() {
            closeModalWithStack('startModal');
        }

        async function confirmStartTask() {
            if (!activeTask) return;
            const btn = document.getElementById('startTaskBtn');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + activeTask.id + '/start', { task_id: activeTask.id });

                if (result.success) {
                    const taskId = activeTask.id;
                    closeStartModal();
                    closeActionModal();
                    glowTaskItem(taskId, 'blue');
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
                btn.classList.remove('btn-loading');
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
            document.getElementById('completeBeforeUploadArea').style.display = '';
            document.getElementById('completeAfterUploadArea').style.display = '';
            document.getElementById('completeBeforeThumb').style.display = 'none';
            document.getElementById('completeAfterThumb').style.display = 'none';
            completeBeforeDataUrl = null;
            completeAfterDataUrl = null;
            openModalWithStack('completeModal', 'actionModal');
        }

        function closeCompleteModal() {
            closeModalWithStack('completeModal');
        }

        function chooseCompletePhoto(inputId) {
            const input = document.getElementById(inputId);
            input.value = '';
            input.click();
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
                    document.getElementById(previewId === 'completeBeforePreview' ? 'completeBeforeUploadArea' : 'completeAfterUploadArea').style.display = 'none';
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
            document.getElementById(inputId === 'completeBeforePhoto' ? 'completeBeforeUploadArea' : 'completeAfterUploadArea').style.display = '';
            if (inputId === 'completeBeforePhoto') completeBeforeDataUrl = null;
            if (inputId === 'completeAfterPhoto') completeAfterDataUrl = null;
        }

        async function submitComplete(event) {
            event.preventDefault();
            if (!activeTask) return;

            if (!completeAfterDataUrl) return alert('⚠️ Please upload an after photo.');

            const btn = document.getElementById('completeBtn');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + activeTask.id + '/complete', {
                    task_id: activeTask.id,
                    before_photo_data: completeBeforeDataUrl,
                    after_photo_data: completeAfterDataUrl,
                    notes: document.getElementById('completeNotes').value.trim()
                });

                if (result.success) {
                    const taskId = activeTask.id;
                    closeCompleteModal();
                    closeActionModal();
                    glowTaskItem(taskId, 'green');
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
                btn.classList.remove('btn-loading');
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

            openModalWithStack('photoModal', 'actionModal');
        }

        function closePhotoModal() {
            closeModalWithStack('photoModal');
        }

        // ============ ADMIN ============
        function openMaintenanceAccountModal() {
            clearModalStack();
            document.getElementById('maintenanceAccountForm').reset();
            document.getElementById('maintenanceAccountModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeMaintenanceAccountModal() {
            closeModalWithStack('maintenanceAccountModal');
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
            showMetricLoading(['adminTotalReports', 'adminPendingReports', 'adminAssignedReports', 'adminCompletedReports']);
            [
                ['adminReportsList', 'Loading reports...'],
                ['adminNotifList', 'Loading notifications...'],
                ['adminPendingMaintenanceList', 'Loading applications...'],
                ['adminTeamList', 'Loading teams...'],
                ['adminTopCitizens', 'Loading leaderboard...'],
                ['adminTopTeams', 'Loading leaderboard...'],
                ['adminAutoAssignList', 'Loading rules...']
            ].forEach(([id, label]) => showDataLoading(id, label));

            const usersResult = await apiGet('users');
            if (usersResult.success) {
                renderPendingMaintenanceUsers(usersResult.users || []);
            } else {
                showDataLoadError('adminPendingMaintenanceList', 'Could not load applications.', () => loadAdminData());
            }

            const stats = await apiGet('stats');
            if (stats.success) {
                setMetricValue('adminTotalReports', stats.total || 0);
                setMetricValue('adminPendingReports', stats.pending || 0);
                setMetricValue('adminAssignedReports', stats.assigned || 0);
                setMetricValue('adminCompletedReports', stats.completed || 0);
            } else {
                ['adminTotalReports', 'adminPendingReports', 'adminAssignedReports', 'adminCompletedReports'].forEach(id => setMetricValue(id, '—', true));
            }

            const reportsResult = await apiGet('reports');
            if (reportsResult.success) {
                cachedReports = reportsResult.reports;
                populateAdminReportFilters();
                cachedReports.forEach(r => {
                    if (r.id > lastKnownReportId) lastKnownReportId = r.id;
                });
                renderAdminReports();
            } else {
                showDataLoadError('adminReportsList', 'Could not load reports.', () => loadAdminData());
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
            } else {
                showDataLoadError('adminNotifList', 'Could not load notifications.', () => loadAdminData());
            }
            animateDashboardData();
        }

        function switchAdminTab(tabName) {
            document.querySelectorAll('.admin-header-nav-item').forEach(tab => {
                tab.classList.remove('active');
                if (tab.dataset.tab === tabName) {
                    tab.classList.add('active');
                }
            });

            document.querySelectorAll('.admin-tab-pane').forEach(pane => {
                pane.classList.remove('active');
            });

            const targetPane = document.getElementById(`admin-tab-${tabName}`);
            if (targetPane) {
                targetPane.classList.add('active');
            }
        }

        function renderPendingMaintenanceUsers(users) {
            const list = document.getElementById('adminPendingMaintenanceList');
            if (!list) return;
            const pending = users.filter(user => user.role === 'maintenance' && !user.is_approved && !user.is_rejected);
            if (!pending.length) {
                list.innerHTML = '<div class="empty-state"><i class="fas fa-user-check"></i><div class="empty-title">No applications waiting</div><div class="empty-desc">New maintenance applicants will appear here</div></div>';
                list.dataset.listExpanded = 'false';
                markDataLoaded(list, false);
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
            updateListExpansion(list, '.task-item');
            markDataLoaded(list, false);
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
            showDataLoading('adminTeamList', 'Loading teams...');
            const result = await apiGet('teams');
            if (!result.success) {
                showDataLoadError('adminTeamList', 'Could not load teams.', () => loadTeams());
                return;
            }
            cachedTeams = result.teams || [];
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
                list.dataset.listExpanded = 'false';
                markDataLoaded(list);
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
            updateListExpansion(list, '.task-item');
            markDataLoaded(list, false);
            markDataLoaded(list);
        }

        async function loadAutoAssignRules() {
            showDataLoading('adminAutoAssignList', 'Loading rules...');
            const result = await apiGet('auto-assign-rules');
            if (!result.success) {
                showDataLoadError('adminAutoAssignList', 'Could not load rules.', () => loadAutoAssignRules());
                return;
            }
            cachedAutoAssignRules = result.rules || [];
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
                list.dataset.listExpanded = 'false';
                markDataLoaded(list);
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
            updateListExpansion(list, '.task-item');
            markDataLoaded(list);
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
            clearModalStack();
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
            document.body.style.overflow = 'hidden';
        }

        function closeAutoAssignModal() {
            document.getElementById('autoAssignModal').style.display = 'none';
            document.body.style.overflow = 'auto';
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

        function openNavigateModal(taskId = null) {
            clearModalStack();
            const activeTasks = getActiveGpsTasks();
            if (!activeTasks.length) {
                showToast('No active tasks', 'There are no assigned tasks to navigate to.');
                return;
            }

            const select = document.getElementById('navTaskSelect');
            select.replaceChildren(...activeTasks.map(task => new Option(`${task.title} · ${task.location}`, task.id)));
            const selectedTask = activeTasks.find(task => Number(task.id) === Number(taskId)) || activeTasks[0];
            select.value = String(selectedTask.id);
            document.getElementById('navigateModal').classList.add('active');
            document.body.style.overflow = 'hidden';
            selectNavigationTask(selectedTask.id);
        }

        async function selectNavigationTask(taskId) {
            const task = allTasks.find(item => Number(item.id) === Number(taskId));
            if (!task) return;
            activeTask = task;

            document.getElementById('navTaskName').textContent = task.title || 'Task';
            document.getElementById('navDestination').textContent = task.location || '—';
            document.getElementById('navPriority').textContent = task.priority || 'Medium';

            const el = document.getElementById('navMap');
            try {
                await loadLeaflet();
            } catch (error) {
                el.textContent = 'The navigation map is temporarily unavailable.';
                console.error('Navigation map failed to load:', error);
                return;
            }

            const hasCoordinates = task.latitude !== null && task.latitude !== undefined &&
                task.longitude !== null && task.longitude !== undefined &&
                Number.isFinite(Number(task.latitude)) && Number.isFinite(Number(task.longitude));
            const position = hasCoordinates
                ? [Number(task.latitude), Number(task.longitude)]
                : [DEFAULT_CENTER.lat, DEFAULT_CENTER.lng];

            if (!navMap) {
                el.replaceChildren();
                navMap = L.map(el).setView(position, hasCoordinates ? 15 : 12);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap contributors</a>'
                }).addTo(navMap);
            }

            navMarkers.forEach(item => item.remove());
            navMarkers = [];
            if (hasCoordinates) {
                navMarkers.push(L.marker(position, {
                    title: task.title || 'Assigned task',
                    icon: getLeafletIncidentPin(task.priority || 'Medium')
                }).addTo(navMap).bindPopup(escapeHtml(task.location || task.title || 'Task destination')));
            }
            navMap.setView(position, hasCoordinates ? 15 : 12);
            requestAnimationFrame(() => navMap?.invalidateSize());
        }

        function closeNavigateModal() {
            closeModalWithStack('navigateModal');
        }

        function startNavigation() {
            if (!activeTask) return;
            const hasCoordinates = activeTask.latitude !== null && activeTask.latitude !== undefined &&
                activeTask.longitude !== null && activeTask.longitude !== undefined &&
                Number.isFinite(Number(activeTask.latitude)) && Number.isFinite(Number(activeTask.longitude));
            const destination = hasCoordinates
                ? `${activeTask.latitude},${activeTask.longitude}`
                : activeTask.location;
            if (!destination) {
                showToast('Destination unavailable', 'This task has no location to navigate to.');
                return;
            }

            window.open(`https://www.google.com/maps/dir/?api=1&destination=${encodeURIComponent(destination)}`, '_blank', 'noopener');
            closeNavigateModal();
        }

        async function loadLeaderboard() {
            showDataLoading('adminTopCitizens', 'Loading leaderboard...');
            showDataLoading('adminTopTeams', 'Loading leaderboard...');
            const result = await apiGet('leaderboard');
            if (!result.success) {
                showDataLoadError('adminTopCitizens', 'Could not load leaderboard.', () => loadLeaderboard());
                showDataLoadError('adminTopTeams', 'Could not load leaderboard.', () => loadLeaderboard());
                return;
            }

            const citizens = result.citizens || [];
            const citizenList = document.getElementById('adminTopCitizens');
            if (citizenList) {
                if (citizens.length === 0) {
                    citizenList.innerHTML = `
                        <div class="empty-state">
                            <i class="fas fa-user-circle"></i>
                            <div class="empty-title">No citizens yet</div>
                            <div class="empty-desc">Leaderboard will appear once citizens submit reports</div>
                        </div>`;
                } else {
                    citizenList.innerHTML = citizens.map((c, i) => {
                        const medal = i === 0 ? '🥇' : i === 1 ? '🥈' : i === 2 ? '🥉' : `<span style="font-weight:700;color:#d1d5db;">#${i + 1}</span>`;
                        const avatar = c.photo_url
                            ? `<img src="${c.photo_url}" style="width:36px; height:36px; border-radius:50%; object-fit:cover; margin-right:8px;" alt="${escapeHtml(c.full_name)}" />`
                            : `<div style="width:36px; height:36px; border-radius:50%; background:#e2e8f0; display:flex; align-items:center; justify-content:center; margin-right:8px; color:#64748b; font-size:0.9rem;"><i class="fas fa-user"></i></div>`;
                        return `
                            <div class="task-item">
                                <div class="task-info">
                                    <span style="width:26px; text-align:center; font-size:1rem;">${medal}</span>
                                    ${avatar}
                                    <div>
                                        <div class="task-title">${escapeHtml(c.full_name)}</div>
                                        <div class="task-location">${c.reports || 0} report${(c.reports || 0) !== 1 ? 's' : ''}</div>
                                    </div>
                                </div>
                                <span class="badge badge-assigned">${c.reports || 0}</span>
                            </div>
                        `;
                    }).join('');
                }
                updateListExpansion(citizenList, '.task-item');
                markDataLoaded(citizenList, false);
            }

            const teams = result.teams || [];
            const teamList = document.getElementById('adminTopTeams');
            if (teamList) {
                if (teams.length === 0) {
                    teamList.innerHTML = `
                        <div class="empty-state">
                            <i class="fas fa-hard-hat"></i>
                            <div class="empty-title">No teams yet</div>
                            <div class="empty-desc">Teams will be ranked by jobs solved and total stars</div>
                        </div>`;
                } else {
                    teamList.innerHTML = teams.map((t, i) => {
                        const medal = i === 0 ? '🥇' : i === 1 ? '🥈' : i === 2 ? '🥉' : `<span style="font-weight:700;color:#d1d5db;">#${i + 1}</span>`;
                        const totalStars = t.total_rating ? t.total_rating.toFixed(1) : '0';
                        return `
                            <div class="task-item">
                                <div class="task-info">
                                    <span style="width:26px; text-align:center; font-size:1rem;">${medal}</span>
                                    <div>
                                        <div class="task-title">${escapeHtml(t.team_name)}</div>
                                        <div class="task-location">${t.jobs || 0} job${(t.jobs || 0) !== 1 ? 's' : ''} solved</div>
                                    </div>
                                </div>
                                <span class="badge badge-completed">⭐ ${totalStars}</span>
                            </div>
                        `;
                    }).join('');
                }
                updateListExpansion(teamList, '.task-item');
                markDataLoaded(teamList, false);
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
                list.dataset.listExpanded = 'false';
                markDataLoaded(list, false);
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
            updateListExpansion(list, '.report-item');
            markDataLoaded(list, false);
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
            openModalWithStack('assignModal', 'actionModal');
        }

        function closeAssignModal() {
            closeModalWithStack('assignModal');
        }

        async function confirmAssign() {
            if (!adminActiveReport) return;
            const team = document.getElementById('assignTeamSelect').value;
            if (!team) return alert('⚠️ Please select a team.');

            const btn = document.getElementById('assignBtn');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;

            try {
                const result = await apiPost('reports/' + adminActiveReport.id + '/assign', {
                    report_id: adminActiveReport.id,
                    team_name: team
                });

                if (result.success) {
                    const reportId = adminActiveReport.id;
                    closeAssignModal();
                    closeActionModal();
                    glowReportItem(reportId, 'violet');
                    showToast('✅ Team Assigned!', `${team} assigned to ${adminActiveReport.category}`);
                    await loadAdminData();
                } else {
                    alert('⚠️ ' + result.message);
                }
            } catch (error) {
                console.error('Assigning team failed:', error);
                alert('⚠️ Could not assign team. Check your connection and try again.');
            } finally {
                btn.classList.remove('btn-loading');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-user-check"></i> Assign Team';
            }
        }

        // ============ CITIZEN RATING (rate the maintenance team) ============
        function setRatingPhoto(imageId, placeholderId, photoPath) {
            const image = document.getElementById(imageId);
            const placeholder = document.getElementById(placeholderId);
            if (!image || !placeholder) return;

            const showPlaceholder = () => {
                image.onerror = null;
                image.removeAttribute('src');
                image.style.display = 'none';
                placeholder.style.display = 'grid';
            };

            if (!photoPath) {
                showPlaceholder();
                return;
            }

            image.onerror = showPlaceholder;
            image.style.display = 'block';
            placeholder.style.display = 'none';
            image.src = photoPath;
        }

        async function openCitizenRating(reportId) {
            clearModalStack();
            const report = cachedReports.find(r => r.id === reportId);
            if (!report) return;
            if (!report.task_id) {
                showToast('⚠️ Not available', 'No task is linked to this report yet.');
                return;
            }
            adminActiveTask = { id: report.task_id, title: report.category, location: report.location, team_name: report.assigned_team || 'Maintenance Team' };
            selectedRating = null;

            document.getElementById('rateTaskName').textContent = report.category;
            document.getElementById('rateTeamName').textContent = report.assigned_team || 'Maintenance Team';
            document.getElementById('rateTaskLocation').textContent = report.location;
            setRatingPhoto('rateBeforePhoto', 'rateBeforePhotoEmpty', report.before_photo);
            setRatingPhoto('rateAfterPhoto', 'rateAfterPhotoEmpty', report.after_photo);
            document.getElementById('rateComment').value = '';
            document.getElementById('ratingLabel').textContent = 'Select rating';

            document.querySelectorAll('#ratingStars .star').forEach(s => s.classList.remove('active'));

            document.getElementById('ratingModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeRatingModal() {
            closeModalWithStack('ratingModal');
            adminActiveTask = null;
            selectedRating = null;
        }

        function setRating(value) {
            if (value === 1 && selectedRating === 1) value = 0;
            selectedRating = value;
            document.querySelectorAll('#ratingStars .star').forEach(s => {
                const starVal = parseInt(s.dataset.value);
                if (starVal <= value) {
                    s.classList.add('active');
                } else {
                    s.classList.remove('active');
                }
            });
            const labels = { 0: '0 stars', 1: 'Poor', 2: 'Fair', 3: 'Good', 4: 'Very Good', 5: 'Excellent' };
            document.getElementById('ratingLabel').textContent = labels[value] || value + ' stars';
        }

        async function submitRating() {
            if (!adminActiveTask) return;
            if (selectedRating === null) return alert('⚠️ Please select a rating (0-5 stars).');

            const comment = document.getElementById('rateComment').value.trim();
            const ratedTeamName = adminActiveTask.team_name;
            const submittedRating = selectedRating;
            const btn = document.getElementById('rateBtn');
            btn.innerHTML = '<i class="fas fa-circle-notch" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>';
            btn.classList.add('btn-loading');
            btn.disabled = true;

            try {
                const result = await apiPost('tasks/' + adminActiveTask.id + '/rate', {
                    task_id: adminActiveTask.id,
                    rating: selectedRating,
                    comment: comment
                });

                if (result.success) {
                    closeRatingModal();
                    showToast('⭐ Thanks for rating!', `${ratedTeamName} received ${submittedRating}/5 stars.`);
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
                btn.classList.remove('btn-loading');
                btn.disabled = false;
                btn.innerHTML = '<i class="fas fa-star"></i> Submit Rating';
            }
        }

        // ============ LOGOUT ============
        function openLogoutModal() {
            clearModalStack();
            document.getElementById('logoutModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeLogoutModal() {
            closeModalWithStack('logoutModal');
        }

        async function confirmLogout() {
            closeLogoutModal();
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

        async function handleLogout() {
            openLogoutModal();
        }

         // ============ THEME TOGGLE ============
        function setTheme(theme) {
            if (theme !== 'dark' && theme !== 'light') return;
            const isDark = theme === 'dark';
            document.body.classList.toggle('dark-mode', isDark);
            localStorage.setItem('theme', theme);
            document.querySelectorAll('.header-theme-toggle input').forEach(input => {
                input.checked = isDark;
            });
            showToast(isDark ? 'Dark mode enabled' : 'Light mode enabled', '');
        }

        function applyTheme() {
            const savedTheme = localStorage.getItem('theme');
            const isDark = savedTheme === 'dark' || (!savedTheme && window.matchMedia('(prefers-color-scheme: dark)').matches);
            document.body.classList.toggle('dark-mode', isDark);
            document.querySelectorAll('.header-theme-toggle input').forEach(input => {
                input.checked = isDark;
            });
        }

        // ============ MODAL STACK ============
        let modalStack = [];

        function openModalWithStack(modalId, parentModalId = null) {
            if (parentModalId) {
                modalStack.push(parentModalId);
                document.getElementById(modalId).classList.add('stack-modal');
            }
            document.getElementById(modalId).classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModalWithStack(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('active');
            modal.classList.remove('stack-modal');
            
            if (modalStack.length > 0) {
                const previousModal = modalStack.pop();
                document.getElementById(previousModal).classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
        }

        function clearModalStack() {
            modalStack = [];
        }

        // ============ MISC ============
        function togglePassword(inputId) {
            const input = document.getElementById(inputId);
            if (!input) return;

            let button = input.nextElementSibling;
            if (!button || !button.classList.contains('password-toggle')) {
                button = document.querySelector(`.password-toggle[onclick*="${CSS.escape(inputId)}"]`);
            }
            if (!button) return;

            const icon = button.querySelector('i');
            if (!icon) return;

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function initPasswordToggles() {
            document.querySelectorAll('.password-toggle').forEach((button) => {
                button.onclick = null;
                if (button._greenstepsPasswordHandler) {
                    button.removeEventListener('click', button._greenstepsPasswordHandler);
                }

                button._greenstepsPasswordHandler = function(event) {
                    event.preventDefault();
                    const input = button.previousElementSibling || button.parentElement?.querySelector('input');
                    if (!input || !input.id) return;
                    togglePassword(input.id);
                };

                button.addEventListener('click', button._greenstepsPasswordHandler);
            });
        }

        initPasswordToggles();

        function forgotPassword() {
            const email = document.getElementById('email').value.trim();
            document.getElementById('forgotPasswordForm').style.display = 'block';
            document.getElementById('resetPasswordForm').style.display = 'none';
            document.getElementById('changePasswordForm').style.display = 'none';
            document.getElementById('passwordModalTitle').textContent = 'Reset password';
            document.getElementById('passwordModalSubtitle').textContent = 'Enter your email and we’ll send a reset link if the account exists.';
            document.getElementById('resetRequestEmail').value = email;
            document.getElementById('passwordModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePasswordModal() {
            closeModalWithStack('passwordModal');
        }

        function openPasswordModal() {
            document.getElementById('forgotPasswordForm').style.display = 'none';
            document.getElementById('resetPasswordForm').style.display = 'none';
            document.getElementById('changePasswordForm').style.display = 'block';
            document.getElementById('passwordModalTitle').textContent = 'Change Password';
            document.getElementById('passwordModalSubtitle').textContent = 'Enter your current password and choose a new one.';
            document.getElementById('currentPassword').value = '';
            document.getElementById('newPassword').value = '';
            document.getElementById('confirmNewPassword').value = '';
            openModalWithStack('passwordModal', 'profileModal');
        }

        async function submitChangePassword(event) {
            event.preventDefault();
            const currentPassword = document.getElementById('currentPassword').value;
            const newPassword = document.getElementById('newPassword').value;
            const confirmNewPassword = document.getElementById('confirmNewPassword').value;

            if (newPassword !== confirmNewPassword) {
                showToast('Passwords do not match', 'Please make sure both passwords are the same.');
                return;
            }

            const result = await apiPost('change-password', {
                current_password: currentPassword,
                new_password: newPassword
            });

            if (!result.success) {
                showToast('Password change failed', result.message || 'Please check your current password and try again.');
                return;
            }

            closePasswordModal();
            showToast('Password updated', 'Your password has been changed successfully.');
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
        let chatPhotoPreviewUrl = null;

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
            clearModalStack();
            const modal = document.getElementById('chatModal');
            if (!modal) return;
            modal.classList.remove('minimized');
            modal.classList.add('active');
            modal.setAttribute('aria-hidden', 'false');
            modal.querySelector('.chat-modal-box')?.removeAttribute('aria-hidden');
            modal.dataset.mobileView = 'contacts';
            // Reset selected user when opening chat in mobile view
            if (window.innerWidth <= 768) {
                selectedChatUserId = null;
            }
            document.body.style.overflow = 'hidden';
            await loadChatContacts();
            if (!chatPollTimer) {
                chatPollTimer = setInterval(() => {
                    if (document.getElementById('chatModal')?.classList.contains('active')) loadChatContacts();
                }, 2000);
            }
        }

        function minimizeChatPanel() {
            const modal = document.getElementById('chatModal');
            if (!modal || !modal.classList.contains('active')) return;
            modal.classList.add('minimized');
            modal.querySelector('.chat-modal-box')?.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = 'auto';
        }

        function restoreChatPanel() {
            const modal = document.getElementById('chatModal');
            if (!modal) return;
            modal.classList.remove('minimized');
            modal.classList.add('active');
            modal.setAttribute('aria-hidden', 'false');
            modal.querySelector('.chat-modal-box')?.removeAttribute('aria-hidden');
            document.body.style.overflow = 'hidden';
        }

        function showChatContacts() {
            const modal = document.getElementById('chatModal');
            if (modal) modal.dataset.mobileView = 'contacts';
        }

        function closeChatPanel() {
            const modal = document.getElementById('chatModal');
            if (!modal) return;
            modal.classList.remove('active', 'minimized');
            modal.setAttribute('aria-hidden', 'true');
            modal.querySelector('.chat-modal-box')?.setAttribute('aria-hidden', 'true');
            
            if (modalStack.length > 0) {
                const previousModal = modalStack.pop();
                document.getElementById(previousModal).classList.add('active');
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = 'auto';
            }
            
            if (chatPollTimer) {
                clearInterval(chatPollTimer);
                chatPollTimer = null;
            }
        }

        async function loadChatContacts() {
            const list = document.getElementById('chatPeopleList');
            const listWasLoaded = list?.dataset.dataLoaded === 'true';
            const previousContacts = JSON.stringify(chatPeople);
            showDataLoading(list, 'Loading conversations...');
            const result = await apiGet('chat/contacts');
            if (!result.success) {
                showDataLoadError(list, 'Could not load conversations.', () => loadChatContacts());
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
            markDataLoaded(list, !listWasLoaded || previousContacts !== JSON.stringify(chatPeople));

            // Only auto-select (highlight) on desktop, not on mobile
            const isMobile = window.innerWidth <= 768;
            if (!isMobile) {
                if (!selectedChatUserId && chatPeople.length) {
                    selectedChatUserId = chatPeople[0].id;
                    renderChatContacts();
                } else if (selectedChatUserId) {
                    const existing = chatPeople.find(user => user.id === selectedChatUserId);
                    if (existing) {
                        selectedChatUserId = existing.id;
                        renderChatContacts();
                    }
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
                markDataLoaded(list, false);
                return;
            }

            list.innerHTML = filtered.map(user => {
                const initial = (user.full_name || 'U').split(' ').map(piece => piece[0]).slice(0, 2).join('').toUpperCase();
                const avatarMarkup = user.photo_url
                    ? `<img src="${user.photo_url}" style="width:100%; height:100%; border-radius:50%; object-fit:cover;" alt="Avatar" />`
                    : initial;
                const active = selectedChatUserId === user.id ? 'active' : '';
                const unreadCount = Number(user.unread_count || 0);
                const preview = user.last_message_image && !user.last_message
                    ? 'Photo'
                    : (user.last_message || `${user.role || 'Member'}${user.team_name ? ` · ${user.team_name}` : ''}`);
                return `
                    <button type="button" class="chat-person ${active}" data-user-id="${user.id}">
                        <div class="chat-person-avatar">${avatarMarkup}</div>
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
            markDataLoaded(list, false);
        }

        async function selectChatUser(userId, animate = true, forceOpen = false) {
            const user = chatPeople.find(person => person.id === userId);
            if (!user) return;

            // If same user is selected and not forced, open conversation
            if (selectedChatUserId === userId && !forceOpen) {
                const modal = document.getElementById('chatModal');
                const isMobile = window.innerWidth <= 768;
                if (modal && isMobile) modal.dataset.mobileView = 'thread';
                // Continue to load conversation
            } else if (!forceOpen) {
                // First tap - just select/highlight
                selectedChatUserId = userId;
                renderChatContacts();
                return;
            }

            selectedChatUserId = userId;
            const modal = document.getElementById('chatModal');
            const isMobile = window.innerWidth <= 768;
            if (modal && !isMobile) modal.dataset.mobileView = 'thread';
            renderChatContacts();

            const avatar = document.getElementById('chatCurrentAvatar');
            const name = document.getElementById('chatCurrentName');
            const role = document.getElementById('chatCurrentRole');
            const thread = document.getElementById('chatThread');

            if (avatar) {
                if (user.photo_url) {
                    avatar.innerHTML = `<img src="${user.photo_url}" style="width:100%; height:100%; border-radius:50%; object-fit:cover;" alt="Avatar" />`;
                } else {
                    avatar.textContent = (user.full_name || 'U').split(' ').map(part => part[0]).slice(0, 2).join('').toUpperCase();
                }
            }
            if (name) name.textContent = user.full_name || 'User';
            if (role) role.textContent = user.role || 'member';

            if (!user.conversation_id) {
                thread.innerHTML = '<div class="chat-system">No conversation yet. Start the chat by sending a message.</div>';
                loadedChatThreadUserId = userId;
                markDataLoaded(thread, animate);
                return;
            }

            const conversationChanged = loadedChatThreadUserId !== userId;
            if (conversationChanged) showDataLoading(thread, 'Loading messages...', true);
            const result = await apiGet(`chat/conversations/${user.conversation_id}/messages`);
            if (!result.success) {
                if (conversationChanged) {
                    showDataLoadError(thread, 'Could not load messages.', () => selectChatUser(userId));
                }
                return;
            }

            user.unread_count = 0;
            updateChatUnreadBadge(chatPeople.reduce((total, person) => total + Number(person.unread_count || 0), 0));
            renderChatContacts();
            loadedChatThreadUserId = userId;
            renderChatThread(result.messages || [], animate || conversationChanged);
        }

        function updateChatUnreadBadge(count) {
            ['citizenChatNavUnread', 'maintenanceChatNavUnread', 'adminChatNavUnread', 'adminChatNavUnread', 'maintenanceChatNavUnread'].forEach(id => {
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
            const minimizedBadge = document.getElementById('chatMinimizedUnread');
            if (minimizedBadge) {
                minimizedBadge.textContent = count > 99 ? '99+' : String(count || '');
                minimizedBadge.style.display = count > 0 ? 'inline-flex' : 'none';
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

        function renderChatMessageRow(message, pending = false) {
            const isMine = Number(message.sender_id) === Number(currentUser?.id);
            const text = message.message ? escapeHtml(message.message) : '';
            const imageHtml = message.image_url
                ? `<img class="chat-message-photo" src="${escapeHtml(message.image_url)}" alt="Chat attachment" />`
                : '';
            const time = pending
                ? '<i class="fas fa-circle-notch" aria-hidden="true" style="animation: pulse-spin 1.5s cubic-bezier(0.4, 0, 0.2, 1) infinite;"></i>'
                : escapeHtml(formatChatTime(message.created_at));

            return `
                <div class="chat-message-row ${isMine ? 'mine' : 'theirs'} ${pending ? 'pending' : ''}">
                    <div class="chat-bubble">
                        ${text ? `<div>${text}</div>` : ''}
                        ${imageHtml}
                        <span class="chat-message-time">${time}</span>
                    </div>
                </div>`;
        }

        function renderChatThread(messages, animate = true) {
            const thread = document.getElementById('chatThread');
            if (!thread) return;

            if (!messages.length) {
                thread.innerHTML = '<div class="chat-system">No messages yet. Say hello.</div>';
                markDataLoaded(thread, animate);
                return;
            }

            thread.innerHTML = messages.map(message => renderChatMessageRow(message)).join('');

            thread.scrollTop = thread.scrollHeight;
            markDataLoaded(thread, animate);
        }

        function previewChatPhoto(input) {
            const file = input.files?.[0];
            if (!file) {
                removeChatPhoto();
                return;
            }

            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!allowedTypes.includes(file.type) || file.size > 5 * 1024 * 1024) {
                removeChatPhoto();
                showToast('Photo not attached', 'Choose a JPG, PNG, GIF, or WebP image no larger than 5 MB.');
                return;
            }

            if (chatPhotoPreviewUrl) URL.revokeObjectURL(chatPhotoPreviewUrl);
            chatPhotoPreviewUrl = URL.createObjectURL(file);
            document.getElementById('chatImagePreviewImage').src = chatPhotoPreviewUrl;
            document.getElementById('chatImagePreviewName').textContent = file.name;
            document.getElementById('chatImagePreview').hidden = false;
        }

        function removeChatPhoto() {
            if (chatPhotoPreviewUrl) URL.revokeObjectURL(chatPhotoPreviewUrl);
            chatPhotoPreviewUrl = null;
            const input = document.getElementById('chatImageInput');
            const image = document.getElementById('chatImagePreviewImage');
            const name = document.getElementById('chatImagePreviewName');
            const preview = document.getElementById('chatImagePreview');
            if (input) input.value = '';
            if (image) image.removeAttribute('src');
            if (name) name.textContent = '';
            if (preview) preview.hidden = true;
        }

        async function sendChatMessage() {
            if (!selectedChatUserId) {
                showToast('⚠️ Select a person to chat with.', 'Choose a contact first.');
                return;
            }

            const input = document.getElementById('chatMessageInput');
            const fileInput = document.getElementById('chatImageInput');
            const sendButton = document.querySelector('.chat-send-btn');
            if (sendButton?.disabled) return;
            const message = input ? input.value.trim() : '';
            const file = fileInput?.files?.[0] || null;
            const recipientId = selectedChatUserId;

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

            const thread = document.getElementById('chatThread');
            const contact = chatPeople.find(person => Number(person.id) === Number(recipientId));
            const hadMessages = Boolean(thread?.querySelector('.chat-message-row'));
            thread?.querySelector('.chat-system')?.remove();
            const optimisticMessage = {
                sender_id: currentUser?.id,
                message,
                image_url: chatPhotoPreviewUrl,
                created_at: new Date().toISOString()
            };
            const optimisticWrapper = document.createElement('div');
            optimisticWrapper.innerHTML = renderChatMessageRow(optimisticMessage, true);
            const optimisticRow = optimisticWrapper.firstElementChild;
            optimisticRow.dataset.optimisticId = `pending-${Date.now()}`;
            thread?.append(optimisticRow);
            if (thread) {
                thread.scrollTop = thread.scrollHeight;
            }

            const photoPreview = document.getElementById('chatImagePreview');
            if (input) input.value = '';
            if (fileInput) fileInput.disabled = true;
            const removePhotoButton = document.querySelector('.chat-image-preview-remove');
            if (removePhotoButton) removePhotoButton.disabled = true;
            if (photoPreview) photoPreview.hidden = true;
            if (sendButton) sendButton.disabled = true;

            try {
                const result = await apiPostFormData('chat/send', formData);
                if (!result.success) {
                    optimisticRow.remove();
                    if (!hadMessages && thread && !thread.querySelector('.chat-message-row')) {
                        thread.innerHTML = contact?.conversation_id
                            ? '<div class="chat-system">No messages yet. Say hello.</div>'
                            : '<div class="chat-system">No conversation yet. Start the chat by sending a message.</div>';
                    }
                    if (input && !input.value) input.value = message;
                    if (photoPreview) photoPreview.hidden = !file;
                    showToast('Chat not sent', result.message || 'Please try again.');
                    return;
                }

                if (result.chat_message && optimisticRow.isConnected) {
                    const confirmedWrapper = document.createElement('div');
                    confirmedWrapper.innerHTML = renderChatMessageRow(result.chat_message);
                    optimisticRow.replaceWith(confirmedWrapper.firstElementChild);
                } else if (optimisticRow.isConnected) {
                    optimisticRow.classList.remove('pending');
                    const pendingTime = optimisticRow.querySelector('.chat-message-time');
                    if (pendingTime) pendingTime.textContent = 'Sent';
                }

                if (contact) {
                    contact.conversation_id = result.conversation_id || contact.conversation_id;
                    contact.last_message = message;
                    contact.last_message_image = Boolean(file) && !message;
                    contact.last_message_time = result.chat_message?.created_at || new Date().toISOString();
                    renderChatContacts();
                }

                removeChatPhoto();
                showToast('Sent', 'Message delivered successfully.');
            } catch (error) {
                optimisticRow.remove();
                if (!hadMessages && thread && !thread.querySelector('.chat-message-row')) {
                    thread.innerHTML = contact?.conversation_id
                        ? '<div class="chat-system">No messages yet. Say hello.</div>'
                        : '<div class="chat-system">No conversation yet. Start the chat by sending a message.</div>';
                }
                if (input && !input.value) input.value = message;
                if (photoPreview) photoPreview.hidden = !file;
                showToast('Chat not sent', 'Check your connection and try again.');
            } finally {
                if (fileInput) fileInput.disabled = false;
                if (removePhotoButton) removePhotoButton.disabled = false;
                if (sendButton) sendButton.disabled = false;
            }
        }

        async function deleteChatConversation() {
            if (!selectedChatUserId) {
                showToast('⚠️ No conversation selected', 'Please select a conversation first.');
                return;
            }

            // Show the delete confirmation modal
            const deleteModal = document.getElementById('deleteChatModal');
            if (deleteModal) {
                openModalWithStack('deleteChatModal', 'chatModal');
            }
        }

        function closeDeleteChatModal() {
            closeModalWithStack('deleteChatModal');
        }

        async function confirmDeleteChat() {
            closeDeleteChatModal();

            try {
                const result = await apiPost('chat/delete', { recipient_id: selectedChatUserId });
                if (!result.success) {
                    showToast('Delete failed', result.message || 'Could not delete conversation.');
                    return;
                }

                // Clear the selected user and go back to contacts
                selectedChatUserId = null;
                const modal = document.getElementById('chatModal');
                if (modal) modal.dataset.mobileView = 'contacts';

                // Clear the chat thread
                const thread = document.getElementById('chatThread');
                if (thread) {
                    thread.innerHTML = `
                        <div class="chat-empty-state">
                            <div>
                                <i class="fas fa-comment-dots" style="font-size: 2rem; margin-bottom: 10px; display: block;"></i>
                                Start a conversation with a citizen or maintenance team.
                            </div>
                        </div>
                    `;
                }

                // Clear current user info
                const name = document.getElementById('chatCurrentName');
                const role = document.getElementById('chatCurrentRole');
                const avatar = document.getElementById('chatCurrentAvatar');
                if (name) name.textContent = 'Select a chat';
                if (role) role.textContent = 'online';
                if (avatar) avatar.textContent = '?';

                // Reload contacts to update the list
                await loadChatContacts();
                showToast('Deleted', 'Conversation deleted successfully.');
            } catch (error) {
                showToast('Delete failed', 'Could not delete conversation. Please try again.');
            }
        }

        document.getElementById('chatModal')?.addEventListener('click', e => {
            if (e.target && e.target.id === 'chatModal') {
                closeChatPanel();
            }
        });

        ['adminRegisterModal','maintenanceAccountModal','passwordModal','chatModal','registerModal','reportModal','profileModal','editProfileModal','notifPrefsModal','startModal','completeModal','photoModal','assignModal','ratingModal','trackModal','trackDiscussionModal','actionModal','completionInfoModal','statisticsModal','rejectionReasonModal','adminRejectModal','maintRejectModal','reportDetailsModal','deleteChatModal','logoutModal'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('click', e => {
                if (e.target === el) {
                    closeModalWithStack(id);
                }
            });
        });

        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                // Close autoAssignModal specially since it uses style.display
                if (document.getElementById('autoAssignModal')?.style.display === 'flex') {
                    closeAutoAssignModal();
                    return;
                }
                // Close only the topmost active modal
                const modalIds = ['adminRegisterModal','maintenanceAccountModal','passwordModal','chatModal','registerModal','reportModal','profileModal','editProfileModal','notifPrefsModal','startModal','completeModal','photoModal','assignModal','ratingModal','trackModal','trackDiscussionModal','actionModal','completionInfoModal','statisticsModal','rejectionReasonModal','adminRejectModal','maintRejectModal','reportDetailsModal','deleteChatModal','logoutModal'];
                for (const id of modalIds) {
                    const el = document.getElementById(id);
                    if (el?.classList.contains('active')) {
                        closeModalWithStack(id);
                        break; // Only close one modal at a time
                    }
                }
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
                document.getElementById('changePasswordForm').style.display = 'none';
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
                updateUserBadges();
                if (currentUser.role === 'citizen') {
                    document.getElementById('citizenUserName').textContent = currentUser.full_name;
                    showDashboard('citizen');
                } else if (currentUser.role === 'maintenance') {
                    document.getElementById('maintenanceUserName').textContent = currentUser.full_name;
                    showDashboard('maintenance');
                } else if (currentUser.role === 'admin') {
                    document.getElementById('adminUserName').textContent = currentUser.full_name;
                    showDashboard('admin');
                }
            }
            document.getElementById('appBootLoader')?.remove();
            document.body.classList.remove('app-booting');
            console.log('%c🌱 GreenSteps ready — MySQL backend + Real-time polling', 'color:#2d7a4f;font-weight:bold;');
        })();
        </script>

    </body>
    </html>