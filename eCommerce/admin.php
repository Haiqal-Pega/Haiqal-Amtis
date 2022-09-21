<?php
    $name = $_POST["aname"];
    $pw = $_POST["apw"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    $exist = false;

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        header("Location: admin.html");
    } 


    $sql = "SELECT `a_name`, `a_pass` FROM `admin`"; 
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

    if($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['a_name']==$name && $row['a_pass']==$pw){
                $exist = true;
                break;
            }
        }
        $admin = $row['a_name'];
        if($exist != true){
            echo "<script>alert('Invalid Username or Password')</script>";
            header("Refresh:0 ; url= admin.html");
        }
      } else {
        echo "0 results";
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
            <h2>Welcome <?php echo $name ?></h2>
        </div>
        <div>
            <?php
                $sql = "SELECT * FROM `user`"; 
                $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
                echo "<br>";
            
                if($result->num_rows > 0) {
                    // output data of each row
                    echo "<table>
                    <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Lastname</th>
                    </tr>";
                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo "<tr>
                        <td>".$row["user_id"]."</td>
                        <td>".$row["user_name"]."</td>
                        <td>".$row["user_pw"]."</td>
                        </tr>";
                        
                    }
                    echo "</table>";
                }
            ?>
        </div>
    </body>
</html>

