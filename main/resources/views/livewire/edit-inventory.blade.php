<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{-- product code display --}}

                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" wire:model="product_name">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-select" aria-label="Default select example" name="category" wire:model="category" required>
                <option selected></option>
                <option value="A/T">All Terrain</option>
                <option value="H/T">Highway Terrain</option>
                <option value="H/L">Highway Light Truck</option>
            </select>
        </div>
        <div class="form-group">
            <label for="pattern">Pattern</label>
            <input type="text" class="form-control" id="pattern" wire:model="pattern">
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" wire:model="quantity">
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" wire:model="brand">
        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" wire:model="size">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$dispatch('close-modal')">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
