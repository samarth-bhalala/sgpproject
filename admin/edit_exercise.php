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

<!DOCTYPE html>
<html>
<head>
    <title>Edit Exercise</title>
    <style>
        label {
            display: block;
            margin-bottom: 10px;
        }
        
        input, textarea, select {
            width: 100%;
            height: 30px;
            margin-bottom: 20px;
            padding: 10px;
            box-sizing: border-box;
        }
        
        textarea {
            height: 100px;
        }
        
        button[type="submit"] {
            width: 100%;
            height: 40px;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        button[type="submit"]:hover {
            background-color: #3e8e41;
        }
    </style>
</head>
<body>
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
</body>
</html>