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
echo("sqrt(64): ".sqrt(64));  // returns 8

?>