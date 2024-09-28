<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form data
  $exerciseName = $_POST["exerciseName"];
  $exerciseDescription = $_POST["exerciseDescription"];
  $mainCategory = $_POST["mainCategory"];
  $category = $_POST["category"];
  $subCategory = $_POST["subCategory"];
  $imagePath = $_POST["imagePath"];
  $videoUrl = $_POST["videoUrl"];

  // Insert the data into the database
  $query = "INSERT INTO exercise (exerciseName, exerciseDescription, maincategory, category, subcategory, img, video)
            VALUES ('$exerciseName', '$exerciseDescription', '$mainCategory', '$category', '$subCategory', '$imagePath', '$videoUrl')";

  if (mysqli_query($con, $query)) {
    header("Location: dashboard.php?msg=exercise  added Successfully");
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
  }
}

// Close the database connection
mysqli_close($con);
?>