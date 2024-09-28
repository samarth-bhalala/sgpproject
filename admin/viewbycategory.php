<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$category = $_GET['category'];

$query = "SELECT * FROM exercise WHERE category = '$category'";
$result = mysqli_query($con, $query);

echo '<table border="1">';
echo '<tr><th>Exercise Name</th><th>Category</th><th>Subcategory</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr><td>'.$row["exerciseName"].'</td><td>'.$row["category"].'</td><td>'.$row["subcategory"].'</td></tr>';
}
echo '</table>';
?>