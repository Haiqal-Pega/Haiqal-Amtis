<?php
 session_start();
 $prod_id= $_POST["id"];
 $user_id = $_SESSION['s_id'];
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "sys";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
 $sql = "INSERT INTO `cart` ( `u_id`, `p_id`) VALUES ('$user_id','$prod_id')";
 $res = mysqli_query($conn, $sql);
 if ($res == true) {
    //Data Inserted
    echo "<script>alert('Succesfully Added to Cart')</script>";
    header("Refresh:0 ; url= catalog.php");
    echo "<html></html>";  // - Tell the browser there the page is done
    flush();               // - Make sure all buffers are flushed
    ob_flush();            // - Make sure all buffers are flushed
    exit;
} else {
    //FAiled to Insert Data
    echo "<script>alert('Failed to Add into Cart')</script>";
    header("Refresh:0 ; url= catalog.php");
    echo "<html></html>";  // - Tell the browser there the page is done
    flush();               // - Make sure all buffers are flushed
    ob_flush();            // - Make sure all buffers are flushed
    exit;
}

echo $sql;
?>