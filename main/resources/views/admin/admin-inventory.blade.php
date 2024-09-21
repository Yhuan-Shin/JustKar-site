<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @livewireStyles
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
                                <a href="/admin/inventory" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
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

                                       <livewire:inventory-instock/>
                                     
                                        
                                        <p> Set Critical Level<br></p>
                                           <form action="{{ route('inventory.critical')}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                           
                                            @if($inventory->isNotEmpty())
                                                <div class="input-group mb-3 col-3">
                                                    <input type="number" name="critical_level" class="form-control" min="1" value="{{ $inventory->first()->critical_level }}">
                                                    <button class="btn btn-primary" type="submit">Set</button>
                                                </div>
                                            @else
                                                <p>No items available.</p>
                                            @endif
                                            

                                           </form>
                            </div>
                    </div>
                    <a href="/admin/dashboard"><button type="button" class="btn btn-outline-secondary col-md-12 mb-3 text-white"><i class="bi bi-arrow-return-left"></i>  Back to Home</button>
                    </a>
                    <hr>
                    
                    <a href="{{ route('admin.logout') }}">
                        <button type="button" class="btn btn-outline-light col-md-12 mb-3"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </a>
                  
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
                                        <span class="d-none d-sm-inline text-dark mx-1"> {{ Auth::guard('admin')->user()->name }}</span>
                                    </div>
                                {{-- <h1>Inventory Management System</h1> --}}
                                </div>
            
                                

                                @if(session()->has('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                @endif
                                {{-- end --}}
                                <!-- Delete Confirmation Modal -->
                            @foreach($inventory as $item)
                                <div class="modal fade" id="modal-delete{{ $item->id }}" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this item?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('inventory.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="container m-3">
                                <div class="row align-items-center">
                                    
                                    {{-- modal create product --}}
                                   @include('components/inventory/inventory_add')
                                    {{-- end modal --}}

                                    {{-- modal update product --}}
                                    @include('components/inventory/inventory_update')
                                    {{-- end modal --}}
                                 
                                    
                                    
                                    @livewire('inventory-display')
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
    @livewireScripts
 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
