<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$subCategory = $_GET['subcategory'];

$stmt = $con->prepare("SELECT e.* 
                        FROM exercises e 
                        JOIN subcategory s ON e.subCategory = s.subcategory 
                        WHERE s.subcategory = ?");

$stmt->bind_param("s", $subCategory);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        // Display exercises
        echo "<div class='exercise'>";
        echo "<h2>" . $row['exerciseName'] . "</h2>";
        echo "<p>" . $row['description'] . "</p>";
        echo "<img src='" . $row['image'] . "' alt='" . $row['exerciseName'] . "'>";
        echo "</div>";
    }
} else {
    echo "No exercises found.";
}
$stmt->close();
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercises</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            font-family: 'Abril Fatface', cursive;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #87CEEB;
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
            letter-spacing: 0.5px;
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .nav-link:hover {
            background-color: #032B44;
            color: #fff;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .exercise {
            background-color: #fff;
            padding: 20px;
            margin: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .exercise img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="logo.png" alt="Logo">
            </div>
            <div class="name">
                <h1>Exercise Tracker</h1>
            </div>
            <ul>
                <li><a href="#" class="nav-link">Home</a></li>
                <li><a href="#" class="nav-link">Exercises</a></li>
                <li><a href="#" class="nav-link">Workouts</a></li>
                <li><a href="#" class="nav-link">Progress</a></li>
            </ul>
        </nav >
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Exercises</h1>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Display exercises
                        echo "<div class='exercise'>";
                        echo "<h2>" . $row['exerciseName'] . "</h2>";
                        echo "<p>" . $row['description'] . "</p>";
                        echo "<img src='" . $row['image'] . "' alt='" . $row['exerciseName'] . "'>";
                        echo "</div>";
                    }
                } else {
                    echo "No exercises found.";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>