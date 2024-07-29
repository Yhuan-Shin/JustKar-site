
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
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
                                            <button class="btn btn-outline-dark" data-bs-target="#sidebar" data-bs-toggle="collapse"><i class="bi bi-list bi-lg py-2 p-1"></i> Menu</button>

                                        </div>
                                        <div class="col text-end m-2">
                                            <i class="bi bi-person-circle"></i>
                                            <span class="d-none d-sm-inline text-dark mx-1"> {{ Auth::guard('admin')->user()->name }}</span>
                                        </div>
                                        <h1>Dashboard</h1>
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
                                
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div class="row">
                                                <!-- card -->
                                            <div class="col-md-4 mb-2">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title"><i class="fs-3 bi bi-basket justify-content-center"></i>
                                                                Daily Sales</h5>
                                                                <div class="col-12 text-dark p-2 m-2 rounded-2">
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col d-flex justify-content-start align-items-center">
                                                                                <h6>0,000</h6>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                                      
                                                        </div>
                                                    </div>
                                            </div>
                                                <!-- card -->
                                                <div class="col-md-4 mb-2">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">Purchase Overview(Category, Brand)</h5>
                                                            <p class="card-text">Analyze the purchasing trends across various categories and brands. This overview provides insights into the most popular items and their respective brands.</p>
                                                        </div>
                                                    </div>
                                            </div>
                                                <!-- card -->
                                                <div class="col-md-4 mb-2">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <h5 class="card-title">No. Sold Tires</h5>
                                                            <p class="card-text">Track the number of tires sold within a specified period. This metric helps in understanding the demand and supply dynamics in the tire market.</p>
                                                        </div>
                                                    </div>
                                            </div>
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
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
