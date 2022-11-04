<!DOCTYPE html>
<html>
<body>
<h1>PHP Traits</h1>
<?php

//traits enable a class to inherit from other classes beside parent class
trait message1 {
  public function msg1() {
    echo "From Trait 1 "; 
  }
}

trait message2 {
  public function msg2() {
    echo "From traits second"; 
  }
}

class Welcome {
  use message1; //use trait's method //not from parent class
}

class Welcome2 {
  use message1, message2;//use two trait's method from two diff trait 2//not from parent class
}

$obj = new Welcome();
$obj->msg1();

echo "<br>";


$obj2 = new Welcome2();
$obj2->msg1();
$obj2->msg2();
?>
 
</body>
</html>