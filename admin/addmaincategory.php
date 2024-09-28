<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['submit'])) {
    $maincategory = $_POST['maincategory'];
    $img_path = $_POST['img_path'];

    $query = "INSERT INTO maincategory (maincategory, img) VALUES ('$maincategory', '$img_path')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Main Category added Succesfully");
    } else {
        echo "Error adding main category!";
    }
}
?>

<form action="" method="post">
    <label for="maincategory">Main Category:</label>
    <input type="text" id="maincategory" name="maincategory"><br><br>
    <label for="img_path">Image Path:</label>
    <input type="text" id="img_path" name="img_path"><br><br>
    <input type="submit" name="submit" value="Add Main Category">
</form>