<?php include 'header.php'; ?>
<?php require '../global.php';?>
<?php session_start(); checkLoggedIn();?>

<h1><span class="fat">Dashboard</span>Admin</h1>
<a href="logout.php" class="btn btn-danger mb-3">Logout</a>
<p>I am allowed to be here<p>


<?php include 'footer.php'; ?>