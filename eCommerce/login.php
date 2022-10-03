<?php
    session_start();
    if(!isset($_SESSION['status'])){
        echo "<script>alert('Please sign back in')</script>";
        header("location:index.php");
    }

    $name = $_POST["name"];
    $pw = $_POST["pw"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $exist = false;

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: index.html");
    } 


    $sql = "SELECT `u_id`,`u_name`, `u_pass` FROM `user`"; 
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

    if($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['u_name']==$name && $row['u_pass']==$pw){
                $exist = true;
                $uname = $_SESSION['s_name'] = $row['u_name'];
                $uid = $_SESSION['s_id'] = $row['u_id'];
                break;
            }
        }
        if($exist != true){
            echo "<script>alert('Invalid Username or Password')</script>";
            header("Refresh:0 ; url= login.html");
            echo "<html></html>";  // - Tell the browser there the page is done
            flush();               // - Make sure all buffers are flushed
            ob_flush();            // - Make sure all buffers are flushed
            exit;
        }
      } else {
        echo "<script>alert('No user in DB')</script>";
        header("Refresh:0 ; url= login.html");
        echo "<html></html>";  // - Tell the browser there the page is done
            flush();               // - Make sure all buffers are flushed
            ob_flush();            // - Make sure all buffers are flushed
            exit;
      }  

      $sqlprod = "SELECT * FROM `product`"; 
        $res_prod = mysqli_query($conn, $sqlprod);
?>

<html>
    <head>
    <title>eCommerce</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
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
            <div class="collapse navbar-collapse nav-pills nav-fills " id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link " href="javascript:void(0)">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="catalog.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="cart_user.php">Cart</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="index.php">Logout</a>
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

    <div class="container-fluid text-center">
        <div class="row first align-items-left py-4 mx-4 p-4 justify-content-center"> <!-- catalog row wrap -->
            <?php
                if($res_prod->num_rows > 0){
                    while($catalog = mysqli_fetch_assoc($res_prod)){
                        $prod_img = $catalog["p_image"];
                        $prod_id = $catalog["p_id"];
                        echo 
                        '<div class="col-sm-5 col-md-3 p-4 border border-1 rounded m-1" style="height: 550px;">
                            <!-- catalog picture -->
                            <div class="rounded py-2" >
                            <img src="../eComProd/'.$prod_img.'" style="max-width:320px; max-height: 180px; width:auto;">
                            </div>

                             

                            <!-- catalog attributes -->
                            <div class=" text-start p-2 py-3 bg-light rounded my-3" style="min-height:250px; height:auto">
                                Product Name: '.$catalog["p_name"].'<br>
                                Price: RM '.$catalog["p_price"].'<br>
                                <br>Description: <br>'.$catalog["p_details"].'<br><br>
                                <form method="post" action="cart.php">
                                    <input class="btn btn-success" type="submit" name="action" value="Add to cart"/>
                                    <input type="hidden" name="id" value="'.$prod_id.'"/>
                                </form>
                        
                            </div>
                        </div>';
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>

