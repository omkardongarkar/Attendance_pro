<!DOCTYPE html>
<html>
<head>
	<title>Attendance Report</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'side.php'; ?>
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
// establish database connection
$dbconn = pg_connect("host=localhost port=5432 dbname=attend user=amol password=123");

// check if form has been submitted
if(isset($_POST['submit'])) {
    // get form inputs
$department=$_POST['dep'];
$class = $_POST['class'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$srno=0;
$num_sundays=0;
    // fetch attendance data from database
    $result = pg_query_params($dbconn, "SELECT s.id, s.name, SUM(CASE WHEN a.status = 'P' THEN 1 ELSE 0 END) AS total_attendance FROM attendance AS a JOIN students AS s ON a.stud_id = s.id WHERE s.department_name = $1 AND s.class = $2 AND a.date BETWEEN $3 AND $4 GROUP BY s.id, s.name;", array($department,$class, $start_date, $end_date));
echo pg_last_error();
    // check if query was successful
    if($result) {
        // display attendance data to user
        echo "<br><br><h2>Attendance for Class $class $department from $start_date to $end_date</h2>";
        echo '<input type="text" id="search" placeholder="Search ...">';
        echo '<table id="table">';
        echo "<tr><th>sr. no.</th><th>Student Id</th><th>Name</th><th>Total Attendance</th><th>Percent Presentee</th></tr>";
        while($row = pg_fetch_assoc($result)) {
                $srno=$srno+1;
               /* while (strtotime($start_date) <= strtotime($end_date)) {
    			if (date('N', $current_date) == 7) { // 7 is Sunday
      			$num_sundays++;
    			}
    			$start_date = strtotime('+1 day', $current_date);
  			} //count sundays*/
                $diff = strtotime($end_date) - strtotime($start_date);
		$days = floor($diff / (60 * 60 * 24)); // Convert the difference to days
		$per=round(($row['total_attendance']/($days-$num_sundays+1))*100,1); //convert presentee to percentage
            echo "<tr><td>".$srno."</td><td>".$row['id']."</td><td>" . $row['name'] . "</td><td>" . $row['total_attendance'] . "</td><td ";
            if($per<75) { echo 'class="orange-bg"'; }
            echo ">".$per."%</td></tr>";
        }
        echo "</table>";
    } else {
        // display error message
        echo "Error fetching attendance data from database.";
    }
}

// close database connection
pg_close($dbconn);
?>
</div>
</body>
</html>