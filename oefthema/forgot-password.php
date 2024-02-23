<?php
session_start();
require 'global.php'; // Include database connection configuration

// Ensure Composer autoload is included
require_once __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check user existence
    $sql = "SELECT id, name FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        if (mysqli_stmt_num_rows($stmt) == 1) {
            mysqli_stmt_bind_result($stmt, $userId, $userName);
            mysqli_stmt_fetch($stmt);

            // Generate token
            $token = uniqid();

            // Update user with token
            $sqlUpdate = "UPDATE users SET reset_token = ? WHERE id = ?";
            if ($stmtUpdate = mysqli_prepare($conn, $sqlUpdate)) {
                mysqli_stmt_bind_param($stmtUpdate, "si", $token, $userId);
                mysqli_stmt_execute($stmtUpdate);
                mysqli_stmt_close($stmtUpdate);

                // Send password reset email
                $mail = new PHPMailer(true);
                $mail->isSMTP();

                // Replace these with your actual SMTP settings
                $mail->Host = 'localhost';
                $mail->Port = 1025; // or 465 for SSL
                $mail->SMTPAuth = true;
                $mail->Username = 'your_smtp_username'; // Replace with your SMTP username
                $mail->Password = 'your_smtp_password'; // Replace with your SMTP password

                $mail->setFrom('from@example.com', 'Your Name');
                $mail->addAddress($email, $userName);
                $mail->Subject = 'Password Reset';
                $mail->Body = 'To reset your password, click the following link: http://yourwebsite.com/reset-password?token=' . $token;

                if ($mail->send()) {
                    echo 'Password reset instructions have been sent to your email.';
                } else {
                    echo 'Error sending email: ' . $mail->ErrorInfo;
                }
            }
        } else {
            echo 'No account found with that email.';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'Oops! Something went wrong. Please try again later.';
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Forgot Password</h3>
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Send Reset Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
