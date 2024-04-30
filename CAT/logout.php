<?php
// Start the session
session_start();

// Check if the user is logged in
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Redirect user to login page if not logged in
    header("Location: login1.html");
    exit;
}

// If logout button is clicked
if(isset($_POST['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to login page after logout
    header("Location: login.php");
    exit;
}
?>

<!-- Your HTML code for logout button or link -->
<form method="post" action="">
    <button type="submit" name="logout">Logout</button>
</form>
