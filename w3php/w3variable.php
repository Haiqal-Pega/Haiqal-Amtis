<?php
$txt = "W3Schools.com";

//ways to print out text and variable in php
echo "I love $txt! <br>";
echo "I love ".$txt."! <br>";

//php can print out arithmetic solution uisng variable
$x = 5;
$y = 4;
echo $x + $y;

//variable Scope
echo "<p>--------------------------------------------------------------</p>";

$z = 5; // global scope

function myTest() {
  // using x inside this function will generate an error
  echo "<p>Variable Z inside function is: $z</p>";
}
myTest();

echo "<p>Variable Z outside function is: $z</p>";

echo "<p>--------------------------------------------------------------</p>";
//local scope variable
function myTest1() {
    $x1 = 5; // local scope
    echo "<p>Variable x1 inside function is: $x1</p>";
  }
  myTest1();
  
  // using x outside the function will generate an error
  echo "<p>Variable x1 outside function is: $x1</p>";

echo "<p>--------------------------------------------------------------</p>";

//global keyword
/*variable with global keyword can be use globally 
and locally without noticing error */
$x2 = 5;
$y2 = 10;

function myTest2() {
  global $x2, $y2; //variable set to be used inside and outside function.
  $y2 = $x2 + $y2;
}

myTest2();
echo "Global Keyword Code<br>";
echo $y2; // outputs 15

echo "<p>--------------------------------------------------------------</p>";
//Static Keyword
echo"<p>Static Keyword</p>";
//static keep local variable after function is executed
//
function myTest3() {
    static $x = 0;
    echo $x ."<br>";
    $x++;
  }
  
  myTest3();
  myTest3();
  myTest3();
?>