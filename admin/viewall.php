<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Sign Up</title>
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
            background: #a0d6eb; /* Updated background color to sky blue */
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
            margin-top: 0;
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
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
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
            font-size: 20px;
            color: #fff;
            padding: 10px 20px;
            border-radius: 10px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .form-group button:hover {
            background-color: #4682B4;
            transform: scale(0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        /* Table Styles */
        table {
            width: 80%; /* Set to medium width */
            border-collapse: collapse;
            margin: 20px auto; /* Center the table */
            font-family: 'Abril Fatface', cursive;
            letter-spacing: 0.5px;
            background-color: #fff; /* Background color for table */
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

        td {
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .button {
        width: 100%;
        padding: 10px 15px 10px 15px;
        margin: 8px;
        background-color: #032B44;
        color: #fff;
        border-radius: 10px;
        font-family: 'Abril Fatface', cursive;
        letter-spacing: 0.5px;
        transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        text-decoration : none;
    }

    .button:hover {
        background-color: #4682B4;
        transform: scale(1.5);
        box-shadow: 0 4px 8px rgba(0, 0, 0,  0.3);
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
        <h1>View all exercise</h1>
        <div class="login-signup-form">
            <!-- Form content here -->

            <!-- Table without container -->
            <?php
            include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
            
            $query = "SELECT * FROM exercise";
            $result = mysqli_query($con, $query);

            echo '<table>';
            echo '<tr>
                    <th>Exercise Name</th>
                    <th>Exercise Description</th>
                    <th>Main Category</th>
                    <th>Category</th>
                    <th>Sub Category</th>
                    <th>Action</th>
                  </tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>'.$row["exerciseName"].'</td>
                        <td>'.$row["exerciseDescription"].'</td>
                        <td>'.$row["maincategory"].'</td>
                        <td>'.$row["category"].'</td>
                        <td>'.$row["subcategory"].'</td>
                        <td><a class="button" href="edit_exercise.php?id='.$row["id"].'">Edit</a>
                             <a class="button" href="deleteexercise.php?id='.$row["id"].'">Delete</a>
                        </td>
                        
                      </tr>';
            }
            echo '</table>';
            ?>
        </div>
    </main>
</body>
</html>
