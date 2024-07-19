<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title>Department Registration</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<?php include 'side.php'; ?>
</head>
<body background="bg1.avif">
		<?php
		// Check if the cookies are set
		if(isset($_COOKIE["username"]) && isset($_COOKIE["password"])){
			// If the cookies are set, redirect to the dashboard page
			if(strlen($_COOKIE["username"])&&strlen($_COOKIE["password"])>0){
			echo strlen($_COOKIE["username"]);
			header("Location: dash.php");
			exit();
		}
		}
	?>

	<div class="container main">
		<div class="login-box">
	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
		<h1>New Department Registration</h1>
		<?php if(isset($error_message)): ?>
		<div class="error"><?php echo $error_message; ?></div>
		<?php endif; ?>
			<?php if(isset($_session['success'])&&$_session['success']!='')
			echo $_session['success'];
			?>
		<br><br>
		<label for="d_name">Name Of The Department</label>
		<input type="text" name="d_name" id="name" autocomplete="off" required>
		<label for="email">E-mail</label>
		<input type="email" name="email" id="email" autocomplete="off">
        
			<div class="flex">
			<!-- <label for="no_of_class">Select Classes in department<label> -->
        <select name="department" id="department" required>
            <option value="">--Number Of Classes--</option>
            <option value="1">one</option>
            <option value="2">two</option>
            <option value="3">three</option>
            <option value="4">four</option>
            <option value="5">five</option>
            <option value="6">six</option>
        </select>
		<!-- <label for="stream">Select Stream</label> -->
		<select name="stream" id="stream" required>
            <option value="">--Streams--</option>
            <option value="science">Science</option>
            <option value="commerce">Commerce</option>
            <option value="Arts">Art's</option>
			<option value="graduation">Graduation</option>
			<option value="post_graduation">Post Graduation</option>
			<option value="engineering">Engineering</option>
            <option value="deploma">Deploma</option>
            <option value="iti">ITI</option>		
        </select>
			</div>
		<p id="department-message"></p>
		<p id="error-message"></p>
		<div class="flex">
		<br><br>	
		<input type="submit" value="Register">&nbsp
		<input type="reset" value="Reset All Fields" >
	</form>
		</div>
		<footer>All Copyrights Reserved @Amol Tribhuwan<footer>
	</div>

</body>
</html>
<?php
// Include database connection
include 'con.php';
// Check if the form was submitted
if (isset($_POST['submit'])) {

$dep_name=$_POST['d_name'];
$email=$_POST['email'];
$no_of_class=$_POST['no_of_class'];
$stream=$_POST['stram'];
}
// Close the database connection
pg_close($conn);
?>