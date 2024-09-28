<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['add_subcategory'])) {
    $subcategory = $_POST['subcategory'];
    $category = $_POST['category'];
    $img_path = $_POST['img_path'];

    $query = "INSERT INTO subcategory (subcategory, category, img) VALUES ('$subcategory', '$category', '$img_path')";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: dashboard.php?msg=Subcategory added Successfully");
    } else {
        echo "Error adding subcategory!";
    }
}
?>

<form action="" method="post">
    <label for="subcategory">Subcategory:</label>
    <input type="text" name="subcategory" placeholder="Enter subcategory name"><br><br>
    <label for="category">Category:</label>
    <select name="category">
        <?php 
        $query="SELECT DISTINCT category FROM category";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
        }
        ?>
    </select>
    <br><br>
    <label for="img_path">Image Path:</label>
    <input type="text" name="img_path" placeholder="Enter image path"><br><br>
    <input type="submit" name="add_subcategory" value="Add Subcategory">
</form>