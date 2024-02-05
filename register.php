<?php
print_r($_POST);

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];

echo '<h1>Hello '.$name.'</h1>';
echo '<p>Please find your details below</p>';
echo '<h2>'.$email.'</h2>';
echo '<h3>'.$tel.'</h3>';

// inject in the database or send an email
// mail() will work on production server - not locally - no mailserver present!
// mail ($email, 'Registration', 'Hello '.$name.'!');

function saveStringToFile($name, $email, $tel) {
    // open or create a new file and append to it
    $file = fopen("result.csv", "a");
    // provice a prefered format for the date object
    $currendate = date('Y-m-d H:i:s');
    // write to file and close... use "\r\n" for new line
    $string = $currendate . "," . $tel . "," . $email . "\r";
    fwrite($file, $string);
    fclose($file);
}

saveStringToFile($name, $email, $tel);
?>