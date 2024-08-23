<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
    session_start();
    extract($_POST);
    $ps=$_SESSION['nps'];
    $nm=$_SESSION['username'];
    if($_SESSION['cd']==$cd)
    {
        $hashed_password = password_hash($ps, PASSWORD_ARGON2I);
        $up_que="update signup SET pass='$hashed_password' WHERE username='$nm'";
        mysqli_query($con,$up_que);

        $_SESSION['pass']=$ps;
        header("location:profile.php");
    }
    else
    {
        header("location:chng_pass_verify.php?cd_unm_err=enter correct code");
    }
?>