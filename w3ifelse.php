<?php
echo"<h2>PHP IF ELSE Statement</h2>";

$t = date("H");

if ($t < "10") {
    echo "Have a good morning!"; //will execute if true
  } elseif ($t < "20") {
    echo "Have a good day!"; //will execute if prev is false & this is true
  } else {
    echo "Have a good night!"; //execute if all prev false
  }

echo"<h2>PHP Switch Statement</h2>";

$favcolor = "red";

//will execute line with case value same as in switch condition
switch ($favcolor) {
  case "red":
    echo "Your favorite color is red!";
    break;
  case "blue":
    echo "Your favorite color is blue!";
    break;
  case "green":
    echo "Your favorite color is green!";
    break;
  default:
    echo "Your favorite color is neither red, blue, nor green!";
}
?>