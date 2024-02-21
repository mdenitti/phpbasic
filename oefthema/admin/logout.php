<?php
session_start();

// Unset all sessions
$_SESSION = [];

// Destroy all sessions
header ('Location: login.php');
exit;
?>