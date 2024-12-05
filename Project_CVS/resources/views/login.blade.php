<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #2193b0, #6dd5ed);
            font-family: 'Poppins', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            background: #fff;
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
        }
        .login-card h2 {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            color: #2193b0;
            margin-bottom: 1rem;
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
            background: #2193b0;
            border: none;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s;
        }
        .btn-primary:hover {
            background: #197fa6;
        }
        .form-control:focus,
        .btn-primary:focus {
            box-shadow: 0 0 8px rgba(33, 147, 176, 0.5);
        }
        .form-control:focus {
            border-color: #2193b0;
        }
        .alert {
            font-size: 0.9rem;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <h2> Login</h2>
        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <!-- Error Message -->
        @if($errors->has('login_error'))
            <div class="alert alert-danger">
                {{ $errors->first('login_error') }}
            </div>
        @endif
        <!-- Login Form -->
        <form action="{{ route('user.processLogin') }}" method="POST" novalidate>
            @csrf
            <!-- Username Field -->
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username"><i class="fa fa-user-circle me-2"></i>Username</label>
            </div>
            <!-- Password Field -->
            <div class="form-floating mb-4 position-relative">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password"><i class="fa fa-lock me-2"></i>Password</label>
                <i class="fa fa-eye-slash form-icon" id="togglePassword"></i>
            </div>
            <!-- Login Button -->
            <button type="submit" class="btn btn-primary w-100"><i class="fa fa-sign-in-alt me-2"></i>Login</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle functionality
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            togglePassword.classList.toggle('fa-eye');
            togglePassword.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
