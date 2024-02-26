<?php 

class Auto {
    // private only accessible from inside the class
    // public accessible from outside
    // used for security so that we can't change the value of the wheels
    // we need to pass trought the setWheels method and evaluate the amount of wheels
    private $wheels;
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
echo $auto->setWheels(1);
echo $auto->drive();

$auto2 = new Auto;
echo $auto2->setWheels(2);
echo $auto2->drive();





?>