<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Products;
use Illuminate\Database\QueryException;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
class InventoryController extends Controller
{
    public function display(Request $request)
    {   
        $filter = $request->filter;
        $search = $request->search;
        $query = Inventory::query();

        if ($request->search) {
            $searchProduct = Inventory::where('product_name', 'like', '%' . $request->search . '%')
            ->orWhere('product_code', 'like', '%' . $request->search . '%')
            ->orWhere('size', 'like', '%' . $request->search . '%')
            ->orWhere('brand', 'like', '%' . $request->search . '%')
            ->orWhere('category', 'like', '%' . $request->search . '%')
            ->orWhere('quantity', 'like', '%' . $request->search . '%')
            ->get();
            $quantity = $searchProduct->sum('quantity');
            return view('admin.admin-inventory', ['inventory' => $searchProduct, 'quantity' => $quantity]); 
        } else if ($filter) {
            switch ($filter) {
                case 'all':
                    break;
                case 'instock':
                    $query->where('quantity', '>', Inventory::raw('critical_level'));
                    break;
                case 'lowstock':
                    $query->whereColumn('quantity', '<=', 'critical_level');
                    break;
                case 'outofstock':
                    $query->where('quantity', 0);
                    break;
                default:
            }
        }else {
            $inventory = Inventory::all();
            $quantity = Inventory::sum('quantity');
            return view('admin.admin-inventory', ['inventory' => $inventory, 'quantity' => $quantity]);
        }
        
        $inventory = $query->get();
        $quantity = $inventory->sum('quantity');

        return view('admin.admin-inventory', [
            'inventory' => $inventory,
            'quantity' => $quantity,
            'search' => $search,
            'filter' => $filter,
        ]);
    }
    
   function create(){
       return view('admin/admin-inventory');
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
    ]);
    $criticalLevel = Inventory::latest()->value('critical_level') ?? 0;  
    $inventory = Inventory::create([
        'product_code' => $data['product_code'],
        'product_name' => $data['product_name'],
        'category' => $data['category'],
        'quantity' => $data['quantity'],
        'brand' => $data['brand'],
        'size' => $data['size'],
        'critical_level' => $criticalLevel,
       
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
    try {
        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());
        return redirect('/admin/inventory')->with('success', 'Item Updated');
    } catch (QueryException $e) {
        // Handle the exception for duplicate entry
        if ($e->errorInfo[1] == 1062) { // MySQL error code for duplicate entry
            return redirect('/admin/inventory')->with('error', 'Duplicate entry for product code. Please use a different product code.');
        } else {
            // Handle other query exceptions or rethrow the exception
            throw $e;
        }
    }
}
    // public function destroy(string $id): RedirectResponse
    // {
    //     Inventory::destroy('delete from inventory where id = ?',[$id]);
    //     return redirect('/admin/inventory')->with('success', 'Item deleted!'); 
    // }
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

    return redirect('/admin/inventory')->with('success', 'Critical level set!', ['critical_level' => $criticalLevel]);
    }




}
