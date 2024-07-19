<label for="password">Password</label>
<input type="password" name="password" id="password" required>
<button type="button" id="show-password-btn">&#128065;</button>

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

