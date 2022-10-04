<?php
session_start();
$idcartdelete = $_POST["iddelete"];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sys";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    header("Location: index.php"); 
}

//######################################################################################################

if ($_POST['action'] && $_POST['iddelete']) {
    if ($_POST['action'] == 'Remove') {
        $sql = "DELETE FROM `cart` WHERE `c_id`=$idcartdelete";

        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Product removed from cart successfully')</script>";
        } else {
          echo "<script>alert('Something When Wrong! Product Not Removed')</script>" . mysqli_error($conn);
        }
        header("Refresh:0 ; url= cart_user.php");
    }
  }
?>