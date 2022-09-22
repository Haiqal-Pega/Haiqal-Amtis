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
            $_SESSION["s_id"]=$row['a_id'];
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
<style>
    .header {
        background-color: lightblue;
    }
    h2{
        text-align: center;
    }
    table, th,td{
        width: auto;
        padding: 5px;
        text-align: center;
        border: 1px solid;
        border-radius: 25;
        color: black;
        border-collapse: collapse;
        margin-left: auto;
        margin-right: auto;
    }
</style>   
</head>

<html>
    <body>
        <div class="header">
            <h2>Welcome <?php echo $_SESSION["s_name"] ?></h2>
        </div>
        <div>
            <?php
                $sql = "SELECT * FROM `user`"; 
                $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
                echo "<br>";
            
                if($result->num_rows > 0) {
                    // output data of each row
                    echo '<table>
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
                        <a href="u_update.php?id='.$row["user_id"].'">Update</a>
                        </tr>';
                        
                    }
                    echo '</table>';
                }
            ?>
        </div>
    </body>
</html>