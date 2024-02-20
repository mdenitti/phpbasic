<?php
session_start();
require 'global.php'; // Include file with the database connection settings

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare SQL query to find the user by email
    $sql = "SELECT id, password FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $email);

        // Execute the query
        mysqli_stmt_execute($stmt);

        // Store the result
        mysqli_stmt_store_result($stmt);

        // Check if the user exists
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $id, $hashed_password);

            if (mysqli_stmt_fetch($stmt)) {
                // If the user is found, check the password
                if (password_verify($password, $hashed_password)) {
                    // Password is correct, start the user session
                    $_SESSION["loggedin"] = true;
                    $_SESSION["user_id"] = $id;

                    // Redirect to the user's page
                    header("location: index.php");
                    exit;
                } else {
                    // Incorrect password, display error message
                    $login_err = "Incorrect password.";
                }
            }
        } else {
            // User not found, display error message
            $login_err = "No account found with that email.";
        }
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <!-- Styles and scripts (if needed) -->
</head>
<body>
    <div>
        <h2>Login</h2>
        <p>Please enter your credentials to log in.</p>

        <?php 
        if(!empty($login_err)){
            echo '<div>' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Email</label>
                <input type="email" name="email">
            </div>    
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <input type="submit" value="Login">
                <p>No account? <a href="register.php">Register now</a>.</p>

            </div>
        </form>
    </div>    
</body>
</html>
