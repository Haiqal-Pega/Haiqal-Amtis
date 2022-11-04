<?php
echo "<h2>PHP Numbers<br></h2>";

echo"Functions to check if the type of a variable is integer<ul>
<li>is_int()
<li>is_integer()
<li>is_long()<br></ul>";

//to check if number an integer
$x = 5985;
echo "<br>Number 5985 is a integer: ";
var_dump(is_int($x));

$x = 59.85;
echo "<br>Number 59.85 is a integer: ";
var_dump(is_int($x));

echo"<br><br>Functions to check if the type of a variable is float<ul>
<li>is_float()
<li>is_double()<br></ul>";

//to check if number a float
$x = 10.365;
echo "<br>Number 10.365 is a float: ";
var_dump(is_float($x));

echo"<br><br>Functions to check if the type of a variable is inifinite or not<ul>
<li>is_finite()
<li>is_infinite()<br></ul>";

//to check if number is infinite but var_dump already return the data type
echo "Is 1.9e411 and infinite: ";
$x = 1.9e411;
var_dump($x);

echo "<br><br>PHP is_numberic is use to find if a variable a numeric<BR>";
$x = 5985;
echo "<br>5985: ";
var_dump(is_numeric($x));

$x = "5985";
echo "<br>'5985': ";
var_dump(is_numeric($x));

$x = "59.85" + 100;
echo "<br>59.85: ";
var_dump(is_numeric($x));

$x = "Hello";
echo "<br>'Hello': ";
var_dump(is_numeric($x));

echo "<br><br>PHP Casting Strings and Floats to Integers<br><ul>
<li>(int)
<li>(integer))
<li>intval()<br></ul>";

// Cast float to int
$x = 23465.768;
echo"Cast 23465.768 into integer: ";
$int_cast = (int)$x;
echo $int_cast;

echo "<br>";

// Cast string to int
$x = "23465.768";
echo"Cast ''23465.768'' into integer: ";
$int_cast = (int)$x;
echo $int_cast;
?>