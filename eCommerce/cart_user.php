<?php
    session_start();
    $user_id = $_SESSION['s_id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>eCommerce | Cart</title>
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
                <a class="nav-link active" href="cart_user.php">Cart</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.html">Logout</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
        </div>
        </div>
        </div>      
        </div>
    </nav>
    <?php
        $sql = "SELECT * FROM `product` JOIN `cart` ON `product.p_id=cart.p_id` JOIN `user` ON `user.u_id=cart.u_id` "; 
        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

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
</body>
</html>