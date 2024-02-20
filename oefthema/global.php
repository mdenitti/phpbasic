<?php
function showCurrentDate()
{
    // Define the days of the week and months in Dutch
    $days = array('Zondag', 'Maandag', 'Dinsdag', 'Woensdag', 'Donderdag', 'Vrijdag', 'Zaterdag');
    $months = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');

    // Get the current day of the week, month, and year
    $dayOfWeek = $days[date('w')];
    $dayOfMonth = date('j');
    $month = $months[date('n') - 1]; // Adjust for 0-based index
    $year = date('Y');

    // Output the formatted date in Dutch notation
    echo "$dayOfWeek, $dayOfMonth $month $year";
}

$conn = mysqli_connect("localhost:3306", "mertcode", "", "themadag");
if (!$conn) {
    echo "Connection failed: " . mysqli_connect_error();
    exit;
}

//print_r($conn);

function store($name, $email, $tel, $tday_id)
{
    // check if mail adres is already present for the specific themeday
    // ... to be developed! ;)
    global $conn;
    $currentdate = date("Y-m-d H:i:s");
    $sql = "INSERT INTO registrations VALUES (NULL,'$name', '$email', '$tel', '$tday_id','$currentdate')";
    $conn->query($sql);
}

// create a function to convert the mysql date to a Belgian format
function convertToBelgianFormat($mysqlDate)
{
    // Convert the MySQL date to a timestamp
    $timestamp = strtotime($mysqlDate);

    // Format the timestamp in Belgian format
    $belgianDate = date('d-m-Y', $timestamp);

    // Return the Belgian formatted date
    return $belgianDate;
}
