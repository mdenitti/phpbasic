<?php session_start(); ?>
<?php include 'global.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class='btn btn-warning mt-2' href="login.php" style="float: right;">Go to login page</a>
                <h1>Register</h1>
                <?php
                if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
                    register($_POST['username'], $_POST['email'], $_POST['password']);
                }
                ?>
                <form action="#" method="post">
                    <div class="mb-1">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-1">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Register</button>
                    <button type="reset" class="btn btn-danger mt-2">Reset</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>