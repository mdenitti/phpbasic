<!DOCTYPE html>
<html>

<head>
   <title>Register</title>
   <link rel="stylesheet" type="text/css" href="style.css">
   <style>
      /* General Styling */
      body {
         font-family: 'Arial', sans-serif;
         background-color: #f8f8f8;
         display: flex;
         align-items: center;
         justify-content: center;
         min-height: 100vh;
         margin: 0;
      }

      /* Container Styling */
      .container {
         background-color: #fff;
         border-radius: 8px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         padding: 40px;
         width: 350px;
      }

      h1 {
         text-align: center;
         margin-bottom: 20px;
         color: #333;
      }

      input {
         width: 100%;
         padding: 12px;
         border: 1px solid #ccc;
         border-radius: 4px;
         margin-bottom: 15px;
         box-sizing: border-box;
      }

      button {
         background-color: #008CBA;
         /* Blue */
         color: white;
         padding: 12px 20px;
         border: none;
         border-radius: 4px;
         cursor: pointer;
         width: 100%;
      }

      button:hover {
         background-color: #006e99;
         /* Darker blue on hover */
      }

      .error {
         color: red;
         margin-bottom: 10px;
      }
   </style>
</head>

<body>
   <div class="container">
      <h1>Register</h1>

      <?php if (isset($_GET['error'])) { ?>
         <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <form action="register_process.php" method="post">
         <label for="username">Username:</label>
         <input type="text" name="username" id="username" required><br><br>

         <label for="email">Email:</label>
         <input type="email" name="email" id="email" required><br><br>

         <label for="password">Password:</label>
         <input type="password" name="password" id="password" required><br><br>

         <label for="password_confirm">Confirm Password:</label>
         <input type="password" name="password_confirm" id="password_confirm" required><br><br>

         <button type="submit">Register</button>
      </form>
   </div>
</body>

</html>