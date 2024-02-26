<?php 

class Auto {
    public $wheels;
    public function setWheels($wheels) {
        // set the value of the wheels
        if ($wheels > 0) {
            $this->wheels = $wheels;
        } else {
            $this->wheels = "- Bruh u need at least one wheel -";
        }
    }

    public function drive() {
        return "i am drving a car with $this->wheels wheels";
    }
}

// plain object intantiation
$auto = new Auto;
// accessible from outside with the public keyword in our class
echo $auto->setWheels(0);
echo $auto->drive();





?>