<?php
session_start();
require 'global.php'; // Include file with the database connection settings

// Process form data when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $status = 1; // Active user status
    $date = date('Y-m-d H:i:s'); // Current date and time

    // Check if a user with this email already exists
    $sql = "SELECT id FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 0) {
            // Email does not exist, proceed with registration
            mysqli_stmt_close($stmt); // Close the previous query

            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            // SQL query to insert data
            $sql = "INSERT INTO users (name, email, password, status, date) VALUES (?, ?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "sssds", $name, $email, $hashed_password, $status, $date);

                // Execute the query
                if (mysqli_stmt_execute($stmt)) {
                    // Registration successful, redirect to the login page
                    header("location: login.php");
                    exit;
                } else {
                    echo "Something went wrong. Please try again.";
                }
            }
            mysqli_stmt_close($stmt); // Close the query
        } else {
            // Email already exists, notify the user
            $email_err = "An account with this email address already exists.";
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <!-- Styles and scripts (if needed) -->
</head>
<body>
    <div>
        <h2>Registration</h2>
        <!-- Show error message if it exists -->
        <?php if (!empty($email_err)) echo $email_err; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div>
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <input type="submit" value="Register">
            </div>
        </form>

    </div>    
</body>
</html>