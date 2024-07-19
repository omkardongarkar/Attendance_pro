<?php
// Connect to the database
include 'con.php';
$date = date('Y-m-d');
$avdate = pg_query($conn, "SELECT date FROM attendance WHERE date='$date'");
$row = pg_fetch_assoc($avdate);

if (!$row) {
    // Get all student IDs
    $query = "SELECT id FROM students";
    $result = pg_query($conn, $query);
    $student_ids = pg_fetch_all_columns($result);
    
    // Set attendance as absent for each student
    foreach ($student_ids as $id) {
        $query = "INSERT INTO attendance (stud_id, date, status) VALUES ('$id', CURRENT_DATE, 'A')";
        pg_query($conn, $query);
    }
}

// Close the database connection
pg_close($conn);
?>

