<?php include 'header.php'; ?>
<?php require '../global.php';?>

<?php
if (isset($_POST['name'])) {

    // if i do not use a prepared statement, i need to sanitize the input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
   

    // check if email already exists
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        echo "<div class='alert alert-danger' role='alert'>
        Email already exists...
      </div>";

       // show a try again button bootstrap style
       echo "<a href='register.php' class='btn btn-danger'>Try again</a>";
      
        exit;
    }

    // get current date
    $date = date("Y-m-d H:i:s");

    // hash the password with bcrypt and use a cost of 10
    $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 10]);

    $sql = "INSERT INTO 
    `users` (`name`, `email`, `status`, `date`, `password`) 
    VALUES ('$name', '$email', 0, '$date', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-primary' role='alert'>
        User $name has been added...
      </div>";
    }

}


?>

<h1><span class="fat">Register</span>Admin</h1>

<form action="register.php" method="post">

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Name</label>
  <input type="text" class="form-control" name="name" required>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Email</label>
  <input type="email" class="form-control" name="email" required>
</div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Password</label>
  <input type="password" class="form-control" name="password" required>
</div>

<button type="submit" class="btn btn-success">Register</button>


<?php include 'footer.php'; ?>