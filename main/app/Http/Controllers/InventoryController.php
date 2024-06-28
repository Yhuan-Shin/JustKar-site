<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
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
}
