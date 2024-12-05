<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #007bff, #bada55);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
           padding:15px;
            margin: 0;
        }

        .sidebar {
        background-color: #343a40;
        min-height: 100vh;
        width: 220px;
        position: fixed;
        top: 0;
        left: 0;
        padding-top: 20px;
        color: #adb5bd;
    }
    .sidebar h3 {
        font-size: 1.5rem;
        color: #fff;
        margin-bottom: 1.5rem;
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
    }
    .sidebar a:hover {
        color: #fff;
        background-color: #495057;
        border-radius: 5px;
    }
    .sidebar a.active {
        color: #fff;
        background-color: #007bff;
        border-radius: 5px;
    }
        .content {
            margin-left: 220px;
          
        }
        .navbar {
            background-color: #fff;
            border-bottom: 1px solid #e5e5e5;
            position: sticky;
            top: 0;
            z-index: 999;
            padding: 0.5rem 1rem;
        }




        .registration-card {
            background: #fff;
            border-radius: 15px;
            padding: 40px; /* Increased padding for a more spacious look */
           
          width: 750px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .registration-card h2 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #007bff;
            margin-bottom: 1.5rem; /* Slightly larger bottom margin for better spacing */
        }
        .form-floating {
            position: relative;
        }
        .form-floating .form-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6c757d;
        }
        .btn-primary {
            background: #007bff;
            border: none;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: #5a52d1;
        }
        .form-floating input:focus,
        .btn-primary:focus {
            box-shadow: 0 0 8px rgba(108, 99, 255, 0.5);
        }
        .form-control:focus {
            border-color: #6c63ff;
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h3 class="text-center mb-4"><i class="fas fa-briefcase"></i> CV Manager</h3>
    <nav class="nav flex-column">
        <a href= "{{ route('dashboard') }}" class="nav-link  d-flex align-items-center mb-2">
            <i class="fas fa-tachometer-alt me-2"></i> Dashboard
        </a>
        <a href="{{ route('CreateCv') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-plus-circle me-2"></i> Add New CV
        </a>
        <a href="{{ route('monitor') }}" class="nav-link d-flex align-items-center mb-2">
            <i class="fas fa-user-cog me-2"></i> Accounts
        </a>
        <a href="#" class="nav-link active d-flex align-items-center mb-2">
            <i class="fas fa-user-plus me-2"></i> Register
        </a>
        <a href="#" class="nav-link d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#logoutModal">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
        </a>
    </nav>
</div>


 <!-- Main Content -->
 <div class="content">
    <div class="registration-card">
        <h2>Register</h2>
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('register_user') }}" method="POST" novalidate>
            @csrf
            <!-- First Name -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" required>
                <label for="firstname"><i class="fa fa-user me-2"></i>First Name</label>
            </div>
            
            <!-- Last Name -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required>
                <label for="lastname"><i class="fa fa-user me-2"></i>Last Name</label>
            </div>
            
            <!-- Username -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username"><i class="fa fa-user-circle me-2"></i>Username</label>
            </div>
            
            <!-- Email -->
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <label for="email"><i class="fa fa-envelope me-2"></i>Email</label>
            </div>
            
            <!-- Phone Number -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="number" name="number" placeholder="Phone Number" required>
                <label for="number"><i class="fa fa-phone-alt me-2"></i>Phone Number</label>
            </div>
            
            <!-- Role -->
            <div class="form-floating mb-3">
                <select class="form-select" id="role" name="role" required>
                    <option value="user" selected>User</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="role"><i class="fa fa-user-tag me-2"></i>Role</label>
            </div>
            
         <!-- Password -->
<div class="form-floating mb-4 position-relative">
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    <label for="password"><i class="fa fa-lock me-2"></i>Password</label>
    <i class="fa fa-eye-slash form-icon" id="togglePassword" onclick="togglePasswordVisibility()"></i>
</div>

<!-- Confirm Password -->
<div class="form-floating mb-4 position-relative">
    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
    <label for="confirmPassword"><i class="fa fa-lock me-2"></i>Confirm Password</label>
    <i class="fa fa-eye-slash form-icon" id="toggleConfirmPassword" onclick="toggleConfirmPasswordVisibility()"></i>
</div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-user-plus me-2"></i>Register</button>
        </form>
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');
        const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
        const confirmPasswordField = document.getElementById('confirmPassword');
    
        // Toggle visibility for password
        togglePassword.addEventListener('click', () => {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });
    
        // Toggle visibility for confirm password
        toggleConfirmPassword.addEventListener('click', () => {
            const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordField.setAttribute('type', type);
            toggleConfirmPassword.classList.toggle('fa-eye');
            toggleConfirmPassword.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
