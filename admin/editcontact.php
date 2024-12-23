<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Exercise</title>
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
        background: #a0d6eb; /* Background color matching login page */
    }

    main {
        margin-top: 100px;
        padding: 20px;
        background: transparent;
    }

    .add-exercise-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff; /* Form background color set to white */
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
        letter-spacing: 0.5px;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    .nav-link:hover {
        background-color: #032B44;
        color: #fff;
        transform: scale(1.1);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
    }

    h2 {
        text-align: center;
        font-size: 30px;
        color: #333;
        padding: 10px 20px;
        margin-bottom: 20px;
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
    }

    input, textarea, select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        font-family: 'Abril Fatface', cursive;
        letter-spacing: 0.5px;
    }

    textarea {
        height: 100px;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #032B44;
        color: #fff;
        border-radius: 10px;
        font-family: 'Abril Fatface', cursive;
        letter-spacing: 0.5px;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
    }

    button[type="submit"]:hover {
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

<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM contactus WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

    if (isset($_POST['submit'])) {
        $name = $_POST['username'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        $query = "UPDATE contactus SET username = '$name', email = '$email', message = '$message' WHERE id = '$id'";
        mysqli_query($con, $query);

        header('Location: viewcontact.php');
    }
?>

    <h2>Edit Contact Message</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $row['username']; ?>"><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>"><br><br>
        <label for="message">Message:</label>
        <textarea id="message" name="message"><?php echo $row['message']; ?></textarea><br><br>
        <input type="submit" name="submit" value="Update">
    </form>

<?php
} else {
    header('Location: viewcontact.php');
}
?>
</main>
</body>
</html>
