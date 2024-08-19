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

.box-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.box {
  width: 300px;
  height: 300px;
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  margin: 20px;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.box img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 20px;
}

.box a {
  text-decoration: none;
  font-size: 20px;
  color: #333;
  padding: 10px 20px;
  border-radius: 10px;
  font-family: 'Abril Fatface', cursive;
  letter-spacing: 0.5px;
  transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.box a:hover {
  background-color: #C4276A;
  color: #fff;
  transform: scale(1.1);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
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
                session_start();
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
        <div class="box-container">
        <a href="mbodypain/male.php">
            <div class="box">
                
                <img src="img/man1.jpg" alt="Male">
                Male
            </div></a>
            <a href="fbodypain/female.php">
            <div class="box">
                <img src="img/woman1.jpg" alt="Female">
                Female
            </div></a>
        </div>
    </main>
</body>
</html>