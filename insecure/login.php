<?php
// Include database connection
include('connection.php');

// Initialize session for login tracking
session_start();

// Get POST data for login
$username = $_POST['user'] ?? '';
$password = $_POST['pass'] ?? '';

// SQL Injection Vulnerable Login (directly using user input in query)
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($username) && !empty($password)) {
    // Vulnerable SQL query: Directly uses user input without sanitization
    $sql = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['user'] = $username;
        echo "<h1><center>Login successful</center></h1>";
    } else {
        echo "<h1>Login failed. Invalid username or password.</h1>";
    }
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
