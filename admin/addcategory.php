<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['add_category'])) {
    $category = $_POST['category'];

    $query = "INSERT INTO categories (category) VALUES ('$category')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Category added successfully!";
    } else {
        echo "Error adding category!";
    }
}

?>

<form action="" method="post">
    <input type="text" name="category" placeholder="Enter category name">
    <input type="submit" name="add_category" value="Add Category">
</form>