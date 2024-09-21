<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>index</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <style>
        * {
            font-family: 'Abril Fatface', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Abril Fatface', cursive;
            line-height: 1.6;
            overflow-x: hidden;
            margin: 0;
            background-color: #87CEEB;
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
            letter-spacing: 0.5px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            background-color: #032B44;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        main {
            margin-top: 120px;
        }

        .container {
            max-width: 100%;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            margin-bottom: 20px;
            width: 100%;
        }

        .col-1, .col-2, .col-3, .col-4 {
            flex-basis: calc(50% - 40px); /* Each card takes up 50% width with margin */
            margin: 10px;
            height: 300px; /* Set a fixed height to avoid collapsing */
        }

        .box {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .box img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
            border-radius: 20px;
        }

        .box h2 {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #fff;
            z-index: 2;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.5);
            padding: 10px;
            border-radius: 10px;
        }

        .box a {
            display: block;
            width: 100%;
            height: 100%;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .col-1, .col-2, .col-3, .col-4 {
                flex-basis: 100%; /* Stack cards vertically on smaller screens */
            }
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="/sgpproject/sgpproject/img/LOGO_1.PNG" alt="Logo">
            </div>
            <div class="name">
                <h1>PhysioFit</h1>
            </div>
            <ul>
                <li><a class="nav-link" href="/sgpproject/sgpproject/index.php">Home</a></li>
                <li><a class="nav-link" href="/sgpproject/sgpproject/aboutus.php">About Us</a></li>
                <li><a class="nav-link" href="/sgpproject/sgpproject/contactus.php">Contact Us</a></li>
                <?php
                if (isset($_SESSION['stat'])) {
                    echo '<li><a class="nav-link" href="/sgpproject/sgpproject/profile.php">Profile</a></li>';
                    echo '<li><a class="nav-link" href="/sgpproject/sgpproject/logout.php">Logout</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="/sgpproject/sgpproject/loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-1">
                    <div class="box">
                        <a href="beginner.php">
                            <img src="/sgpproject/sgpproject/img/mbp_bp_b.jpg" alt="Beginner">
                            <h2>UPPER</h2>
                        </a>
                    </div>
                </div>
                <div class="col-2">
                    <div class="box">
                        <a href="intermediate.php">
                            <img src="/sgpproject/sgpproject/img/mbp_bp_i.jpg" alt="Intermediate">
                            <h2>LOWER</h2>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="box">
                        <a href="advanced.php">
                            <img src="/sgpproject/sgpproject/img/mbp_bp_a.jpg" alt="Advanced">
                            <h2>SPINAL</h2>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <a href="expert.php">
                            <img src="/sgpproject/sgpproject/img/mbp_bp_b.jpg" alt="Expert">
                            <h2>SHOULDER</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
