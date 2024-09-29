<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['submit'])) {
    $exercise_id = $_POST['exercise_id'];

    $query = "DELETE FROM exercises WHERE exercise_id = '$exercise_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=exercise deleted Successfully");
    } else {
        echo "Error deleting exercise!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <style>
        /* Add the same CSS styles from the Login/Signup page */
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
            background: #a0d6eb;
        }
        main {
            margin-top: 100px;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
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
            background-color: #032B44;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px;
            color: #333;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
        }
        .form-group {
            margin-bottom: 15px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
        }
        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
        }
        .form-group input,
        .form-group button {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
        }
        .form-group button {
            background-color: #032B44;
            text-decoration: none;
            font-size: 20px;
            color: #fff;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        .form-group button:hover {
            background-color: #4682B4;
            transform: scale(0.9);
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

    <main>
        <h1>Delete Exercise</h1>
        <div class="form-container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exercise_id">Exercise ID:</label>
                    <input type="text" id="exercise_id" name="exercise_id" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Delete Exercise</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
