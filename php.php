<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    //PHP comment
    // echo "Hello World!";
    // camelCase
    // PascalCase
    // snake_case
    // kebab-case
    $worldHello = 'Hello World';
    echo '<hr>';
    // The double quotes evaluate the variable
    echo "This is my world: $worldHello";
    echo '<hr>';
    echo 'This is my world: $worldHello';
    echo '<hr>';
    echo 'This is my world: '.$worldHello; // consumes less resources
    echo '<hr>';
    //
    $a = 4;
    if ($a == 3) {
        echo 'a is 3';
    } else {
        echo 'a is niet gelijk 3 maar '.$a;
    }

    $myArray = ['a', 'b', 'c'];
    echo $myArray[0]; // return a
    echo $myArray[1]; // return b
    echo $myArray[2]; // return c

    // loop the array with while loop
    $i = 0;
    while ($i < 3) {
        echo $myArray[$i];
        $i++;
    }

    // loop the array with a for loop
    for ($i = 0; $i < 3; $i++) {
        echo $myArray[$i];
    }

    // for each loop
    foreach ($myArray as $value) {
        echo $value;
    }

    // Exercise:
    // Create an array with favorite dishes
    // and show them in a list and if you find the 'cevapi' show i like that...

// Create an array of favorite dishes
$favoriteDishes = [
    "Pad Thai",
    "Pizza",
    "Sushi",
    "Tacos",
    "Cevapi", // Add cevapi to the list
];

print_r($favoriteDishes); // Print the array $favoriteDishes;

// Display the list of favorite dishes
echo "<h2>My Favorite Dishes:</h2>";
echo "<ul>";
foreach ($favoriteDishes as $dish) {
    echo "<li>$dish";
    // Check if the current dish is 'cevapi'
    if ($dish === "Cevapi") {
        echo " - I like that!";
    }
    echo "</li>";
}
echo "</ul>";
    
// create an associative array
$favoriteDishesAssoc = [
    "Pad Thai" => "Thai food",
    "Pizza" => "Italian food",
    "Sushi" => "Japanese food",
    "Tacos" => "Mexican food",
    "Cevapi" => "Balkan food"
];

echo $favoriteDishesAssoc["Cevapi"];

// print_r($favoriteDishesAssoc);

// iterate the assoc array with a foreach loop
echo "<ul>";
foreach ($favoriteDishesAssoc as $dish => $type) {
    // as $key => $value   
    echo "<li>$dish - $type</li>";
}
echo "</ul>";
echo $dish;

$favoriteDishesAssocMulti = [
    "Pad Thai" => ["noedels", "paprika", "soy sauce"],
    "Pizza" => ["cheese","peperoni"],
    "Sushi" => ["rice", "salmon"],
    "Tacos" => ["tortilla", "salsa"],
    "Cevapi" => ["Meat", "cottage cheese"]
];
echo '<br><br>';
// echo random thing

// first with key $value 
foreach ($favoriteDishesAssocMulti as $dish => $ingredients) {
    // with only value
    echo '<b>'.$dish.'</b><hr>';
    foreach($ingredients as $ingredient) {
        echo $ingredient.'<br>';
    }
    echo '<br>';
}

// function are always preceded with function!
// named return function 
function calculate($a,$b) {
    return $a + $b;
}

// void function - no return
function calculateVoid($a,$b) {
    echo $a + $b;
}

$myResultOfCalculate = calculate(6,5);
calculateVoid(4,5);

// Stel pdf generator functie
function makePDF ($name,$email,$tel) {
    echo '<h1>PDF document registration</h1>';
    echo '<h3>'.$name.'</h3>';
    echo '<h3>'.$email.'</h3>';
    echo '<h3>'.$tel.'</h3>';   
};

makePDF ($databasename,'XxhQw@example.com','123456789');

function calcTotaal ($amount, $vat=false) {
// the second argument is optional becuz
// the default value is false
    if ($vat) {
        $amountvat = ($amount * $vat)/100;
        return $amountvat + $amount;
    } else {
        return $amount;
    }
}

echo calcTotaal(100, 21);?>

<form action="register.php" method="post">
    <input type="text" name="name">
    <input type="text" name="email">
    <input type="text" name="tel">
    <input type="submit" value="submit">
    <input type="reset" value="reset">
</form> 


</body>
</html>