<?php
// start the session
session_start();

// unset all session variables
$_SESSION = array();

// delete the session cookie
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000);
}

// destroy the session
session_destroy();

// delete any cookies associated with the user
setcookie('username', $_COOKIE['username'], time()-3600); // set cookie for username that expires in 30 days
setcookie('password', $_COOKIE['password'], time()-3600); // set cookie for password that expires in 30 days

// redirect to the login page
header('Location: signin.php');
exit;
?>

