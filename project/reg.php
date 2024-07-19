<?php
include 'con.php';
session_start();
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
$file_name = $_FILES['image']['name'];
$file_temp = $_FILES['image']['tmp_name'];
$file_size = $_FILES['image']['size'];
$file_type = $_FILES['image']['type'];
	 // Check if the file is an image
    $allowed_types = array('image/png', 'image/jpeg', 'image/gif');
    if (!in_array($file_type, $allowed_types)) {
        echo 'Error: File type not allowed.';
        exit;
    }
// Define the upload directory and file path
    $upload_dir = 'uploads/';
    $file_path = $upload_dir . $file_name;

    // Move the uploaded file to the upload directory
    move_uploaded_file($file_temp, $file_path);
// Check if the connection was successful
if(!$conn) {
die("Connection failed: " . pg_last_error());
}

else {
         $result = pg_query_params($conn, "INSERT INTO students VALUES($1,$2,$3,$4,$5,$6,$7,$8,$9,$10,$11);", array($id,$name,$email,$pass,$user,$smobile,$pmobile,$dep,$class,$adate,$file_path));
	if(!$result)
	echo pg_last_error();
	else
	{
	$ $_SESSION['success'] ="Registration successfull ..."; 
	header('Location: registration.php');
	}
}
?>
