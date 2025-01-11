<?php
// Include database connection
include('connection.php');

// Get POST data for comment submission
$comment = $_POST['comment'] ?? '';

// XSS Protection: Sanitize user input before displaying it
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($comment)) {
    // Use htmlspecialchars() to prevent XSS
    $safe_comment = htmlspecialchars($comment, ENT_QUOTES, 'UTF-8');
    echo "<p>Comment: " . $safe_comment . "</p>";  // Safe output
}

?>

<!-- Submit Comment Form -->
<h2>Submit Comment:</h2>
<form method="POST" action="comment.php">
    <textarea name="comment" rows="4" cols="50"></textarea><br>
    <input type="submit" value="Submit Comment">
</form>
