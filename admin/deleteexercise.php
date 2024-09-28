<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['submit'])) {
    $exercise_id = $_POST['exercise_id'];

    $query = "DELETE FROM exercises WHERE exercise_id = '$exercise_id'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=exercise deleted Successfully");
    } else {
        echo "Error deleting exercise!";
    }
}
?>

<form action="" method="post">
    <label for="exercise_id">Exercise ID:</label>
    <input type="text" id="exercise_id" name="exercise_id"><br><br>
    <input type="submit" name="submit" value="Delete Exercise">
</form>