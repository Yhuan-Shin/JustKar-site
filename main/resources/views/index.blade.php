

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustKar</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
    ">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  

</head>
<body>
   
            <!-- Navbar -->
        <nav class="navbar navbar-expand-lg bg-dark fixed-top" id="navbar">
            <div class="container-fluid">
                <a href="/" class="navbar-brand px-3">
                    <img src="/images/logo.png" alt="" width="50px" height="50px">
                </a>
                <button class="navbar-toggler btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navmenu">
                    <ul class="navbar-nav text-center ">
                        <li class="nav-item px-3">
                            <a href="#main" class="nav-link text-white " style="font-size: 14px;
                            font-weight: 500;">Home</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#services" class="nav-link text-white " style="font-size: 14px; font-weight: 500;">Services</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="#announcement" class="nav-link text-white" style="font-size: 14px; font-weight: 500;">Announcements</a>
                        </li>
                      
                        <li class="nav-item px-3">
                            <a href="#about" class="nav-link text-white" style="font-size: 14px; font-weight: 500;">About</a>
                        </li>
                        <li class="nav-item px-3">
                            <a href="/customize" class="nav-link text-white" style="font-size: 14px; font-weight: 500;">Customize</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End of Navbar -->
           
        </div>
       
        @include('components/contact')
        <!-- location modal -->
        <div class="modal fade" id="location" tabindex="-1" aria-labelledby="location" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Google Maps Location</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="col-12 maps">
                      <div class="container d-flex justify-content-center">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15430.71906238833!2d121.07166300000002!3d14.787059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397af8c44e3ec6f%3A0xc622d68e8f4b3c46!2sJustkar%20Tyre%20Supply!5e0!3m2!1sen!2suk!4v1715936372827!5m2!1sen!2suk" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                      </div>
                     </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-danger" onclick="window.location.href='https://maps.app.goo.gl/ttSPY8VqYe9C3UhK8'">View</button>
                </div>
              </div>
            </div>
          </div>
        <!-- end modal -->
        
        <!-- content -->
     
        <section id="main" style="background-image: url(/images/background.png); background-size: cover; background-position: center; height: 100vh">
        <div class="container p-3">
       
            <div class="row d-flex align-items-center" style="height: 100vh">
                <div class="col-md-6 mt-5 py-2">
                        <h1 class="text-uppercase text-light py-2" id="title">
                    
                            We are here to fix your <span style="color: rgb(220,53,69);">tires</span></h1>
                        <button type="button" class="btn btn-danger fw-bold" data-bs-toggle="modal" data-bs-target="#contact"><i class="bi bi-gear-fill"></i> See Services</button>
                        <button type="button" class="btn btn-dark m-2 fw-bold" data-bs-toggle="modal" data-bs-target="#location"><i class="bi bi-geo-alt-fill"></i> Location</button>
                        <p class="text-light mt-3"> 
                            Experience the difference with JustKar Tire Supply. Whether you're looking for performance upgrades, replacements, or seasonal switches, we've got everything you need to keep your wheels turning smoothly.
                          </p>
                </div>
               
            </div>
            <div class="container">
                
                  
                <div class="row justify-content-center">        
                 
                        
                       
                </div>
            </div>
        </div>
    </section>
    <!-- SERVICES -->
    <section id="services" style="height: 100vh">
        <!-- main content -->
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <h4 class="text-uppercase text-dark text-center text-dark fw-bold">OUR <span style="color: rgb(220,53,69);">SERVICES</span></h2>
                    </div>  
                </div>  

                        <div class="row mt-5 ">
                            <div class="col-md-4 d-flex justify-content-center mb-2">
                                <div class="card" style="width: 18rem;">
                                    <img src="/images/1.jpg" class="card-img-top p-4" alt="..." height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">Tire Sales</h5>
                                      <p class="card-text">Purchase high-quality tires from top brands.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center mb-2">
                                <div class="card" style="width: 18rem;">
                                    <img src="/images/4.jpg" class="card-img-top p-4" alt="..." height="250px">
                                    <div class="card-body">
                                      <h5 class="card-title">Wheel Sales</h5>
                                      <p class="card-text">Get the best wheels for your vehicle from our selection of top brands.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center mb-2">
                                <div class="card" style="width: 18rem;">
                                    <img src="/images/2.jpg" class="card-img-top p-4" alt="..." height="250px" >
                                    <div class="card-body">
                                      <h5 class="card-title">Tire Services</h5>
                                      <p class="card-text">From tire mounting to wheel balancing, we've got you covered.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
               </section>
           <!-- END SERVICES -->
    <!-- customize -->
    {{-- announcement --}}
    <section id="announcement">
        <div class="container">
            <div class="row text-dark">
                <div class="col-md-12">
                    <h4 class="text-center fw-bold text-uppercase">Announcement</h4>
                    <div class="p-3">
                        <div id="announcementsCarousel" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @if ($announcements->isEmpty())
                                    <div class="carousel-item active">
                                        <div class="card" style="width: 18rem; margin: auto;">
                                            <div class="card-body">
                                                {{-- alert --}}
                                                <div class="alert alert-danger" role="alert">
                                                    <h4 class="alert-heading">There's no announcement available</h4>
                                                    <p>Stay updated with the latest announcements</p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    @foreach ($announcements as $index => $announcement)
                                        <div class="carousel-item @if ($index == 0) active @endif">
                                            <div class="card" style="width: 18rem; margin: auto;">
                                                <img src="{{ asset('uploads/images/' . $announcement->image) }}" class="card-img-top img-fluid p-3" alt="image">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $announcement->title }}</h5>
                                                    <p class="card-text">{{ $announcement->content }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @if (!$announcements->isEmpty())
                                <a class="carousel-control-prev" href="#announcementsCarousel" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#announcementsCarousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            @endif
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

    </section>
    {{-- end announcement--}}

    <!-- ABOUT -->
        <!-- modal about -->
        <div class="modal fade" id="modal-about" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title " id="exampleModalLabel">About Us</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h6>Mission</h6>
                        <p>At JustKar, our mission is to be the trusted partner for all your tire needs, providing top-quality products, exceptional service, and unmatched expertise. We are committed to exceeding customer expectations, fostering long-term relationships, and contributing positively to the communities we serve.</p>
                        <h6>Vision</h6>
                        <p>Our vision at JustKar is to be the premier destination for tires, known for our unwavering dedication to quality, innovation, and customer satisfaction. We aim to continually evolve and expand our offerings, embracing new technologies and industry advancements, while remaining true to our core values of integrity, excellence, and reliability. Together, we strive to drive safer, smoother journeys for our customers, today and into the future.</p>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- end modal about-->
        <section id="about" class="bg-light">
            <div class="container p-3">
                <div class="row justify-content-center align-items-center">
                    <div class="col-md text-center ">
                        <h4 class="text-dark fw-bold text-uppercase">ABOUT <span class="text-danger">us</span></h5>
                        <p class="text-dark">
                            At JustKar, we're passionate about providing high-quality tires and exceptional service to our customers. With years of experience in the tire industry, we've built a reputation for reliability, and expertise.
                            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#modal-about">Read More</button>
                        </p>
                    </div>
                    <div class="col">
                        <div class="container d-flex justify-content-center">
                            <img src="/images/about.png" alt=""  width="400px" height="200px">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-md d-flex justify-content-center">
                       
                    </div>
                </div>
            </div>

        </section>
        
    <!-- END ABOUT -->
    <!-- Footer -->
        <footer class="footer py-3 bg-dark">
                <div class="container">
                    
                    <div class="row justify-content-center text-white">
                        <div class="col">
                            <p class="text-start text" style="font-size: 14px;">Tandoc Street Pecson Ville Subdivision,<br> San Jose del Monte, Philippines</p>
                        </div>
                        <div class="col">
                            <p class="text-center text"  style="font-size: 14px;">Phone: (+63) 9123456789</p>
                        </div>
                        <div class="col">
                            <p class="text-center text" style="font-size: 14px;">Email: justkar@gmail.com</p>
                        </div>
                        <div class="col d-flex justify-content-center">
                           <a href="https://www.facebook.com/JustKarTireSupply"><i   class="bi bi-facebook m-2 p-3" style="font-size: 30px; color:white;"></i></a>
                           <a href="https://www.instagram.com/justkartiresupply/"><i class="bi bi-instagram m-2 p-3" style="font-size: 30px; color: white;"></i></a>
                    </div>
                </div>  
                <div class="container">
                    <div class="row text-white">
                        <div class="col">
                            <p class="text-start text text-center" style="font-size: 16px;">Terms and Conditions   |   Data Privacy</p>
                            <p class="text-start text text-center" style="font-size: 16px;">© Copyright 2024 - All Rights Reserved</p>
                        </div>
                    </div>
                </div>        
        </footer>
        <!-- End of Content -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="/script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>  
</body>
</html>
