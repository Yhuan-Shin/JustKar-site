@foreach($inventory as $item)
<div class="modal fade " id="modal-update{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('inventory.update', $item->id)}}" method="POST">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="product_code" class="form-label">Product Code</label>
                <input type="text" class="form-control" id="product_code" name="product_code" value="{{ $item->product_code}}"  required>
              </div>
              <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $item->product_name}}"  required>
              </div>
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category"  required >
                  <option selected >{{ $item->category}}</option>
                  <option value="A/T">All Terrain</option>
                  <option value="H/T">Highway Terrain</option>
                  <option value="H/L ">Highway Light Truck</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="pattern" class="form-label">Pattern</label>
                <input type="text" name="pattern" id="pattern"  class="form-control" placeholder="Pattern" required value="{{ $item->pattern}}">
              </div>
              <div class="mb-3">
                <label for="load/speed" class="form-label">Load/Speed</label>
                <input type="text" name="load" id="load/speed"  class="form-control" placeholder="Load/Speed" required value="{{ $item->load}}">
              </div>
              <div class="mb-3">
                <label for="fitment" class="form-label">Fitment</label>
                <input type="text" name="fitment" id="fitment"  class="form-control" placeholder="Fitment"  required value="{{ $item->fitment}}">
              </div>
              <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $item->quantity}}" required>
              </div>
           
              <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" value="{{ $item->brand}}" required>
              </div>
              <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size" value="{{ $item->size}}"  required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>

      </div>
    </div>
  </div>
  @endforeach
