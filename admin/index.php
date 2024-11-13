<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login/Sign Up</title>
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
    background: #a0d6eb; /* Updated background color to sky blue */
}


    main {
        margin-top: 100px;
        padding: 20px; /* Ensure content starts below the fixed header */
        background: transparent; /* No background for the main content area */
    }

    .login-signup-form {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff; /* Form background color set to white */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Optional shadow for the form */
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

    .logo{
        
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

    h1 {
    text-align: center;
    margin-top: 0px; /* Added top margin to the heading */
    margin-bottom :20px 0px 20px 0px;
    font-size: 30px;
    color: #333;
    padding: 10px 20px;
    border-radius: 10px;
    font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
    letter-spacing: 0.5px; /* Add space between letters */
}

    .form-group {
        margin-bottom: 15px;
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        letter-spacing: 0.5px; /* Add space between letters */
    }

    .form-group label {
        display: block;
        margin-bottom: 15px;
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        letter-spacing: 0.5px; /* Add space between letters */
    }
    .form-group input,
    .form-group button {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
        letter-spacing: 0.5px; /* Add space between letters */
    }

    .form-group input,
.form-group button {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
    letter-spacing: 0.5px; /* Add space between letters */
}

.form-group button {
    background-color: #032B44; /* Button background color set to same as submit button in contact page */
    text-decoration: none;
    font-size: 20px;
    color: #fff;
    padding: 10px 20px;
    border-radius: 10px;
    font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
    letter-spacing: 0.5px; /* Add space between letters */
    transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
}

.form-group button:hover {
    background-color: #4682B4; /* Button hover background color */
    border: none;
    color: #fff;
    transform: scale(0.9); /* Button will shrink slightly on hover */
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
                <img src="img/LOGO_1.PNG" alt="Logo">
            </div>
            <div class="name">
                <h1>PhysioFit</h1>
            </div>
            <ul>
               <li><a class="nav-link" href="dashboard.php">Home</a></li>
                <?php
                if (isset($_SESSION['admin'])) {
                    echo '<li><a class="nav-link" href="profile.php">Profile</a></li>';
                } else {
                    echo '<li><a class="nav-link" href="loginsignup.php">Login/Sign Up</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
	<main>
    <h1>Admin login</h1>
    <div class="login-signup-form">
        <form action="process_login.php" method="post" id="login-form">
            <div class="form-group">
            <label for="username">Username<span style="color:red">*</span></label>

                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password<span style="color:red">*</span></label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <?php         if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo "<p>$msg</p>"; // or do something else with the message
}?>
        </form>
        

        

       
    </div>
</main>
</body>
</html>