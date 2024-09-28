<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

// retrieve exercises for the selected subcategory
$subcategory = $_GET['subcategory'];
$query = "SELECT * FROM exercises WHERE subCategory = '$subcategory'";
$result = mysqli_query($con, $query);

$exercises = array();
while ($row = mysqli_fetch_assoc($result)) {
  $exercises[] = $row;
}

// close connection
mysqli_close($con);

// output JSON array
echo json_encode($exercises);
?>