<?php

namespace App\Livewire;
use Illuminate\Database\QueryException;
use Livewire\Component;
use App\Models\Inventory;
class EditInventory extends Component
{
    public $inventory;
    public $product_name;
    public $category;
    public $pattern;
    public $quantity;
    public $brand;
    public $size;
    public $load;
    public $fitment;
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
        $this->load = $inventory->load;
        $this->fitment = $inventory->fitment;
    }

    public function update()
    {
        // call the critical level
        $critical_level = Inventory::latest()->value('critical_level');
        try {
            // Make sure the size is unique
            $status = ($this->quantity > $critical_level) ? 'instock' : 'lowstock';

            $this->inventory->update([
                'product_name' => $this->product_name,
                'category' => $this->category,
                'pattern' => $this->pattern,
                'quantity' => $this->quantity,
                'brand' => $this->brand,
                'size' => $this->size,
                'load' => $this->load,
                'status' => $status,
                'fitment' => $this->fitment,
            ]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                session()->flash('error', 'Duplicate entry for size. Please use a different product size.');
                return;
            } else {
                throw $e;
            }
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
