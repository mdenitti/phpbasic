<?php
class Employee {
    private $name;
    private $position;

/* 
__get primarily handles how you fetch attribute values.

private is only accessible within the class.

__set controls how you assign values to undefined or inaccessible 
properties.

Custom setter methods offer fine-grained validation and control 
over attribute modification. 
*/

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        } 
    }

    // universal setter with a magic method
    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            $this->$property = $value;
        } 
    }

    public function setPosition($position) {
        $allowedPositions = ["Scrum Master", "Developer", "Project Manager", "Designer"];
        if (!in_array($position, $allowedPositions)) {
            throw new Exception("Invalid position");
        }
        $this->position = $position;
    }
}

$employee = new Employee();

// Using __get
echo $employee->name;  // Access value

// Using __set (assuming you want to allow setting the name)
// if the attribute is private, you will be redirect to the __set method
$employee->name = "Alice"; 

// Using a custom setter
$employee->setName("Bob"); 