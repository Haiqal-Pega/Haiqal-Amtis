<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $id = $_GET["id"];
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: admin.html");
    }
    // sql to delete a record
    $sql = "DELETE FROM `user` WHERE `user_id`=$id";
    
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Record deleted successfully')</script>";
      header("Refresh:0 ; url= admin.php");
    } else {
      echo "<script>alert('Something When Wrong! Record Not Deleted')</script>" . mysqli_error($conn);
    }
?>