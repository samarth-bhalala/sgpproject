<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day 1 Exercises</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        .card-container {
            margin-top: 100px;
        }

        .exercise-row {
            display: flex;
            align-items: center;
            margin-bottom: 30px;
        }

        .exercise-card {
            border-radius: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .exercise-card img {
            border-radius: 20px 20px 0 0;
            width: 100%;
            height: auto;
        }

        .exercise-card-body {
            padding: 15px;
            background-color: #fff;
            border-radius: 0 0 20px 20px;
        }

        .exercise-card-body h5 {
            font-size: 22px;
            margin-bottom: 10px;
        }

        .exercise-card-body p {
            font-size: 16px;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }
    </style>
</head>
<body>

<header>
    <nav>
        <div class="logo">
            <img src="/sgpproject/sgpproject/img/LOGO_1.PNG" alt="Logo" height="80">
        </div>
        <div class="name">
            <h1>PhysioFit</h1>
        </div>
        <ul>
            <li><a class="nav-link" href="/sgpproject/sgpproject/index.php">Home</a></li>
            <li><a class="nav-link" href="/sgpproject/sgpproject/aboutus.php">About Us</a></li>
            <li><a class="nav-link" href="/sgpproject/sgpproject/contactus.php">Contact Us</a></li>
            <?php
            if (isset($_SESSION['stat'])) {
                echo '<li><a class="nav-link" href="/sgpproject/sgpproject/profile.php">Profile</a></li>';
                echo '<li><a class="nav-link" href="/sgpproject/sgpproject/logout.php">Logout</a></li>';
            } else {
                echo '<li><a class="nav-link" href="/sgpproject/sgpproject/loginsignup.php">Login/Sign Up</a></li>';
            }
            ?>
        </ul>
    </nav>
</header>

<div class="container card-container">
    <?php
    include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
    // Retrieve exercises from the database
    $sql = "SELECT * FROM exercises where category='Body Pain' and subCategory='Back Pain' and  level='Beginner' and gender='Male'";
    $result = $con->query($sql);

    // Check if there are any exercises
    if ($result->num_rows > 0) {
      // Display exercises
      while($row = $result->fetch_assoc()) {
        ?>
        <!-- Exercise -->
        <div class="row exercise-row">
            <div class="col-md-6">
                <div class="card exercise-card">
                    <img src="<?php echo $row['imagePath']; ?>" class="card-img-top" alt="<?php echo $row['exerciseName']; ?>">
                    <div class="card-body exercise-card-body">
                        <h5 class="card-title"><?php echo $row['exerciseName']; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card exercise-card">
                    <div class="card-body exercise-card-body">
                        <p class="card-text"><?php echo $row['exerciseDescription']; ?></p>
                        <div class="button-group">
                            <button class="btn btn-primary">Start Exercise</button>
                            <button class="btn btn-secondary">Stop Exercise</button>
                            <button class="btn btn-info">Watch Video</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
      }
    } else {
      echo "No exercises found.";
    }
    $con->close();
    ?>
</div>

</body>
</html>