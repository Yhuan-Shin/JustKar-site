<div poll.3000ms>
  {{-- <h5>Overview</h5>
  @if ($totalSales > 0)
    <p class="badge bg-success">{{ $totalSales }}</p>
  @else
    <div class="badge bg-danger">No Sales Yet</div>
  @endif --}}
  <div class="container mt-3">
    <div class="row d-flex justify-content-center">
      <div class="col-md-4 mb-2">
        <div class="card" style="width: 18rem;">
            <div class="card-body text-center">
              <img src="{{ asset('images/sales.png') }}" alt="" class="img-fluid" style="width: 40px; height: 40px"> 
              {{-- <h5 class="card-title text-muted">Daily Sales</h5>
              <h5 class="card-text ">₱{{ number_format($dailySales, 2) }}</h5> --}}
              <h5 class="card-title text-muted">Total Sales</h4>
              <h6 class="card-text ">₱{{ number_format($totalSales, 2) }}</h6>
            </div>
          </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card" style="width: 18rem;">
          <div class="card-body text-center">
            <img src="{{ asset('images/sales.png') }}" alt="" class="img-fluid" style="width: 40px; height: 40px"> 
            <h5 class="card-title text-muted">Total Sold Tires</h5>
            <h6 class="card-text">{{$totalSoldTires}}</h6>
          </div>
        </div>
    </div>
    <div class="col-md-4 mb-2">
      <div class="card" style="width: 18rem;">
          <div class="card-body text-center">
            <img src="{{ asset('images/sales.png') }}" alt="" class="img-fluid" style="width: 40px; height: 40px">
            <h5 class="card-title text-muted"> Most Sold</h5>
            <h6 class="card-text ">{{$mostSoldProductName}}</h6>
          </div>
        </div>
    </div>
  </div>
  </div>
</div>
