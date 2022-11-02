<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('head.html') ?>
    <title>eCommerce | Sign Up</title>
</head>

<body>
    <div class="row" style="min-height:615px ;">
        <div class="col-5 align-self-center" style="padding: 5%;">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Sign Up!</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-horizontal" action="User/register.php" method="POST">
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
                                    <div class="col-md-4 my-3">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-8 my-2 form-group">
                                        <input type="text" class="form-control" placeholder="Address" name="address" required>
                                    </div>
                                    <div class="col-md-4 my-3">
                                        <label>Mobile No.</label>
                                    </div>
                                    <div class="col-md-8 my-2 form-group">
                                        <input type="text" class="form-control" placeholder="Mobile Number" name="num" required>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Submit
                                        </button>
                                    </div>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="button" onclick="location.href = 'index.php';" class="btn btn-light-secondary me-1 mb-1"><u>Have an account? Sign in here!</u></button>
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