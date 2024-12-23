<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login/Sign Up</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Abril Fatface', cursive;
            line-height: 1.6;
            overflow-x: hidden;
            margin: 0;
            background: #a0d6eb;
        }
        main {
            margin-top: 100px;
            padding: 20px;
            background: transparent;
        }
        .login-signup-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        header {
            background: rgba(255, 248, 241, 0.4);
            color: #333;
            padding: 0;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            color: #333;
        }
        .logo img {
            max-height: 80px;
        }
        .name h1 {
            font-family: 'Abril Fatface', cursive;
            font-size: 45px;
            color: #333;
        }
        ul {
            list-style: none;
            display: flex;
            padding: 0;
            margin: 0;
        }
        ul li {
            margin-left: 20px;
        }
        .nav-link {
            text-decoration: none;
            font-size: 20px;
            color: #333;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        .nav-link:hover {
            background-color: #032B44;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
            color: #333;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
        }
        .form-group {
            margin-bottom: 15px;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 15px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
        }
        .form-group input,
        .form-group button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
        }
        .form-group button {
            background-color: #032B44;
            color: #fff;
            font-size: 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        .form-group button:hover {
            background-color: #4682B4;
            transform: scale(0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .toggle-password {
            position: absolute;
            right: 10px;
            top: 80%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #032B44;
            font-size: 20px;
            transition: color 0.3s ease;
        }
        .toggle-password:hover {
            color: #4682B4;
        }
        @media (max-width: 768px) {
            .name h1 {
                font-size: 20px;
            }
            ul {
                flex-direction: column;
                align-items: flex-start;
            }
            ul li {
                margin-left: 0;
                margin-bottom: 10px;
            }
        }
        @media (max-width: 480px) {
            .logo img {
                max-height: 60px;
            }
            .name h1 {
                font-size: 18px;
            }
            .nav-link {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php">
                    <img src="img/LOGO_1.PNG" alt="PhysioFit Logo">
                </a>
            </div>
            <div class="name">
                <h1>PhysioFit</h1>
            </div>
            <ul>
                <li><a class="nav-link" href="index.php">Home</a></li>
                <li><a class="nav-link" href="aboutus.php">About Us</a></li>
                <li><a class="nav-link" href="contactus.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION['stat'])) {
                    echo '<li><a class="nav-link" href="profile.php">Profile</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Login/Sign Up</h1>
        <div class="login-signup-form">
            <!-- Login Form -->
            <form action="process_login.php" method="post" id="login-form">
                <div class="form-group">
                    <label for="username">Username<span style="color:red">*</span></label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password<span style="color:red">*</span></label>
                    <input type="password" id="password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword('password')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <div class="form-group">
                    <button type="submit">Login</button>
                </div>
                <?php if (isset($_GET['msg'])) { $msg = $_GET['msg']; echo "<p>$msg</p>"; } ?>
                <p>Don't have an account? <a href="#" id="signup-link">Sign Up</a></p>
                <p><a href="forgetpass.php" id="forget-password">Forget Password</a></p>
            </form>

            <!-- Signup Form -->
            <form action="process_signup.php" method="post" id="signup-form" style="display: none;">
                <div class="form-group">
                    <label for="signup_username">Username<span style="color:red">*</span></label>
                    <input type="text" id="signup_username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="signup_email">Email<span style="color:red">*</span></label>
                    <input type="email" id="signup_email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="signup_password">Password<span style="color:red">*</span></label>
                    <input type="password" id="signup_password" name="password" required>
                    <span class="toggle-password" onclick="togglePassword('signup_password')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <div class="form-group">
                    <label for="signup_confirm_password">Confirm Password<span style="color:red">*</span></label>
                    <input type="password" id="signup_confirm_password" name="confirm_password" required>
                    <span class="toggle-password" onclick="togglePassword('signup_confirm_password')">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                <div class="form-group">
                    <label for="signup_phone">Phone number<span style="color:red">*</span></label>
                    <input type="text" id="signup_phone" name="phone" required inputmode="numeric" pattern="[0-9]*">
                </div>
                <div class="form-group">
                    <button type="submit">Sign Up</button>
                </div>
                <p>Already have an account? <a href="#" id="login-link">Login</a></p>
            </form>
        </div>
    </main>

    <script>
        // Toggle between Login and Sign Up Forms
        document.getElementById('signup-link').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('signup-form').style.display = 'block';
        });

        document.getElementById('login-link').addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('signup-form').style.display = 'none';
            document.getElementById('login-form').style.display = 'block';
        });

        // Toggle Password Visibility
        function togglePassword(inputId) {
            const passwordInput = document.getElementById(inputId);
            const icon = passwordInput.nextElementSibling.querySelector('i');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.replace('fa-eye-slash', 'fa-eye');
            }
        }
    </script>
</body>
</html>
