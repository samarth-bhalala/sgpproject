<?php

include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
session_start();

// Exercise data
$exerciseName = $_POST['exerciseName'];
$exerciseDescription = $_POST['exerciseDescription'];
$gender = $_POST['gender'];
$category = $_POST['category'];
$subCategory = $_POST['subCategory'];
$level = $_POST['level'];
$imagePath = $_POST['imagePath'];
$benefits = $_POST['benefits'];
$videoUrl = $_POST['videoUrl'];

// SQL query
$sql = "INSERT INTO exercises (exerciseName, exerciseDescription, gender, category, subCategory, level, imagePath, benefits, video_url) 
        VALUES ('$exerciseName', '$exerciseDescription', '$gender', '$category', '$subCategory', '$level', '$imagePath', '$benefits', '$videoUrl')";

// Execute query
if ($conn->query($sql) === TRUE) {
    echo "New exercise added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>