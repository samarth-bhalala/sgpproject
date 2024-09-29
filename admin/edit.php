<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$id = $_GET['id'];

$query = "SELECT * FROM exercise WHERE id = '$id'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);

echo '<form action="update.php" method="post">';
echo '<input type="hidden" name="id" value="'.$row["id"].'">';
echo '<label>Exercise Name:</label><br>';
echo '<input type="text" name="exerciseName" value="'.$row["exerciseName"].'"><br>';
echo '<label>Category:</label><br>';
echo '<input type="text" name="category" value="'.$row["category"].'"><br>';
echo '<label>Subcategory:</label><br>';
echo '<input type="text" name="subcategory" value="'.$row["subcategory"].'"><br>';
echo '<input type="submit" value="Update">';
echo '</form>';
?>