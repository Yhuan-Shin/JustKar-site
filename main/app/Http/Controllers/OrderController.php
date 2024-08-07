<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //
    public function display(){
        $orderItems = OrderItem::all();
        $inventory = Products::all();
        $name = User::findorfail(Auth::user()->id)->name;
        return view('cashier/pos', ['orderItems' => $orderItems, 'inventory' => $inventory], ['name' => $name]);
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
}
