<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website</title>
</head>

<body>
    <div class="container p-4 border border-rounded border-info mt-5" style="min-width: 300; max-width:375px">
        <form method="post" action="{{ route('users.index') }}" >
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" name="email" class="form-control" />
                <label class="form-label">Email address</label>
            </div>
    
            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" class="form-control" />
                <label class="form-label">Password</label>
            </div>
    
            <div class="row mb-4">
                <div class="col d-flex justify-content-start">
                    <!-- Checkbox -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="">
                        <label class="form-check-label" > Remember me </label>
                    </div>
                </div>
    
                {{-- <div class="col">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div> --}}
            </div>
    
            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" style="min-width: 100%">Sign in</button>
    
            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="{{route('users.register')}}">Register</a></p>
            </div>
        </form>
    </div>
</body>

</html>
