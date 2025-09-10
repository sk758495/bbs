<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBS Dashboard</title>
    <link rel="icon" href="images/logbg2.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('user/css/navandsidebar.css') }}">
    <style>
        .dashboard-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 15px;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 12px 30px;
            font-weight: 600;
        }

        .btn-success {
            background: linear-gradient(135deg, #56ab2f 0%, #a8e6cf 100%);
            border: none;
            border-radius: 8px;
        }

        .btn-info {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border: none;
            border-radius: 8px;
        }

        .table-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            font-weight: 600;
            padding: 15px;
        }

        .table tbody td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.875rem;
            }

            .btn {
                padding: 8px 16px;
                font-size: 0.875rem;
            }
        }
    </style>
</head>

<body>
    @include('employee_management.components.sidebar')

    <div class="main-content">
        @include('employee_management.components.navbar')

        <div class="container-fluid px-4">
            <div class="dashboard-header text-center">
                <h1 class="mb-0"><i class="bi bi-building"></i> Bar Bending Schedule Management</h1>
                <p class="mb-0 mt-2">Create and manage your construction projects efficiently</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-12">
                    <div class="card h-100">
                        <div class="card-header bg-transparent border-0 pt-4">
                            <h5 class="card-title text-center">
                                <i class="bi bi-plus-circle text-primary"></i> Create New Project
                            </h5>
                        </div>
                        <div class="card-body">
                            @include('employee_management.bbs-new-project.create')
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="card h-100">
                        <div class="card-header bg-transparent border-0 pt-4">
                            <div class="d-flex justify-content-between align-items-center flex-wrap">
                                <h5 class="card-title mb-0">
                                    <i class="bi bi-list-ul text-info"></i> All Projects
                                </h5>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('project.export.excel') }}" class="btn btn-info btn-sm">
                                        <i class="bi bi-download"></i> Export All
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead>
                                        <tr>
                                            <th><i class="bi bi-hash"></i> ID</th>
                                            <th><i class="bi bi-building"></i> Project</th>
                                            <th class="d-none d-md-table-cell"><i class="bi bi-person"></i> Engineer
                                            </th>
                                            <th class="d-none d-lg-table-cell"><i class="bi bi-building"></i> Contractor
                                            </th>
                                            <th class="d-none d-xl-table-cell"><i class="bi bi-person-gear"></i>
                                                Consultant</th>
                                            <th class="d-none d-lg-table-cell"><i class="bi bi-person-badge"></i> Client
                                            </th>
                                            <th class="d-none d-md-table-cell"><i class="bi bi-speedometer2"></i> Weight
                                            </th>
                                            <th class="d-none d-lg-table-cell"><i class="bi bi-calendar"></i> Date</th>
                                            <th><i class="bi bi-gear"></i> Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($projects as $project)
                                            <tr>
                                                <td><span class="badge bg-primary">{{ $project->id }}</span></td>
                                                <td>
                                                    <div class="fw-bold">{{ $project->project_name }}</div>
                                                    <small
                                                        class="text-muted d-md-none">{{ $project->user->name ?? 'N/A' }}</small>
                                                </td>
                                                <td class="d-none d-md-table-cell">{{ $project->user->name ?? 'N/A' }}
                                                </td>
                                                <td class="d-none d-lg-table-cell">{{ $project->contractor_name }}</td>
                                                <td class="d-none d-xl-table-cell">{{ $project->consultant_name }}</td>
                                                <td class="d-none d-lg-table-cell">{{ $project->client_name }}</td>
                                                <td class="d-none d-md-table-cell">
                                                    <span class="badge bg-info">{{ $project->total_rf_weight }}
                                                        kg</span>
                                                </td>
                                                <td class="d-none d-lg-table-cell">
                                                    <small>{{ $project->created_at->format('d M Y') }}</small>
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="{{ route('project.edit', $project->id) }}"
                                                            class="btn btn-sm btn-outline-warning" title="Edit Project">
                                                            <i class="bi bi-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('project.export.single', $project->id) }}"
                                                            class="btn btn-sm btn-outline-success" title="Export Excel">
                                                            <i class="bi bi-download"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center py-5">
                                                    <div class="text-muted">
                                                        <i class="bi bi-inbox display-1"></i>
                                                        <h5 class="mt-3">No projects found</h5>
                                                        <p>Create your first project to get started</p>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
        <script src="{{ asset('user/js/side-function.js') }}"></script>
    </div>

    <style>
        :root {
            --primary-color: #1b1b1b;
            --secondary-color: #f8f9fa;
            --accent-color: #0c0c0c;
            --sidebar-width: 300px;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
            --btn-hover-bg: rgba(1, 1, 1, 0.1);
        }

        body {
            overflow-x: hidden;
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar Styles */
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(180deg, var(--primary-color) 0%, #303030 100%);
            color: white;
            position: fixed;
            width: var(--sidebar-width);
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: var(--card-shadow);
            left: 0;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            top: 0;
        }

        .sidebar-header {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .sidebar-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.25rem;
            color: white;
            flex-grow: 1;
            text-align: center;
        }

        .sidebar-header .sidebar-toggler {
            position: absolute;
            right: 1rem;
        }

        .sidebar-content {
            padding: 1.5rem;
            flex: 1;
            overflow-y: auto;
            max-height: calc(100vh - 120px);
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .sidebar-content::-webkit-scrollbar {
            display: none;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.8rem 1rem;
            margin: 0.2rem 0;
            border-radius: 8px;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            font-weight: 500;
            white-space: nowrap;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 0;
            background: rgba(255, 255, 255, 0.1);
            transition: width 0.3s ease;
            border-radius: 8px;
        }

        .sidebar .nav-link:hover::before {
            width: 100%;
        }

        .sidebar .nav-link:hover {
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            color: white;
            background: rgba(255, 255, 255, 0.2);
            font-weight: 600;
        }

        .sidebar .nav-link.active::before {
            width: 100%;
        }

        .sidebar .nav-link i {
            margin-right: 12px;
            width: 20px;
            text-align: center;
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .sidebar .nav-link:hover i {
            transform: scale(1.1);
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            text-align: center;
        }

        .sidebar-footer p {
            margin: 0;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.85rem;
        }

        /* Sidebar Toggle Button */
        .sidebar-toggler {
            background: white;
            border: none;
            color: var(--primary-color);
            font-size: 1.25rem;
            padding: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
        }

        .sidebar-toggler:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }

        .sidebar.collapsed {
            left: calc(-1 * var(--sidebar-width));
        }

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 20px;
            transition: all 0.3s ease;
            min-height: 100vh;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* Navbar */
        .navbar {
            background-color: white;
            box-shadow: var(--card-shadow);
            padding: 1rem;

            border-radius: 10px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
        }

        .navbar .container-fluid {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        /* Card Styles */
        .card {
            border: none;
            box-shadow: var(--card-shadow);
            transition: all var(--transition-speed);
            border-radius: 10px;
            overflow: hidden;
            background: white;
            position: relative;
            margin-bottom: 1rem;
        }

        .card:hover {
            /* transform: translateY(-5px); */
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem;
        }

        /* Dropdown Styles */
        .dropdown-menu {
            border: none;
            box-shadow: var(--card-shadow);
            border-radius: 10px;
            padding: 0.5rem;
            min-width: 200px;
        }

        .dropdown-item {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all var(--transition-speed);
            color: var(--primary-color);
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: var(--btn-hover-bg);
            color: var(--accent-color);
            transform: translateX(5px);
        }

        .btn-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all var(--transition-speed);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-link:hover {
            background-color: var(--btn-hover-bg);
            color: var(--primary-color);
            transform: translateY(-2px);
        }

        .btn-link i {
            font-size: 1.2rem;
        }

        /* Badge Styles */
        .badge {
            padding: 0.5em 0.75em;
            font-weight: 500;
            border-radius: 6px;
        }

        .badge.bg-success {
            background-color: var(--success-color) !important;
        }

        .badge.bg-warning {
            background-color: var(--warning-color) !important;
        }

        /* Admin User Button Styles */
        .admin-user-btn {
            color: var(--primary-color) !important;
            text-decoration: none;
        }

        .admin-user-btn:hover {
            color: var(--primary-color) !important;
        }

        /* Dropdown specific styles */
        .dropdown-toggle {
            color: var(--primary-color) !important;
            text-decoration: none;
        }

        .dropdown-menu .dropdown-item {
            color: var(--primary-color);
            text-decoration: none;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .sidebar {
                left: calc(-1 * var(--sidebar-width));
                top: 0;
                margin-top: 0;
                padding-top: 0;
            }

            .sidebar.active {
                left: 0;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar-header {
                padding: 1rem;
                margin-top: 0;
            }

            .sidebar-content {
                padding: 1rem;
            }

            .sidebar .nav-link {
                padding: 0.7rem 0.9rem;
                font-size: 0.95rem;
            }

            .navbar {
                padding: 0.75rem;
                margin-top: 1rem;
            }

            .card {
                margin-bottom: 1rem;
            }

            .card-header {
                padding: 1rem;
            }

            .main-content {
                padding-top: 0;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 0.5rem;
            }

            .card-body {
                padding: 1rem;
            }

            .card-header {
                padding: 1rem;
            }

            .dropdown-menu {
                min-width: 180px;
            }

            h2 {
                font-size: 1.5rem;
            }

            .sidebar-toggler {
                font-size: 1.1rem;
                width: 32px;
                height: 32px;
                padding: 0.4rem;
            }
        }

        @media (max-width: 480px) {
            .navbar .btn-link {
                padding: 0.25rem 0.5rem;
                font-size: 0.9rem;
            }

            .dropdown-item {
                padding: 0.4rem 0.8rem;
                font-size: 0.9rem;
            }

            .sidebar-toggler {
                font-size: 1rem;
                width: 30px;
                height: 30px;
                padding: 0.3rem;
            }
        }

        /* Sidebar Collapse */
        .sidebar .collapse {
            max-height: none;
        }

        .sidebar .collapse.show {
            overflow: visible;
        }
    </style>
</body>

</html>
