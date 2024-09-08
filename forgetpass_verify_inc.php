<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/sgpproject/sgpproject/conn.php');
    session_start();
    extract($_POST);
    
    $nps = $_POST['nps'];
    $cnps = $_POST['cnps'];
    if($nps==null or $nps=="" or $cnps==null or $cnps=="" or $nps!=$cnps)
    {
        header("Location:forgetpass_verify.php?msg=PLEASE ENTER PASSWORD And CONFIRM PASSWORD.");
    }
else{

    $ps=$_SESSION['nps'];
    $nm=$_SESSION['email'];
    if($_SESSION['cd']==$code)
    {
        $hashed_password = password_hash($ps, PASSWORD_ARGON2I);
        $up_que="update signup SET pass='$hashed_password' WHERE email='$nm'";
        mysqli_query($con,$up_que);
        $_SESSION['pass']=$ps;
        
        header("location:profile.php");
    }
    else
    {
        header("location:forgetpass_verify.php?msg=enter correct code");
    }
}
?>