<!DOCTYPE html>
<html>
<head>
	<title>Mobile Number Validation</title>
	<script>
		function validateMobileNumber() {
			// Get the input field value
			var mobileNumber = document.getElementById("mobile-number").value;
			
			// Remove any non-numeric characters from the input
			mobileNumber = mobileNumber.replace(/\D/g,'');
			
			// Check if the mobile number is valid
			var pattern = /^(?:\+?91)?[6789]\d{9}$/;
			if (pattern.test(mobileNumber)) {
				// Format the mobile number
				var formattedNumber = mobileNumber.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
				
				// Set the formatted number as the input field value
				document.getElementById("mobile-number").value = formattedNumber;
				
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
</head>
<body>
	<h1>Mobile Number Validation</h1>
	<label for="mobile-number">Enter your mobile number:</label>
	<input type="text" id="mobile-number" name="mobile-number" onkeyup="validateMobileNumber()">
	<p id="success-message"></p>
	<p id="error-message"></p>
</body>
</html>

