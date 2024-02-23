<?php
// Initialize the session
session_start();

// Destroy all session data
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit;
?>
