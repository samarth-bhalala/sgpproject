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
  background-color: #87CEEB; /* Blue sea background color */
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
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* 4 columns */
  grid-template-rows: auto auto; /* 2 rows */
  grid-gap: 20px;
  max-width: 100%;
  margin: 150px auto;
  padding: 0 20px;
  height: auto;
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
  height: 60%;
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

.box p {
  padding: 10px;
  text-align: center;
}

/* Position specific cards */
.box:nth-child(1) { grid-column: span 1; grid-row: 1; }
.box:nth-child(2) { grid-column: span 1; grid-row: 1; }
.box:nth-child(3) { grid-column: span 1; grid-row: 1; }
.box:nth-child(4) { grid-column: span 1; grid-row: 1; }

.box:nth-child(5) { grid-column: span 1; grid-row: 1; }
.box:nth-child(6) { grid-column: span 1; grid-row: 2; }
.box:nth-child(7) { grid-column: span 1; grid-row: 2; }

/* Responsive adjustments */
@media (max-width: 768px) {
  .container {
    grid-template-columns: repeat(3, 1fr); /* 3 columns for medium screens */
  }
}

@media (max-width: 480px) {
  .container {
    grid-template-columns: 1fr; /* 1 column for small screens */
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
