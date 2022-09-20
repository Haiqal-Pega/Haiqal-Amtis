<?php
    $name = $_POST["name"];
    $pw = $_POST["pw"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";

    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
     echo"Connected<br>";
    }


    $sql = "SELECT user_name, user_pw FROM user"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row["user_name"]== $name && $row["user_pw"]== $pw)
            echo "Welcome ". $name."<br>";
            else{
                $conn->close();
                header("Location: index.html");
            }
        }
      } else {
        echo "0 results";
      }
?>

