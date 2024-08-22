<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>index</title>

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
      background-color: #C4276A;
      color: #fff;
      transform: scale(1.1);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    main {
      margin-top: -0.1px;
      padding-bottom: 0px;
    }

    .slideshow-container {
      position: relative;
      width: 100%;
      height: 100vh;
      overflow: hidden;
      z-index: 5;
    }

    .slide {
      display: none;
      width: 100%;
      height: 100%;
      position: absolute;
      top: 0;
      left: 0;
    }

    .slide img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: brightness(1);
    }

    .slide.active {
      display: block;
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

    .container {
      max-width: 800px;
      margin: 150px auto;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .box {
      width: 200px;
      height: 200px;
      margin: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }

    .box img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 10px 10px 0 0;
    }

    .box h2 {
      font-size: 18px;
      margin-top: 10px;
    }

    .btn {
      background-color: #C4276A;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #fff;
      color: #C4276A;
      border: 1px solid #C4276A;
    }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="/sgpproject/sgpproject/img/LOGO1.png" alt="Logo">
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
            <?php
            for ($i = 1; $i <= 7; $i++) {
                if (!isset($_SESSION['premium']) && $i > 2) {
                    ?>
                    <div class="box">
                        <img src="/sgpproject/sgpproject/img/day<?php echo $i; ?>.jpg" alt="Day <?php echo $i; ?>">
                        <h2>Day <?php echo $i; ?></h2>
                        <p>Locked.</p><a href="/sgpproject/sgpproject/premium.php"><p> Upgrade to premium to access.</p><a>
                    </div>
                <?php } else { ?>
                    <div class="box">
                        <a href="day<?php echo $i; ?>.php" class="btn">
                            <img src="/sgpproject/sgpproject/img/day<?php echo $i; ?>.jpg" alt="Day <?php echo $i; ?>">
                            <h2>Day <?php echo $i; ?></h2>
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </main>
</body>
</html>