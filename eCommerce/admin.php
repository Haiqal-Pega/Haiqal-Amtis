<?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $exist=false;
    $aname = $_POST["aname"];
    $apw = $_POST["apw"];
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: admin.html");
    } 
    
    $sql = "SELECT `a_id`, `a_name`, `a_pass` FROM `admin`"; 
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

        
    if($result->num_rows > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result))
    {
        if($row['a_name']==$aname && $row['a_pass']==$apw){
            $exist = true;
            $_SESSION['s_id']=$row['a_id'];
            $_SESSION["s_name"]=$row['a_name'];
            $_SESSION["s_pass"]=$row['a_pass'];
            break;
            }
        
        }
    }else {
        echo "0 results";
    }
    if($exist != true){
        echo "<script>alert('Invalid Username or Password')</script>";
        header("Refresh:0 ; url= admin.html");
    }
?>
<!DOCTYPE html>
<head>  
    <title>Admin Page</title>
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
                            <a class="nav-link text-white active" aria-current="page" href="adminpage.php">User List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="productpage.php">Product List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="purchase.php">Purchases</a>    
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="index.php">Logout</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-9  p-3 " style="background-color: #e7d042;">
                    <?php
                        $sql = "SELECT * FROM `user`"; 
                        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
                        echo "<br>";
                    
                        if($result->num_rows > 0) {
                            // output data of each row
                            echo '<table class="table table-hover my-3">
                            <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Password</th>
                            <th class="w-25">Delete/Update</th>
                            </tr>';
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>
                                <td>'.$row["u_id"].'</td>
                                <td>'.$row["u_name"].'</td>
                                <td>'.$row["u_pass"].'</td>
                                <td>'
                                ?>
                                <form method="post" action="update.php">
                                    <input class="btn btn-info  " type="submit" name="action" value="Update"/>
                                    <input class="btn btn-danger" type="submit" name="action" value="Delete"/>
                                    <input type="hidden" name="id" value="<?php echo $row['u_id']; ?>"/>
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