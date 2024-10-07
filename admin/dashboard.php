<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Abril Fatface', cursive;
            line-height: 1.6;
            overflow-x: hidden;
            background: #a0d6eb; /* Sky blue background */
        }
        header {
            background: rgba(255, 248, 241, 0.4);
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
        }
        .logo img {
            max-height: 80px;
        }
        .name h1 {
            font-size: 45px;
            color: #333;
        }
        ul {
            list-style: none;
            display: flex;
        }
        .nav-link {
            text-decoration: none;
            font-size: 20px;
            color: #333;
            padding: 10px 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        .nav-link:hover {
            background-color: #032B44;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .btn-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            margin-top: 100px;
            padding: 20px;
        }
        .action-btn {
            padding: 10px 20px;
            font-size: 20px;
            background-color: #032B44;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s ease;
            margin-right: 10px;
            margin-bottom: 10px;
            margin-left : 10px;
        }
        .action-btn:hover {
            background-color: #4682B4;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-btn {
            background-color: #032B44;
            color: white;
            padding: 10px 20px;
            font-size: 20px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #fff;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border-radius: 10px;
        }
        .dropdown:hover .dropdown-content {
            display: block;
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
    <?php if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo "<p>$msg</p>";
    } ?>
    <div class="btn-container">
        <button class="action-btn" onclick="location.href='addexercise.php';">Add Exercise</button>
        <button class="action-btn" onclick="location.href='addcategory.php';">Add Category</button>
        <button class="action-btn" onclick="location.href='addsubcategory.php';">Add Subcategory</button>
        <button class="action-btn" onclick="location.href='addmaincategory.php';">Add Main Category</button>
        <button class="action-btn" onclick="location.href='deletecategory.php';">Delete Category</button>
        <button class="action-btn" onclick="location.href='deletesubcategory.php';">Delete Subcategory</button>
        <button class="action-btn" onclick="location.href='deletemaincategory.php';">Delete Main Category</button>
        <button class="action-btn" onclick="location.href='viewall.php';">View All Exercises</button>
        <div class="dropdown">
            <button class="dropdown-btn">View Exercise by Category</button>
            <div class="dropdown-content">
                <?php 
                $query = "SELECT DISTINCT category FROM exercise";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="viewbycategory.php?category='.$row["category"].'">'.$row["category"].'</a>';
                }
                ?>
            </div>
        </div>
        <button class="action-btn" onclick="location.href='editcategory.php';">Edit Category</button>
        <button class="action-btn" onclick="location.href='editsubcategory.php';">Edit Subcategory</button>
        <button class="action-btn" onclick="location.href='editmaincategory.php';">Edit Main Category</button>
    </div>
</main>

</body>
</html>
