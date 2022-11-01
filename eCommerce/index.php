<?php
    session_start();
    unset($_SESSION['status']);
    session_destroy();
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('head.html') ?>
    <title>eCommerce | Sign In</title>
</head>
<body>
    <div class="row" style="min-height:615px ;">
        <div class="col-5 align-self-center" style="padding: 5%;">
            <div class="card" >
                <div class="card-header">
                <h4 class="card-title">Sign In!</h4>
                </div>
                <div class="card-content">
                <div class="card-body">
                    <form class="form form-horizontal" action="User/login.php" method="POST">
                    <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 my-3">
                                    <label>Username</label>
                                </div>
                                <div class="col-md-8 my-2 form-group">
                                    <input type="text" class="form-control" placeholder="Username" name="name" required>
                                </div>
                                <div class="col-md-4 my-3">
                                    <label>Password</label>
                                </div>
                                <div class="col-md-8 my-2 form-group">
                                    <input type="password" class="form-control" placeholder="Password" name="pw" required>
                                </div>
                                <div class="col-12 col-md-8 my-2 offset-md-4 form-group">
                                    <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="checkbox1" class="form-check-input" checked="false">
                                        <label for="checkbox1">Remember Me</label>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Submit
                                    </button>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    <button type="button" onclick="location.href = 'register.php';"  class="btn btn-light-secondary me-1 mb-1" ><u>No account? Sign up here!</u></button>
                                </div>
                            </div>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
        <div class="col-7 bg-info">
        </div>
    </div>
</body>
</html>