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
</style>   
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<html>
    <body>
        <div class="text-center ">
            <h2>Welcome <?php echo $_SESSION["s_name"] ?></h2>
        </div>
            <div class="container text-center p-3">
                <div class="row">
                    <div class="col-3 p-3 ">
                        <ul class="nav flex-column nav-pills nav-fill">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">User List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Product List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">On Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Logout</a>
                        </li>
                        </ul>
                    </div>
                    <div class="col-9  p-3">
                    <?php
                        $sql = "SELECT * FROM `user`"; 
                        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
                        echo "<br>";
                    
                        if($result->num_rows > 0) {
                            // output data of each row
                            echo '<table class="table table-striped">
                            <tr>
                            <th>ID</th>
                            <th>User Name</th>
                            <th>Lastname</th>
                            <th>Delete/Update</th>
                            </tr>';
                            while($row = mysqli_fetch_assoc($result))
                            {
                                echo '<tr>
                                <td>'.$row["user_id"].'</td>
                                <td>'.$row["user_name"].'</td>
                                <td>'.$row["user_pw"].'</td>
                                <td>
                                <a href="u_delete.php?id='.$row["user_id"].'">Delete</a>
                                <a href="update.php?id='.$row["user_id"].'">Update</a>
                                </tr>';
                                
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