<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$subcategory = $_GET['subcategory'];

$query = "SELECT * FROM exercises WHERE subcategory = '$subcategory'";
$result = mysqli_query($con, $query);

echo '<table border="1">';
echo '<tr><th>Exercise Name</th><th>Category</th><th>Subcategory</th></tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr><td>'.$row["exercise_name"].'</td><td>'.$row["category"].'</td><td>'.$row["subcategory"].'</td></tr>';
}
echo '</table>';
?>