<?php

namespace App\Http\Controllers;
use App\Models\Cashier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
class AddCashierController extends Controller
{
    //
    public function display(){
        $cashiers = Cashier::all();
        return view('admin/admin-user_management', ['cashiers' => $cashiers]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:cashier_account,username',
        'password' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        ]);
        Cashier::create($data);
        return redirect('/admin/user_management')->with('success', 'Cashier Added') ;
    }
    public function edit(string $id): View
    {
        $cashiers = Cashier::find($id);
        return view('inventory.edit')->with('cashiers', $cashiers);
    }
    public function update(Request $request, string $id)
    {
        $cashiers = Cashier::find($id);
        $cashiers->update($request->all());
        return redirect('/admin/user_management')->with('success', 'Cashier Updated');
    }
    public function destroy(string $id): RedirectResponse
    {
        Cashier::destroy('delete from cashier_account where id = ?',[$id]);
        return redirect('/admin/user_management')->with('success', 'Account deleted!'); 
    }
}
