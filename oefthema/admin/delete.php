<?php 
require '../global.php';

// we need the sessions for the checkLoggedIn function
session_start();

checkLoggedIn();

// Get the ID parameter
$id = $_GET['id'];

// Delete the registration entry from the database
$sql = "DELETE FROM registrations WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    // Redirect back to the dashboard page after successful deletion
    header("Location: dashboard.php");
    exit;
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
?>
