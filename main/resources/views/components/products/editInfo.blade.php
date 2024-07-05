{{-- edit info modal
@foreach ($inventory as $item)
<link rel="stylesheet" href="style.css">
<div class="modal fade" id="editInfo{{ $item->id }}" tabindex="-1" aria-labelledby="editInfoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editInfoLabel">Edit Product Information</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('products.store', $item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" class="form-control" id="product_name" readonly name="product_name" value="{{ $item->product_name}}">
                  </div>
                  <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <input type="text" class="form-control" id="category" readonly name="category" value="{{ $item->category}}">
                  </div>
                  <div class="mb-3">
                    <label for="brand" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="brand" readonly name="brand" value="{{ $item->brand}}">
                  </div>
                  <div class="mb-3">
                    <label for="size" class="form-label">Size</label>
                    <input type="text" class="form-control" id="size" readonly name="size" value="{{ $item->size}}">
                  </div>
                  <div class="mb-3">
                    <label for="price" class="form-label">Price</label><label for="price" class="form-label"></label>
                    
                    <input type="string" class="form-control" id="price" name="price" aria-label="Price" aria-describedby="price-addon">

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

  @endforeach --}}
