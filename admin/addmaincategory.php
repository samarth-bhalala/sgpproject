<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['submit'])) {
    $maincategory = $_POST['maincategory'];
    $img_path = $_POST['img_path'];

    $query = "INSERT INTO maincategory (maincategory, img) VALUES ('$maincategory', '$img_path')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Main Category added Successfully");
    } else {
        echo "Error adding main category!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Category</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"> <!-- Link to Abril Fatface Font -->
    <style>
    /* Same CSS styles from the login page */
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
        background: transparent;
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

    h1 {
        text-align: center;
        margin-top: 0px;
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
        margin-bottom: 15px;
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
        color: #fff;
        padding: 10px 20px;
        border-radius: 10px;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .form-group button:hover {
        background-color: #4682B4;
        transform: scale(0.9);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
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
        <div class="form-container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="maincategory">Main Category:</label>
                    <input type="text" id="maincategory" name="maincategory" required>
                </div>
                <div class="form-group">
                    <label for="img_path">Image Path:</label>
                    <input type="text" id="img_path" name="img_path" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit">Add Main Category</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
