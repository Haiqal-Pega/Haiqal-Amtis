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
    {{-- @foreach ($user as $admin) --}}
        <header>
            <div class="bg-info p-4 text-center text-white">
                <h2>WEBSITE</h2>
                {{-- <h5>Welcome {{ $firstName = $admin->firstName }}</h5> --}}
                @php
                    
                @endphp
            </div>
        </header>
    {{-- @endforeach --}}
    <div class=".container px-2">
        <div class="row mt-3">
            <div class="col-2 p-2" style="height: 100vh">
                <ul class="nav flex-column ">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info py-2 mb-1 active"
                            href="{{ route('users.admin') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info py-2 mb-1" href="{{ route('products.admin') }}">Manage
                            Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info py-2 mb-1" href="#">Manager User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-info py-2 mb-1" href="{{ route('login') }}">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-10 p-2">
                <div class="card">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
