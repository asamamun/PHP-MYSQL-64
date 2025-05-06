<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Form</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .password-toggle {
            cursor: pointer;
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container bg-white">
            <h2 class="text-center mb-4">User Registration</h2>
<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            $message
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    unset($_SESSION['message']);
}
?>

            <form action="process-registration.php" method="post" id="registrationForm">
                <!-- Name Field -->
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                           required maxlength="30" placeholder="Enter your full name">
                    <div class="invalid-feedback">Please enter your name (max 30 characters)</div>
                </div>

                <!-- Email Field -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" 
                           required maxlength="30" placeholder="Enter your email">
                    <div class="invalid-feedback">Please enter a valid email address (max 30 characters)</div>
                </div>

                <!-- Phone Field -->
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number (Optional)</label>
                    <input type="tel" class="form-control" id="phone" name="phone" 
                           maxlength="15" placeholder="Enter your phone number">
                    <div class="invalid-feedback">Phone number must be 15 digits or less</div>
                </div>

                <!-- Password Field -->
                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" 
                           required minlength="6" placeholder="Enter your password">
                    <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                    <div class="invalid-feedback">Password must be at least 6 characters</div>
                    <div class="form-text">Minimum 6 characters</div>
                </div>

                <!-- Confirm Password Field -->
                <div class="mb-4 position-relative">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" 
                           required placeholder="Confirm your password">
                    <i class="bi bi-eye-slash password-toggle" id="toggleConfirmPassword"></i>
                    <div class="invalid-feedback">Passwords don't match</div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        // Password toggle functionality
        document.getElementById('togglePassword').addEventListener('click', function() {
            const password = document.getElementById('password');
            const icon = this;
            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                password.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        });

        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            const confirmPassword = document.getElementById('confirmPassword');
            const icon = this;
            if (confirmPassword.type === 'password') {
                confirmPassword.type = 'text';
                icon.classList.replace('bi-eye-slash', 'bi-eye');
            } else {
                confirmPassword.type = 'password';
                icon.classList.replace('bi-eye', 'bi-eye-slash');
            }
        });

        // Form validation
        (function() {
            'use strict';
            
            const form = document.getElementById('registrationForm');
            
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                
                // Check password match
                const password = document.getElementById('password');
                const confirmPassword = document.getElementById('confirmPassword');
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity("Passwords don't match");
                    confirmPassword.classList.add('is-invalid');
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    confirmPassword.setCustomValidity('');
                    confirmPassword.classList.remove('is-invalid');
                }
                
                form.classList.add('was-validated');
            }, false);
        })();
    </script>
</body>
</html>