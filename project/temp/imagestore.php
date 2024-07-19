<?php
// Establish a connection to the database
$conn = pg_connect("host=localhost dbname=mydb user=myuser password=mypass");

// Get the image file and other information from the form
$image = $_FILES['image']['tmp_name'];
$description = $_POST['description'];

// Open the image file and read its contents
$image_contents = file_get_contents($image);

// Escape the image data to prevent SQL injection
$image_contents = pg_escape_bytea($image_contents);

// Insert the image and description into the database
$result = pg_query_params($conn, "INSERT INTO images (description, data) VALUES ($1, $2)", array($description, $image_contents));

if (!$result) {
    // Handle the error if the query fails
    echo "Error: " . pg_last_error($conn);
} else {
    // Output a success message if the query succeeds
    echo "Image uploaded successfully";
}

// Close the database connection
pg_close($conn);
?>
