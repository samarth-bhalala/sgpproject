<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$maincategory = $_GET['maincategory'];

$query = "SELECT * FROM exercise WHERE maincategory = '$maincategory'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercises - <?php echo $maincategory; ?></title>
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
            background: #a0d6eb; /* Background color to match */
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

        td {
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
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
                <li><a class="nav-link" href="index.php">Home</a></li>
                <?php
                
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
        <h1>Exercises for "<?php echo $maincategory; ?>"</h1>
        <table>
            <tr>
                <th>Exercise Name</th>
                <th>Category</th>
                <th>Subcategory</th>
                <th>Main Category</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>'.$row["exerciseName"].'</td>
                        <td>'.$row["category"].'</td>
                        <td>'.$row["subcategory"].'</td>
                        <td>'.$row["maincategory"].'</td>
                      </tr>';
            }
            ?>
        </table>
    </main>
</body>
</html>
