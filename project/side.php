<!DOCTYPE html>
<html>
<head>
	<title>Sidebar Example</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		.sidebar {
			height: 100%;
			width: 210px;
			position: fixed;
			top: 0;
			left: 0;
			background-color: #333;
			overflow-x: hidden;
			padding-top: 20px;
		}

		.sidebar a {
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 20px;
			color: #f1f1f1;
			display: block;
		}

		.sidebar a:hover {
			color: #fff;
			background-color: #555;
			border-radius: 5px;
		}

		.sidebar .active {
			background-color: #4CAF50;
			color: white;
			border-radius: 5px;
		}

		.sidebar .icon {
			margin-right: 10px;
		}

		.main {
			margin-left: 200px;
			padding: 0 20px;
		}
		
		.pname{
			color:#cccccc;
			cursor:default;
		}
		
		.logout {
			position: absolute;
			bottom: 4%;
			left: 0;
			width: 100%;
			padding: 6px 8px 6px 16px;
			text-decoration: none;
			font-size: 20px;
			color: #f1f1f1;
			display: block;
			background-color: #333;
		}
		
	</style>
</head>
<body>
	<div class="sidebar">
		<h3 class="pname">Smart Attendance System</h2>
		<a href="dash.php" <?php if(basename($_SERVER['PHP_SELF']) == 'dash.php') { echo 'class="active"'; } ?>><i class="fa fa-home icon"></i>Home</a>
		<a href="attendance.php" <?php if(basename($_SERVER['PHP_SELF']) == 'att.php'||basename($_SERVER['PHP_SELF']) == 'attendance.php') { echo 'class="active"'; } ?>><i class="fa fa-calendar icon"></i>Attendance</a>
		<a href="views.php" <?php if(basename($_SERVER['PHP_SELF']) == 'students.php'||basename($_SERVER['PHP_SELF']) == 'views.php') { echo 'class="active"'; } ?>><i class="fa fa-users icon"></i>Students</a>
		<a href="registration.php" <?php if(basename($_SERVER['PHP_SELF']) == 'registration.php') { echo 'class="active"'; } ?>><i class="fa fa-plus-square icon"></i>Add New Student</a>
		<a href="teachers.php" <?php if(basename($_SERVER['PHP_SELF']) == 'teachers.php') { echo 'class="active"'; } ?>><i class="fa fa-user icon"></i>Teachers</a>
		<a href="logout.php" class="logout"><i class="fa fa-sign-out icon"></i>Sign Out</a>
	</div>
</body>
</html>

