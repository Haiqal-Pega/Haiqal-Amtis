<?php
echo "<h2>PHP JSON</h2>";
//json = javascript object notation

/* two function
json_encode()
jsondecode() */

//encode assoc arr to json obj
$age = array("Peter"=>"ds", "Ben"=>11111, "Joe"=>43.90);
echo json_encode($age);
echo "<br>";

//encode indexed arr to json obj
$cars = array("Proton", "Honda", "Toyota");
$json1 =  json_encode($cars);
echo "$json1 <br>";

//decode from json to php obj
var_dump(json_decode($json1));
echo "<br>";

//decode from json to assoc arr with second para = true
var_dump(json_decode($json1, true));
echo "<br>";

// access the values from a PHP object
$jsonobj = '{"Peter":35,"Ben":37,"Joe":43}';
$obj = json_decode($jsonobj);
echo $obj->Peter;
echo $obj->Ben;
echo $obj->Joe;

echo "<br>";
//loop thru the value from php obj
$arr = json_decode($jsonobj, true);

echo $arr["Peter"];
echo $arr["Ben"];
echo $arr["Joe"];
echo "<br>";

//loop through the values of a PHP associative array 
$arr = json_decode($jsonobj, true);

foreach($arr as $key => $value) {
  echo $key . " => " . $value . "<br>";
}

?>