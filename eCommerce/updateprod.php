<?php
session_start();
$_SESSION['admin']=$_SESSION['s_name'];
$_SESSION['adminpass']=$_SESSION['s_pass'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sys";


$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
  header("Location: admin.html");
}
$_SESSION["updateprod_id"] = $id = $_POST["id"];
if ($_POST['action'] && $_POST['id']) {
    if ($_POST['action'] == 'Delete') {
        header("Refresh:0 ; url= u_deleteprod.php");
        echo "<html></html>";  // - Tell the browser there the page is done
        flush();               // - Make sure all buffers are flushed
        ob_flush();            // - Make sure all buffers are flushed
        exit;
    }
  }
$sql = "SELECT * FROM `product` WHERE `p_id` = $id";   
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result)
?>
<!DOCTYPE html>
<head>
    <title>Update Product Page</title>  
</style>   
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<html>
    <body>
        <h2 style="text-align: center;">Fill The Form Below to Update The Product</h2><br>
        <h2 style="text-align: center;">Leave the space empty for details you want to stay the same</h2>
        <div class="container">
        <form action="u_updateprod.php" method="post">
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" class="form-control" name="pname"  value="<?php echo $row['p_name'] ?>">
                </div>
                <div class="form-group">
                  <label >Price</label>
                  <input type="text" class="form-control" placeholder="Enter Product Price" name="pprice"  value="<?php echo $row['p_price'] ?>">
                </div>
                <div class="form-group">
                    <label >Details</label>
                    <textarea type="text" rows="4" cols="50" class="form-control" placeholder="<?php echo $row['p_details'] ?>" name="pdetails"></textarea>
                  </div>
                <div class="form-group pt-3">
                    <label for="exampleFormControlFile1">Choose Image</label>
                    <input type="file" class="form-control-file" name="pimg">
                  </div>
                <div  class="container pt-4 ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" onclick="location.href = 'productpage.php';"  class="btn float-end btn-info" >Back</button>
                </div>
            </form>
        </div>

    </body>

</html>