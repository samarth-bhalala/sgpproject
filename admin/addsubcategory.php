<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['add_subcategory'])) {
    $subcategory = $_POST['subcategory'];
    $category = $_POST['category'];

    $query = "INSERT INTO subcategories (subcategory, category) VALUES ('$subcategory', '$category')";
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "Subcategory added successfully!";
    } else {
        echo "Error adding subcategory!";
    }
}

?>

<form action="" method="post">
    <input type="text" name="subcategory" placeholder="Enter subcategory name">
    <select name="category">
        <?php 
        $query="SELECT DISTINCT category FROM exercises";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="'.$row["category"].'">'.$row["category"].'</option>';
        }
        ?>
    </select>
    <input type="submit" name="add_subcategory" value="Add Subcategory">
</form>