<?php
include 'global.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['submit'])) {
    // Retrieve form data
    $email = $_GET['email'];
    $password = $_GET['password'];

    // Query to fetch user data from the database
    $query = "SELECT id, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // User found, verify password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, set user_id in session
            $_SESSION['user_id'] = $user['id'];

            // Redirect to the desired page (e.g., dashboard)
            header("Location: index.php");
            exit();
        } else {
            // Password is incorrect
            echo "Incorrect username or password";
        }
    } else {
        // User not found
        echo "User not found";
    }
}
?>
<form method="get">
    <input class="form-control mt-2" type="email" name="email" value="<?php if (isset($_GET['email'])) { echo $_GET['email']; } ?>" placeholder="Email">
    <input class="form-control mt-2" type="password" name="password" value="<?php if (isset($_GET['password'])) { echo $_GET['password']; } ?>" placeholder="Password">
    <input class="btn btn-primary mt-2" type="submit" name="submit">
</form>
