<?php

// Function to register a new user
function registerUser($name, $email, $password) {
    $mysqli = new mysqli("localhost", "root", "root", "themadag");

    // Check connection
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute SQL query to insert user data
    $stmt = $mysqli->prepare("INSERT INTO Users (name, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $hashedPassword);
    $result = $stmt->execute();

    if ($result) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $mysqli->error;
    }

    // Close statement and connection
    $stmt->close();
    $mysqli->close();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; // Assuming name is received via POST
    $email = $_POST['email']; // Assuming email is received via POST
    $password = $_POST['password']; // Assuming password is received via POST

    // Call registerUser function
    registerUser($name, $email, $password);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>

    <h2>Registration</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>

    <p>Already have an account? <a href="login.php">Login here</a>.</p>

</body>
</html>