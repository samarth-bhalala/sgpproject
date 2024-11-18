<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/sgpproject/sgpproject/conn.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
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
            line-height: 1.6;
            overflow-x: hidden;
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
            font-size: 45px;
            color: #333;
        }
        ul {
            list-style: none;
            display: flex;
        }
        ul li {
            margin-left: 20px;
        }
        .nav-link {
            text-decoration: none;
            font-size: 20px;
            color: #333;
            transition: 0.3s;
        }
        .nav-link:hover {
            color: #fff;
            background-color: #032B44;
            transform: scale(1.1);
        }
        main {
            margin-top: 100px;
            padding: 20px;
        }
        .add-exercise-form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #032B44;
            color: #fff;
            cursor: pointer;
            transition: 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #4682B4;
            transform: scale(0.9);
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="index.php"><img src="img/LOGO_1.PNG" alt="PhysioFit Logo"></a>
            </div>
            <div class="name">
                <h1>PhysioFit</h1>
            </div>
            <ul>
                <li><a class="nav-link" href="dashboard.php">Home</a></li>
                <?php
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
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM signup WHERE id = '$id'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = mysqli_real_escape_string($con, $_POST['username']);
                    $email = mysqli_real_escape_string($con, $_POST['email']);

                    $update_query = "UPDATE signup SET username = '$username', email = '$email' WHERE id = '$id'";
                    if (mysqli_query($con, $update_query)) {
                        header('Location: viewuser.php?msg=successfully edited user data');
                        exit;
                    } else {
                        echo "<p style='color: red;'>Error updating user. Please try again.</p>";
                    }
                }
                ?>
                <div class="add-exercise-form">
                    <h2>Edit User</h2>
                    <form action="" method="post">
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                        <input type="submit" name="submit" value="Update">
                    </form>
                </div>
                <?php
            } else {
                echo "<p>User not found.</p>";
            }
        } else {
            header('Location: viewuser.php');
            exit;
        }
        ?>
    </main>
</body>
</html>
