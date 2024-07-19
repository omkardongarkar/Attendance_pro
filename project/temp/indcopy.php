<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
</head>
<body background="bg1.avif">
	<nav>
		<ul>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Contact</a></li>
		</ul>
		<ul>
<!--			<li><a href="#">Login</a></li>
			<li><a href="#">Sign Up</a></li>
		</ul>-->
	</nav>
<?if(isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
	header('Location: login.php');
	exit();
}?>
	<div class="container">
		<div class="login-box">
			<h2>Login</h2>
	<form method="POST" action="login.php">
		<h1>Smart Attendance System - Login</h1>
		<?php if(isset($error_message)): ?>
			<div class="error"><?php echo $error_message; ?></div>
		<?php endif; ?>
		<p class="green">please enter Username and password provided by your institute</p><br>
		<label for="username">Username</label>
		<input type="text" name="username" id="username" required>
		<label for="password">Password</label>
		<input type="password" name="password" id="password" required>
		<label for="remember_me">Remember Me
		<input type="checkbox" name="remember_me" id="remember_me" value="1"></label>
		<input type="submit" value="Login">
	</form>
		</div>
	</div>
<footer>All Copyrights Reserved @Amol Tribhuwan<footer>
</body>
</html>

