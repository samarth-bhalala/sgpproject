<?php
session_start();
echo 'Session ID: ' . session_id() . '<br>';
var_dump($_SESSION);
?>
<!DOCTYPE html>
<html>
<head>
    <title>index</title>
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
    margin-top: -0.1px;
    padding-bottom: 0px; /* Ensure content starts below the fixed header */
}

.slideshow-container {
    position: relative;
    width: 100%;
    height: 100vh; /* Adjust height to fit viewport */
    overflow: hidden;
    z-index: 5; /* Ensure slides are below the header */
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
    filter: brightness(100%);
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

if (isset($_SESSION['stat']) && $_SESSION['stat'] == 1) {
    echo '<li><a class="nav-link" href="profile.php">Profile</a></li>';
} else {
    echo '<li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>';
}
?>
            </ul>
        </nav>
    </header>
    </body>
</html>
