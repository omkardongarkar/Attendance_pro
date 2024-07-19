<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		nav {
			background-color: #333;
			position: fixed;
			top: 0;
			left: 0;
			right: 0;
			height: 50px;
			display: flex;
			align-items: center;
			justify-content: space-between;
			padding: 0 1rem;
			box-sizing: border-box;
		}

		nav ul {
			list-style: none;
			margin: 0;
			padding: 0;
			display: flex;
			align-items: center;
		}

		nav li {
			margin-left: 1rem;
		}

		nav a {
			color: #fff;
			text-decoration: none;
			padding: 0.5rem 1rem;
			border-radius: 5px;
			transition: background-color 0.2s ease;
		}

		nav a:hover {
			background-color: #555;
		}
	</style>
	<script>
	function pass(){
  const passwordField = document.getElementById("password");
  const showPasswordButton = document.getElementById("show-password-btn");

  showPasswordButton.addEventListener("mousedown", function() {
    passwordField.type = "text";
  });

  showPasswordButton.addEventListener("mouseup", function() {
    passwordField.type = "password";
  });
  }
</script>

</head>
<body background="bg1.avif">
	<nav>
		<ul>
			<li><a href="../">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="aboutus.php">Contact</a></li>
		</ul>
		<ul>
<!--			<li><a href="#">Login</a></li>
			<li><a href="#">Sign Up</a></li>
		</ul>-->
	</nav>
		<?php
		// Check if the cookies are set
		if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
			// If the cookies are set, redirect to the dashboard page
			if(strlen($_COOKIE["username"])&&strlen($_COOKIE["password"])>0){
			echo strlen($_COOKIE["username"]);
			header("Location: dash.php");
			exit();
		}
		}
	?>
	<div class="container">
		<div class="login-box">
			<h2>Login</h2>
	<form method="POST" action="login.php">
	
		<h1>Smart Attendance System - Login</h1>
		<?php if(isset($error_message)): ?>
			<div class="error"><?php echo $error_message; ?></div>
		<?php endif; ?>
		<p class="green">please enter Username and password provided by your institute</p><br>
		<div class="input-icons">
		<label for="username">Username</label>
		<i class="fa fa-user icon"></i>
		<input type="text" name="username" class="input-field"  id="username" required>
		</div>
		<div class="combined-button">
		<label for="password">Password</label>
		<input type="password" name="password" class="input-field" id="password" required>
		<label for="remember_me">Remember Me
		<input type="checkbox" name="remember_me" id="remember_me" value="1"></label>
		<input type="submit" value="Login">
	</form>
		
	</div>
	</div
<footer>All Copyrights Reserved @Amol Tribhuwan<footer>
</body>
</html>

