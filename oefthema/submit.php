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
    // print_r($_POST);
    // assign values to variables from POST
    $name = $_POST['name'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $locaties = $_POST['locaties'];

    // make some sessions of our posted data
    $_SESSION['name'] = $name;
    $_SESSION['email'] = $email;
    $_SESSION['tel'] = $tel;
    $_SESSION['locaties'] = $locaties;
    
    

    function saveStringToFile($name, $email, $tel, $locaties) {
        // open or create a new file and append to it
        $file = fopen("bookings.csv", "a");
        // provice a prefered format for the date object
        $currendate = date('Y-m-d H:i:s');
        // write to file and close... use "\r\n" for new line
        $string = $currendate . "," . $name . "," . $email . "," . $tel . "," . $locaties . "\r";
        fwrite($file, $string);
        fclose($file);
    }
    
    saveStringToFile($name, $email, $tel, $locaties);
    store ($name, $email, $tel, $locaties);
    
   ?>
  <div class="container">
       <div class="row">
            <div class="col-md">

            <h1>Bedankt voor uw inschrijving, <?php echo $name; ?></h1>
            <h3>Wij verwachten u in <?php echo $locaties; ?></h3>
            <p>Hier is de gegevens die u heeft ingevuld:</p>
            <ul>
                <li>Naam: <?php echo $name; ?></li>
                <li>Email: <?php echo $email; ?></li>
                <li>Telefoon: <?php echo $tel; ?></li>
                <li>Locatie: <?php echo $locaties; ?></li>
            </ul>

            <a class='btn btn-primary' href="index.php">Nieuwe inschrijving</a>
            <a class='btn btn-dark' href="print.php">Inschrijving afdrukken</a>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


</body>
</html>