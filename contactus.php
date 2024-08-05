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
        background: rgba(255, 248, 241, 0.8); /* More opaque background for better visibility */
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
        max-height: 50px; /* Further reduced size for a more compact fit */
    }

    .name h1 {
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        font-size: 30px; /* Reduced size for better fit */
        color: #333;
    }

    ul {
        list-style: none;
        display: flex;
        padding: 0;
        margin: 0;
    }

    ul li {
        margin-left: 10px; /* Further reduced margin for better spacing */
    }

    .nav-link {
        text-decoration: none;
        font-size: 16px; /* Reduced font size */
        color: #333;
        padding: 5px 10px; /* Adjusted padding */
        border-radius: 5px;
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        letter-spacing: 0.5px; /* Add space between letters */
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .nav-link:hover {
        background-color: #C4276A;
        color: #fff;
        transform: scale(1.05); /* Slightly less scaling */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    @media (max-width: 768px) {
        .name h1 {
            font-size: 20px; /* Adjusted for better fit */
        }

        ul {
            flex-direction: column;
            align-items: flex-start;
        }

        ul li {
            margin-left: 0;
            margin-bottom: 5px; /* Reduced margin bottom */
        }
    }

    @media (max-width: 480px) {
        .logo img {
            max-height: 40px; /* Further reduced size */
        }

        .name h1 {
            font-size: 18px; /* Further reduced size */
        }

        .nav-link {
            font-size: 14px; /* Adjusted font size */
            padding: 3px 8px; /* Adjusted padding */
        }
    }

    .container {
        padding: 30px 15px; /* Reduced padding */
        max-width: 500px; /* Further reduced width for better fit */
        margin: 100px auto 20px; /* Adjusted margins for better spacing */
        background-color: #f4f4f4;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .container h2 {
        font-family: 'Abril Fatface', cursive;
        font-size: 24px; /* Reduced size */
        color: #333;
        margin-bottom: 15px;
        text-align: center; /* Center aligned heading */
    }

    .form-group {
        margin-bottom: 10px; /* Reduced bottom margin */
    }

    .form-group label {
        display: block;
        font-size: 14px; /* Further reduced size */
        margin-bottom: 4px; /* Reduced margin bottom */
        color: #333;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 8px; /* Reduced padding */
        font-size: 12px; /* Further reduced font size */
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group textarea:focus {
        border-color: #C4276A;
        outline: none;
    }

    .form-group button {
        background-color: #C4276A;
        color: #fff;
        border: none;
        padding: 10px 15px; /* Reduced padding */
        font-size: 14px; /* Further reduced font size */
        font-family: 'Abril Fatface', cursive;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .form-group button:hover {
        background-color: #a31f59;
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .container {
            padding: 20px 10px; /* Further reduced padding */
        }

        .form-group input,
        .form-group textarea {
            font-size: 12px; /* Adjusted font size */
        }

        .form-group button {
            padding: 8px 12px; /* Adjusted padding */
            font-size: 12px; /* Adjusted font size */
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
                } else {
                    echo '<li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <div class="container">
        <h2>Contact Us</h2>
        <form action="contact_form_handler.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Submit</button>
            </div>
        </form>
    </div>
   
</body>
</html>
