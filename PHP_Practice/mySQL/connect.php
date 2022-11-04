<?php
//syntax to connect to mySQL databases using mySQLi Object-oriented
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$conn->close(); //close connection for object oriented manually
//connection are close at the end of the script
echo "Connected successfully: MySQLi object oriented<br>";

//syntax to connect to mySQL databases using mySQLi procedural
// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
mysqli_close($conn);//close connection for procedural
echo "Connected successfully: MySQLi procedural<br>";

//syntax to connect to mySQL databases using PDO (PHP Data Object)
try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully: PDO connection<br>";
  } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
  }
  $conn=null;//close connection for object oriented

//PDO works on 12 different database. MySQLi only with MySQL. Easier to switch project's database with PDO


?>