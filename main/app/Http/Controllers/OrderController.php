<?php

namespace App\Http\Controllers;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function display(){
        $orderItems = OrderItem::all();
        $inventory = Products::all();
        return view('cashier/pos', ['orderItems' => $orderItems, 'inventory' => $inventory]);
    }
    public function update(string $id ,Request $request){
        $orderItem = OrderItem::findorfail($id);
        $orderItem->quantity = $request->input('quantity');
        $orderItem->save();
        return redirect('/cashier/pos')->with('success', 'Quantity Updated');
        
    }
}
