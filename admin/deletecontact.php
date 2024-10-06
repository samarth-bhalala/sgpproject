<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM contactus WHERE id = '$id'";
    mysqli_query($con, $query);

    header('Location: viewcontact.php');
} else {
    header('Location: viewcontact.php');
}
?>