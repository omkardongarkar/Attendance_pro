<?php
$dbconn = pg_connect("host=localhost port=5432 dbname=attend user=amol password=123");
if (!$dbconn) {
    die("Error connecting to the database");
}

$result = pg_query($dbconn, "SELECT img FROM students WHERE id ='20FCS033'");
if (!$result) {
    die("Error fetching image from the database");
}

$row = pg_fetch_assoc($result);
$image_data = $row['img'];
$image_type = $row['image_type'];

header("Content-type: png");
echo $image_data;
?>

