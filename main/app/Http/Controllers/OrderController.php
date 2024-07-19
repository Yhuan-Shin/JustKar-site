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
        $orderItem->quantity = $request->input('quantity');
        $orderItem->save();
        return redirect('/cashier/pos')->with('success', 'Quantity Updated');
        
    }
}
