<?php include 'header.php'; ?>
<?php require '../global.php';?>
<?php session_start(); ?>

<?php
if (isset($_POST['email'])) {

    // if i do not use a prepared statement, i need to sanitize the input
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   
    // Sql statements
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        // bingo, we have a winner
        $row = mysqli_fetch_assoc($result);
        $passwordRow = $row['password'];
        if (password_verify($password,$passwordRow)) {
            $_SESSION['name'] = $row['name'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['token'] = bin2hex(random_bytes(5));

            //redirect dahsboard
            header('location: dashboard.php');
            exit;
        } else {
            echo '<div class="alert alert-danger">Wrong password or email</div>';
        }
    } else  {
        echo '<div class="alert alert-danger">Wrong password or email</div>';
    }
}
?>

<h1><span class="fat">Login</span>Admin</h1>

<form action="login.php" method="post">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="email" class="form-control" name="email" required>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" name="password" required>
</div>

<button type="submit" class="btn btn-success">Login</button>


<?php include 'footer.php'; ?>