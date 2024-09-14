<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
// Get exercise ID from URL
$exerciseId = $_GET['id'];

// SQL query to retrieve exercise data
$sql = "SELECT * FROM exercises WHERE id = '$exerciseId'";
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
    $gender = $_POST['gender'];
    $category = $_POST['category'];
    $subCategory = $_POST['subCategory'];
    $level = $_POST['level'];
    $imagePath = $_POST['imagePath'];
    $benefits = $_POST['benefits'];
    $videoUrl = $_POST['videoUrl'];

    // SQL query to update exercise data
    $sql = "UPDATE exercises SET exerciseName = '$exerciseName', exerciseDescription = '$exerciseDescription', gender = '$gender', category = '$category', subCategory = '$subCategory', level = '$level', imagePath = '$imagePath', benefits = '$benefits', video_url = '$videoUrl'WHERE id = '$exerciseId'";

    // Execute query
    if ($con->query($sql) === TRUE) {
        header("Locatin: dashboard.php");
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close connection
$con->close();
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
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="<?php echo $exerciseData['gender']; ?>"><?php echo $exerciseData['gender']; ?></option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Both">Both</option>
        </select>
        
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" value="<?php echo $exerciseData['category']; ?>" required>
        
        <label for="subCategory">Sub Category:</label>
        <input type="text" id="subCategory" name="subCategory" value="<?php echo $exerciseData['subCategory']; ?>" required>
        
        <label for="level">Level:</label>
        <input type="text" id="level" name="level" value="<?php echo $exerciseData['level']; ?>" required>
        
        <label for="imagePath">Image Path:</label>
        <input type="text" id="imagePath" name="imagePath" value="<?php echo $exerciseData['imagePath']; ?>" required>
        
        <label for="benefits">Benefits:</label>
        <textarea id="benefits" name="benefits" required><?php echo $exerciseData['benefits']; ?></textarea>
        
        <label for="videoUrl">Video URL:</label>
        <input type="text" id="videoUrl" name="videoUrl" value="<?php echo $exerciseData['video_url']; ?>" required>
        
        
        <button type="submit">Update Exercise</button>
    </form>
</body>
</html>