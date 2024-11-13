<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact Messages</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
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
            background: #a0d6eb;
        }

        main {
            margin-top: 100px;
            padding: 20px;
            background: transparent;
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
        }

        /* Table Styles */
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
            background-color: #fff;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 11px;
            text-align: center;
        }

        th {
            background-color: #032B44;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .action-btn {
            padding: 10px 15px;
            background-color: #032B44;
            color: #fff;
            border-radius: 10px;
            font-family: 'Abril Fatface', cursive;
            transition: background-color 0.3s ease, transform 0.3s ease;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .action-btn:hover {
            background-color: #4682B4;
            transform: scale(1.1);
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
            table, th, td {
                font-size: 14px;
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
            table, th, td {
                font-size: 12px;
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
        <h2>Contact Messages</h2>
        <?php
        $query = "SELECT * FROM contactus";
        $result = mysqli_query($con, $query);
        
        if (mysqli_num_rows($result) > 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Message</th><th>Actions</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["username"]."</td><td>".$row["email"]."</td><td>".$row["message"]."</td><td><a class='action-btn' href='editcontact.php?id=".$row["id"]."'>Edit</a> <a class='action-btn' href='deletecontact.php?id=".$row["id"]."'>Delete</a></td></tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No contact messages found.</p>";
        }
        ?>
    </main>
</body>
</html>
                