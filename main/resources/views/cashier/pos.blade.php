
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

    <nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="{{ asset('images/logo.png') }}" alt="" style="width: 60px; height: 60px"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item">
                <a class="nav-link text-white text-center" href="#"> 
                    <i class="bi bi-person-circle"></i>
                    <span class="text-white">
                        @if (Auth::check())
                            <span class="mx-1 ">{{ Auth::user()->name }}</span>
                        @else
                            <span class="mx-1">Guest</span>
                        @endif
    
                    </span>
                </a>
              </li>
              <li class="nav-item d-flex justify-content-center">
                <a href="{{ route('cashier.logout') }}">
                    <button class="btn btn-outline-light col-md ">Logout</button>
                </a>              
              </li>
            </ul>
          </div>
        </div>
      </nav>     <div class="container-fluid">
            <!-- content -->                  
            {{-- <div class="col text-end m-2">
               
            </div>
            <div class="col">
                <a href="{{ route('cashier.logout') }}">
                    <button class="btn btn-outline-dark col-md-4">Logout</button>
                </a>
            </div> --}}

            <div class="col">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-8 ">
                            <div class="container">
                                <div class="row mt-3">

                   
                                     
                                </div>
                                @foreach($orderItems as $item)
                                    <div class="modal fade" id="modal-delete{{ $item->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this item from the cart?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('order.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"  class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
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
                                    
                                {{-- display product --}}
                                <div class="row mt-3">
                                  <div class="row ">
                                    @forelse ($inventory as $item)
                                        <div class="col-md">
                                            {{-- card --}}
                                            <div class="card mb-2 text-center text-uppercase" style="width: 14rem;">
                                                <div class="card-body"> 
    
                                                    @if($item->product_image == null)
                                                    <p class="alert alert-danger">No Image</p>
                                                   @elseif($item->product_image != null)
                                                   <img src="{{asset('uploads/product_images/'.$item->product_image)}}" class="card-img-top" alt="..."style="height: 70px; width: 70px">
                                                   @endif
   
                                                   <h5 class="card-title">{{$item->product_name}}</h5>
                                                       @if($item->quantity == 0)
                                                       <span class="badge bg-danger">Out of Stock</span>
                                                       @elseif($item->quantity <= $item->critical_level)
                                                       <span class="badge bg-warning">Low Stock <span class="badge bg-dark">{{$item->quantity}}</span></span>
                                                       @elseif($item->quantity > $item->critical_level)
                                                       <span class="badge bg-success">In Stock <span class="badge bg-dark">{{$item->quantity}}</span></span>
                                                       @endif
                                                       {{-- get the quantity --}}


                                                       <div class="container">
                                                        <div class="row mb-2">
                                                            <div class="col-md-4">
                                                                <p class="card-text">{{ $item->category }}</p>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <p class="card-text">{{ $item->size }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-2 border rounded">
                                                            <div class="col">
                                                                <p class="card-text">{{ $item->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container d-flex justify-content-center">
                                                       <div class="row">
                                                        <div class="col">
                                                             @if($item->price == null)
                                                            <p class="alert alert-danger">No Price Set</p>
                                                            @elseif($item->price != null)
                                                            <p class="card-text text-start">₱{{ $item->price }}</p>
                                                            @endif
                                                        </div>
                                                        <div class="col">
                                                            <form action="{{ route('order.store', $item->id) }}" method="POST">
                                                                @csrf
                                                                    <button type="submit" class="btn btn-primary" >Add</button>
                                                            </form>
                                                        </div>
                                                
                                                       </div>
                                                </div>
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

                        {{-- display orders --}}
                        <div class="col-md-4 bg-light mt-2 p-3 rounded float-end">
                            <h4 class="text-center mt-5"> <i class="bi bi-bag-fill"></i> Orders</h4>
                        @if($orderItems->count() > 0)
                            @foreach($orderItems as $item)
                                <div class="row mb-4">
                                    <div class="col-md p-3 text-uppercase" >
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-text text-start fw-bold">{{ $item->product->product_name }}</p>
                                                </div>
                                                <div class="col">
                                                    <p class="card-text text-end badge bg-primary">₱{{ $item->product->price }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col">
                                                    <p class="card-text text-start">{{ $item->size}}</p>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col">
                                                    <p class="card-text text-start">TOTAL PRICE: </p>
                                                </div>
                                                <div class="col">
                                                    <p class="card-text text-end badge bg-primary">{{ $item->quantity }} x ₱{{ $item->total_price }}</p>
                                                </div>
                                        </div>
                                        <div class="row mt-3">
                                                <div class="col">
                                                      {{-- edit quantity --}}
                                                        <form action="{{ route('order.update', $item->id) }}" method="POST" class="col-md-8">
                                                            @csrf
                                                            @method('PUT')
                                                            <label for="quantity">Quantity:</label>                        
                                                            
                                                            <div class="row">
                                                                <div class="col">
                                                                    <div class="input-group mb-3 col-md-8">
                                                                        <button type="submit" name="decrement" value="1" class="btn btn-outline-secondary">-</button>
                                                                        <input type="number" id="quantity" name="quantity" class="form-control text-center" value="{{ $item->quantity }}" min="1" readonly>
                                                                        <button type="submit" name="increment" value="1" class="btn btn-outline-secondary">+</button>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                                <div class="col-md-4">
                                                                    <button class="btn btn-danger" type="button" data-bs-target="#modal-delete{{ $item->id}}" data-bs-toggle="modal">Delete</button>
                                                                </div>

                                                            </div>
                                                </div>
                                                    {{-- delete from the cart    --}}
                                             
                                        
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
