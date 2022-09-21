<?php
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


    $sql = "SELECT `user_name`, `user_pw` FROM `user`"; 
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function
    echo "<br>";

    if($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['user_name']==$name && $row['user_pw']==$pw){
                $exist = true;
                echo $row['user_name'] ."    ".$row['user_pw'];
                break;
            }
        }
        if($exist != true){
            echo "<script>alert('Invalid Username or Password')</script>";
            header("Refresh:0 ; url= login.html");
        }
      } else {
        echo "0 results";
      }

      
?>

