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
      overflow: hidden; /* Prevent scrolling */
      margin: 0;
      background-color: #87CEEB; /* Sea blue background */
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
      margin-top: 120px; /* Adjust based on header height */
      height: calc(100vh - 120px); /* Adjust based on header height */
      padding-bottom: 0px;
      overflow: hidden;
    }

    .row {
      display: flex;
      justify-content: space-between;
      height: 100%; /* Make the row take full height of the container */
    }

    .col-1, .col-2 {
      flex: 1;
      position: relative;
      height: 99 %;
      overflow: hidden; /* Prevent scrolling inside the columns */
      margin: 0 20px ;
    }

    .col-1 {
      margin-bottom: 20px;
    }

    .col-2 {
      margin-bottom: 20px;
    }

    .card {
      width: 100%;
      height: 100%;
      border-radius: 20px;
      overflow: hidden;
      position: relative;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 20px;
    }

    .card-img-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .card-title {
      font-size: 50px;
      font-weight: bold;
      color: #fff;
      transition: color 0.3s ease;
    }

    .card-title:hover {
      color: #032B44;
      text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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
                <img src="img/LOGO_1.PNG" alt="Logo">
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
                    echo '<li><a class="nav-link" href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    
<main>
  <div class="row">
    <div class="col-1">
      <a href="mweight/mweight.php" target="_self">
        <div class="card">
          <img src="img/mweight.jpg" class="card-img">
          <div class="card-img-overlay">
            <h3 class="card-title">MALE</h3>
          </div>
        </div>
      </a>
    </div>
    <div class="col-2">
      <a href="fweight/fweight.php" target="_self">
        <div class="card">
          <img src="img/fweight.jpg" class="card-img">
          <div class="card-img-overlay">
            <h3 class="card-title">FEMALE</h3>
          </div>
        </div>
      </a>
    </div>
  </div>
</main>
</body>
</html>

