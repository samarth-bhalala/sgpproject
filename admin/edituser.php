<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap"> <!-- Link to Abril Fatface Font -->
    <style>
        /* Include your existing styles here */
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
        
        // Check if the user exists
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            if (isset($_POST['submit'])) {
                $username = mysqli_real_escape_string($con, $_POST['username']);
                $email = mysqli_real_escape_string($con, $_POST['email']);
                $role = mysqli_real_escape_string($con, $_POST['role']); // Use this only if you have role input

                // Update query
                $update_query = "UPDATE signup SET username = '$username', email = '$email' WHERE id = '$id'";
                if (mysqli_query($con, $update_query)) {
                    // Redirect to the view page after success
                    header('Location: viewuser.php');
                    exit;
                } else {
                    echo "<p style='color: red;'>Error updating user. Please try again.</p>";
                }
            }
            ?>

            <h2>Edit User</h2>
            <form action="" method="post">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required><br><br>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required><br><br>
                <!-- If you need to include a role input -->
                <!-- <label for="role">Role:</label> -->
                <!-- <input type="text" id="role" name="role" value="<?php echo htmlspecialchars($row['role']); ?>"><br><br> -->
                
                <input type="submit" name="submit" value="Update">
            </form>

        <?php
        } else {
            // If no user found for this ID
            echo "<p>User not found.</p>";
        }
    } else {
        // Redirect if the 'id' parameter is missing
        header('Location: viewuser.php');
        exit;
    }
    ?>
    </main>
</body>
</html>
