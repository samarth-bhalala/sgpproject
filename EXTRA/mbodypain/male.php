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
      overflow: hidden; /* Prevent scrollbars */
      margin: 0;
      background-color: #87CEEB; /* add background color of blue sea blue */
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

    main {
      margin-top: 0;
      height: 100vh; /* Set main to full viewport height */
      padding-bottom: 0px;
      overflow: hidden;
    }

    .container {
      max-width: 100%;
      height: 70%; /* Ensure the container fits the viewport */
      margin: 150px auto;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center; /* Center content vertically */
    }

    .row {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      margin-bottom: 20px;
      margin-top: -20px;
      width: 100%;
    }

    .col-2, .col-3, .col-4, .col-5 {
      flex: 1;
      margin: 20px;
      width: calc(25% - 40px);
      height: calc(70vh - 40px);
    }

    .box {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100%;
      width: 100%;
    }

    .box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }

    .box h2 {
      font-size: 18px;
      margin-top: 0;
      text-align: center;
      background-color: #032B44;
      color: #fff;
      padding: 10px;
      border-radius: 10px;
    }

    .box a {
      display: block;
      width: 100%;
      height: 100%;
      text-decoration: none;
      color: #333;
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
                <div class="col-2">
                    <div class="box">
                        <a href="backpain/backpain.php">
                            <img src="/sgpproject/sgpproject/img/mbackpain.jpg" alt="Back Pain">
                            <h2>Back Pain</h2>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="box">
                        <a href="handpain/handpain.php">
                            <img src="/sgpproject/sgpproject/img/mhandpain.jpg" alt="Hand Pain">
                            <h2>Hand Pain</h2>
                        </a>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box">
                        <a href="legpain/legpain.php">
                            <img src="/sgpproject/sgpproject/img/mlegpain.webp" alt="Leg Pain">
                            <h2>Leg Pain</h2>
                        </a>
                    </div>
                </div>
                <div class="col-5">
                    <div class="box">
                        <a href="headpain/headpain.php">
                            <img src="/sgpproject/sgpproject/img/mheadpain.jpg" alt="Head Pain">
                            <h2>Head Pain</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
