<?php 

class Auto {
    public $wheels = 4;

    public function drive() {
        return "i am drving";
    }
}

// plain object intantiation
$auto = new Auto;
// accessible from outside with the public keyword in our class
echo $auto->drive();
echo $auto->wheels;



?>