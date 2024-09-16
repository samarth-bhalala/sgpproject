<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
session_start();

// Retrieve all users
$result_users = $con->query("SELECT * FROM signup");

// Retrieve all contact us messages
$result_contact_us = $con->query("SELECT * FROM contactus");

$result_exercises = $con->query("SELECT * FROM `exercises`");
if (!$result_exercises) {
    echo "Error: " . $con->error;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            background-color: #a0d6eb; /* Same background color as the login page */
            font-family: 'Abril Fatface', cursive;
        }

        main {
            margin-top: 100px;
            padding: 20px;
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

        h2 {
            color: #032B44;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        table th {
            background-color: #032B44;
            color: white;
            font-size: 18px;
        }

        table td {
            color: #333;
        }

        a {
            text-decoration: none;
            color: #032B44;
        }

        a:hover {
            color: #fff;
            background-color: #4682B4;
            padding: 5px;
            border-radius: 5px;
        }

        /* Button style for Edit and Delete */
        .action-buttons a {
            margin: 0 5px;
            padding: 8px 12px;
            background-color: #032B44;
            color: white;
            border-radius: 5px;
            transition: 0.3s ease;
        }

        .action-buttons a:hover {
            background-color: #4682B4;
        }

    </style>
</head>
<body>
    <header>
        <nav>
            <div class="name">
                <h1>PhysioFit Dashboard</h1>
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
        <h2>Users</h2>
        <table>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr>
            <?php while ($user = $result_users->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td class="action-buttons">
                        <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                        <a href="delete_user.php?id=<?php echo $user['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <h2>Contact Us Messages</h2>
        <table>
            <tr><th>ID</th><th>Name</th><th>Email</th><th>Message</th><th>Actions</th></tr>
            <?php while ($contact_us = $result_contact_us->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $contact_us['id']; ?></td>
                    <td><?php echo $contact_us['username']; ?></td>
                    <td><?php echo $contact_us['email']; ?></td>
                    <td><?php echo $contact_us['message']; ?></td>
                    <td class="action-buttons">
                        <a href="edit_contact_us.php?id=<?php echo $contact_us['id']; ?>">Edit</a>
                        <a href="delete_contact_us.php?id=<?php echo $contact_us['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>

        <h2>Exercises</h2>
        <table>
            <tr><th>ID</th><th>Name</th><th>Description</th><th>Gender</th><th>Category</th><th>Sub-Category</th><th>Level</th><th>Actions</th></tr>
            <?php while ($exercise = $result_exercises->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $exercise['id']; ?></td>
                    <td><?php echo $exercise['exerciseName']; ?></td>
                    <td><?php echo $exercise['exerciseDescription']; ?></td>
                    <td><?php echo $exercise['gender']; ?></td>
                    <td><?php echo $exercise['category']; ?></td>
                    <td><?php echo $exercise['subCategory']; ?></td>
                    <td><?php echo $exercise['level']; ?></td>
                    <td class="action-buttons">
                        <a href="editexercise.php?id=<?php echo $exercise['id']; ?>">Edit</a>
                        <a href="deleteexercise.php?id=<?php echo $exercise['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </main>
</body>
</html>
