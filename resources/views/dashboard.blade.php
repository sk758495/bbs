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
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
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
                            @include('employee_management.bbs-new-project.index')
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.min.js"></script>
        <script src="{{ asset('user/js/side-function.js') }}"></script>
    </div>
</body>

</html>
