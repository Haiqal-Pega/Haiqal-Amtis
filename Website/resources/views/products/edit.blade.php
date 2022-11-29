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
        <div class="bg-info p-4 text-center text-white">
            <h2>WEBSITE</h2>
        </div>
    </header>
    <div class=".container px-2">
        <div class="row mt-3">
            <div class="col-2 p-2 " style="height: 100vh">
                <ul class="nav flex-column ">
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info py-2 mb-1"
                            href="{{ route('users.admin') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  btn btn-outline-info py-2 mb-1 active"
                            href="{{ route('products.admin') }}">Manage Product</a>
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
                <div class="col-md-8 col-12 m-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Product Form</h4>
                            <h6>Fill in the details</h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('products.update',$products->id) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            {{-- Field for product name --}}
                                            <div class="col-md-4 my-1">
                                                <label>Product Name</label>
                                            </div>
                                            <div class="col-md-8 mb-1 form-group">
                                                <input type="text" class="form-control" name="name"
                                                    value="{{ $products->name }}" readonly>
                                            </div>

                                            {{-- Field for Price --}}
                                            <div class="col-md-4 my-1">
                                                <label>Product Price (RM)</label>
                                            </div>
                                            <div class="col-md-8 mb-1 form-group">
                                                <input type="text" class="form-control" name="price"
                                                    value="{{ $products->price }}">
                                            </div>

                                            {{-- Field for Qty --}}
                                            <div class="col-md-4 my-1">
                                                <label>Product Quantity</label>
                                            </div>
                                            <div class="col-md-8 mb-1 form-group">
                                                <input type="text" class="form-control" name="qty"
                                                    value="{{ $products->qty }}">
                                            </div>

                                            {{-- Field for details --}}
                                            <div class="col-md-4 my-1">
                                                <label>Product Details</label>
                                            </div>
                                            <div class="col-md-8 mb-1 form-group">
                                                <textarea type="text" class="form-control" rows="3" name="details">{{ $products->details }}</textarea>
                                            </div>

                                            {{-- Field for image --}}
                                            <div class="col-md-4 my-1">
                                                <label>Product Picture</label>
                                            </div>
                                            <div class="col-md-8 mb-1 form-group">
                                                <input type="file" class="form-control" name="img">
                                                <p>Current Image File: {{ $products->img }}</p>
                                            </div>

                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
