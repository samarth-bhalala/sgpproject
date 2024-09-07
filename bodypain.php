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
    background-color: #ffb3de; /* add background color of blue sea blue */
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
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        letter-spacing: 0.5px; /* Add space between letters */
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .nav-link:hover {
        background-color: #032B44;
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

.card {
    width: 100%;
    height: 650px;
    margin: 20px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
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
  color: #fff; /* initial text color */
  transition: color 0.3s ease; /* add transition effect */
}

.card-title:hover {
  color: #C4276A;
  text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
}

  .row {
    display: flex;
    justify-content: space-between;
    margin-top: 80px; /* add margin top to start below navbar */
  }

  .col-1{
    /* flex: 1; */
    margin: 20px 10px 0px -10px; /* add margin to cards */
  }
  .col-2 {
    margin: 20px 30px 0px 0px;
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
      <a href="mbodypain/male.php" target="_self">
        <div class="card">
          <img src="img/mbodypain.jpg" class="card-img">
          <div class="card-img-overlay">
            <h3 class="card-title">MALE</h3>
          </div>
        </div>
      </a>
    </div>
    <div class="col-2">
      <a href="fbodypain/female.php" target="_self">
        <div class="card">
          <img src="img/fbodypain.jpg" class="card-img">
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