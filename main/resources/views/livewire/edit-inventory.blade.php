<div>
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{-- product code display --}}

                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if(session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       @endif
    </div>
    <form wire:submit.prevent="update">
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" wire:model="product_name">
            @error('product_code') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-select" aria-label="Default select example" name="category" wire:model="category" required>
                <option selected></option>
                <option value="A/T">All Terrain</option>
                <option value="H/T">Highway Terrain</option>
                <option value="H/L">Highway Light Truck</option>
                <option value="P">Passenger</option>
                <option value="SUV">SUV/4x4</option>
                <option value="T/B">Truck and Bus Radial</option>
                
            </select>
            @error('category') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="pattern">Pattern</label>
            <input type="text" class="form-control" id="pattern" wire:model="pattern">
            @error('pattern') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" class="form-control" id="quantity" wire:model="quantity">
            @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" id="brand" wire:model="brand">
            @error('brand') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="size">Size</label>
            <input type="text" class="form-control" id="size" wire:model="size">
            @error('size') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="load">Load</label>
            <input type="text" class="form-control" id="load" wire:model="load">
            @error('load') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <label for="fitment">Fitment</label>
            <input type="text" class="form-control" id="fitment" wire:model="fitment">
            @error('fitment') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$dispatch('close-modal')">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
