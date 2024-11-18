<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$id = $_GET['id'];

$query = "SELECT * FROM exercise WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Exercise</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Abril Fatface', cursive;
            background: #a0d6eb;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
    margin-left: -300px;  /* Move the text 20px to the left */
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

        .form-container {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            width: 80%;
            max-width: 550px;
            margin-left: 60px;
        }

        h2 {
            text-align: center;
            font-size: 30px;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 18px;
            color: #333;
        }

        input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border-radius: 10px;
            border: 1px solid #ccc;
            font-family: 'Abril Fatface', cursive;
        }

        input[type="submit"] {
            background-color: #032B44;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #4682B4;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        @media (max-width: 768px) {
            .form-container {
                width: 90%;
            }

            .name h1 {
                font-size: 25px;
            }

            .nav-link {
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .form-container {
                width: 95%;
            }

            .name h1 {
                font-size: 20px;
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
        <a href="index.php">
                <img src="img/LOGO_1.PNG" alt="PhysioFit Logo">
            </a>        </div>
        <div class="name">
            <h1>PhysioFit</h1>
        </div>
        <ul>
            <li><a class="nav-link" href="dashboard.php">Home</a></li>
            <?php
            include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
            if (isset($_SESSION['admin'])) {
                echo '<li><a class="nav-link" href="logout.php">Logout</a></li>';
            } else {
                echo '<script>window.location.href = "index.php";</script>';
            }
            ?>
        </ul>
    </nav>
</header>

<main>
    <div class="form-container">
        <h2>Edit Exercise</h2>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

            <label>Exercise Name:</label>
            <input type="text" name="exerciseName" value="<?php echo $row["exerciseName"]; ?>" required>

            <label>Category:</label>
            <input type="text" name="category" value="<?php echo $row["category"]; ?>" required>

            <label>Subcategory:</label>
            <input type="text" name="subcategory" value="<?php echo $row["subcategory"]; ?>" required>

            <input type="submit" value="Update">
        </form>
    </div>
</main>

</body>
</html>
