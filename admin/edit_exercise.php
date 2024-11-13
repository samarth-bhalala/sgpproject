<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

// Get exercise ID from URL
$exerciseId = $_GET['id'];

// SQL query to retrieve exercise data
$sql = "SELECT * FROM exercise WHERE id = '$exerciseId'";
$result = $con->query($sql);

// Check if exercise exists
if ($result->num_rows > 0) {
    $exerciseData = $result->fetch_assoc();
} else {
    echo "Exercise not found";
    exit;
}

// Update exercise data if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exerciseName = $_POST['exerciseName'];
    $exerciseDescription = $_POST['exerciseDescription'];
    $mainCategory = $_POST['mainCategory'];
    $category = $_POST['category'];
    $subCategory = $_POST['subCategory'];
    $imagePath = $_POST['imagePath'];
    $videoUrl = $_POST['videoUrl'];

    // SQL query to update exercise data
    $sql = "UPDATE exercise SET exerciseName = '$exerciseName', exerciseDescription = '$exerciseDescription', maincategory = '$mainCategory', category = '$category', subcategory = '$subCategory', img = '$imagePath', video = '$videoUrl' WHERE id = '$exerciseId'";

    // Execute query
    if ($con->query($sql) === TRUE) {
        header("Location: dashboard.php?msg=edit succesfully");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}


?>
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
                <img src="img/LOGO_1.PNG" alt="Logo">
            </div>
            <div class="name">
                <h1>PhysioFit</h1>
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
    <h2>Edit Exercise</h2>
    <form action="" method="post">
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exerciseName" value="<?php echo $exerciseData['exerciseName']; ?>" required>
        
        <label for="exerciseDescription">Exercise Description:</label>
        <textarea id="exerciseDescription" name="exerciseDescription" required><?php echo $exerciseData['exerciseDescription']; ?></textarea>
        
      

        
        <label for="mainCategory">Main Category:</label>
<select id="mainCategory" name="mainCategory" required>
    <?php 
    $query="SELECT DISTINCT maincategory FROM exercise";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["maincategory"] == $exerciseData['mainCategory']) {
            echo '<option value="'.$row["maincategory"].'" selected>'.$row["maincategory"].'</option>';
        } else {
            echo '<option value="'.$row["maincategory"].'">'.$row["maincategory"].'</option>';
        }
    }
    ?>
</select>
       
        
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <?php 
            $query="SELECT DISTINCT category FROM category";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["category"] == $exerciseData['category']) {
                    echo '<option value="'.$row["category"].'" selected>'.$row["category"].'</option>';
                } else {
                    echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
                }
            }
            ?>
        </select>
        
        <label for="subCategory">Sub Category:</label>
        <select id="subCategory" name="subCategory" required>
            <?php 
            $query="SELECT DISTINCT subcategory FROM subcategory";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                if ($row["subcategory"] == $exerciseData['subCategory']) {
                    echo '<option value="'.$row["subcategory"].'" selected>'.$row["subcategory"].'</option>';
                } else {
                    echo '<option value="'.$row["subcategory"].'">'.$row["subcategory"].'</option>';
                }
            }
            ?>
        </select>
        
        <label for="imagePath">Image Path:</label>
        <input type="text" id="imagePath" name="imagePath" value="<?php echo $exerciseData['img']; ?>" required>
        
        <label for="videoUrl">Video URL:</label>
        <input type="text" id="videoUrl" name="videoUrl" value="<?php echo $exerciseData['video']; ?>" required>
        
        <button type="submit">Update Exercise</button>
    </form>
        </main>
</body>
</html>