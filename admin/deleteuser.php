<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM signup WHERE id = '$id'";
    mysqli_query($con, $query);

    header('Location: viewuser.php');
} else {
    header('Location: viewuser.php');
}
?>