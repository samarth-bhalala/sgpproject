<?php
session_stat();
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
    font-family: Arial, sans-serif;
    line-height: 1.6;
    overflow-x: hidden;
    margin: 0;
    background: linear-gradient(135deg, rgba(255, 182, 193, 0.3), rgba(255, 105, 180, 0.3)); /* Gradient background */
}

main {
    margin-top: 100px;
    padding: 20px; 
    background: transparent; 
}

.contact-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff; 
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); 
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 15px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    transition: border-color 0.3s ease;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: #C4276A; 
    box-shadow: 0 0 10px rgba(197, 39, 106, 0.5);
}

.form-group button {
    background-color: #C4276A;
    text-decoration: none;
    font-size: 20px;
    color: #fff;
    padding: 10px 20px;
    border-radius: 10px;
    border: none; 
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.form-group button:hover {
    background-color: #FF69B4; 
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    border: none; 
}


.contact-form {
    animation: fadeIn 1s ease;
}

@keyframes fadeIn {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
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

    /* main {
        margin-top: 100px;
        padding: 20px; /* Ensure content starts below the fixed header
    }*/

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
        <h1>Contact Us</h1>
        <div class="contact-form">
            <form action="process_contact.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>