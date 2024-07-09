<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\Products;
class ProductsController extends Controller
{
    //

   
    function display(){
        $inventory = Products::all();
        return view('admin/admin-products', ['inventory' => $inventory]);
    }
   

    public function update(string $id ,Request $request){
        $inventory = Products::find($id);
        $inventory->price = $request->input('price');
        if($request->hasFile('product_image')){
            $destination = 'uploads/product_images'.$inventory -> product_image;
            if(file_exists($destination)){
                @unlink($destination);
            }
            $file = $request->file('product_image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/product_images', $filename);
            $inventory->product_image = $filename;
        }
        $inventory->save();
        return redirect('admin/products');
    }
       
}
