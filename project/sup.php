<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'side.php'; ?>
	<?php include 'con.php'; ?>
</head>
<body background="bg1.avif">
<div class="main">
    <h1>View Students</h1>
    <form method="post" action="supdate.php">
	<input type="text" placeholder="Student ID Card Number ..." name="icard">
        <input type="submit" name="submit" value="Find & Update">
    </form>
    </div>
</body>
</html>
