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
    background: #a0d6eb; /* Updated background color to sky blue */
}

main {
    margin-top: 100px;
    padding: 20px; 
    background: transparent; 
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

h1 {
    text-align: center;
    margin-bottom :20px 0px 20px 0px;
    font-size: 30px;
    color: #333;
    padding: 10px 20px;
    border-radius: 10px;
    font-family: 'Abril Fatface', cursive; 
    letter-spacing: 0.5px; 
}
.about-us {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 25px;
    background-color: white; /* Set background to white */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
    max-width: 1200px; /* Set max width */
    margin: 0 auto; /* Center the box */
}

.about-us h1 {
    margin-bottom: 10px;
}

.about-us p {
    font-size: 20px;
    margin-bottom: 20px;
    text-align: justify;
}

.features {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.feature {
    background-color: #fff;
    padding: 10px;
    margin: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 300px;
    height: 500px;
    text-align: center; /* Center the text */
    transition: transform 0.3s ease, background-color 0.3s ease, color 0.3s ease, box-shadow 0.3s ease; /* Add smooth transition */
}

.feature:hover {
    transform: scale(1.05); /* Slightly increase size on hover */
    background-color: #032B44; /* Dark blue on hover */
    color: white; /* Change text color to white */
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Increase shadow on hover */
}

.feature:hover h2,
.feature:hover p {
    color: white; /* Change heading and paragraph text to white on hover */
}



.feature img {
    width: 100%;
    height: 40%;
    margin-top: 10px;
    border-radius: 5px; /* Rounded corners for images */
    transition: transform 0.3s ease;
}

.feature:hover img {
    transform: scale(1.05); /* Slight zoom effect on image */
}

.feature h2 {
    font-size: 20px;
    margin-bottom: 5px;
}

.feature p {
    font-size: 16px;
    margin-bottom: 10px;
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
    <div class="about-us">
        <h1>About PhysioFit</h1>
        <p>Our website is designed to provide exercises for pain relief with proper diet charts. We particularly focus on recovering from injuries and body pain simply at home.</p>
        <p>We work with Arthritis, Back Pain, Spinal Injuries, and even Mental Health issues, etc. Our exercises can also help patients with Heart Attack and Asthma to some extent.</p>
        <p>Our website is essential for people of limited ages because elders don’t often visit clinics to undertake exercises. We also have a set of exercises and diet plans for weight loss and gain.</p>
        <p>Nowadays, people do not prefer to visit Therapy centers because of their tight schedule, so by taking help of our website, they can do exercises wherever they want. Exercise along with a proper diet leads to a Healthy Lifestyle.</p>
    </div>

    <div class="features">
        <div class="feature">
        <h2>Web-based Physiotherapy</h2>
        <img src="img/ab1.jpg" alt="Web-based Physiotherapy Videos">
        <p>Our website presents web-based Physiotherapy Videos that can be accessed from anywhere.So it will be very beneficial for elderly people.

        </p>
            
        </div>
        <div class="feature">
        
            <h2>Prenatal Postnatal Exercises</h2>
            <img src="img/ab2.jpg" alt="Prenatal Postnatal Exercises">
            <p>We have included Prenatal Postnatal exercises that are beneficial for ladies to do at home.</p>
            
        </div>
        <div class="feature">
            <h2>Customizable Exercise Plans</h2>
            <img src="img/ab3.jpg" alt="Customizable Exercise Plans">
            <p>Using our website, users can select a variety of features for treatment. We have 3 levels - Beginners, Intermediate, and Advanced.</p>
            
        </div>
        <div class="feature">
            <h2>Free and Paid Exercises</h2>
            <img src="img/ab4.jpg" alt="Free and Paid Exercises">
            <p>In all levels, some exercises are for free and some of them are paid. Beginners will have warmup and some basic exercises. In Intermediate, there are some additional exercises with increased timings. In Advanced, exercises are designed with routine equipment's which are easily available at home.</p>
            
        </div>
    </div>
</main>
</body>
</html>
