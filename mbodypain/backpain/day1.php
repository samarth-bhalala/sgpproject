<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Days Page</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            font-family: 'Abril Fatface', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #87CEEB;
            position: relative;
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

        .container {
            margin-top: 100px;
        }

        .card-img-top {
            border-radius: 20px 20px 0 0;
            height: 200px; /* Adjust height as needed */
            object-fit: cover;
        }

        .card-body {
            background-color: #fff;
            border-radius: 0 0 20px 20px;
        }

        .card-title {
            font-size: 22px;
        }

        .card-text {
            font-size: 16px;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <div class="logo">
            <img src="/sgpproject/sgpproject/img/LOGO_1.PNG" alt="Logo" height="80">
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

<div class="container">
    <div class="row">
        <?php
        for ($i = 1; $i <= 7; $i++) {
            if (!isset($_SESSION['premium']) && $i > 2) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="/sgpproject/sgpproject/img/day<?php echo $i; ?>.jpg" class="card-img-top" alt="Day <?php echo $i; ?>">
                        <div class="card-body">
                            <h5 class="card-title">Day <?php echo $i; ?></h5>
                            <p class="card-text">Locked.</p>
                            <a href="/sgpproject/sgpproject/premium.php" class="btn btn-primary">Upgrade to premium to access.</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="col-md-4 mb-4">
                    <a href="day<?php echo $i; ?>.php" class="card-link">
                        <div class="card">
                            <img src="/sgpproject/sgpproject/img/day<?php echo $i; ?>.jpg" class="card-img-top" alt="Day <?php echo $i; ?>">
                            <div class="card-body">
                                <h5 class="card-title">Day <?php echo $i; ?></h5>
                            </div>
                        </div>
                    </a>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>

</body>
</html>
