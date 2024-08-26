
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
                        <div class="col-md-8">
                            <div class="container">
                                <div class="row mt-3">
                        
                                        <div class="col text-end m-2">
                                            <i class="bi bi-person-circle"></i>
                                            <span class="d-none d-sm-inline text-dark mx-1">
                                                @if (Auth::check())
                                                    <span class="d-none d-sm-inline text-dark mx-1">{{ Auth::user()->name }}</span>
                                                @else
                                                    <span class="d-none d-sm-inline text-dark mx-1">Guest</span>
                                                @endif

                                            </span>
                                        </div>
                                        {{-- logout --}}
                                        <div class="col">
                                            <a href="{{ route('cashier.logout') }}">
                                                <button class="btn btn-outline-dark col-md-4">Logout</button>
                                            </a>
                                        </div>
                   
                                     
                                </div>
                                {{-- @if (session('success')) --}}
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
                                        <div class="col-md d-flex justify-content-center">
                                            {{-- card --}}
                                            <div class="card p-3 mb-2" style="width: 14rem;">
                                                <div class="card-body"> 
    
                                                    <img src="{{asset('uploads/product_images/'.$item->product_image)}}" class="card-img-top" alt="...">
    
                                                    <h5 class="card-title">{{$item->product_name}}</h5>
                                                    <p class="card-text">Category: {{ $item->category }}</p>
                                                    {{-- <p class="card-text">Brand: {{$item->brand }}</p> --}}
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
                        <div class="col-md-4 bg-light mt-2 p-3">
                            <h4 class="text-center mt-5"> <i class="bi bi-bag-fill"></i> Orders</h4>
                            @if($orderItems->count() > 0)
                            @foreach($orderItems as $item)
                                <div class="row mb-4">
                                    {{-- <div class="col-md-3">
                                        <img src="{{ asset('uploads/product_images/'.$item->product->product_image) }}" class="img-fluid">
                                    </div> --}}
                                    <div class="col-md p-3">
                                        <h5>{{ $item->product_name }}</h5>
                                        <p>Price: {{ $item->price}}</p>
                                        <p>Total Price: {{$item->total_price}}</p>
                                        <p>Size: {{ $item->size }}</p>
                                            <div class="row">
                                                <div class="col">
                                                      {{-- edit quantity --}}
                                                        <form action="{{ route('order.update', $item->id) }}" method="POST" class="col-6">
                                                            @csrf
                                                            @method('PUT')
                                                            <label for="quantity">Quantity:</label>                        
                                                            
                                                            <div class="row">
                                                                <div class="col">
                                                                    {{-- <input type="number" class="form-control col-3 mb-2" min="1" name="quantity" value="{{ $item->quantity }}"> --}}

                                                                    <div class="input-group mb-3 col-3">
                                                                        <input type="number" name="quantity" class="form-control col-3" value="{{ $item->quantity }}" min="1" >
                                                                        <button class="btn btn-primary" type="submit" ">Set</button>
                                                                      </div>
                                                                </div>

                                                            </div>
                                                </form>
                                                </div>
                                                    {{-- delete from the cart    --}}
                                                <form action="{{route('order.destroy', $item->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger float-end">Delete</button>

                                                </form>
                                           
                                        
                                        </div>
                                    </div>
                                    <hr>
                            @endforeach
                        @else
                            <h6 class="text-center text-danger"> <i class="bi bi-exclamation-circle-fill"></i> Your cart is empty</h6>
                        @endif

                        @if($orderItems->count() > 0)
                        <form action="{{route('order.checkout')}}" method="post">
                            @csrf
                            @method('POST')
                            <button type="submit" class="btn btn-primary float-end"> <i class="bi bi-bag-check-fill"></i> Checkout</button>
                        </form>
                    @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- End of sidebar -->
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
