<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .welcome-message {
            margin-bottom: 20px;
        }
        .logout-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }
        .logout-btn:hover {
            background-color: #df3529;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>
        <div class="welcome-message">
            <p>This is your dashboard. You can add your content here.</p>
        </div>
        <form method="post">
            <input type="submit" name="logout" value="Logout" class="logout-btn">
        </form>
    </div>

</body>
</html>