<?php
$id=$_POST['idcard'];
$name=$_POST['name'];
$email=$_POST['email'];
$user=$_POST['username'];
$smobile=$_POST['smobile'];
$pmobile=$_POST['pmobile'];
$dep=$_POST['department'];
$class=$_POST['class'];
$adate=$_POST['adate'];
$pass=$_POST['password'];
$role= $_SESSION['role'];
$conn = pg_connect("host=localhost port=5432 dbname=attend user=amol password=123");
// Check if the connection was successful
if(!$conn) {
die("Connection failed: " . pg_last_error());
}
else {
         $result = pg_query_params($conn, "INSERT INTO students VALUES($1,$2,$3,$4,$5,$6,$7,$8,$9,$10);", array($id,$name,$email,$pass,$user,$smobile,$pmobile,$dep,$class,$adate));
	if(!$result)
	echo pg_last_error();
	else
	echo "Registration successfull ..."; 
}
?>
