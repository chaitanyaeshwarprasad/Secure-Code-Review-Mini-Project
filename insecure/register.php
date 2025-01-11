<?php
// Include database connection
include('connection.php');

// Get POST data for registration
$new_username = $_POST['new_user'] ?? '';
$new_password = $_POST['new_pass'] ?? '';

// SQL Injection Vulnerable Registration (storing plain text password)
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($new_username) && !empty($new_password)) {
    // Vulnerable SQL query: Directly inserts user input (no hashing or sanitization)
    $sql = "INSERT INTO login (username, password) VALUES ('$new_username', '$new_password')";
    if (mysqli_query($con, $sql)) {
        echo "<h1>Registration successful. You can now log in.</h1>";
    } else {
        echo "<h1>Registration failed. Please try again.</h1>";
    }
}
?>

<!-- Registration Form -->
<h2>Register New User</h2>
<form method="POST" action="register.php">
    <label for="new_user">Username:</label>
    <input type="text" id="new_user" name="new_user" value=""><br>
    <label for="new_pass">Password:</label>
    <input type="password" id="new_pass" name="new_pass" value=""><br>
    <input type="submit" value="Register">
</form>
