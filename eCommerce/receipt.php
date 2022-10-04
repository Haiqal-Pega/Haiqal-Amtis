<?php
    session_start();
    $userid = $_SESSION['s_id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $total =0;
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
            header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>eCommerce | Receipt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-fluid py-5  bg-primary text-white text-center">
        <h1>PC MasteRace.COM</h1>
            <p>Buy All You Need To Build Your Perfect PC</p> 
        </div>
    <div>
    <nav class=".container-fluid navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #e3f2fd">
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav-pills nav-fills" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link " href="javascript:void(0)">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="catalog.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="cart_user.php">Receipt</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
                </li>
            </ul>
        </div>
        </div>
        </div>
        </div>      
        </div>
    </nav>
    <div class="container col-9  p-3 ">
    <?php
            $sql = "SELECT * FROM product JOIN cart ON cart.p_id=product.p_id WHERE cart.u_id=$userid";

            $result = mysqli_query($conn, $sql);

                if ($result->num_rows > 0) { 
                $list = 0;
                //array_push($paidcart,)
                // output data of each row
                echo '<table class="table table-hover my-3 text-center">
                <tr>
                <th>#</th>
                <th>Product Name</th>
                <th>Descriptions</th>
                <th>Price (RM)</th>
                </tr>';
                while($row = mysqli_fetch_assoc($result))
                {
                    $paid= $row["c_id"];
                    echo "$paid <br>" ;
                    $total += $row["p_price"];
                    $pic= $row["p_image"];
                    echo 
                    '<tr>
                        <td>'.++$list.'</td>
                        <td>'.$row["p_name"].'</td>
                        <td>'.$row["p_details"].'</td>
                        <td>'.$row["p_price"].'</td>
                    </tr>';
                    
                }
                echo '
                <tr>
                <th colspan="3" class="text-end">Total Price Paid: </th>
                <th>RM '.$total.'</th>
                </tr>';
                echo '</table>';
            }    
        
           // $sqlpaid = "DELETE FROM cart WHERE c_id = "

        ?>
        <button type="button" onclick="location.href = 'login.html';"  class="btn float-end btn-info my-5" >See more product in the catalog</button>
    </div>

</body>
</html>