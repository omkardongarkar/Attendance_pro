<?php
// Include database connection
include 'con.php';

// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the uploaded file details
    $file_name = $_FILES['image']['name'];
    $file_temp = $_FILES['image']['tmp_name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];

    // Check if the file is an image
    $allowed_types = array('image/png', 'image/jpeg', 'image/gif');
    if (!in_array($file_type, $allowed_types)) {
        echo 'Error: File type not allowed.';
        exit;
    }

    // Define the upload directory and file path
    $upload_dir = 'uploads/';
    $file_path = $upload_dir . $file_name;

    // Move the uploaded file to the upload directory
    if (move_uploaded_file($file_temp, $file_path)) {
        // Insert the file details into the database
        $query = "INSERT INTO images (file_name, file_path, file_size, file_type) VALUES ('$file_name', '$file_path', '$file_size', '$file_type')";
        $result = pg_query($conn, $query);

        if ($result) {
            echo 'Image uploaded successfully.';
        } else {
            echo 'Error: Unable to upload image.';
        }
    } else {
        echo 'Error: Failed to move uploaded file.';
    }
}

// Fetch the images from the database
$query = "SELECT * FROM images ORDER BY id DESC";
$result = pg_query($conn, $query);

// Check if any images were found
if (pg_num_rows($result) > 0) {
    // Display the images in a table
    echo '<table>';
    echo '<tr><th>ID</th><th>Name</th><th>Image</th><th>Size</th><th>Type</th></tr>';
    while ($row = pg_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['file_name'].'</td>';
        echo '<td><img src="'.$row['file_path'].'" height="100" alt="Uploaded Image"></td>';
        echo '<td>'.$row['file_size'].'</td>';
        echo '<td>'.$row['file_type'].'</td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No images found.';
}

// Close the database connection
pg_close($conn);
?>

