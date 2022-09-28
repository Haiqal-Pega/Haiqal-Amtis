<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
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

            $sql = "INSERT INTO `product` ( `p_name`, `p_price`, `p_details`, `p_image`) VALUES ('$name','$price','$details','$img')";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                //Data Inserted
                echo "<script>alert('Succesfully Add Product')</script>";
            } else {
                //FAiled to Insert Data
                echo "<script>alert('Failed to Add Product')</script>";
            }
            
            ?>
            </div>
            <div>
            <button type="button" onclick="location.href = 'productpage.php';"  class="btn btn-info position-absolute top-50 start-50 translate-middle" >Go Back</button>
       
            </div>
    </body>
</html>
        