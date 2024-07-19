<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'side.php'; ?>
</head>
<body background="bg1.avif">
<div class="main">
    <h1>View Students</h1>
    <form method="post" action="students.php">
<label for="department">Select Department:</label>
<select name="dep" id="department">
  <option value="">-- Select Department --</option>
  <option value="IT">Information Technology</option>
  <option value="computer science">Computer Science</option>
  <option value="ECE">Electronics and Communication</option>
  <option value="ME">Mechanical Engineering</option>
</select><br><br>
        <label for="class">Select Class:</label>
<select name="class" id="class">
  <option value="">-- Select Class --</option>
  <option value="fy">First year</option>
  <option value="sy">Second year</option>
  <option value="ty">Third year</option>
</select><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
    </div>
</body>
</html>
