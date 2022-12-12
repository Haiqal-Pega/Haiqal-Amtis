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
                            <li class="nav-item"><a class="nav-link " href="{{-- {{ route('users.profile') }} --}}">Welcome,
                                    {{ $users->firstName }}</a>
                            </li>
                            <li class="nav-item"><a class="nav-link disabled" href="#">&nbsp; |&nbsp;</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page"
                                    href="{{ route('users.catalogue', ['uid' => $users->id]) }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active"
                                    href="{{ route('carts.index', ['uid' => $users->id]) }}">Wishlist</a>
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
    <div class="container border border-outline-info">
        <table class="table table-hover">
            <tr>
                <th>No.</th>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price(RM)</th>
                <th>Quantity</th>
            </tr>
            @forelse ($carts as $key => $cart)
                <tr>
                    <td>{{ (int) $key + 1 }}</td>
                    <td><img src="{{ url('/imgprod/' . $cart->img . '') }}" alt="{{ $cart->img }}"
                            style="max-width: 135px"></td>
                    <td>{{ $cart->name }}</td>
                    <td>{{ $cart->price }}</td>
                    <td>{{ $cart->cqty }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center h5 py-5">Nothing Here? Go to <b><a href="{{ route('users.catalogue', ['uid' => $users->id]) }}">Catalogue</a></b>  and Shop!</td>
                </tr>
            @endforelse
        </table>
    </div>

</body>

</html>
