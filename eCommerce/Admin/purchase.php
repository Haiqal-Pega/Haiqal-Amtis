<?php
    include '../conn.php';
    if(!isset($_SESSION['status'])){
        echo "<script>alert('Please sign back in')</script>";
        header("location:index.php");
    }
    $_SESSION['admin']=$_SESSION['s_name'];
    // $_SESSION['adminpass']=$_SESSION['s_pass'];
    
    

    
?>
<!DOCTYPE html>
<head> 
    <title>Purchases | Admin | eCommerce   </title>
</style>   
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<html>
    <body>
        <div class="text-center pt-5">
            <h1>Welcome <?php echo $_SESSION["s_name"] ?></h1>
        </div>
            <div class="container text-center p-3">
                <div class="row">
                    <div class="col-3 p-3 " style="background-color:#3c4f49 ;">
                        <ul class="nav flex-column nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link text-white " aria-current="page" href="adminpage.php">User List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../Product/productpage.php">Product List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="purchase.php">Purchases</a>       
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="../index.php">Logout</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-9  p-3 " style="background-color: #e7d042;">
                    <?php
                        $sql = "SELECT * FROM purchase 
                        JOIN product ON purchase.p_id=product.p_id 
                        JOIN user ON user.u_id=purchase.u_id
                        WHERE user.u_id=purchase.u_id"; 
                        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
                        echo "<br>";
                    
                        if($result->num_rows > 0) {
                            // output data of each row
                            echo '<table class="table table-hover my-3">
                            <tr>
                            <th>Customer Name</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                            </tr>';
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>
                                <td>'.$row["u_name"].'</td>
                                <td>'.$row["p_name"].'</td>
                                <td>'.$row["t_qty"].'</td>
                                <td>'.$row["t_status"].'</td>
                                <td>'
                                ?>
                                <form method="post" action="purchase_action.php">
                                    <input class="btn btn-success  " type="submit" name="action" value="Shipped"/>
                                    <input class="btn btn-danger" type="submit" name="action" value="Remove"/>
                                    <input type="hidden" name="id" value="<?php echo $row['t_id']; ?>"/>
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