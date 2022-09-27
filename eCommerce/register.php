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

            Welcome <?php echo $name; ?><br>
            Your password is: <?php echo $pw; ?><br>
            <?php

            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            } else {
                echo "Connected";
            }

            $sql = "INSERT INTO `user` ( `user_name`, `user_pw`) VALUES ('$name','$pw')";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                //Data Inserted
                echo "<script>alert('Succesfully registered')</script>";
            } else {
                //FAiled to Insert Data
                echo "<script>alert('Failed to Register')</script>";
            }
            
            ?>
            <form action="login.html" method="post">
                <input type="submit" value="Go to Sign In Page" />
            </form>
        </div>
    </body>
</html>
        