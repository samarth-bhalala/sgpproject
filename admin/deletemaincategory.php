<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_POST['submit'])) {
    $maincategory = $_POST['maincategory'];

    $query = "DELETE FROM maincategory WHERE maincategory = '$maincategory'";
    $result = mysqli_query($con, $query);

    if ($result>0) {
        header("Location: dashboard.php?msg=Main category deleted Successfully");
    } else {
        echo "Error deleting main category!";
    }
}
?>

<form action="" method="post">
    
    <label for="mainCategory">Main Category:</label>
    <select id="mainCategory" name="mainCategory" required>
    <?php 
    $query="SELECT DISTINCT maincategory FROM maincategory";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["maincategory"] == $exerciseData['mainCategory']) {
            echo '<option value="'.$row["maincategory"].'" selected>'.$row["maincategory"].'</option>';
        } else {
            echo '<option value="'.$row["maincategory"].'">'.$row["maincategory"].'</option>';
        }
    }
    ?>
</select>
    <input type="submit" name="submit" value="Delete Main Category">
</form>