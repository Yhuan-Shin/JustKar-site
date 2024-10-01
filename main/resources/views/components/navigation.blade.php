<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
    <li>
        <a href="/admin/dashboard" class="nav-link px-0 align-middle text-decoration-none">
            <i class="fs-4 bi bi-house-door-fill" style="color: white"></i> <span class="ms-1 d-none d-sm-inline text-white">Dashboard</span> 
        </a>

    </li>
    <li>
        <a href="/admin/products" class="nav-link px-0 align-middle">
            <i class="fs-4 bi bi-bag-check-fill" style="color: white"></i> <span class="ms-1 d-none d-sm-inline text-white">Products</span>
        </a>
    </li>
    <li>                           
        <a href="/admin/sales" class="nav-link px-0 align-middle">
            <i class="fs-4 bi bi-receipt-cutoff" style="color: white"></i> <span class="ms-1 d-none d-sm-inline text-white">Sales Logs</span>
        </a>
    </li>
    <li>                           
        <a href="/admin/user_management" class="nav-link px-0 align-middle">
            <i class="fs-4 bi bi-person-fill-add" style="color: white"></i> <span class="ms-1 d-none d-sm-inline text-white">User Management</span>
        </a>
    </li>
    <li>                           
        <a href="/admin/announcements" class="nav-link px-0 align-middle">
            <i class="fs-4 bi bi-megaphone-fill" style="color: white"></i> <span class="ms-1 d-none d-sm-inline text-white">Announcements</span>
        </a>
    </li>
    <li>                           
        <a href="/admin/inventory" class="nav-link px-0 align-middle">
            <i class="fs-4 bi bi-box-seam-fill" style="color:white"></i> <span class="ms-1 d-none d-sm-inline text-white">Inventory</span>
        </a>
    </li>
    <li>
        <a href="{{ route('admin.logout') }}" class="nav-link px-0 align-middle col-md-12">
           <button class="btn btn-outline-light col-md-12 d-flex align-items-center">
            <i class="fs-4 bi bi-box-arrow-right" style="color: white"></i> <span class="ms-1 d-none d-sm-inline text-white">Logout</span>
           </button>
        </a> 
    </li>
</ul>