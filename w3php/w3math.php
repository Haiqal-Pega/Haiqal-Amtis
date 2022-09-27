<?php
echo"<h2>PHP Math</h2>";
echo"PHP pi(): "; //return value of pi
echo(pi()."<br>"); // returns 3.1415926535898

echo"<br>PHP min() and max()<br>";
echo"Number (0, 150, 30, 20, -8, -200)<br>";
echo("Min: ". min(0, 150, 30, 20, -8, -200)."<br>");  // returns -200
echo("Max: ".max(0, 150, 30, 20, -8, -200)."<br>");  // returns 150

echo"<br>PHP abs() Function<br>";//return absolute value
echo("absolute of -6.7: ".abs(-6.7)."<br>");  // returns 6.7

echo"<br>PHP sqrt() Function<br>"; //return square root of a number
echo("sqrt(64): ".sqrt(64)."<br>");  // returns 8

echo"<br>PHP round() Function<br>"; //round off float to nearest int
echo("round(0.60): ".round(0.60)."<br>");  // returns 1
echo("round(0.49): ".round(0.49)."<br>");  // returns 0

echo"<br>PHP Random Number Function (rand())<br>"; //generate random number
echo("No range random: ".rand()."<br>"); //randomly generate
echo("Ranged random: ".rand(10, 100)."<br>"); //generate random between two number
?>