<?php
class Buah {
  public $name;
  public $color;
  public function __construct($name, $color) {
    $this->name = $name;
    $this->color = $color;
  }
  protected function intro() {
    echo "The fruit is {$this->name} and the color is {$this->color}.";
  }
}

class Strawberry extends Buah {
  public function message() {
    echo "Am I a fruit or a berry? ";
    // Call protected method from within derived class - OK
    $this -> intro(); //right place to call protected method
  }
}



$strawberry = new Strawberry("Strawberry", "red"); // OK. __construct() is public
$strawberry->message(); // OK. message() is public and it calls intro() (which is protected) from within the derived class
//$strawberry->intro(); // cannot protected function


//overiding inherited method
class Transport {
    public $type;
    public $color;
    public function __construct($type, $color) { //constructor
      $this->name = $type;
      $this->color = $color;
    }
    public function intro() { //display out
      echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
  }
  
  class Car extends Transport {
    public $weight;
    public function __construct($type, $color, $weight) { //same method as parent with sama name to override
      $this->name = $type;
      $this->color = $color;
      $this->weight = $weight;
    }
    public function msg() {
      echo "<br><br>The transport is {$this->name}, the color is {$this->color}, and the weight is {$this->weight} KG.";
    }
  }
  
  $car = new Car("Car", "red", 1250);
  $car->msg();
?>