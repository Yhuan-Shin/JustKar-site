
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>

    <!-- sidebar -->
    <div class="container-fluid">
            <!-- content -->
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="container">
                                <div class="row">
                                        <div class="col m-2">

                                        </div>
                                        <div class="col text-end m-2">
                                            <i class="bi bi-person-circle"></i>
                                            <span class="d-none d-sm-inline text-dark mx-1"> Cashier</span>
                                        </div>
                                        <h1>Point of Sales</h1>
                                        <div class="container d-flex justify-content-end">
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cartModal">View Order</button>
                                        </div>
                                </div>
                                @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show mt-3">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                        
                                @if (session('error'))
                                    <div class="alert alert-danger  alert-dismissible fade show mt-3" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif
                        
                                <div class="row justify-content-center mt-3">
                                  <div class="row justify-content-center">
                                    @forelse ($inventory as $item)
                                        <div class="col-md-4 d-flex justify-content-center">
                                            {{-- card --}}
                                            <div class="card p-3 mb-2" style="width: 14rem;">
                                                <div class="card-body"> 
    
                                                    <img src="{{asset('uploads/product_images/'.$item->product_image)}}" class="card-img-top" alt="...">
    
                                                    <h5 class="card-title">{{$item->product_name}}</h5>
                                                    <p class="card-text">Category: {{ $item->category }}</p>
                                                    <p class="card-text">Brand: {{$item->brand }}</p>
                                                    <p class="card-text">Size: {{ $item->size }}</p>
                                                    <p class="card-text">Price: {{ $item->price }}</p>

                                                    <form action="{{ route('order.store', $item->id) }}" method="POST">
                                                        @csrf
                                                            <button type="submit" class="btn btn-primary" >Add</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        {{-- end card --}}
                                        
                                    @empty
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <i class="fs-4 bi bi-exclamation-circle-fill p-3"></i> No items in inventory
                                        </div>
                                    @endforelse
                                    </div>
                                    
                                </div>
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
    <!-- End of sidebar -->
    @include('components/cashier/cart')
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
