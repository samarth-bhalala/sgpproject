<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
session_start();
extract($_POST);
$tnm=$_SESSION['new_name'];
$tem=$_SESSION['new_mail'];
$nm=$_SESSION['username'];

if($chng_pass==null or $chng_pass=="")
{
    header("Location:cnp.php?unfilpss=Please enter valid password");
    exit;
}

// Check if username or email already exists
$username_check = "SELECT * FROM signup WHERE username='$tnm' AND username != '$nm'";
$email_check = "SELECT * FROM signup WHERE email='$tem' AND email != '".$_SESSION['email']."'";

$username_result = mysqli_query($con, $username_check);
$email_result = mysqli_query($con, $email_check);

if(mysqli_num_rows($username_result) > 0)
{
    header("Location:cnp.php?unameexist=Username already exists");
    exit;
}
elseif(mysqli_num_rows($email_result) > 0)
{
    header("Location:cnp.php?emailexist=Email already exists");
    exit;
}

elseif($chng_pass==$_SESSION['pass'])
{  
    $up_que="update signup SET username='$tnm',email='$tem' WHERE username='$nm'";
    mysqli_query($con,$up_que);
    $_SESSION['username']=$_SESSION['new_name'];
    $_SESSION['email']=$_SESSION['new_mail'];
    header("location:profile.php");
}
else{
    header("location:cnp.php?wrngpass=Enter correct password");
}
?>