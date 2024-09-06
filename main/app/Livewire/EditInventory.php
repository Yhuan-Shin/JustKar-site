<?php

namespace App\Livewire;

use Livewire\Component;

class EditInventory extends Component
{
    public $inventory;
    public $product_name;
    public $category;
    public $pattern;
    public $quantity;
    public $brand;
    public $size;
    public $showAlert = false;

    protected $listeners = ['refreshModal' => '$refresh'];

    public function mount($inventory)
    {
        $this->inventory = $inventory;
        $this->product_name = $inventory->product_name;
        $this->category = $inventory->category;
        $this->pattern = $inventory->pattern;
        $this->quantity = $inventory->quantity;
        $this->brand = $inventory->brand;
        $this->size = $inventory->size;
    }

    public function update()
    {
        try {
            $this->inventory->update([
                'product_name' => $this->product_name,
                'category' => $this->category,
                'pattern' => $this->pattern,
                'quantity' => $this->quantity,
                'brand' => $this->brand,
                'size' => $this->size,
            ]);
        } //error duplicate
        catch (\Illuminate\Database\QueryException $e) {
            $this->showAlert = true;
        }

        $this->dispatch('close-modal'); 
        $this->dispatch('inventoryUpdated');

        session()->flash('message', 'Inventory updated successfully!');

    }
    public function render()
    {
        return view('livewire.edit-inventory');
    }
}
