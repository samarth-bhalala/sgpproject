<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM exercise WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        header('Location: viewall.php'); // redirect back to the login/signup page
        exit; // stop executing the script
    } else {
        header('Location: login_signup.php?error=delete_failed'); // redirect back to the login/signup page with an error message
        exit; // stop executing the script
    }
}
?>