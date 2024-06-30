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
                                <a href="admin_side.html" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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
                                            In Stock<br>256
                                        </p>
                                        <p class="card-text fw-bold text-danger">
                                            By Category
                                        </p>
                                        <p class="card-text">
                                            Offroad 20<br>
                                            Performance 20<br>
                                            All terain 20<br>
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
                                        <form class="form">
                                            <input class="form-control"  type="search" placeholder="Search" aria-label="Search">
                                            
                                          </form>
                                    </div>
                                    <div class="col-md-2 col-sm-2 p-2">
                                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>

                                    </div>
                              
                                    <div class="col-md-3">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                              Filter By
                                            </button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="#">Instock</a></li>
                                              <li><a class="dropdown-item" href="#">Low Stock</a></li>
                                              <li><a class="dropdown-item" href="#">Out of Stock</a></li>
                                            </ul>
                                          </div>
                                    </div>
                                    {{-- modal create product --}}
                                   @include('components.inventory_add')
                                   @include('components.inventory_update')

                                   {{-- end modal --}}

                                    {{-- modal update product --}}
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
                                        <button class="btn btn-outline-dark" type="submit" data-bs-target="#add-product" data-bs-toggle="modal">Add Product</button>
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
                                          <td></td>
                                          <td>{{ $item->brand }}</td>
                                          <td>{{ $item->size }}</td>
                                          <td>
                                            <button type="button" class="btn btn-primary" data-bs-target="#modal-update{{ $item->id}}" data-bs-toggle="modal" value="{{ $item->id }}">Edit</button>

                                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
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
