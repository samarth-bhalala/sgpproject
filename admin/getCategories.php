<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$mainCategory = $_POST['mainCategory'];

$query = "SELECT DISTINCT category FROM category WHERE maincategory = '$mainCategory'";
$result = mysqli_query($con, $query);

$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
?>