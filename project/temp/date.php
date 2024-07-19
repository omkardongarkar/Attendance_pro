<?php
// Connect to the database
include 'con.php';

$avdate=pg_query_params($conn,"select date from attendance WHERE date=$1;",array(date('Y-m-d')));
echo $avdate['date'];
?>
