<?php session_start(); ?>
<?php include 'global.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class='btn btn-warning mt-2' href="register.php" style="float: right;">Go to register page</a>
                <h1>Login</h1>
                <?php
                // checking if username and password are set, if so execute function...
                if (isset($_POST['username']) && isset($_POST['password'])) {
                    // selecting username and password from database where username = $_POST['username']
                    $sql = "SELECT
                    users.`username`,
                    users.`password`
                    FROM users WHERE users.`username` = '$_POST[username]'
                    ";

                    // putting the result of the query inside a assoc array
                    $myUser = mysqli_fetch_assoc(mysqli_query($conn, $sql));
                    $myUsername = $myUser['username'];
                    $myPassword = $myUser['password'];

                    //checking if username and password match
                    if ($myUsername == $_POST['username'] && password_verify($_POST['password'], $myPassword)) {
                        // Login successful
                        echo  "Login Successful";
                    } else {
                        // Login failed
                        echo  "Login Failed";
                    };
                }
                ?>
                <form action="#" method="post">
                    <div class="mb-1">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Login</button>
                    <button type="reset" class="btn btn-danger mt-2">Reset</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>