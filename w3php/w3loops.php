<?php
echo"<h2>PHP Loops</h2>";

echo"<h3>Using While Loop</h3>";
$x = 1; //initialize loop counter

while($x <= 5) { //loop condition to stop
  echo "The number is: $x <br>";
  $x++;//increment
}

echo"<h3>Using do..while Loop</h3>";
$x = 1; //initialize counter

do { //block will execute at least once
  echo "The number is: $x <br>";
  $x++; //counter increment
} while ($x <= 5); //loop condition

echo"<h3>Using For Loop</h3>";
for ($x = 0; $x <= 100; $x+=10) { //initialze,condition, increment all in one
    echo "The number is: $x <br>";
  }

echo"<h3>Using ForEach Loop</h3>"; 
/*works only on arrays, and is used to loop through 
each key/value pair in an array*/
$colors = array("red", "green", "blue", "yellow");

foreach ($colors as $value) {
  echo "$value <br>";
}

echo"<h3>Break and Continue</h3>"; 
//break used to jump out a loop
echo"Breaks at 4<br>";
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      break; //force loop to stop if condition is true
    }
    echo "The number is: $x <br>";
  }
echo"<br>Continue at 4<br>"; 
for ($x = 0; $x < 10; $x++) {
    if ($x == 4) {
      continue; //force loop to next iteration ignoring the rest of the script
    }
    echo "The number is: $x <br>";
  }
?>