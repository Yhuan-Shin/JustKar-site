<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Products;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class InventoryController extends Controller
{
    //
    function display(){
        $inventory = Inventory::all();
        $quantity = Inventory::sum('quantity'); 
        return view('admin/admin-inventory', ['inventory' => $inventory], ['quantity' => $quantity]);
    }
    
   function create(){
       return view('admin/admin-inventory');
   }
   function store(Request $request)
   {
    $data = $request->validate([
        'product_code' => 'required',
        'product_name' => 'required',
        'category' => 'required',
        'quantity' => 'required',
        'brand' => 'required',
        'size' => 'required',
    ]);
    $inventory = Inventory::create([
        'product_code' => $data['product_code'],
        'product_name' => $data['product_name'],
        'category' => $data['category'],
        'quantity' => $data['quantity'],
        'brand' => $data['brand'],
        'size' => $data['size'],
       
    ]);
    Products::create([
        'inventory_id' => $inventory->id,
        'product_code' => $inventory->product_code,
        'product_name' => $inventory->product_name,
        'category' => $inventory->category,
        'brand' => $inventory->brand,
        'size' => $inventory->size

    ]);
    
    return redirect('/admin/inventory')->with('success', 'Item Inserted');
   }
   public function edit(string $id): View
    {
        $inventory = Inventory::find($id);
        return view('inventory.edit')->with('item', $inventory);
    }
    public function update(Request $request, string $id)
    {
        $inventory = Inventory::find($id);
        $inventory->update($request->all());
        return redirect('/admin/inventory')->with('success', 'Item Updated');
    }
    public function destroy(string $id): RedirectResponse
    {
        Inventory::destroy('delete from inventory where id = ?',[$id]);
        return redirect('/admin/inventory')->with('success', 'Item deleted!'); 
    }

    public function setCriticalLevel(Request $request): RedirectResponse
    {
       $validatedData = $request->validate([
        'critical_level' => 'required|integer|min:0',
    ]);

    $criticalLevel = $validatedData['critical_level'];

    Inventory::query()->update(['critical_level' => $criticalLevel]);

    return redirect('/admin/inventory')->with('success', 'Critical level set!', ['critical_level' => $criticalLevel]);
    }


}
