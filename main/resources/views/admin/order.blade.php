
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
    @include('components/customer-modal')

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
                    
                    <button type="button" class="btn btn-outline-light col-md-12 mb-3"><i class="bi bi-box-arrow-right"></i> Logout</button>
                  
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
                                            <span class="d-none d-sm-inline text-dark mx-1"> Admin</span>
                                        </div>
                                        <h1>Orders</h1>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="container ">
                                        <div class="row">
                                            <div class="col">
                                                <div class="card p-3 mb-2" style="width: 14rem;">
                                                    <img src="/images/wheel1.png" class="card-img-top img-fluid" alt="..." width="100px" height="100px">
                                                    <div class="card-body">
                                                      <h5 class="card-title">Wheel 1</h5>
                                                      <p class="card-text">Details of the wheel</p>
                                                      <div class="container d-flex justify-content-center">
                                                        <a href="#" class="btn btn-success">Add</a>

                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col">
                                                <div class="card p-3 mb-2" style="width: 14rem;">
                                                    <img src="/images/wheel1.png" class="card-img-top img-fluid" alt="..." width="100px" height="100px">
                                                    <div class="card-body">
                                                      <h5 class="card-title">Wheel 1</h5>
                                                      <p class="card-text">Details of the wheel</p>
                                                      <div class="container d-flex justify-content-center">
                                                        <a href="#" class="btn btn-success">Add</a>

                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col">
                                                <div class="card p-3 mb-2" style="width: 14rem;">
                                                    <img src="/images/wheel1.png" class="card-img-top img-fluid" alt="..." width="100px" height="100px">
                                                    <div class="card-body">
                                                      <h5 class="card-title">Wheel 1</h5>
                                                      <p class="card-text">Details of the wheel</p>
                                                      <div class="container d-flex justify-content-center">
                                                        <a href="#" class="btn btn-success">Add</a>

                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col">
                                                <div class="card p-3" style="width: 14rem;">
                                                    <img src="/images/wheel1.png" class="card-img-top img-fluid" alt="..." width="100px" height="100px">
                                                    <div class="card-body">
                                                      <h5 class="card-title">Wheel 1</h5>
                                                      <p class="card-text">Details of the wheel</p>
                                                      <div class="container d-flex justify-content-center">
                                                        <a href="#" class="btn btn-success">Add</a>
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
    </div>
    <!-- End of sidebar -->
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
