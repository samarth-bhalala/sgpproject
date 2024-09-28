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
    <form action="insert_excersise.php" method="post">
        <label for="exerciseName">Exercise Name:</label>
        <input type="text" id="exerciseName" name="exerciseName" required>
        
        <label for="exerciseDescription">Exercise Description:</label>
        <textarea id="exerciseDescription" name="exerciseDescription" required></textarea>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Both">Both</option>
        </select>
        
        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
        
        <label for="subCategory">Sub Category:</label>
        <input type="text" id="subCategory" name="subCategory" required>
        
        <label for="level">Level:</label>
        <input type="text" id="level" name="level" required>
        
        <label for="imagePath">Image Path:</label>
        <input type="text" id="imagePath" name="imagePath" required>
        
        <label for="benefits">Benefits:</label>
        <textarea id="benefits" name="benefits" required></textarea>
        
        <label for="videoUrl">Video URL:</label>
        <input type="text" id="videoUrl" name="videoUrl" required>
        
        <button type="submit">Add Exercise</button>
    </form>
</body>
</html>