<?php
echo"<h2>PHP Function</h2>";
echo"<h3>Function w/o argument</h3>";
function writeMsg() {
    echo "Hello world!";
  }
  
writeMsg(); // call the 

echo"<h3>Function with Argument</h3>";
function familyName($fname, $year) {
    echo "$fname Refsnes. Born in $year <br>";
  }
  
  familyName("Hege", "1975");
  familyName("Stale", "1978");
  familyName("Kai Jim", "1983");

echo"<h3>Returning Value</h3>";
function sum(int $x, int $y) {
    $z = $x + $y;
    return $z;
  }
  
  echo "5 + 10 = " . sum(5, 10) . "<br>";
  echo "7 + 13 = " . sum(7, 13) . "<br>";
  echo "2 + 4 = " . sum(2, 4);
  
  echo"<h3>Returning Type Declaration</h3>";
  function addNumbers(float $a, float $b) : int { //return type declared
    return $a + $b;
  }
  echo addNumbers(1.2, 5.2);

  echo"<h3>Passing Arguments by Reference</h3>";
  function add_five(&$value) { //use & to return argument
    $value += 5;
  }
  
  $num = 2;
  add_five($num);
  echo $num;
?>