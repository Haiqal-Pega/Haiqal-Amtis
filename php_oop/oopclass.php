<?php
class Fruit { //object
  // Properties
  public $name;
  public $color;

  // Methods         
  function __construct($name, $color) { //constructor
    $this->name = $name;                //basically setter all in one
    $this->color = $color;              //will set value to each attribute
  }
  
  function __destruct() { //called at the end of the script
    echo "<br>The fruit is {$this->name} and the color is {$this->color}.";
  }

  function set_name($name) { //setter
    $this->name = $name;
  }
  function get_name() { //getter
    return $this->name;
  }
  function set_color($color) {  //setter
    $this->color = $color;
  }
  function get_color() { //getter
    return $this->color;
  }
}

$pisang = new Fruit("Pisang", "Kuning");
$apple = new Fruit("Apple", "Green");
echo $apple->get_name();
echo "<br>";
echo $apple->get_color();
echo "<br>";
$apple->set_name('Apple');
$apple->set_color('Red');
echo "Name : " . $pisang->get_name();
echo "<br>";
echo "Color : " . $pisang->get_color();

$apple->color = "Merah"; //change the value of the $name property like this or use method set()
echo "<br>".$apple->name ."<br>";


var_dump($apple instanceof Fruit); //checks if object belongs to the class

//Access Modifier:
//public: can be access anywhere
//protected: can be access within the class or derived class of it
//private: only accessible within the class
?>