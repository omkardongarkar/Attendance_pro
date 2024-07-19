

<!DOCTYPE html>
<html>
<head>
	<title>Smart Attendance System - Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<?php include 'side.php'; ?>
	<?php include 'con.php';?>
</head>
<body background="bg1.avif">
<?php session_start();?>
	<div class="container main">
		<?php  if($_COOKIE['role'] == 'teacher'):?>
			<p class="dashrole">Role:Teacher</p>
			<h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
			<p>Here are some statistics for your classes:</p>
			<ul>
				<li>Total classes: <?php echo $total_classes; ?></li>
				<li>Classes taken: <?php echo $classes_taken; ?></li>
				<li>Average attendance: <?php echo $average_attendance; ?>%</li>
			</ul>
		<?php elseif($_COOKIE['role'] == 'admin'): ?>
			<p class="dashrole">Role:Admin</p>
			<h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
			<p>Here are some statistics for the attendance system:</p>
			<ul>
				
				<li>Total students: <?php $result = pg_query($conn, "SELECT COUNT(*) FROM students"); $count = pg_fetch_result($result, 0, 0); echo $count; ?></li>
				<li>Total teachers: <?php $result = pg_query($conn, "SELECT COUNT(*) FROM teachers"); $count = pg_fetch_result($result, 0, 0); echo $count; ?></li>
				<li>Overall attendance: <?php
// Get the total number of days in the attendance period
$result = pg_query($conn, "SELECT COUNT(date) FROM attendance");
$total_days = pg_fetch_result($result, 0, 0);

// Get the total number of days attended
$result = pg_query($conn, "SELECT COUNT(*) FROM attendance WHERE status='P'");
$days_attended = pg_fetch_result($result, 0, 0);

// Calculate overall attendance percentage
$attendance_percentage = ($days_attended / $total_days) * 100;

echo "Overall attendance: " . round($attendance_percentage, 2) . "%";
?></li>
				<li>Total classes: <?php $result = pg_query($conn, "SELECT d_name, COUNT(DISTINCT class) AS num_classes FROM department GROUP BY d_name ORDER BY d_name");

// Loop through the result set and output the data
echo '<table id="table">';
echo "<tr><th>sr. no.</th><th>Department</th><th>No. Of Classes</th><tr>";
while ($row = pg_fetch_assoc($result)) {
$sr=$sr+1;
    echo "<tr><td>$sr</td><td>" . $row["d_name"] . "</td><td>" . $row["num_classes"] . "</td></tr>";
}
echo "</table>";
 ?></li>
			</ul>
		<?php elseif($_COOKIE['role'] == 'student'): ?>
			<p class="dashrole">Role:Student</p>
			<h1>Welcome, <?php echo $_SESSION['name']; ?>!</h1>
			<p>Here are some statistics for your attendance:</p>
			<ul>
				
				<li>Current attendance: <?php echo $current_attendance; ?>%</li>
				<li>Missed classes: <?php echo $missed_classes; ?></li>
				<li>Next class: <?php echo $next_class; ?></li>
			</ul>
		<?php endif; ?>
		<footer>All Copyrights Reserved @ Amol Tribhuwan<footer>
	</div>
	
</body>
</html>
