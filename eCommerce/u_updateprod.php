<?php
    session_start();
    $updateprod_id = $_SESSION["updateprod_id"];
    
?>
<!DOCTYPE html>
<html>
    <?php
    $name = $_POST["pname"];
    $price = $_POST["pprice"];
    $details = $_POST["pdetails"];
    $img = $_POST["pimg"];
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
                $sql = "UPDATE `product` SET `p_name`= '$name' WHERE `p_id`=$updateprod_id";
                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    //Data Inserted
                    echo "<h3>Name Updated</h3><br>";
                } else {
                    //FAiled to Insert Data
                    echo "<script>alert('Name Failed to update')</script>";
                }
            }
            if($price != ""){
                //echo "You Changed Your Name to: $name";
                $sql = "UPDATE `product` SET `p_price`= '$price' WHERE `p_id`=$updateprod_id";

                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    //Data Inserted
                    echo "<h3>Password Updated</h3><br>";
                } else {
                    //FAiled to Insert Data
                    echo "<script>alert('Password Failed to update')</script>";
                }
            }
            if($details != ""){
                //echo "You Changed Your Name to: $name";
                $sql = "UPDATE `product` SET `p_details`= '$details' WHERE `p_id`=$updateprod_id";

                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    //Data Inserted
                    echo "<h3>Details Updated</h3><br>";
                } else {
                    //FAiled to Insert Data
                    echo "<script>alert('Details Failed to update')</script>";
                }
            }
            if($img != ""){
                //echo "You Changed Your Name to: $name";
                $sql = "UPDATE `product` SET `p_image`= '$img' WHERE `p_id`=$updateprod_id";

                $res = mysqli_query($conn, $sql);

                if ($res == true) {
                    //Data Inserted
                    echo "<h3>Image Updated</h3><br>";
                } else {
                    //FAiled to Insert Data
                    echo "<script>alert('Image Failed to update')</script>";
                }
            }
            
            
            ?>
            <form action="productpage.php" method="post">
                <input type="submit" value="Go Back" />
            </form>
        </div>
    </body>
</html>
        