<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Exercise</title>
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
    <h2>Add Exercise</h2>
    <form action="insertexercise.php" method="post">
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exerciseName" required>
        
        <label for="exerciseDescription">Exercise Description:</label>
        <textarea id="exerciseDescription" name="exerciseDescription" required></textarea>
        
        
        <label for="mainCategory">Main Category: </label>
<select id="mainCategory" name="mainCategory" required>
<?php 
    $query="SELECT DISTINCT maincategory FROM maincategory";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["maincategory"].'">'.$row["maincategory"].'</option>';
    }
    ?>
</select>
        
        <label for="category">Category:</label>
        <select id="category" name="category" required>
            <?php 
            $query="SELECT DISTINCT category FROM category";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
            }
            ?>
        </select>
        
        <label for="subCategory">Sub Category:</label>
        <select id="subCategory" name="subCategory" required>
            <?php 
            $query="SELECT DISTINCT subcategory FROM subcategory";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="'.$row["subcategory"].'">'.$row["subcategory"].'</option>';
            }
            ?>
        </select>
        
        
        
        <label for="imagePath">Image Path:</label>
        <input type="text" id="imagePath" name="imagePath" required>
        
       
        
        <label for="videoUrl">Video URL:</label>
        <input type="text" id="videoUrl" name="videoUrl" required>
        
        <button type="submit">Add Exercise</button>
    </form>
</body>
</html>