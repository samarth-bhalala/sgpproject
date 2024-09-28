<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$maincategory = $_GET['maincategory'];

$query = "SELECT * FROM exercise WHERE maincategory = '$maincategory'";
$result = mysqli_query($con, $query);

echo '<table border="1">';
echo '<tr><th>Exercise Name</th><th>Category</th><th>Subcategory</th><th>Main Category</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr><td>'.$row["exerciseName"].'</td><td>'.$row["category"].'</td><td>'.$row["subcategory"].'</td><td>'.$row["maincategory"].'</td></tr>';
}
echo '</table>';
?>