<?php
echo"<h2>PHP Array</h2>";
//used to store many elements in one variable
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".";
//use indeces to pull specific element in array

echo "<h3>Array count() Function</h3>";
$cars = array("Volvo", "BMW", "Toyota");
echo count($cars);

echo "<h3>Loop Thru Indexed Arrays</h3>";
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) { //looping thru array
  echo $cars[$x]; //display element on current counter
  echo "<br>";//newline
}

echo"<h3>PHP Associative Arrays</h3>";
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Peter is " . $age['Peter'] . " years old."; 
//use key to pull key's value

echo"<h3>Loop Through an Associative Array</h3>";
//use foreach loop 
foreach($age as $x => $x_value) { //set key and value into a variable each 
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
  }

echo"<h3>PHP Multidimensional Arrays</h3>";
//array with one or more array in it

$cars = array (
    array("Volvo",22,18),
    array("BMW",15,13),
    array("Saab",5,2),
    array("Land Rover",17,15)
  );
//how to display multidimensional array manually
  echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
  echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
  echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
  echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

//display using nested loop
for ($row = 0; $row < 4; $row++) {
    echo "<p><b>Row number $row</b></p>";
    echo "<ul>";
    for ($col = 0; $col < 3; $col++) {
      echo "<li>".$cars[$row][$col]."</li>";
    }
    echo "</ul>";
  }

echo"<h3>Sorting Array</h3>";
echo"sort()<br>";
$cars = array("Volvo", "BMW", "Toyota");
sort($cars); //sort ascending

$clength = count($cars); //count element in array
for($x = 0; $x < $clength; $x++) {
  echo $cars[$x];
  echo "<br>";
}
echo"<br>rsort()<br>";
rsort($cars); //sort descending
for($x = 0; $x < $clength; $x++) {
    echo $cars[$x];
    echo "<br>";
  }
echo"<br>asort()<br>"; //sort assosiative ascending(value)
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
asort($age);

foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

echo"<br>ksort()<br>";//sort assosiative ascending(key)
foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
  }

echo"<br>arsort()<br>";//sort assosiative descending(value)
foreach($age as $x => $x_value) {
    echo "Key=" . $x . ", Value=" . $x_value;
    echo "<br>";
  }

echo"<br>krsort()<br>";//sort assosiative descending(key)
foreach($age as $x => $x_value) {
  echo "Key=" . $x . ", Value=" . $x_value;
  echo "<br>";
}

?>