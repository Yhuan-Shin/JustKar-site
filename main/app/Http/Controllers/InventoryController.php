<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use App\Models\OrderItem;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class InventoryController extends Controller
{
  
    public function display(Request $request)
    {   
        
        $inventory = Inventory::all();
        return view('admin.admin-inventory', [
            'inventory' => $inventory,
        ]);
    }

   protected $criticalLevel;
   function store(Request $request)
   {
    
    $data = $request->validate([
        'product_code' => 'required|unique:inventory,product_code',
        'product_name' => 'required',
        'category' => 'required',
        'quantity' => 'required',
        'brand' => 'required',
        'size' => 'required',
        'pattern' => 'required',
        'load' => 'required',
        'fitment' => 'required',
    ]);
    $critical_level = Inventory::latest()->value('critical_level') ?? 0; 
    try{
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
    }
    catch(QueryException $e){
        if ($e->errorInfo[1] == 1062) { 
            return redirect('/admin/inventory')->with('error', 'Duplicate entry for product code. Please use a different product code.');
        } else {
           
            throw $e;
        }
    }


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
        'critical_level' => $critical_level

    ]);
    //update products critical level

    return redirect('/admin/inventory')->with('success', 'Item Inserted');
   }
   public function edit(string $id): View
    {   
        $inventory = Inventory::find($id);
        return view('inventory.edit')->with('item', $inventory);
    }
    public function update(Request $request, string $id)
{
    try {
        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());
        return redirect('/admin/inventory')->with('success', 'Item Updated');
    } catch (QueryException $e) {
        if ($e->errorInfo[1] == 1062) { 
            return redirect('/admin/inventory')->with('error', 'Duplicate entry for product code. Please use a different product code.');
        } else {
           
            throw $e;
        }
    }
}

    public function destroy(string $id): RedirectResponse
{
    $inventory = Inventory::findOrFail($id);

    $product = Products::where('inventory_id', $inventory->id)->first();

    if ($product) {
        OrderItem::where('product_id', $product->id)->delete();
        $product->delete();
    }

    $inventory->delete();

    return redirect('/admin/inventory')->with('success', 'Item deleted!');
}


public function setCriticalLevel(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
        'critical_level' => 'required|integer|min:0',
    ]);

    $criticalLevel = $validatedData['critical_level'];

    Inventory::query()->update(['critical_level' => $criticalLevel]);
    $this->criticalLevel = $criticalLevel;
    Products::query()->update(['critical_level' => $criticalLevel]);
    

    return redirect('/admin/inventory')->with('success', 'Critical level set!', ['critical_level' => $criticalLevel]);
    }
}
