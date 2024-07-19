<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<title> New Registration</title>
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
	<form method="POST" action="reg1.php" enctype="multipart/form-data">
		<h1>Student Registration</h1>
		<?php if(isset($error_message)): ?>
		<div class="error"><?php echo $error_message; ?></div>
		<?php endif; ?>
			<?php if(isset($_session['success'])&&$_session['success']!='')
			echo $_session['success'];
			?>
		<p class="green">Note: please enter unique Username</p><br>
		<label for="idcard">Student Id Card No.</label>
		<input type="text" name="idcard" id="idcard" autocomplete="off" required>
		<label for="file">Select image to upload:</label>
		<input type="file" name="file" id="file">
		<div id="circular-image">
  		<img src="uploads/file" alt="User Photo" id="profileImagePreview">
		  <script>
    const inputElement = document.getElementById("file");
    const previewElement = document.getElementById("profileImagePreview");

    inputElement.addEventListener("change", function() {
        const file = inputElement.files[0];
        const reader = new FileReader();

        reader.onload = function(e) {
            previewElement.src = e.target.result;
        };

        reader.readAsDataURL(file);
    });
</script>
		</div>
		<br><br>
		<label for="name">name</label>
		<input type="text" name="name" id="name" autocomplete="off" required>
		<label for="email">E-mail</label>
		<input type="email" name="email" id="email" autocomplete="off" required>
		<label for="username">Unique Username</label>
		<input type="text" name="username" id="username" autocomplete="off" required>
		<p id="success-message"></p>
		<p id="error-message"></p>
		<label for="smobile">Student Mobile Number</label>
		<input type="text" name="smobile" id="smobile" autocomplete="off" required>
		<label for="pmobile">Parent Mobile Number</label>
		<input type="text" name="pmobile" id="pmobile" autocomplete="off" required>
		<div class="flex">
		<div>
		<label for="department">Select Department:</label>
		<select name="department" id="department" required>
		<option value="">-- Select Department --</option>
  		<option value="IT">Information Technology</option>
  		<option value="computer science">Computer Science</option>
  		<option value="bsc">Batchler Of Science</option>
  		<option value="commerce">Commerce</option>
		</select></div>&nbsp&nbsp&nbsp<div style="float: right;justify-content: space-between;"><label for="department">Select Class:</label>
		<select name="class" id="department" class="" required>
		<option value="">-- Select Class --</option>
  		<option value="fy">First Year</option>
  		<option value="sy">Second Year</option>
  		<option value="ty">Third Year</option>
		</select></div></div><br><br>
		<label for="adate">Admission Date</label>
		<input type="date" name="adate" id="adate" autocomplete="off" required>
		<label for="password">Password<button type="button" style="float: right;" class="show_password" id="show-password-btn">&#128065;</button></label>
		<input type="password" name="password" id="password" required>
		<label for="cpassword">Confirm Password</label>
		<span id="password_error" class="error"></span><br>
		<input type="password" name="cpassword" id="confirm_password" required>		
		<input type="submit" value="Register">
		<input type="reset" value="Reset All Fields" >
		<script>
		// Get the password and confirm password input fields
		var password = document.getElementById("password");
		var confirm_password = document.getElementById("confirm_password");

		// Display an error message if the passwords do not match
		function validatePassword() {
			if (password.value != confirm_password.value) {
				confirm_password.setCustomValidity("Passwords not match");
				document.getElementById("password_error").innerHTML = "Passwords not match";
			} else {
				confirm_password.setCustomValidity("");
				document.getElementById("password_error").innerHTML = "";
			}
		}

		// Add event listeners to the input fields
		password.addEventListener("input", validatePassword);
		confirm_password.addEventListener("input", validatePassword);
	</script>
	<script>
  const passwordField = document.getElementById("password");
  const showPasswordButton = document.getElementById("show-password-btn");

  showPasswordButton.addEventListener("mousedown", function() {
    passwordField.type = "text";
  });

  showPasswordButton.addEventListener("mouseup", function() {
    passwordField.type = "password";
  });
</script>
	<script>
		function validateMobileNumber() {
			// Get the input field value
			var mobileNumber = document.getElementById("smobile").value;
			
			// Remove any non-numeric characters from the input
			mobileNumber = mobileNumber.replace(/\D/g,'');
			
			// Check if the mobile number is valid
			var pattern = /^(?:\+?91)?[6789]\d{9}$/;
			if (pattern.test(mobileNumber)) {
				// Format the mobile number
				var formattedNumber = mobileNumber.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
				
				// Set the formatted number as the input field value
				document.getElementById("smobile").value = formattedNumber;
				
				// Display a success message
				document.getElementById("error-message").innerHTML = "";
				document.getElementById("success-message").innerHTML = "Valid mobile number!";
			} else {
				// Display an error message
				document.getElementById("success-message").innerHTML = "";
				document.getElementById("error-message").innerHTML = "Invalid mobile number!";
			}
		}
	</script>
	</form>
		</div>
		<footer>All Copyrights Reserved @Amol Tribhuwan<footer>
	</div>

</body>
</html>

