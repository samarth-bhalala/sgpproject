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
            margin: 0;
            background: #a0d6eb; /* Sky blue background */
        }

        main {
            margin-top: 100px;
            padding: 20px;
            background: transparent;
        }

        /* Header Styles */
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
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            background-color: #032B44;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Buttons and Dropdown Styles */
        .btn-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 10px;
            margin-top: 50px;
        }

        .action-btn, .dropdown-btn {
            padding: 10px 20px;
            font-size: 20px;
            background-color: #032B44;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .action-btn:hover, .dropdown-btn:hover {
            background-color: #4682B4;
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .dropdown {
            position: relative;
            display: inline-block;
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

        .dropdown-content a {
            color: #032B44;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            border-radius: 10px;
        }

        .dropdown-content a:hover {
            background-color: #4682B4;
            color: white;
        }

        .dropdown:hover .dropdown-content {
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

            .btn-container {
                flex-direction: column;
                gap: 10px;
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
    <div class="btn-container">
        <!-- Add Dropdown Button -->
        <div class="dropdown">
            <button class="dropdown-btn">Add</button>
            <div class="dropdown-content">
                <a href="addexcercise.php">Add Exercise</a>
                <a href="addcategory.php">Add Category</a>
                <a href="addsubcategory.php">Add Subcategory</a>
                <a href="addmaincategory.php">Add Main Category</a>
            </div>
        </div>

        <!-- Delete Dropdown Button -->
        <div class="dropdown">
            <button class="dropdown-btn">Delete</button>
            <div class="dropdown-content">
                <a href="deletecategory.php">Delete Category</a>
                <a href="deletesubcategory.php">Delete Subcategory</a>
                <a href="deletemaincategory.php">Delete Main Category</a>
            </div>
        </div>

        <!-- View All Exercise Button -->
        <button class="action-btn" onclick="location.href='viewall.php';">View All exercise</button>

        <!-- View Exercise by Category Button -->
        <div class="dropdown">
            <button class="dropdown-btn">View exercise by Category</button>
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

        <!-- View Exercise by Subcategory Button -->
        <div class="dropdown">
            <button class="dropdown-btn">View exercise by Subcategory</button>
            <div class="dropdown-content">
                <?php 
                $query = "SELECT DISTINCT subcategory FROM exercise";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="viewbysubcategory.php?subcategory='.$row["subcategory"].'">'.$row["subcategory"].'</a>';
                }
                ?>
            </div>
        </div>  

        <!-- View Exercise by Main Category Button -->
        <div class="dropdown">
            <button class="dropdown-btn">View exercise by Main Category</button>
            <div class="dropdown-content">
                <?php 
                $query = "SELECT DISTINCT maincategory FROM exercise";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<a href="viewbymaincategory.php?maincategory='.$row["maincategory"].'">'.$row["maincategory"].'</a>';
                }
                ?>
            </div>
        </div>

        <!-- View Contact Page Button -->
        <button class="action-btn" onclick="location.href='viewcontact.php';">View Contact Page</button>

        <!-- View User Page Button -->
        <button class="action-btn" onclick="location.href='viewuser.php';">View User Page</button>
    </div>

    <?php 
    if (isset($_GET['msg'])) {
        $msg = $_GET['msg'];
        echo "<p>$msg</p>";
    }
    ?> 
</main>
</body>
</html>
