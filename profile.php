<?php
require_once 'conn.php';
session_stat();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"> <!-- Link to Abril Fatface Font -->
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    body {
        font-family: 'Abril Fatface', cursive;
        line-height: 1.6;
        overflow-x: hidden;
        margin: 0;
        background: #a0d6eb; /* Same background color as login page */
    }

    main {
        margin-top: 100px;
        padding: 20px; /* Ensure content starts below the fixed header */
        background: transparent; /* No background for the main content area */
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
        background-color: #032B44;
        color: #fff;
        transform: scale(1.1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    .card {
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        margin: 100px auto;
    }

    .card h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 24px;
        font-weight: bold;
    }

    .card p {
        margin-bottom: 15px;
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
                    echo '<li><a class="nav-link" href="logout.php">Logout</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>

    <main>
        <?php
        $user_id = $_SESSION['username'];

        // Query the database for the user's information
        $sql = "SELECT username, email, pass FROM signup  WHERE username = '$user_id'";
        $result = $con->query($sql);
        
        // Check if the query returned any results
        if ($result->num_rows > 0) {
            // Get the user's information from the query results
            $row = $result->fetch_assoc();
            $username = $row["username"];
            $email = $row["email"];
            //$phone = $row["phone"];
            $password = $row["pass"];
        } else {
            // If no results were found, display an error message
            echo "No user found with that ID.";
        }
        ?>
        <body>
    <div class="card">
        <h2>User Details</h2>
        <p><strong>Name:</strong></p>
        <p><strong>Email:</strong></p>
        <p><strong>Phone:</strong></p>
        <p><strong>Address:</strong> </p>
    </div>
</body>
</main>
    </body>
</html>

       