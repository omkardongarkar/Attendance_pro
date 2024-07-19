<!DOCTYPE html>
<html>
<head>
	<title>Attendance Report</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'side.php'; ?>
	<?php include 'con.php'; ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#search").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("table tr").filter(function() {
					$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
		});
	</script>
</head>
<body background="bg1.avif">
<div class="main">	
<?php
$dep=$_POST['dep'];
$class=$_POST['class'];
if(!$conn) {
die("Connection failed: " . pg_last_error());
}
else {
	$result = pg_query_params($conn,"select * from students WHERE class=$1 AND department_name=$2;",array($class,$dep));
	echo pg_last_error();
	 if($result) {
        // display student data to user
        echo "<br><br><h2>Students for Class $class $dep</h2>";
        echo '<input type="text" id="search" placeholder="Search...">';
        echo '<table id="table">';
        echo "<tr><th>sr. no.</th><th>Student Id</th><th>Name</th><th>E-mail</th><th>Username</th><th>Student Phone Number</th><th>Parent Phone Number</th><th>Department</th><th>Class</th><th>Admission Date</th></tr>";
   while($row = pg_fetch_assoc($result)) {
                $srno=$srno+1;
                echo "<tr><td>".$srno."</td><td>".$row['id']."</td><td>" . $row['name'] . "</td><td>" . $row['email'] . "</td><td>".$row['username']."</td><td>".$row['phone']."</td><td>".$row['p_phone']."</td><td>".$row['department_name']."</td><td>".$row['class']."</td><td>".$row['admission_date']."</td></tr> ";
    }
     echo "</table>";
}
     else {
        // display error message
        echo "Error fetching attendance data from database.";
    }
}
?>
<footer>All Copyrights Reserved @Amol Tribhuwan<footer>
</div>
</body>
</html>
