<?php
session_start();
$_SESSION['status']="Active";
$servername = "localhost";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=sys", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
  if($_POST["sign"]);
    header("Location: User/login.html");
  if($_POST["register"])
    header("Location: User/register.html");
  if($_POST["admin"])
    header("Location: Admin/admin.html");
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>