<?php
// Include database connection
include('connection.php');

// Initialize session for login tracking
session_start();

// Get POST data for login
$username = $_POST['user'] ?? '';
$password = $_POST['pass'] ?? '';

// SQL Injection Protection using Prepared Statements
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($username) && !empty($password)) {
    // Prepare the SQL query using placeholders
    $stmt = $con->prepare("SELECT id, username, password FROM login WHERE username = ?");
    $stmt->bind_param("s", $username); // "s" means the username will be treated as a string
    $stmt->execute();

    // Bind the result variables
    $stmt->bind_result($user_id, $db_username, $db_password);
    $stmt->fetch();

    // Verify the password using password_verify() function
    if ($db_username && password_verify($password, $db_password)) {
        // Password is correct, start session
        $_SESSION['user'] = $db_username;
        $_SESSION['user_id'] = $user_id;  // You can store the user ID in the session if needed
        echo "<h1><center>Login successful</center></h1>";
    } else {
        echo "<h1>Login failed. Invalid username or password.</h1>";
    }

    // Close statement
    $stmt->close();
}
?>

<!-- Login Form -->
<h2>Login</h2>
<form method="POST" action="login.php">
    <label for="user">Username:</label>
    <input type="text" id="user" name="user" value=""><br>
    <label for="pass">Password:</label>
    <input type="password" id="pass" name="pass" value=""><br>
    <input type="submit" value="Login">
</form>
