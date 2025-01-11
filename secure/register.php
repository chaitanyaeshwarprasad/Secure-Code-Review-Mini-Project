<?php
// Include database connection
include('connection.php');

// Get POST data for registration
$new_username = $_POST['new_user'] ?? '';
$new_password = $_POST['new_pass'] ?? '';

// SQL Injection Protection using Prepared Statements
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($new_username) && !empty($new_password)) {
    
    // Input sanitization: Remove extra spaces and sanitize input
    $new_username = trim($new_username);
    $new_username = filter_var($new_username, FILTER_SANITIZE_STRING);

    // Password Hashing
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Use bcrypt by default

    // SQL query to insert user into the database
    // Prepare the SQL query with placeholders
    if ($stmt = $con->prepare("INSERT INTO login (username, password) VALUES (?, ?)")) {
        // Bind the parameters to the query
        $stmt->bind_param("ss", $new_username, $hashed_password);  // "ss" means both are strings
        
        // Execute the statement
        if ($stmt->execute()) {
            echo "<h1>Registration successful. You can now log in.</h1>";
        } else {
            echo "<h1>Registration failed. Please try again.</h1>";
        }
        
        // Close the statement
        $stmt->close();
    } else {
        echo "<h1>Error preparing the query. Please try again later.</h1>";
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
