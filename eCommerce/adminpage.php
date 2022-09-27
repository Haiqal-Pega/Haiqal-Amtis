<?php
    session_start();
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
                        <a href="update.php?id='.$row["user_id"].'">Update</a>
                        </tr>';
                        
                    }
                    echo '</table>';
                }
            ?>
        </div>
    </body>
</html>