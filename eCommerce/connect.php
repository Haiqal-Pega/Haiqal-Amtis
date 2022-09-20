<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=sys", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  echo $_POST["sign"];
    header("Location: login.html");
    if($_POST["register"])
    header("Location: register.html");
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>