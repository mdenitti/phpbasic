<?php
function showCurrentDate() {
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

