<?php
include 'global.php'; // Include the file with your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name']; // Assuming you have a 'name' field in your form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_ARGON2I);

    // Insert the user data into the database
    $query = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);
    $stmt->execute();

    // Optionally, you can redirect the user to another page after successful registration
    header("Location: index.php");
    exit();
}
?>

<form method="post">
    <input type="text" name="name" placeholder="Name"> <!-- Add input field for name -->
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input class="btn btn-primary mt-2" type="submit" name="submit" value="Register">
</form>
