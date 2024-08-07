<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Products;
class ProductsController extends Controller
{
    //

   
    function display(){
        $products = Products::all();
        return view('admin/admin-products', ['products' => $products]);
    }
        // function displayCashierPage(){
        //     $inventory = Products::all();
        //     return view('cashier/pos', ['inventory' => $inventory]);
        // }

    public function update(string $id ,Request $request){
        $inventory = Products::find($id);
        $inventory->product_name = $request->input('product_name');
        $inventory->size = $request->input('size');
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
    public function addToOrder(string $id ,Request $request){
        $product = Products::find($id);
        $orderItem = OrderItem::where('product_id', $product->id)->first();

        if (!$product) {
            return redirect('/cashier/pos')->with('error', 'Product not found!');
        }
    
        $orderItem = OrderItem::where('product_id', $product->id)->first();
    
        if ($orderItem) {
            return redirect('/cashier/pos')->with('error', 'Product is already in the cart!');
        } else {
            // If the product is not in the cart, create a new order item
            $orderItem = new OrderItem();
            $orderItem->product_id = $product->id;
            $orderItem->product_code = $product->product_code;
            $orderItem->product_name = $product->product_name;
            $orderItem->price = $product->price;
            $orderItem->size = $product->size;
            $orderItem->quantity = 1; // Default quantity
            $orderItem->save();
        }
    

        return redirect('/cashier/pos')->with('success', 'Product added to cart!');
    }


}
