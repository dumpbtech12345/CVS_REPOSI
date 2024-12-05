<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Monitoring</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom styling for modern design */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .header {
            background: linear-gradient(to right, #4e73df, #1cc88a);
            color: #fff;
            padding: 20px 15px;
            border-radius: 10px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
        }

        .btn-primary {
            background-color: #1cc88a;
            border-color: #1cc88a;
        }

        .btn-primary:hover {
            background-color: #17a673;
            border-color: #17a673;
        }

        table {
            border: none;
        }

        thead {
            background-color: #4e73df;
            color: white;
        }

        tbody tr:hover {
            background-color: #f1f4f9 !important;
        }

        .badge-admin {
            background-color: #1cc88a;
            color: white;
        }

        .badge-user {
            background-color: #858796;
            color: white;
        }

        .dropdown .dropdown-toggle {
            background-color: #f8f9fa;
            border: 1px solid #ddd;
        }

        .dropdown .dropdown-menu {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }



        .sidebar {
            background-color: #343a40;
            min-height: 100vh;
            width: 240px;
            position: fixed;
            top: 0;
            left: 0;
            padding-top: 20px;
            color: #adb5bd;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar h3 {
            font-size: 1.6rem;
            color: #fff;
            text-align: center;
            margin-bottom: 1.8rem;
        }

        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 8px;
        }

        .sidebar a:hover {
            color: #fff;
            background-color: #495057;
        }

        .sidebar a.active {
            color: #fff;
            background-color: #007bff;
        }

        .content {
            margin-left: 240px;
            padding: 20px;
        }

        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e5e5e5;
            position: sticky;
            top: 0;
            z-index: 999;
            padding: 0.8rem 1.5rem;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #007bff;
        }


    </style>
</head>
<body>


<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-center mb-4 ms-4"><i class="fas fa-briefcase"></i> CV Manager</h3>
    <nav class="nav flex-column">
        <a href= "{{ route('dashboard') }}" class="nav-link   d-flex align-items-center mb-2">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('CreateCv') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-plus-circle me-2"></i> Add New CV
        </a>
        <a href="{{ route('monitor') }}"   class="nav-link d-flex align-items-center mb-2 active  ">
            <i class="fas fa-user-cog me-2"></i> Accounts
        </a>
        <a href= "{{ route('register_user_view') }}" class="nav-link  d-flex align-items-center mb-2">
            <i class="fas fa-user-plus me-2"></i> Register
        </a>
        <a href="#" class="nav-link d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </nav>
</div>





<div class="content">
    <div class="container mt-5">
        <div class="header d-flex justify-content-between align-items-center mb-4">
            <h1><i class="fas fa-users"></i> Account Monitoring</h1>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left"></i> Back to Dashboard
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr>
                                <th scope="col"><i class="fas fa-hashtag"></i> ID</th>
                                <th scope="col"><i class="fas fa-user"></i> Name</th>
                                <th scope="col"><i class="fas fa-envelope"></i> Email</th>
                                <th scope="col"><i class="fas fa-phone"></i> Number</th>
                                <th scope="col"><i class="fas fa-user-tag"></i> Role</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->firstname }} {{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->number }}</td>
                                    <td>
                                        <span class="badge {{ $user->role == 'admin' ? 'badge-admin' : 'badge-user' }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('update.role', $user->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="dropdown">
                                                <button class="btn btn-sm dropdown-toggle" type="button" id="actionMenu{{ $user->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fas fa-user-cog"></i> Manage
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="actionMenu{{ $user->id }}">
                                                    <li>
                                                        <select name="role" class="form-select form-select-sm" onchange="this.form.submit()">
                                                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                        </select>
                                                    </li>
                                                </ul>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to log out?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="{{ route('user.loginForm') }}" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>



    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
