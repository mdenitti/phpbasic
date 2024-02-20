<?php
session_start();

// Destroy the session and unset variables
session_destroy();
unset($_SESSION['logged_in']);

// Redirect to login page after logging out
header('Location: login.php?logout=success');
exit;
