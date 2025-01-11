<?php
// Include database connection
include('connection.php');

// Get POST data for comment submission
$comment = $_POST['comment'] ?? '';

// XSS Vulnerability - Display submitted comment without sanitizing input
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($comment)) {
    echo "<p>Comment: " . $comment . "</p>";  // XSS vulnerability: no sanitization of user input
}

?>

<!-- Submit Comment Form -->
<h2>Submit Comment:</h2>
<form method="POST" action="comment.php">
    <textarea name="comment" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Submit Comment">
</form>
