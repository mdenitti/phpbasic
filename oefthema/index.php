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

            <?php 
                // example URL: http://localhost:8000/index.php?name=Tante%20Frieda&email=frieda@mail.com&tel=028309283098
                print_r($_GET);
            ?>

            <h1>Hello, Themadag</h1>
                <p>
                <h3>Bereid je voor op een onvergetelijk avontuur boordevol ontdekkingen en verrassingen.</h3> Of je nu gepassioneerd bent door exotische bestemmingen, culturele hoogtepunten of avontuurlijke reizen, onze themadag belooft een bron van inspiratie te zijn voor jouw volgende reis. Schrijf je nu in en maak je klaar om meegevoerd te worden op een reis door de fascinerende wereld van reizen en avontuur!
                </p>
                <form action="submit.php" method="post">
                    <input class="form-control mt-2" type="text" name="name" value = "<?php if(isset($_GET['name'])) { echo $_GET['name']; }?>" placeholder="Geef uw naam">
                    <input class="form-control mt-2" type="email" name="email" value = "<?php if (isset($_GET['email'])) { echo $_GET['email'];}?>" placeholder="Geef uw email">
                    <input class="form-control mt-2" type="text" name="tel"  value = "<?php if (isset($_GET['tel'])) { echo $_GET['tel']; }?>" placeholder="Geef uw telefoon">
                    <hr>
                    <?php 
                    // locaties undefined, position does matter ! print_r ($locaties);
                    $locations = ["Genk - Thailand", "Hasselt - Griekenland", "Zonhoven - Mexico", "Oudsbergen - Italië", "Vlaardingen - Nederland"];
                    print_r($locations);
                    ?>
                        <select class="form-select mt-2" name="locaties">
                            <?php 
                                foreach ($locations as $location) {
                                    echo "<option value='$location'>$location</option>";
                                }
                            ?>
                        </select>
                    
                    <input class="btn btn-primary mt-2" type="submit" name="submit">
                    <input class="btn btn-danger mt-2" type="reset" name="reset">
                </form>
            </div>
       </div>
    </div>

</body>
</html>