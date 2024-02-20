<?php 
include 'global.php';
session_start(); // Start session

// Check if the user is logged in
if(!isset($_SESSION['user_id'])) {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Themadag</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <div class="container">
       <div class="row">
            <div class="col-md">
            <a href="logout.php">Log out</a>

            <?php 
                // example URL: http://localhost:8000/index.php?name=Tante%20Frieda&email=frieda@mail.com&tel=028309283098
                print_r($_GET);
            ?>

            <h1>Hello, Themadag</h1>
                <p>
                <?php showCurrentDate(); ?>
                <h3>Bereid je voor op een onvergetelijk avontuur boordevol ontdekkingen en verrassingen.</h3> Of je nu gepassioneerd bent door exotische bestemmingen, culturele hoogtepunten of avontuurlijke reizen, onze themadag belooft een bron van inspiratie te zijn voor jouw volgende reis. Schrijf je nu in en maak je klaar om meegevoerd te worden op een reis door de fascinerende wereld van reizen en avontuur!
                </p>
                <form action="submit.php" method="post">
                    <input class="form-control mt-2" type="text" name="name" value = "<?php if(isset($_GET['name'])) { echo $_GET['name']; }?>" placeholder="Geef uw naam">
                    <input class="form-control mt-2" type="email" name="email" value = "<?php if (isset($_GET['email'])) { echo $_GET['email'];}?>" placeholder="Geef uw email">
                    <input class="form-control mt-2" type="text" name="tel"  value = "<?php if (isset($_GET['tel'])) { echo $_GET['tel']; }?>" placeholder="Geef uw telefoon">
                    <hr>
                    <?php 

                    // Remove hardcoded array *

                    // Create query to retrieve tdays and Locations (JOIN)
                    $sql = "SELECT
                    tdays.`name` AS themename,
                    tdays.id,
                    tdays.status,
                    tdays.date,
                    locations.`name` AS locname,
                    locations.amount,
                    locations.amount - (SELECT COUNT(*) FROM registrations WHERE registrations.tday_id = tdays.id) AS freeplace
                    FROM tdays
                    JOIN locations ON locations.id = tdays.location_id
                    WHERE tdays.date >= CURDATE()
                    ";

                    $locations = mysqli_query($conn, $sql);
                    print_r($locations);

                    //$locations = ["Genk - Thailand", "Hasselt - Griekenland", "Zonhoven - Mexico", "Oudsbergen - Italië", "Vlaardingen - Nederland"];
                    
                    if (!isset($_GET['locatie'])) {
                        // locaties undefined, position does matter ! print_r ($locaties);
                        // print_r($locations);
                        echo "<select class='form-select mt-2' name='tday_id'>";
                        // Iterate tdays in select
                        foreach ($locations as $location) {
                            $localdate = convertToBelgianFormat($location['date']);
                            // Replace value of the select by tday.id
                            if ($location['freeplace'] > 0) {
                             echo "<option value='$location[id]'>$localdate - $location[themename] - $location[locname] ($location[freeplace] van $location[amount] beschikbaar)</option>";
                            }
                        }
                        echo " </select>";
                        //echo $locations[0];
                    } else {
                        // locaties defined
                        $customLocation = $locations[$_GET['locatie']];
                        echo "<input type='hidden' name='locaties' value = '$customLocation'>";
                        echo "<p>U gaat naar: $customLocation</p>";
                    }
                    ?>
                    <input class="btn btn-primary mt-2" type="submit" name="submit">
                    <input class="btn btn-danger mt-2" type="reset" name="reset">
                </form>
            </div>
       </div>
    </div>

</body>
</html>