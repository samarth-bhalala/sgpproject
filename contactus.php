<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"> <!-- Link to Abril Fatface Font -->
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        overflow-x: hidden;
        margin: 0;
    }

    header {
        background: rgba(255, 248, 241, 0.4); /* Transparent background */
        color: #333;
        padding: 0;
        position: fixed; /* Fix the header at the top */
        top: 0;
        left: 0;
        width: 100%;
        z-index: 10; /* Ensure header is above other content */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Optional shadow for better visibility */
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
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        font-size: 45px;
        color: #333;
        display: flex;
        justify-content: center;
        align-items: center;
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
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        letter-spacing: 0.5px; /* Add space between letters */
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .nav-link:hover {
        background-color: #C4276A;
        color: #fff;
        transform: scale(1.1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    main {
        margin-top: 100px;
        padding: 20px; /* Ensure content starts below the fixed header */
    }

    .contact-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f4f4f4;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
    }

    .form-group textarea {
        resize: vertical;
        height: 150px;
    }

    .form-group button {
        background-color: #C4276A;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-group button:hover {
        background-color: #333;
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

    /* Loader Styles */
    .loader {
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        letter-spacing : 50px;
    }

    .loader svg {
        width: 64px;
        height: 64px;
        letter-spacing : 50px;
    }

    .loader .dash {
        animation: dashArray 2s ease-in-out infinite, dashOffset 2s linear infinite;
        letter-spacing : 50px;
    }

    .loader .spin {
        animation: spinDashArray 2s ease-in-out infinite, spin 8s ease-in-out infinite, dashOffset 2s linear infinite;
        transform-origin: center;
        letter-spacing : 50px;
    }

    @keyframes dashArray {
        0% {
            stroke-dasharray: 0 1 359 0;
        }
        50% {
            stroke-dasharray: 0 359 1 0;
        }
        100% {
            stroke-dasharray: 359 1 0 0;
        }
    }

    @keyframes spinDashArray {
        0% {
            stroke-dasharray: 270 90;
        }
        50% {
            stroke-dasharray: 0 360;
        }
        100% {
            stroke-dasharray: 270 90;
        }
    }

    @keyframes dashOffset {
        0% {
            stroke-dashoffset: 365;
        }
        100% {
            stroke-dashoffset: 5;
        }
    }

    @keyframes spin {
        0% {
            rotate: 0deg;
        }
        12.5%, 25% {
            rotate: 270deg;
        }
        37.5%, 50% {
            rotate: 540deg;
        }
        62.5%, 75% {
            rotate: 810deg;
        }
        87.5%, 100% {
            rotate: 1080deg;
        }
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="img/LOGO1.png" alt="Logo">
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
        <div class="loader">
            <!-- Add your animated SVG loader here -->
            <!-- Example loader -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 64 64" class="inline-block">
                <defs>
                    <linearGradient id="cGradient" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#FF5733"/>
                        <stop offset="100%" stop-color="#C70039"/>
                    </linearGradient>
                    <linearGradient id="oGradient" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#33FF57"/>
                        <stop offset="100%" stop-color="#39C7C7"/>
                    </linearGradient>
                    <linearGradient id="nGradient" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#5733FF"/>
                        <stop offset="100%" stop-color="#C739C7"/>
                    </linearGradient>
                    <linearGradient id="tGradient" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#FF33A8"/>
                        <stop offset="100%" stop-color="#C739A6"/>
                    </linearGradient>
                    <linearGradient id="aGradient" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#FFC733"/>
                        <stop offset="100%" stop-color="#C7A639"/>
                    </linearGradient>
                    <linearGradient id="uGradient" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#33C7FF"/>
                        <stop offset="100%" stop-color="#39C7A6"/>
                    </linearGradient>
                    <linearGradient id="sGradient" x1="0" x2="1" y1="0" y2="1">
                        <stop offset="0%" stop-color="#FF5733"/>
                        <stop offset="100%" stop-color="#C70039"/>
                    </linearGradient>
                </defs>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#cGradient)" d="M 48,8 A 32,32 0 1,0 16,56" class="dash" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#oGradient)" d="M 32,8 A 24,24 0 1,0 32,56 A 24,24 0 1,0 32,8" class="spin" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#nGradient)" d="M 16,56 V 8 L 48,56 V 8" class="dash" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#tGradient)" d="M 32,8 V 56 M 16,8 H 48" class="dash" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#aGradient)" d="M 32,8 L 16,56 H 48 L 32,8 M 28,40 H 36" class="dash" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#cGradient)" d="M 48,8 A 32,32 0 1,0 16,56" class="dash" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#tGradient)" d="M 32,8 V 56 M 16,8 H 48" class="dash" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#uGradient)" d="M 16,8 V 40 A 16,16 0 0,0 48,40 V 8" class="dash" pathLength="360"></path>
                <path stroke-linejoin="round" stroke-linecap="round" stroke-width="8" stroke="url(#sGradient)" d="M 48,16 A 16,16 0 0,0 16,24 A 16,16 0 0,0 48,40 A 16,16 0 0,0 16,48" class="dash" pathLength="360"></path>
            </svg>
        </div>
        <div class="contact-form">
            <form action="process_contact.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
