<?php
echo "<h2>PHP Filters</h2>";

$str = "<h1>Hello World!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING); //no longer supported 
echo $newstr ."<br>";

$int = 100;
echo $int ."<BR>";
if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) { //first para to avoid getting false negative
  echo("Integer is valid");
} else {
  echo("Integer is not valid");
}

$ip = "127.0.0.1";
echo $ip."<BR>";
if (!filter_var($ip, FILTER_VALIDATE_IP) === false) {
  echo("$ip is a valid IP address");
} else {
  echo("$ip is not a valid IP address");
}

$email = "john.doe@example.com";
echo "<BR>";
// Remove all illegal characters from email
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

// Validate e-mail
if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
  echo("$email is a valid email address");
} else {
  echo("$email is not a valid email address");
}
echo "<BR>";
$url = "https://www.w3schools.com";

// Remove all illegal characters from a url
$url = filter_var($url, FILTER_SANITIZE_URL);

// Validate url
if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
  echo("$url is a valid URL");
} else {
  echo("$url is not a valid URL");
}

echo "<h2>PHP Filter Advanced</h2>";
$int = 23910;
$min = 1;
$max = 200;
//Validate an Integer Within a Range
if (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
  echo("Variable value $int is not within the legal range");
} else {
  echo("Variable value $int is within the legal range");
}
echo "<br>";
//validate ipv6 adress
$ip = "2001:0db8:85a3:08d3:1319:8a2e:0370:7334";

if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) === false) {
  echo("$ip is a valid IPv6 address");
} else {
  echo("$ip is not a valid IPv6 address");
}
echo "<br>";
//validate url - must have query string
$url = "https://www.w3schools.com";

if (!filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_QUERY_REQUIRED) === false) {
  echo("$url is a valid URL with a query string");
} else {
  echo("$url is not a valid URL with a query string");
}
echo "<br>";
//remove char with ASCII>127(not ascii char)
$str = "<h1>Hello WorldÆØÅ!</h1>";
$newstr = filter_var($str, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH); //filter sanitize str is depreciated
echo $newstr;
?>