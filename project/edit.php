<?php
session_start();

// Connect to the PostgreSQL database
$conn = pg_connect("host=localhost port=5432 dbname=attend user=amol password=123");

// Retrieve user details from the database
$user_id =$_COOKIE['username'];
echo $tablename=$_SESSION['table'];
$query = "SELECT * FROM $table_name WHERE username=$user_id";
//$query = "SELECT * FROM students WHERE username='".$user_id."'";
$result = pg_query($conn, $query);
$user = pg_fetch_assoc($result);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  // Update user details in the database
  $query = "UPDATE '" . $tablename . "' SET name = '" . $name . "', email = '".$email."', phone = '".$phone."',password='".$pass."' WHERE id ='".$user_id."'";
  pg_query($conn, $query);

  // Update user details in the session
  $_SESSION['name'] = $name;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;

  // Redirect to the profile page
  header('Location: profile.php');
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>
</head>
<body>
  <h1>Edit Profile</h1>

  <form method="post">
    <label>Name:</label>
    <input type="text" name="name" value="<?php echo $user['name']; ?>"><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $user['email']; ?>"><br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?php echo $user['phone']; ?>"><br><br>
    
    <label>Password:</label>
    <input type="password" name="password" value="password"><br><br>

    <input type="submit" value="Save Changes">
  </form>
</body>
</html>

