<?php
 session_start();
 $prod_id= $_POST["id"];
 $cart_qty= $_POST["qty"];
 $user_id = $_SESSION['s_id'];
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "sys";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
 $itemcheck="SELECT * FROM cart WHERE u_id=$user_id AND p_id=$prod_id";
 $resultcheck = mysqli_query($conn,$itemcheck);
    if ($resultcheck->num_rows > 0) {
        while($row = mysqli_fetch_assoc($resultcheck)){
            $updateid=$row["c_id"];
            $newqty = $row["c_qty"]+$cart_qty;
            $updateexisted = "UPDATE `cart` SET `c_qty`= $newqty WHERE `c_id`=$updateid";
            $res=mysqli_query($conn,$updateexisted);
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
                flush();               
                ob_flush();            
                exit;
            }
        
        }
    
    }else{
        $sql = "INSERT INTO `cart` ( `u_id`, `p_id`, `c_qty`) VALUES ('$user_id','$prod_id', $cart_qty)";
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
            flush();               
            ob_flush();            
            exit;
        }
    }
?>