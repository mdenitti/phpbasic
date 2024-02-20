<?php

session_start(); // Start session

// Function to verify user's credentials and login
function login($username, $password) {
    $mysqli = new mysqli("localhost", "root", "root", "themadag");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Prepare and execute SQL query to retrieve user data
    $stmt = $mysqli->prepare("SELECT id, name, email, password FROM Users WHERE name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $row['password'])) {
            // Set session data
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            // Redirect to dashboard
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }

    // Close statement and connection
    $stmt->close();
    $mysqli->close();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username']; // Assuming username is received via POST
    $password = $_POST['password']; // Assuming password is received via POST

    // Call login function
    login($username, $password);
}

?>

<!-- HTML form for login -->
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a>.</p>

</body>
</html>