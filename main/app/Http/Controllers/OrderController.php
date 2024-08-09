<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\User;
use App\Models\Inventory;
use App\Models\Sales;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function display(){
        $orderItems = OrderItem::all();
        $inventory = Products::all();
        $sales = Sales::all();
        $name = User::findorfail(Auth::user()->id)->name;
        return view('cashier/pos', ['orderItems' => $orderItems, 'inventory' => $inventory], ['name' => $name], ['sales' => $sales]);
    }
    public function update(string $id ,Request $request){
        $orderItem = OrderItem::findorfail($id);
        $price = (float) $orderItem->price;
        $quantity = (int) $request->input('quantity');

        $orderItem->quantity = $request->input('quantity');
        $orderItem->total_price = $price * $quantity;
        $orderItem->save();
        return redirect('/cashier/pos')->with('success', 'Quantity Updated');
        
    }
    public function deleteFromCart(string $id){
        $orderItem = OrderItem::find($id);
        $orderItem->delete();
        return redirect('/cashier/pos')->with('success', 'Product removed from cart!');
    }
    public function checkout(){
        $orderItems = OrderItem::all();
        // Check if there are order items
        if (empty($orderItems)) {
            return redirect('/cashier/pos')->with('error', 'No items in the order!');
        }
    
        // Process each order item
        foreach ($orderItems as $item) {
            Sales::create([
                'ref_no' => uniqid('REF-'),  
                'product_code' => $item['product_code'],  
                'product_name' => $item['product_name'],
                'brand' => $item['brand'],
                'size' => $item['size'],
                'quantity' => $item['quantity'],
                'price' => (float)$item['price'], // Ensure price is a float
                'total_price' => (float)$item['price'] * (int)$item['quantity'],
                'cashier_name' => auth()->user()->name,  
            ]);

            // Update inventory
            $inventory = Inventory::where('product_code', $item['product_code'])->first();
            if ($inventory) {
                $inventory->quantity -= (int)$item['quantity'];
                $inventory->save();
            }
        }
        $sales = Sales::all(); 

        $pdf = PDF::loadView('cashier/cart_receipt', compact('sales'));
        return $pdf->download('receipt.pdf');

        return redirect('/cashier/pos')->with('success', 'Purchase successful!');

    }
    
}