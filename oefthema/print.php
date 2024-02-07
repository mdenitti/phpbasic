<?php session_start(); ?>
<?php include 'global.php'; ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Themadag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php 
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $tel = $_SESSION['tel'];
    $locaties = $_SESSION['locaties'];
   ?>
  <div class="container">
       <div class="row">
            <div class="col-md">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=syntrapxl.be" alt="logo" width="200">
            <h1>Ticket voor, <?php echo $name; ?></h1>
            <h3>Wij verwachten u in <?php echo $locaties; ?></h3>
            <p>Hier is de gegevens die u heeft ingevuld:</p>
            <ul>
                <li>Naam: <?php echo $name; ?></li>
                <li>Email: <?php echo $email; ?></li>
                <li>Telefoon: <?php echo $tel; ?></li>
                <li>Locatie: <?php echo $locaties; ?></li>
            </ul>

            <a class='btn btn-primary' onclick="window.print();">Afdrukken</a>
           
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>