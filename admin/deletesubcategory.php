<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['submit'])) {
    $subcategory = $_POST['subcategory'];

    $query = "DELETE FROM subcategory WHERE subcategory = '$subcategory'";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Subcategory deleted successfully");
    } else {
        echo "Error deleting subcategory!";
    }
}
?>

<form action="" method="post">
    <label for="subcategory">Subcategory:</label>
    <input type="text" id="subcategory" name="subcategory"><br><br>
    <input type="submit" name="submit" value="Delete Subcategory">
</form>