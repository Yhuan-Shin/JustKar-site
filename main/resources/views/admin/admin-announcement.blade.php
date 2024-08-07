
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Announcements</title>
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
    c                                        </div>
                                        <h1>Create Announcements</h1>
                                </div>
                                <div class="row">
                                    <div class="container">
                                        <div class="row d-flex justify-content-center ">
                                            <div class="col-md-12 mb-2 ">
                                                @include('components/announcement/add-announcement')  
                                                @include('components/announcement/update')        
      
                                                <button type="button" class="btn btn-outline-success float-end" data-bs-target="#announcement" data-bs-toggle="modal">Create Announcement</button>                                  
                                            </div>
                                          
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Content</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                          </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($announcements as $announcement)
                                          <tr>
                                            <td>{{$announcement->title}}</td>
                                            <td>{{$announcement->content}}</td>
                                            <td><img src="{{asset('uploads/images/'.$announcement->image)}}" alt="" width="150px" height="100px"></td>
                                            <td>
                                                <button type="button" class="btn btn-outline-success" data-bs-target="#edit-announcement{{$announcement->id}}" data-bs-toggle="modal" value="{{ $announcement->id }}"><i class="bi bi-pencil-square"></i>Edit</button>
                                                <form action="{{route('announcement.destroy', $announcement->id)}}" method="POST" style="display: inline">
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
