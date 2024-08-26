<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\User;
use App\Models\Inventory;
use Illuminate\Support\Facades\DB;
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
        if($quantity == 1){
            $orderItem->total_price = $price;
        }else{
            $orderItem->total_price = $price * $quantity;
        }
        $orderItem->save();
        return redirect('/cashier/pos')->with('success', 'Quantity Updated');
        
    }
    public function deleteFromCart(string $id){
        $orderItem = OrderItem::find($id);
        $orderItem->delete();
        return redirect('/cashier/pos')->with('success', 'Product removed from cart!');
    }
    public function checkout() {
        $orderItems = OrderItem::all();
    
        if ($orderItems->isEmpty()) {
            return redirect('/cashier/pos')->with('error', 'No items in the order!');
        }
    
        DB::beginTransaction();
    
        
            foreach ($orderItems as $item) {
                $inventory = Inventory::where('product_code', $item['product_code'])->first();
    
                if (!$inventory) {
                    return redirect('/cashier/pos')->with('error', 'Item not found in inventory!');
                }
    
                if ($inventory->quantity < $item['quantity']) {
                    return redirect('/cashier/pos')->with('error', 'Not enough stock for ' . $item['product_name'] . '!');
                }
    
                $inventory->quantity -= (int)$item['quantity'];
                $inventory->save();
    
                Sales::create([
                    'ref_no' => uniqid('REF-'),
                    'product_code' => $item['product_code'],
                    'product_name' => $item['product_name'],
                    // 'brand' => $item['brand'],
                    'size' => $item['size'],
                    'quantity' => $item['quantity'],
                    'price' => (float)$item['price'],   
                    'total_price' => (float)$item['price'] * (int)$item['quantity'],
                    'cashier_name' => auth()->user()->name,
                ]);
            }
    
            DB::commit();
    
            $sales = Sales::latest()->take($orderItems->count())->get();
            
            $pdf = PDF::loadView('cashier/cart_receipt', compact('sales'));
            DB::table('order_items')->truncate();
            return $pdf->stream('receipt.pdf');
    
            return redirect('/cashier/pos')->with('success', 'Order checkout successfully!');
        
     
    
}
}