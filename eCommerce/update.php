<?php
session_start();
$_SESSION["update_id"] = $id = $_GET["id"];
?>
<!DOCTYPE html>
<head>  
</style>   
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<html>
    <body>
        <h2 style="text-align: center;">Fill The Form Below to Update Your Profile</h2><br>
        <h2 style="text-align: center;">Leave the space empty for details you want to stay the same</h2>
        <div class="container">
        <form action="u_update.php" method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" name="name">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" placeholder="Password" name="pw">
            </div>
            <div class="pt-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </form>
        </div>

    </body>

</html>