<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $exist=true;
    $name = $_POST["aname"];
    $pw = $_POST["apw"];

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: admin.html");
    } 

    if(session_status() != PHP_SESSION_ACTIVE){ 
        session_start();
        //$exist = false;
        $sql = "SELECT `a_name`, `a_pass` FROM `admin`"; 
        $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

        
        if($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['a_name']==$name && $row['a_pass']==$pw){
                $exist = true;
                $_SESSION["s_name"]=$row['a_name'];
                $_SESSION["s_pass"]=$row['a_pass'];
                break;
            }
        }
        if($exist != true){
            echo "<script>alert('Invalid Username or Password')</script>";
            header("Refresh:0 ; url= admin.html");
        }
      } else {
        echo "0 results";
      }
    }
    else{
        $_POST["aname"]=$_SESSION["s_name"];
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
                    </tr>';
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<tr>
                        <td>'.$row["user_id"].'</td>
                        <td>'.$row["user_name"].'</td>
                        <td>'.$row["user_pw"].'</td>
                        <td>
                            <a href="u_delete.php?id='.$row["user_id"].'">Delete</a>
                            <br>
                        </td>
                        </tr>';
                        
                    }
                    echo '</table>';
                }
            ?>
        </div>
    </body>
</html>