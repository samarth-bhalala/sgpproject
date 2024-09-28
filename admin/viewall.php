<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

$query = "SELECT * FROM exercise";
$result = mysqli_query($con, $query);

echo '<table border="1">';
echo '<tr>
        <th>Exercise Name</th>
        <th>Exercise Description</th>
        <th>Main Category</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Action</th>
      </tr>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
            <td>'.$row["exerciseName"].'</td>
            <td>'.$row["exerciseDescription"].'</td>
            <td>'.$row["maincategory"].'</td>
            <td>'.$row["category"].'</td>
            <td>'.$row["subcategory"].'</td>
            <td><a href="edit_exercise.php?id='.$row["id"].'">Edit</a></td>
          </tr>';
}
echo '</table>';
?>