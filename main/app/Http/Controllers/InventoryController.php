<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class InventoryController extends Controller
{
    //
    function display(){
        $inventory = Inventory::all();
        return view('admin/admin-inventory', ['inventory' => $inventory]);
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

    Inventory::create($data);
    return redirect('/admin/inventory')->with('success', 'Data Inserted');
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
        return redirect('/admin/inventory')->with('success', 'Data Updated');
    }
    public function destroy(string $id): RedirectResponse
    {
        Inventory::destroy('delete from inventory where id = ?',[$id]);
        return redirect('/admin/inventory')->with('success', 'Item deleted!'); 
    }


}
