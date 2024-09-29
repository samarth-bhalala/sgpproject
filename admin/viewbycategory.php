<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$category = $_GET['category'];

$query = "SELECT * FROM exercise WHERE category = '$category'";
$result = mysqli_query($con, $query);

echo '<table border="1">';
echo '<tr><th>Exercise Name</th><th>Category</th><th>Subcategory</th><th>Action</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<td>'.$row["exerciseName"].'</td>';
    echo '<td>'.$row["category"].'</td>';
    echo '<td>'.$row["subcategory"].'</td>';
    echo '<td><a href="edit.php?id='.$row["id"].'">Edit</a></td>';
    echo '</tr>';
}
echo '</table>';
?>