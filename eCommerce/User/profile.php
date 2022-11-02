<?php
session_start();
if (!isset($_SESSION['status'])) {
    echo "<script>alert('Please sign back in')</script>";
    header("location:index.php");
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sys";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    header("Location: index.html");
}
$uid = $_SESSION['s_id'];
$sql = "SELECT * FROM `user` WHERE `u_id` = $uid";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('../head.html') ?>
    <title>eCommerce</title>
</head>

<body>
    <div class="container-fluid py-5  bg-primary text-white text-center">
        <h1>PC MasteRace.COM</h1>
        <p>Buy All You Need To Build Your Perfect PC</p>
    </div>
    <div>
        <nav class=".container-fluid navbar navbar-expand-sm navbar-light sticky-top" style="background-color: #e3f2fd">
            <div class="container-fluid">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse nav-pills nav-fills " id="mynavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="profile.php">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="catalog.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../Cart/cart_user.php">Cart</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="main-body my-3 ">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card ">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center"> <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4><?php echo $user['u_name']; ?></h4>
                                    <p class="text-secondary mb-1">Full Stack Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"> <?php echo $user['u_name']; ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Mobile</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"> <?php echo $user['u_num']; ?></div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary"> <?php echo $user['u_add']; ?></div>
                            </div>
                            <hr>
                            <div class="row float-end">
                                <div class="col-sm-12"> <a class="btn btn-info " target="__blank" href="edit.php">Edit</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>