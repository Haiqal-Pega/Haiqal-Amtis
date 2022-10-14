<?php
    session_start();
    $update_id = $_SESSION["update_id"]
?>
<!DOCTYPE html>
<html>
    <?php
    $name = $_POST["name"]; 
    $pw = $_POST["pw"];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sys";
    ?>
    <body>
        <div style="text-align: center ;">
            <?php

            
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                echo "Connected";
            }

            if($name != ""){
                //echo "You Changed Your Name to: $name";
                $sql = "UPDATE `user` SET `u_name`= '$name' WHERE `u_id`=$update_id";
                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    //Data Inserted
                    echo "<h3>Name Updated</h3><br>";
                } else {
                    //FAiled to Insert Data
                    echo "<script>alert('Name Failed to update')</script>";
                }
            }
            if($pw != ""){
                //echo "You Changed Your Name to: $name";
                $sql = "UPDATE `user` SET `u_pass`= '$pw' WHERE `u_id`=$update_id";

                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    //Data Inserted
                    echo "<h3>Password Updated</h3><br>";
                } else {
                    //FAiled to Insert Data
                    echo $pw;
                    echo "<script>alert('Password Failed to update')</script>";
                }
            }
            
            
            ?>
            <form action="adminpage.php" method="post">
                <input type="submit" value="Go Back" />
            </form>
        </div>
    </body>
</html>
        