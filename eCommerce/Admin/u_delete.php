<?php
    session_start();
    $_SESSION['admin']=$_SESSION['s_name'];
    $_SESSION['adminpass']=$_SESSION['s_pass'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $id = $_SESSION["update_id"];

    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: admin.html");
    }
    // sql to delete a record
    $sql= "DELETE FROM `cart` WHERE `u_id` =$id";
    mysqli_query($conn, $sql);
    $sql = "DELETE FROM `user` WHERE `u_id`=$id";
    
    if (mysqli_query($conn, $sql)) {
      echo "<script>alert('Record deleted successfully')</script>";
    } else {
      echo "<script>alert('Something When Wrong! Record Not Deleted')</script>" . mysqli_error($conn);
    }

    header("Location: adminpage.php");
?>

<!-- <!DOCTYPE html>
<head>  
</style>   
</head>
<title>Admin Page eCommerce</title>
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
                    <div class="col-3 p-5 ">
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
                            <th>Password</th>
                            <th>Delete/Update</th>
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
</html> -->