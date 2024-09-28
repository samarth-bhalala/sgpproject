<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['add_category'])) {
    $new_category = $_POST['new_category'];
    $main_category = $_POST['main_category'];
    $img_path = $_POST['img_path'];

    $query = "INSERT INTO category (category, maincategory, img) VALUES ('$new_category', '$main_category', '$img_path')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Category added Successfully");
    } else {
        echo "Error adding category!";
    }
}
?>

<form action="" method="post">
    <label for="new_category">New Category:</label>
    <input type="text" name="new_category" placeholder="Enter new category name"><br><br>
    <label for="category">Category:</label>
    <select name="main_category">
    <?php 
    $query="SELECT DISTINCT maincategory FROM maincategory";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$row["maincategory"].'">'.$row["maincategory"].'</option>';
    }
    ?>
</select>   
    <br><br>
    <label for="img_path">Image Path:</label>
    <input type="text" name="img_path" placeholder="Enter image path"><br><br>
    <input type="submit" name="add_category" value="Add category">
</form>