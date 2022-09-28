<?php
    session_start();
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


    $sql = "SELECT `u_id`,`u_name`, `u_pass` FROM `user`"; 
    $result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function

    if($result->num_rows > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['u_name']==$name && $row['u_pass']==$pw){
                $exist = true;
                $uname = $_SESSION['s_name'] = $row['u_name'];
                $uid = $_SESSION['s_id'] = $row['u_id'];
                break;
            }
        }
        if($exist != true){
            echo "<script>alert('Invalid Username or Password')</script>";
            header("Refresh:0 ; url= login.html");
            echo "<html></html>";  // - Tell the browser there the page is done
            flush();               // - Make sure all buffers are flushed
            ob_flush();            // - Make sure all buffers are flushed
            exit;
        }
      } else {
        echo "0 results";
        header("Refresh:0 ; url= login.html");
      }  
?>

<html>
<head>
<title>eCommerce</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid py-5 p-2  bg-info text-white text-center">
    <h1>PC MasteRace.COM</h1>
    <p>Buy All You Need To Build Your Perfect PC</p> 
    </div>
    <div>
    <nav class="container-fluid navbar navbar-expand-sm bg-dark navbar-dark sticky-top">
        <div class="container-fluid">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Profile</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">Cart</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="login.html">Logout</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="text" placeholder="Search">
                <button class="btn btn-primary" type="button">Search</button>
            </form>
        </div>
        </div>
        </div>
        </div>      
        </div>
    </nav>

    <div class=".container-fluid text-center">
        <div class="row align-items-start">
            <div class="col">
            One of three columns
            </div>
            <div class="col">
            One of three columns
            </div>
            <div class="col">
            One of three columns
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
            One of three columns
            </div>
            <div class="col">
            One of three columns
            </div>
            <div class="col">
            One of three columns
            </div>
        </div>
        <div class="row align-items-end">
            <div class="col">
            One of three columns
            </div>
            <div class="col">
            One of three columns
            </div>
            <div class="col">
            One of three columns
            </div>
        </div>
    </div>
</body>
</html>

