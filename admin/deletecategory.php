<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['submit'])) {
    $category = $_POST['category'];

    $query = "DELETE FROM category WHERE category = '$category'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Category deleted Successfully");
    } else {
        echo "Error deleting category!";
    }
}
?>

<form action="" method="post">
    <label for="category">Category:</label>
    <input type="text" id="category" name="category"><br><br>
    <input type="submit" name="submit" value="Delete Category">
</form>