<?php
session_start();
$_SESSION['stat']=0;
session_destroy();
header("Location:index.php")
?>