<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }

        .welcome-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="welcome-card text-center">
                    <h1 class="mb-4">🏢 BBS Perfect Authentication System</h1>
                    <p class="lead mb-4">Choose your login portal</p>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">👥 Employee Portal</h5>
                                    <p class="card-text">Employee login with email verification</p>
                                    <a href="{{ route('login') }}" class="btn btn-primary">User Login</a>
                                    <a href="{{ route('register') }}" class="btn btn-outline-primary">User Register</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">🏢 Admin Portal</h5>
                                    <p class="card-text">Admin login with (Password/OTP)</p>
                                    <div class="display-flex" style="display: flex; gap: 10px;">
                                        <a href="{{ route('admin.login') }}" class="btn btn-success">Admin Login</a>
                                        <a href="{{ route('admin.register') }}" class="btn btn-outline-success">Admin
                                            Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="mt-4">
                        <h6>Test Credentials:</h6>
                        <small class="text-muted">
                            HR: hr@test.com / password<br>
                            User: Register new account with OTP verification
                        </small>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
