

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JustKar</title>
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css
    ">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">  

</head>
<body>
   
            <!-- Navbar -->
      
        <nav class="navbar fixed-top navbar-expand-lg bg-dark" id="navbar">
            <div class="container-fluid">
                <a href="/" class="navbar-brand px-3"><img src="/images/logo.png" alt="" width="50px" height="50px"></a>
                <button class="navbar-toggler btn btn-light" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navmenu">
                    <ul class="navbar-nav text-center">
                        <li class="nav-item px-3 ">
                            <a href="/" class="nav-link text-white " style="font-size: 16px;
                            font-weight: 500;">Back to Home</a>
                        </li>
                       
                      
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End of Navbar -->

        <div class="container mt-5">
            
            <div class="row  justify-content-center">

                <div class="col-lg-12 mt-5">
                    <div class="dropdown  mb-3 float-end">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Change Car Type
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#" onclick="changeIframe('sedan')">Sedan</a></li>
                          <li><a class="dropdown-item" href="#" onclick="changeIframe('suv')">SUV</a></li>
                          <li><a class="dropdown-item" href="#" onclick="changeIframe('hatchback')">Hatchback</a></li>
                          <li><a class="dropdown-item" href="#" onclick="changeIframe('pickup')">Pickup Truck</a></li>

                        </ul>
                      </div>

                    <div class="container d-flex justify-content-center">
                        
                        {{-- car --}}
                        <div class="frame-container d-flex justify-content-center">
                            <iframe id="vehicle-image" class="alcar_bb" src="https://bbimg.alcar-wheels.com/viewer.php?alclcs=2a92444ee73079a6a15b61fb8d7ba0a6&amp;lng=en&amp;dtlcs=Zu4bIeKkeZIFAq5Qk82L7QwgDbqs2oXw&amp;fbld=F1296&amp;rbld=R020-99&amp;zoll=18&scene=none" width="100%" height="500px" scrolling="no" ></iframe>
                        </div>

                    </div>
                </div>       
             </div>
             <div class="row">
                
                <div class="container d-flex justify-content-center p-3 bg-light">
                    <div id="image-list">
                        @include('components/wheels')
                      </div>
                    
                </div>
             </div>
        </div>
        <script>
            function changeIframe(vehicleType) {
              const iframe = document.getElementById('vehicle-image');
              let src = '';
          
              switch(vehicleType) {
                case 'sedan':
                  src = 'https://bbimg.alcar-wheels.com/viewer.php?alclcs=2a92444ee73079a6a15b61fb8d7ba0a6&amp;lng=en&amp;dtlcs=Zu4bIeKkeZIFAq5Qk82L7QwgDbqs2oXw&amp;fbld=F1296&amp;rbld=R020-99&amp;zoll=18&scene=none';
                  break;
                case 'suv':
                  src = 'https://bbimg.alcar-wheels.com/configurator_blackbox/bbviewer.php?alclcs=2a92444ee73079a6a15b61fb8d7ba0a6&lng=en&dtlcs=Zu4bIeKkeZIFAq5Qk82L7QwgDbqs2oXw&fbld=F1910&rbld=R021-150&zoll=20&bck=';
                  break;
                case 'hatchback':
                  src = 'https://bbimg.alcar-wheels.com/configurator_blackbox/bbviewer.php?alclcs=2a92444ee73079a6a15b61fb8d7ba0a6&lng=en&dtlcs=Zu4bIeKkeZIFAq5Qk82L7QwgDbqs2oXw&fbld=F1776&rbld=R020-99&zoll=18&bck=';
                  break;
                case 'pickup':
                  src = 'https://bbimg.alcar-wheels.com/configurator_blackbox/bbviewer.php?alclcs=2a92444ee73079a6a15b61fb8d7ba0a6&lng=en&dtlcs=Zu4bIeKkeZIFAq5Qk82L7QwgDbqs2oXw&fbld=F2046&rbld=R021-150&zoll=20&bck=';
                  break;
              }
          
              iframe.src = src;
            }
          </script>
        <script src="/script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js
"></script>  
</body>
</html>
