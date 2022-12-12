<!DOCTYPE html>
<html lang="en">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
<link href='https://fonts.googleapis.com/css?family=Elsie' rel='stylesheet'>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website</title>

    <style>
        h2 {
            letter-spacing: 30px;
            font-family: 'Elsie';
            font-size: 50px;
            text-shadow: 5px 5px 5px rgb(128, 174, 174);
            -webkit-text-fill-color: rgb(128, 174, 174);
            -webkit-text-stroke: black 1px;
            padding-left: 24px
        }

        .sub {
            text-shadow: 5px 5px 5px rgb(128, 174, 174);
            -webkit-text-fill-color: rgb(128, 174, 174);
            -webkit-text-stroke: black .2px;
            letter-spacing: 6px;
        }
    </style>
</head>

<body class="bg-light">
    <header>
        <div class=".container p-4 text-white bg-light">
            <h2 class="text-center">VIRTUO</h2>
            <p class="sub text-center">Your #1 Online Shoe Site</p>
            <hr>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link " href="">Welcome,
                                    {{ $users[0]->firstName }}</a>
                            </li>
                            <li class="nav-item"><a class="nav-link disabled" href="">&nbsp; |&nbsp;</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('users.catalogue', ['uid' => $users[0]->id]) }}">Home</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('carts.index',['uid' => $users[0]->id]) }}">Wishlist</a> --}}
                                <a class="nav-link" href="{{ route('carts.index', ['uid' => $users[0]->id]) }}">Wishlist</a>
                            </li>
                            <li class="nav-item">
                                {{-- <a class="nav-link" href="{{ route('carts.index',['uid' => $users[0]->id]) }}">Wishlist</a> --}}
                                <a class="nav-link" href="{{ route('login') }}">Logout</a>
                            </li>
                        </ul>
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <hr class="">
    <section id="main" class="">
        <div class="container-md">
            <div class="row row-cols-3">
                @forelse ($products as $key => $prod)
                    <div class="col p-5">
                        <div class="card p-3 border border-outline-primary">
                            <div class="card-content">
                                <img class="card-img-top img-fluid" src="{{ url('/imgprod/' . $prod->img . '') }}"
                                    alt="Card image cap" style="height: 20rem">
                                <div class="card-body">
                                    <h4 class="card-title" id="prodname">{{ $prod->name }}</h4>
                                    <p class="card-text">
                                        {{ $prod->details }}.
                                    </p>
                                    <p class="card-text">
                                        Price : RM{{ number_format($prod->price, 2, '.') }}
                                    </p>
                                    <form method="POST"
                                        action="{{ route('carts.addCart', ['pid' => $prod->id, 'uid' => $users[0]->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="number" id="addtocart" name="qty" min="0"
                                            max="{{ $prod->qty }}"
                                            class="btn btn-block border border-outline-primary" style="width: 70%"
                                            value="0">
                                        <button type="submit" class="btn btn-success me-auto" id="submit"
                                            style=""><span class="bi bi-cart"></span></button>
                                    </form>

                                    <p class="py-2">In Stock: {{ $prod->qty }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    No Item
                @endforelse
            </div>
        </div>
    </section>
</body>

</html>
