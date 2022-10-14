<?php
    require '../conn.php';
    if(!isset($_SESSION['status'])){
        echo "<script>alert('Please sign back in')</script>";
        header("location:index.php");
    }

    $idpurchase = $_POST["id"];

    if ($_POST['action'] == 'Remove') {
        $sql = "DELETE FROM purchase WHERE t_id = $idpurchase";
        $res = mysqli_query($conn, $sql);
        if($res==true){
            echo "<script>alert('Purchases Settled')</script>";
            header("location:purchase.php");
        }else{
            echo "<script>alert('Something went wrong!')</script>";
            header("location:purchase.php");
        }

    }

    if ($_POST['action'] == 'Shipped') {
        $statusnew="Shipped";
        $sql = "UPDATE `purchase` SET `t_status` = '$statusnew' WHERE `t_id` = '$idpurchase'";
        $res = mysqli_query($conn, $sql);
        if($res==true){
            echo "<script>alert('Item tagged shipped')</script>";
            header("location: purchase.php");
        }else {
            echo "<script>alert('Something went wrong')</script>";
            header("location: purchase.php");
        }
    }
?>