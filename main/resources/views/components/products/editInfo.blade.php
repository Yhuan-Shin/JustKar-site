@foreach ($products as $item)
<div class="modal fade" id="editInfo{{ $item->id }}" tabindex="-1" aria-labelledby="editInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editInfoLabel">Edit Product Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

            <form action="{{ route('products.update', $item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
              @method('POST')
              <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" class="form-control" id="name" name="product_name" aria-label="Name" aria-describedby="name-addon" value="{{ $item->product_name }}" required>
              </div>

              <div class="mb-3">
                <label for="size" class="form-label">Size</label>
                <input type="text" class="form-control" id="size" name="size" aria-label="Size" aria-describedby="size-addon" value="{{ $item->size }}" required>
              </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Price</label><label for="price" class="form-label"></label>
                    <input type="string" class="form-control" id="price" name="price" aria-label="Price" aria-describedby="price-addon" value="{{ $item->price }}" required>
                  </div>
                  <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="product_image" name="product_image">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
      </div>
    </div>
  </div>
  @endforeach
