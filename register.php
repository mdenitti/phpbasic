<?php
print_r($_POST);

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];

echo '<h1>Hello '.$name.'</h1>';
echo '<p>Please find your details below</p>';
echo '<h2>'.$email.'</h2>';
echo '<h3>'.$tel.'</h3>';

?>