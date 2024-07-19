<?php
include 'con.php';
session_start();
//check for remember me
if(isset($_POST['remember_me']) &&$_POST['remember_me'] == '1'){
	setcookie('username', $_POST['username'], time()+86400 * 30); // set cookie for username that expires in 30 days
	setcookie('password', $_POST['password'], time()+86400 * 30); // set cookie for password that expires in 30 days
}
if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
	$user = $_COOKIE['username'];
	$pass = $_COOKIE['password'];
}
else{
$user=$_POST['username'];
$pass=$_POST['password'];
}
$role= $_SESSION['role'];
// Check if the connection was successful
if(!$conn) {
die("Connection failed: " . pg_last_error());
}
else {
        $query = "SELECT * FROM teachers WHERE username='" . $user . "' AND password='" . $pass . "'";
        $result = pg_query($conn, $query);

        if(pg_num_rows($result) > 0){
            // User authenticated
            $row = pg_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = 'teacher';
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password']=$_POST['password'];
            setcookie("role","teacher",time()+86400*30);
            header('Location: dash.php');
            exit();
        } 
        else {
            $query = "SELECT * FROM students WHERE username='" . $user . "' AND password='" . $pass . "'";
		$result = pg_query($conn, $query);

        if(pg_num_rows($result) > 0){
            // User authenticated
            $row = pg_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = 'student';
            setcookie("role","student",time()+86400*30);
            header('Location: dash.php');
            exit();
        }
         else{
            $query = "SELECT * FROM department_heads WHERE username='" . $user . "' AND password='" . $pass . "'";
		$result = pg_query($conn, $query);

        if(pg_num_rows($result) > 0){
            // User authenticated
            $row = pg_fetch_assoc($result);
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['role'] = 'admin';
            setcookie("role","admin",time()+86400*30);;
            header('Location: dash.php');
            exit();
        } else {
            // Incorrect username or password
            echo "Incorrect username or password!";
        }
        }
        }
    }
?>
