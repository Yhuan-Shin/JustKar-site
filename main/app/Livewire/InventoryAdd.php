<?php

namespace App\Livewire;

use App\Models\Categories;
use App\Models\Inventory;
use App\Models\Products;
use App\Models\ProductType;
use Livewire\Component;
use Illuminate\Database\QueryException;
class InventoryAdd extends Component
{
    public $product_code;
    public $product_name;
    public $selectedProduct = null;
    public $selectedCategory = null;
    public $quantity;
    public $brand;
    public $size;
    public $description;
    public $inventory;
    
    public $categories= null;
 


    
    public function closeModal()
    {        
        $this->resetForm();
    }

    public function updatedSelectedProduct($product_type_id){
        $this->categories = Categories::where('product_type_id', $product_type_id)->select('id', 'category')->get();
    }
    public function resetForm()
    {
        $this->product_code = '';
        $this->product_name = '';
        $this->selectedProduct= '';
        $this->selectedCategory = '';
        $this->quantity = '';
        $this->description = '';
        $this->brand = '';
        $this->size = '';
    }
    public function submit()
    {
        $data = [
            'product_code' => $this->product_code,
            'product_name' => $this->product_name,
            'product_type' => ProductType::where('id', $this->selectedProduct)->value('product_type'),
            'category' => Categories::where('id', $this->selectedCategory)->value('category'),
            'quantity' => $this->quantity,
            'brand' => $this->brand,
            'size' => $this->size,
            'description' => $this->description
        ];
        $critical_level = Inventory::latest()->value('critical_level') ?? 0;

        $existingInventory = Inventory::where('product_name', $data['product_name'])
                ->where('brand', $data['brand'])
                ->where('size', $data['size'])
                ->where('product_type', $data['product_type'])
                ->where('category', $data['category'])
                ->where('description', $data['description'])
                ->first();
        try {

            if ($existingInventory) {
                session()->flash('error', 'Product already exists.');
            }else{
                $status = ($data['quantity'] > $critical_level) ? 'instock' : 'lowstock';
                $inventory = Inventory::create([
                    'product_code' => $data['product_code'],
                    'product_name' => $data['product_name'],
                    'product_type' => $data['product_type'],
                    'category' => $data['category'],
                    'quantity' => $data['quantity'],
                    'brand' => $data['brand'],
                    'size' => $data['size'],
                    'critical_level' => $critical_level,
                    'status' => $status,
                    'description' => $data['description']
                    
                ]);
                session()->flash('success', 'Item Inserted');
                Products::create([
                    'inventory_id' => $inventory->id,
                    'product_code' => $inventory->product_code,
                    'product_name' => $inventory->product_name,
                    'category' => $inventory->category,
                    'quantity' => $inventory->quantity,
                    'brand' => $inventory->brand,
                    'product_type' => $inventory->product_type,
                    'size' => $inventory->size,
                    'description' => $inventory->description,
                    'critical_level' => $critical_level,
                ]);
                $this->reset();

            }
           
        
        
        } catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) {
                session()->flash('error', 'Duplicate entry for product code. Please use a different product code.');
                return;
            } else {
                throw $e;
            }
        }
    }

    public function render()
    {
        return view('livewire.inventory-add',[
            'product_type'=> ProductType::all(),
        ]);
    }
}