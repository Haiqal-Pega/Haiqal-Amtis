<?php
    session_start();
    $deleteprod_id=$_SESSION["updateprod_id"];
    $_SESSION['admin']=$_SESSION['s_name'];
    $_SESSION['adminpass']=$_SESSION['s_pass'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";

    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: admin.html");
    }
    // sql to delete a record
    $sql = "DELETE FROM `product` WHERE `p_id`=$deleteprod_id";
    
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Record deleted successfully')</script>";
    } else {
      echo "<script>alert('Something When Wrong! Record Not Deleted')</script>" . mysqli_error($conn);
    }

    
?>

<!DOCTYPE html>
<head>  
</style>   
</head>
<title>Admin Page eCommerce</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!DOCTYPE html>
<head>  
    <title>Product Page | Admin | eCommerce</title>
</style>   
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<html>
    <body>
        <div class="text-center pt-5">
            <h2>Welcome <?php echo $_SESSION["s_name"] ?></h2>
        </div>
            <div class="container text-center p-3">
                <div class="row">
                    <div class="col-3 p-3">
                        <ul class="nav flex-column nav-pills nav-fill">
                        <li class="nav-item btn btn-light">
                            <a class="nav-link " aria-current="page" href="adminpage.php">User List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active text-white" href="#">Product List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">On Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Logout</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-9  p-3 ">
                    <button type="button" onclick="location.href = 'addproduct.html';"  class="btn float-end btn-success" >ADD +</button>
                    <?php
                        $sql = "SELECT * FROM `product`"; 
                        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
                        echo "<br>";
                        
                    
                        if($result->num_rows > 0) {
                            // output data of each row
                            echo '<table class="table table-hover my-3">
                            <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Price (RM)</th>
                            <th class="w-25">Descriptions</th>
                            <th>Images</th>
                            <th class="w-25">Delete/Update</th>
                            </tr>';
                            while($row = mysqli_fetch_assoc($result))
                            {
                                $pic= $row["p_image"];
                                echo '<tr>
                                <td>'.$row["p_id"].'</td>
                                <td>'.$row["p_name"].'</td>
                                <td>'.$row["p_price"].'</td>
                                <td>'.$row["p_details"].'</td>
                                <td> <img src="../eComProd/'.$pic.'" style="width:100px"></td>
                                <td> '
                                ?>
                                <form method="post" action="updateprod.php">
                                    <input class="btn btn-info  " type="submit" name="action" value="Update"/>
                                    <input class="btn btn-danger" type="submit" name="action" value="Delete"/>
                                    <input type="hidden" name="id" value="<?php echo $row['p_id']; ?>"/>
                                </form>    
                                <?php 

                                '</td></tr>';
                                
                            }
                            echo '</table>';
                        }
                    ?>
                    </div>
                </div>
            </div>
            <div>
            
        </div>
    </body>
</html>