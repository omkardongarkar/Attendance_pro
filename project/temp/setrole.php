<?php
session_start();
//$var=$_POST['role'];
$_SESSION['role']=$_POST['role'];
header("Location: dash.php");
exit();
//echo $_SESSION['role'];
?>
