<div wire:poll.3000ms>
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">

            {{ session('success') }}
        </div>
        @endif

        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">

            {{ session('error') }}
        </div>
     @endif
        @if($inventory->isEmpty() && $search)
        <div class="alert alert-warning mt-4" role="alert">
            No results found for "{{ $search }}".
        </div>
         @endif
        <div class="row">
            <div class="col-md">
                <input type="checkbox" wire:model="selectAll"> Select All
            </div>
            <div class="col-md mb-2">
                <input type="text" wire:model="search" placeholder="Search product..." name="search" id="search" class="form-control">
            </div>
            <div class="col-md">
                {{-- call the inventory add component --}}
                <button class="btn btn-success float-end" type="submit" data-bs-target="#add-product" data-bs-toggle="modal"><i class="bi bi-plus-circle"></i> Add Product</button> 
            </div>
            <div class="col-md">
                    <button wire:click="archiveSelected" class="btn btn-warning">    
                        <i class="bi bi-archive-fill"></i> Archive</button>
            </div>
            <div class="col-md-4">
                <form method="GET" class="col-md mb-3 float-end">
                    <select name="filter" wire:model="filter" class="form-select">
                        <option value="all">All</option>
                        <option value="instock">In Stock</option>
                        <option value="lowstock">Low Stock</option>
                        <option value="outofstock">Out of Stock</option>
                    </select>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="table-responsive">
                    <!-- table -->
                    <table class="table table-striped table-hover">
                     <thead class="table-dark">
                       <tr class="text-center">
                         <th scope="col">Product Code</th>
                         <th scope="col">Product Name</th>
                         <th scope="col">Category</th>
                         <th scope="col">Pattern</th>
                         <th scope="col">Load/Speed</th>
                         {{-- <th scope="col">Fitment</th> --}}
                         <th scope="col">Quantity</th>
                         <th scope="col">Status</th>
                         <th scope="col">Brand</th>
                         <th scope="col">Size</th>
                         <th scope="col">Actions</th>
            
                       </tr>
                     </thead>
                     <tbody>
            
                         @if(isset($error))
                             <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                 {{ $error }}
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                         @endif
                         {{-- row --}}
                         
                       
                         @forelse($inventory as $item)
                         <tr class="text-center">
                             <th scope="row">
                                <input type="checkbox" wire:model="selectedItems" value="{{ $item->id }}"> {{ $item->product_code }}
                            </th>
                             <td class="text-uppercase">{{ $item->product_name }}</td>
                             <td>{{ $item->category }}</td>
                             <td class="text-uppercase">{{ $item->pattern }}</td>
                             <td class="text-uppercase">{{ $item->load}}</td>
                             {{-- <td class="text-uppercase">{{ $item->fitment }}</td> --}}
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
                             <td class="text-uppercase">{{ $item->brand }}</td>
                             <td>{{ $item->size }}</td>
                             <td>
                                 <div class="container">
                                     <div class="row">
                                         <div class="col mb-2">
                                             <button type="button" class="btn btn-primary" data-bs-target="#modal-update{{ $item->id}}" data-bs-toggle="modal" value="{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                                         </div>
                                         <div class="col">
                                             <button class="btn btn-danger" type="button" data-bs-target="#modal-delete{{ $item->id}}" data-bs-toggle="modal"><i class="bi bi-trash3-fill"></i></button>
                                         </div>
                                     </div>
                                 </div>
                             </td>
                         </tr>
                         @empty
                         <tr>
                             <td colspan="9" class="text-center">No records found</td>
                         </tr>
                         @endforelse
                       </tbody>
                   </table>
                  
                   <div class="container">
                        <div class="row d-flex justify-content-center">

                            <div class="col">
                                <a href="{{ route('inventory.archived')}}" class="btn btn-info"><i class="bi bi-view-list"></i> View Archived</a>
                            </div>
                            {{-- <div class="col">
                                <a  href="{{ route('inventory.exportToExcel')}}" class="btn btn-outline-success">Export to Excel</a>
                            </div> --}}
                            <div class="col-md-4">
                                <form action="{{ route('inventory.export')}}" method="GET">
                                    <button class="btn btn-danger">
                                        <i class="bi bi-filetype-pdf"></i> Export to PDF</button>
                                  </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                {{ $inventory->links() }}

                            </div>
                        </div>

                   </div>
                 <!--  end table -->
                 </div>
                </div>
            
            </div>
        </div>
   
   
</div>

{{-- If you're not using Pusher, you can remove or comment out these scripts --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/pusher-js@latest/dist/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/laravel-echo@latest/dist/echo.min.js"></script> --}}
