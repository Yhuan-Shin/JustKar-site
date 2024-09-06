<div>
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    
        <form wire:submit.prevent="submit">
            <div class="form-group">
                <label for="product_code">Product Code</label>
                <input type="text" id="product_code" class="form-control" wire:model="product_code">
                @error('product_code') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" class="form-control" wire:model="product_name">
                @error('product_name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-select" aria-label="Default select example" name="category" wire:model="category" required>
                    <option selected></option>
                    <option value="A/T">All Terrain</option>
                    <option value="H/T">Highway Terrain</option>
                    <option value="H/L">Highway Light Truck</option>
                </select>
                @error('category') <span class="text-danger">{{ $message }}</span> @enderror

            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" class="form-control" wire:model="quantity">
                @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" class="form-control" wire:model="brand">
                @error('brand') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group">
                <label for="size">Size</label>
                <input type="text" id="size" class="form-control" wire:model="size">
                @error('size') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group">
                <label for="pattern">Pattern</label>
                <input type="text" id="pattern" class="form-control" wire:model="pattern">
                @error('pattern') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group">
                <label for="load">Load</label>
                <input type="text" id="load" class="form-control" wire:model="load">
                @error('load') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
    
            <div class="form-group">
                <label for="fitment">Fitment</label>
                <input type="text" id="fitment" class="form-control" wire:model="fitment">
                @error('fitment') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$dispatch('close-modal')">Close</button>
                <button type="submit" class="btn btn-success">Add</button>
            </div>
        </form>
    </div>
    
</div>
