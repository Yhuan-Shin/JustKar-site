<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <!-- sidebar -->
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark collapse collapse-horizontal show border-end" id="sidebar">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <div class="container">
                       <div class="row">
                            <div class="col d-flex align-items-center">
                                <a href="/admin/home" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                                <div class="container">
                                    <img src="/images/logo.png" alt="" style="width: 60px; height: 60px">
                                </div>
                            </a>
                            </div>
                     
                       </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 p-3">
                                <div class="card bg-dark">
                                    <div class="card-body">
                                        <h5 class="card-title">Overview</h5>
                                        <p class="card-text">
                                            In Stock<br>
                                            @if ($quantity > 0)
                                                {{$quantity}}
                                            @endif

                                        </p>
                                        <p class="card-text fw-bold">
                                            By Category
                                        </p>
                                        <p class="card-text">
                                            Offroad 20<br>
                                            Performance 20<br>
                                            All terain 20<br>
                                        </p>
                                        <hr>
                                        <p class="card-text">
                                           Set Critical Level<br>

                                           <form action="{{ route('inventory.critical')}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                               <input type="number"class="form-control mb-2 " name="critical_level" id="critical_level" min="0" max="100" value="0">

                                               <input type="submit" class="btn btn-outline-light" value="Set">
                                           </form>
                                        </p>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <a href="/admin/home"><button type="button" class="btn btn-outline-secondary col-md-12 mb-3 text-white"><i class="bi bi-arrow-return-left"></i>     Back to Home</button>
                    </a>
                    <hr>
                    
                    <button type="button" class="btn btn-outline-light col-md-12 mb-3"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  
                </div>
            </div>
   </div>
    
            <!-- content -->
            <div class="col">
                <div class="container">
                    <div class="row-md-12">
                        <div class="col-md-12">
                            <div class="container">
                                <div class="row">
                                    <div class="col m-2">
                                        <button class="btn btn-outline-dark" data-bs-target="#sidebar" data-bs-toggle="collapse"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</button>

                                    </div>
                                    <div class="col text-end m-2">
                                        <i class="bi bi-person-circle"></i>
                                        <span class="d-none d-sm-inline text-dark mx-1"> Admin</span>
                                    </div>
                                <h1>Inventory Management System</h1>

                                </div>
                            <div class="container m-3">
                                <div class="row align-items-center">
                                    <div class="col-md-1 col-sm-2">
                                        <h5>Instock</h5>
                                    </div>
                                    <div class="col-md-3 col-sm-4">
                                        <form class="form" type="get" method="GET" action="{{ route('inventory.display')}}">
                                            <input class="form-control" name="search" id="search"  type="search" placeholder="Search" aria-label="Search">
                                            
                                    </div>
                                    <div class="col-md-2 col-sm-2 p-2">
                                         <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                                        </form>
                                    </div>
                              
                                    <div class="col-md-3">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Filter By
                                            </button>
                                           {{-- drop down filter menu --}}
                                           <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="{{ route('inventory.display', ['filter' => 'all'])}}">All</a></li>
                                            <li><a class="dropdown-item" href="{{ route('inventory.display', ['filter' => 'instock'])}}">In stock</a></li>
                                            <li><a class="dropdown-item" href="{{ route('inventory.display', ['filter' => 'lowstock'])}}">Low stock</a></li>
                                            <li><a class="dropdown-item" href="{{ route('inventory.display', ['filter' => 'outofstock'])}}">Out of stock</a></li>
                                           </ul>
                                          </div>
                                    </div>
                                    {{-- modal create product --}}
                                   @include('components/inventory/inventory_add')
                                    {{-- end modal --}}

                                    {{-- modal update product --}}
                                    @include('components/inventory/inventory_update')
                                    {{-- end modal --}}
                                    
                                   {{-- success add message --}}
                                   @if(session()->has('success'))
                                   <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>
                                  @endif
                                  {{-- end --}}



                                    <div class="col p-2">
                                        <button class="btn btn-outline-success" type="submit" data-bs-target="#add-product" data-bs-toggle="modal"><i class="bi bi-plus-circle"></i> Add Product</button>
                                    </div>
                            <div class="table-responsive">
                                <!-- table -->
                                <table class="table table-hover table-striped ">
                                    <thead>
                                      <tr>
                                        <th scope="col">Product_Code</th>
                                        <th scope="col">Product_Name</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Size</th>
                                        <th scope="col">Actions</th>

                                      </tr>
                                    </thead>
                                    <tbody>
                                      {{-- row --}}
                                      @foreach($inventory as $item)
                                      <tr>
                                          <td>{{ $item->product_code }}</td>
                                          <td>{{ $item->product_name }}</td>
                                          <td>{{ $item->category }}</td>
                                          <td>{{ $item->quantity }}</td>
                                          <td>
                                            @if($item->quantity == 0)
                                            <span class="badge bg-danger">Out of Stock</span>
                                            @elseif($item->quantity <= $item->critical_level)
                                            <span class="badge bg-warning">Low Stock</span>
                                            @elseif($item->quantity > $item->critical_level)
                                            <span class="badge bg-success">In Stock</span>
                                            @endif
                                          </td>
                                          <td>{{ $item->brand }}</td>
                                          <td>{{ $item->size }}</td>
                                          <td>
                                            <button type="button" class="btn btn-outline-success" data-bs-target="#modal-update{{ $item->id}}" data-bs-toggle="modal" value="{{ $item->id }}"><i class="bi bi-pencil-square"></i>Edit</button>

                                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger "> <i class="bi bi-trash"></i>Delete</button>
                                            </form>
                                          </td>
                                      </tr>
                                      @endforeach
                                    
                             
                                    </tbody>
                                  </table>
                                <!--  end table -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content -->
        </div>
        </div>
        </div>
    <!-- End of sidebar -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
