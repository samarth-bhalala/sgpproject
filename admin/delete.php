<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM exercise WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        header('Location: viewbycategory.php?category='.$_GET['category']); // redirect back to the exercises page
        exit; // stop executing the script
    } else {
        header('Location: viewbycategory.php?category='.$_GET['category'].'&error=delete_failed'); // redirect back to the exercises page with an error message
        exit; // stop executing the script
    }
}
?>