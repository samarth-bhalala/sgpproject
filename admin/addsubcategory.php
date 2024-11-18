<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['add_subcategory'])) {
    $subcategory = $_POST['subcategory'];
    $category = $_POST['category'];
    $img_path = $_POST['img_path'];

    $query = "INSERT INTO subcategory (subcategory, category, img) VALUES ('$subcategory', '$category', '$img_path')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Subcategory added Successfully");
    } else {
        echo "Error adding subcategory!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
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
            background: #a0d6eb; /* Background color */
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
        main {
            margin-top: 100px; /* Ensure content starts below the fixed header */
            padding: 20px;
            background: transparent; /* No background for the main content area */
        }
        h1 {
            text-align: center;
            margin-top: 0; /* Added top margin to the heading */
            margin-bottom: 20px;
            font-size: 30px;
            color: #333;
            padding: 10px 20px;
            border-radius: 10px;
            font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
            letter-spacing: 0.5px; /* Add space between letters */
        }
        .add-category-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff; /* Form background color set to white */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Optional shadow for the form */
        }
        .form-group {
            margin-bottom: 15px;
            font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
            letter-spacing: 0.5px; /* Add space between letters */
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-family: 'Abril Fatface', cursive; /* Apply Abril Fatface font */
            letter-spacing: 0.5px; /* Add space between letters */
        }
        .form-group input,
        .form-group select,
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
            background-color: #032B44; /* Button background color */
            color: #fff;
            font-size: 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }
        .form-group button:hover {
            background-color: #4682B4; /* Button hover background color */
            transform: scale(0.9); /* Button will shrink slightly on hover */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
            <a href="index.php">
                <img src="img/LOGO_1.PNG" alt="PhysioFit Logo">
            </a>            </div>
            <div class="name">
                <h1>PhysioFit</h1>
            </div>
            <ul>
              <li><a class="nav-link" href="dashboard.php">Home</a></li><?php
                
                include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
                if (isset($_SESSION['admin'])) {
                
                    echo '<li><a class="nav-link" href="logout.php">Logout</a></li>';
                } else {?>
                 <?php  echo '<script>window.location.href = "index.php";</script>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Add Category</h1>
        <div class="add-category-form">
            <form action="" method="post">
                <div class="form-group">
                    <label for="subcategory">Subcategory:</label>
                    <input type="text" name="subcategory" placeholder="Enter subcategory name" required>
                </div>
                <div class="form-group">
                    <label for="category">Category:</label>
                    <select name="category" required>
                        <?php 
                        $query="SELECT DISTINCT category FROM category";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="img_path">Image Path:</label>
                    <input type="text" name="img_path" placeholder="Enter image path" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="add_subcategory">Add Subcategory</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
