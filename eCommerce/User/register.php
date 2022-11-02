<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
    <?php
    require '../conn.php';
    $name = $_POST["name"];
    $pw = $_POST["pw"];
    $address = $_POST["address"];
    $phone = $_POST["num"];
    ?>
    <body>
        <div style="text-align: center ;">

            <?php
            $sql = "INSERT INTO `user` ( `u_name`, `u_pass`, `u_add`,`u_num`) VALUES ('$name','$pw','$address','$phone')";

            $res = mysqli_query($conn, $sql);

            if ($res == true) {
                //Data Inserted
                echo "<script>alert('Succesfully registered')</script>";
            } else {
                //FAiled to Insert Data
                echo "<script>alert('Failed to Register')</script>";
            }
            
            ?>
            </div>
            <div>
            <button type="button" onclick="location.href = '../index.php';"  class="btn btn-info position-absolute top-50 start-50 translate-middle" >Go to Sign In Page</button>
       
            </div>
    </body>
</html>
        