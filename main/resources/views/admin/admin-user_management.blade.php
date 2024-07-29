
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Managament</title>
    <link rel="stylesheet" href="/style.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

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
            
                    @include('components/navigation')
                    
                    <hr>
                    
                    <a href="{{ route('admin.logout') }}">
                        <button type="button" class="btn btn-outline-light col-md-12 mb-3"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </a>
                    
                  
                </div>
            </div>
            <!-- content -->
     
            <div class="col">
                <div class="container">
                    
                    <div class="row">
                        <div class="col">
                            
                            <div class="container">
                                <div class="row">

                                        <div class="col m-2">
                                            <button class="btn btn-outline-dark" data-bs-target="#sidebar" data-bs-toggle="collapse"><i class="bi bi-list bi-lg py-2 p-1"></i>Menu</button>
                                        </div>
                                        
                                        <div class="col text-end m-2">
                                            <i class="bi bi-person-circle"></i>
                                            <span class="d-none d-sm-inline text-dark mx-1"> Admin</span>
                                        </div>
                                        <h1>User Management</h1>
                                        
                                </div>

                                <div class="row bg-light p-2 rounded">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col">
                                                {{-- content --}}
                                                <button type="button" class="btn btn-outline-success float-end mb-3" data-bs-target="#add-cashier" data-bs-toggle="modal"><i class=" py-2 bi bi-plus-circle"></i> Add Cashier</button>

                                                @if(session()->has('success'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                 {{ session('success') }}
                                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                               </div>
                                               @endif

                                               @if($errors->any())
                                               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                   {{ $errors->first('username') }}
                                                   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                               </div>
                                               @endif
                                               
                                                <table class="table table-hover table-striped table-responsive">

                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Username</th>
                                                            <th scope="col">Password</th>
                                                             <th scope="col">Date Created</th>
                                                            <th scope="col">Date Updated</th>
                                                            <th scope="col">Action</th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>                                                                                                        

                                                       @foreach ($cashiers as $cashier)

                                                       <tr>
                                                           <td>{{ $cashier->name }}</td>
                                                           <td>{{ $cashier->username }}</td>
                                                           <td>{{ $cashier->password }}</td>
                                                           <td>{{ $cashier->created_at->timezone('Asia/Manila')->format('h:i A, d/m/Y') }}</td>
                                                           <td>{{ $cashier->updated_at->timezone('Asia/Manila')->format('h:i A, d/m/Y') }}</td>
                                                           <td>
                                                            <button type="button" class="btn btn-outline-success" data-bs-target="#edit-cashier{{$cashier->id}}" data-bs-toggle="modal" value="{{ $cashier->id }}"><i class="bi bi-pencil-square"></i>Edit</button>

                                                            <form action="{{ route('cashier.destroy', $cashier->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-outline-danger "> <i class="bi bi-trash"></i>Delete</button>
                                                            </form>

                                                           </td>
                                                       </tr>
                                                       @endforeach

                                                    </tbody>
                                                </table>
                                             


                                            </div>
                                            
                                        </div>
                                        @include('components/user_management/add_cashier')

                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @include('components/user_management/cashier_update')
    <!-- End of sidebar -->
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

    
</body>

</html>
