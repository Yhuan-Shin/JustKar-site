<div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add Product</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('inventory.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3">
                <label for="product_code" class="form-label">Product Code</label>
                <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Product Code" required>
              </div>
              <div class="mb-3">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" required>
              </div>
             
              <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category" required>
                  <option selected>Select Category</option>
                  <option value="A/T">All Terrain</option>
                  <option value="H/T">Highway Terrain</option>
                  <option value="H/L ">Highway Light Truck</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="pattern" class="form-label">Pattern</label>
                <input type="text" name="pattern" id="pattern"  class="form-control" placeholder="Pattern" required>
              </div>
              <div class="mb-3">
                <label for="load/speed" class="form-label">Load/Speed</label>
                <input type="text" name="load" id="load/speed"  class="form-control" placeholder="Load/Speed" required>
              </div>
              <div class="mb-3">
                <label for="fitment" class="form-label">Fitment</label>
                <input type="text" name="fitment" id="fitment"  class="form-control" placeholder="Fitment" required>
              </div>
              <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" required>
              </div>
           
              <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand" required>
              </div>
              <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size" placeholder="Size" required>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>

      </div>
    </div>
  </div>
