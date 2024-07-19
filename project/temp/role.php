<!DOCTYPE html>
<html>
<head>
	<title>Smart Attendance System - Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
</head>
<body background="bg1.avif">
	<form method="POST" action="setrole.php">
	 <label for="role">Choose a role:</label>
	<select name="role">
  	<option value="teacher">Teacher</option>
  	<option value="student">Student</option>
  	<option value="admin">Admin</option>
</select> 	
		<input type="submit" value="Login">
	</form>
</body>
</html>

