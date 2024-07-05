<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    //

    // public function displayProducts(){
    //     $products  = Products::with('inventory')
    //     ->get();
    //     return view('admin/admin-products', compact('products'));
    // }
    function displayOnProductsPage(){
        $inventory = Inventory::with('products')
        ->where('quantity', '>', 0)
        ->get();

        return view('admin/admin-products', ['inventory' => $inventory]);
    }
   
   
    public function store(Inventory $inventory, Request $request){
 
        $products = new Products();
        $products->price = $request->input('price');
        $products->inventory_id = $inventory->id;
        if($request->hasFile('product_image')){
            $destination = 'uploads/product_images'.$products -> product_image;
            if(file_exists($destination)){
                @unlink($destination);
            }
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/product_images', $filename);
            $products->product_image = $filename;
        }
        $products->save();
        return redirect('/admin/products')->with('success', 'Product Added');
        
    }
       
}
