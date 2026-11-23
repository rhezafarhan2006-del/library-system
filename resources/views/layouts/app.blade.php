<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Library System')</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-hover: #1d4ed8;
            --success: #16a34a;
            --success-hover: #15803d;
            --danger: #dc2626;
            --danger-hover: #b91c1c;
            --warning: #f59e0b;
            --warning-hover: #d97706;
            --secondary: #64748b;
            --secondary-hover: #475569;
            --bg-page: #f8fafc;
            --card-bg: #ffffff;
            --border-color: #e2e8f0;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--bg-page);
            color: var(--text-main);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Header */
        header.main-header {
            background-color: #ffffff;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .nav-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
        }

        nav.main-nav {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        nav.main-nav a {
            color: var(--text-muted);
            text-decoration: none;
            padding: 8px 14px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        nav.main-nav a:hover {
            color: var(--primary);
            background-color: #eff6ff;
        }

        nav.main-nav a.active {
            color: var(--primary);
            background-color: #dbeafe;
            font-weight: 600;
        }

        .user-nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 20px;
            background: #f1f5f9;
            font-size: 0.85rem;
            color: var(--text-main);
        }

        .user-role-badge {
            display: inline-block;
            padding: 2px 7px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .role-admin {
            background-color: #e0e7ff;
            color: #4338ca;
        }

        .role-petugas {
            background-color: #dcfce7;
            color: #15803d;
        }

        /* Container Main */
        main.main-content {
            max-width: 1100px;
            width: 100%;
            margin: 24px auto;
            padding: 0 20px;
            flex: 1;
        }

        /* Cards */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 24px;
            overflow: hidden;
        }

        .card-header {
            padding: 16px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ffffff;
        }

        .card-header h2, .card-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-main);
        }

        .card-body {
            padding: 20px;
        }

        .card-footer {
            padding: 12px 20px;
            border-top: 1px solid var(--border-color);
            background-color: #f8fafc;
        }

        /* Buttons */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            padding: 8px 16px;
            font-size: 0.9rem;
            font-weight: 500;
            border-radius: 6px;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .btn-sm {
            padding: 4px 10px;
            font-size: 0.8rem;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: var(--primary-hover);
        }

        .btn-success {
            background-color: var(--success);
            color: #ffffff;
        }
        .btn-success:hover {
            background-color: var(--success-hover);
        }

        .btn-warning {
            background-color: var(--warning);
            color: #ffffff;
        }
        .btn-warning:hover {
            background-color: var(--warning-hover);
        }

        .btn-danger {
            background-color: var(--danger);
            color: #ffffff;
        }
        .btn-danger:hover {
            background-color: var(--danger-hover);
        }

        .btn-secondary {
            background-color: #f1f5f9;
            color: var(--text-main);
            border-color: #cbd5e1;
        }
        .btn-secondary:hover {
            background-color: #e2e8f0;
        }

        .btn-outline-danger {
            background: transparent;
            color: var(--danger);
            border-color: #fca5a5;
        }
        .btn-outline-danger:hover {
            background: #fef2f2;
            color: var(--danger-hover);
        }

        /* Alerts */
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-danger {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* Badges */
        .badge {
            display: inline-block;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .badge-success {
            background-color: #dcfce7;
            color: #15803d;
        }

        .badge-danger {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        .badge-info {
            background-color: #e0f2fe;
            color: #0369a1;
        }

        .badge-secondary {
            background-color: #f1f5f9;
            color: #475569;
        }

        /* Table */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        table.custom-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            text-align: left;
        }

        table.custom-table th {
            background-color: #f8fafc;
            color: var(--text-muted);
            font-weight: 600;
            padding: 12px 16px;
            border-bottom: 1px solid var(--border-color);
        }

        table.custom-table td {
            padding: 14px 16px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        table.custom-table tbody tr:hover {
            background-color: #f8fafc;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-main);
        }

        .form-control, .form-select {
            width: 100%;
            padding: 9px 12px;
            font-size: 0.95rem;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            background-color: #ffffff;
            color: var(--text-main);
            outline: none;
            transition: border-color 0.2s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-error {
            color: var(--danger);
            font-size: 0.85rem;
            margin-top: 5px;
        }

        /* Footer */
        footer.main-footer {
            margin-top: auto;
            border-top: 1px solid var(--border-color);
            background-color: #ffffff;
            padding: 16px 20px;
            text-align: center;
            font-size: 0.85rem;
            color: var(--text-muted);
        }

        .inline-form {
            display: inline;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

    <header class="main-header">
        <div class="nav-container">
            <a href="{{ url('/dashboard') }}" class="brand">
                <span>📚</span> Library System
            </a>

            <nav class="main-nav">
                <a href="{{ url('/dashboard') }}" class="{{ request()->is('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('books.index') }}" class="{{ request()->is('books*') ? 'active' : '' }}">Buku</a>
                <a href="{{ url('/categories') }}" class="{{ request()->is('categories*') ? 'active' : '' }}">Kategori</a>
                <a href="{{ url('/members') }}" class="{{ request()->is('members*') ? 'active' : '' }}">Member</a>
                
                @can('manage-users')
                    <a href="{{ route('users.index') }}" class="{{ request()->is('users*') ? 'active' : '' }}">Kelola User</a>
                @endcan
            </nav>

            <div class="user-nav-actions">
                @auth
                    <span class="user-pill">
                        <strong>{{ auth()->user()->name }}</strong>
                        <span class="user-role-badge role-{{ auth()->user()->role }}">
                            {{ auth()->user()->role }}
                        </span>
                    </span>

                    <form action="{{ route('logout') }}" method="POST" class="inline-form">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>
                @endauth
            </div>
        </div>
    </header>

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="main-footer">
        <p>&copy; {{ date('Y') }} Library System - Pemrograman Web Framework</p>
    </footer>

</body>
</html>
