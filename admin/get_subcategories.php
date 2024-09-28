<?php
// connect to your database
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
// retrieve unique subcategories
$query = "SELECT DISTINCT subCategory FROM exercises";
$result = mysqli_query($con, $query);

$subcategories = array();
while ($row = mysqli_fetch_assoc($result)) {
  $subcategories[] = $row['subCategory'];
}

// close connection
mysqli_close($con);

// output JSON array
echo json_encode($subcategories);
?>