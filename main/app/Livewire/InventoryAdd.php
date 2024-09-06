<?php

namespace App\Livewire;
use App\Models\Inventory;
use App\Models\Products;
use Livewire\Component;
use Illuminate\Database\QueryException;
class InventoryAdd extends Component
{
    public $product_code;
    public $product_name;
    public $category;
    public $quantity;
    public $brand;
    public $size;
    public $pattern;
    public $load;
    public $fitment;

    protected $rules = [
        'product_code' => 'required|unique:inventory,product_code',
        'product_name' => 'required',
        'category' => 'required',
        'quantity' => 'required',
        'brand' => 'required',
        'size' => 'required',
        'pattern' => 'required',
        'load' => 'required',
        'fitment' => 'required',
    ];
    public function resetForm()
    {
        $this->product_code = '';
        $this->product_name = '';
        $this->category = '';
        $this->quantity = '';
        $this->brand = '';
        $this->size = '';
        $this->pattern = '';
        $this->load = '';
        $this->fitment = '';
    }
    public function submit()
    {
        $data = $this->validate();

        $critical_level = Inventory::latest()->value('critical_level') ?? 0;

        try {
            $inventory = Inventory::create([
                'product_code' => $data['product_code'],
                'product_name' => $data['product_name'],
                'category' => $data['category'],
                'quantity' => $data['quantity'],
                'brand' => $data['brand'],
                'size' => $data['size'],
                'pattern' => $data['pattern'],
                'load' => $data['load'],
                'fitment' => $data['fitment'],
                'critical_level' => $critical_level,
            ]);
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                session()->flash('error', 'Duplicate entry for product code. Please use a different product code.');
                return;
            } else {
                throw $e;
            }
        }
        $this->resetForm();

        Products::create([
            'inventory_id' => $inventory->id,
            'product_code' => $inventory->product_code,
            'product_name' => $inventory->product_name,
            'category' => $inventory->category,
            'quantity' => $inventory->quantity,
            'pattern' => $inventory->pattern,
            'load' => $inventory->load,
            'fitment' => $inventory->fitment,
            'size' => $inventory->size,
            'critical_level' => $critical_level,
        ]);

        session()->flash('success', 'Item Inserted');
    }

    public function render()
    {
        return view('livewire.inventory-add');
    }
}