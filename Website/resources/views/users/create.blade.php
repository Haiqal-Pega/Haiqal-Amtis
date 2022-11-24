<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Background image -->
        <div class="p-5 bg-image"
            style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 100;
          ">
        </div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong"
            style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.6);
          backdrop-filter: blur(30px);
          ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Sign up now</h2>
                        <form action="{{ route('users.store') }}">

                            <!-- First Name input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" placeholder="James" name="firstName">
                                <label class="form-label px-2" >First name</label>
                            </div>
                            
                            <!-- Last Name input -->
                            <div class="form-outline mb-4">
                                <input type="text" class="form-control" placeholder="Bond" name="lastName">
                                <label class="form-label px-2">Last name</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" class="form-control" name="email" placeholder="code4lyfe@hottakes.com">
                                <label class="form-label px-2">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password"class="form-control" name="password" placeholder="*********">
                                <label class="form-label px-2">Password</label>
                            </div>

                            <!-- Address input -->
                            <div class="form-outline mb-4">
                                <textarea class="form-control" name="address" cols="30" rows="3">Your Address Here ...</textarea>
                                <label class="form-label px-2">Address</label>
                            </div>

                            <!-- DOB input -->
                            <div class="form-outline mb-4">
                                <input type="date" name="dob" class="form-control" />
                                <label class="form-label px-2">Date of Birthday</label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-primary mb-4" style="width: 100%">
                                Sign up
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</body>

</html>
