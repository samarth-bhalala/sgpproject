<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$id = $_POST['id'];
$exerciseName = $_POST['exerciseName'];
$category = $_POST['category'];
$subcategory = $_POST['subcategory'];

$query = "UPDATE exercise SET exerciseName = '$exerciseName', category = '$category', subcategory = '$subcategory' WHERE id = '$id'";
mysqli_query($con, $query);

header('Location: dashboard.php?msg=successfully%20edited');

?>