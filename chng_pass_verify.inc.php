<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
    session_start();
    extract($_POST);
    $ps=$_SESSION['nps'];
    $nm=$_SESSION['username'];
    if($_SESSION['cd']==$cd)
    {
        
        $up_que="update signup SET pass='$ps' WHERE username='$nm'";
        mysqli_query($conn,$up_que);
        $_SESSION['pass']=$ps;
        header("location:view_acc.php");
    }
    else
    {
        header("location:chng_pass_verify.php?cd_unm_err=enter correct code");
    }
?>