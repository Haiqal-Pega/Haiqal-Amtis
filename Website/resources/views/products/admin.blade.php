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
    <header>
        @foreach ($users as $admin)
            <div class="bg-info p-4 text-center text-white">
                <h2>WEBSITE</h2>
                <h5>Welcome {{ $admin->firstName }}</h5>
                @php
                    $id = $admin->id;
                @endphp
            </div>
        @endforeach
    </header>
    <div class=".container px-2">
        <div class="row mt-3">
            <div class="col-2 p-2" style="height: 100vh">
                <ul class="nav flex-column ">
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info py-2 mb-1"
                            href="{{ route('users.admin', $id) }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info py-2 mb-1 active"
                            href="{{ route('products.admin',$id) }}">Manage Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info py-2 mb-1" href="#">Manager User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info py-2 mb-1" href="#">Logout</a>
                    </li>
                </ul>
            </div>
            <div class="col-10 p-2">
                <div class="row" id="table-hover-row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex">
                                <div class="position-relative">
                                    <h4 class="card-title">Product Management | List of Products</h4>
                                </div>
                                <div class="ms-auto">
                                    <a href="{{ route('products.create') }}" class="btn btn-outline-success">Add Product +</a>
                                </div>
                            </div>
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                {{-- Senarai Permohonan --}}
                                                <tr class="table-info">
                                                    <th class="text-center" width="5%">No.</th>
                                                    <th style="width: 20%">Name</th>
                                                    <th style="width: 15%">Price</th>
                                                    <th style="width: 13%">In Stock (Qty)</th>
                                                    <th class="text-center" style="width: 20%">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($products as $key => $product)
                                                    <tr>
                                                        <td class="text-center">{{ $key + $product->firstItem() }}</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="11" style="text-align: center">- No Product in the -</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="row mt-3">
                                        {{ $tempahan->appends([])->links() }}
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
