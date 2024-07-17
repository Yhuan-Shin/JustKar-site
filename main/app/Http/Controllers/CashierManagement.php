<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CashierManagement extends Controller
{
    //
    public function display(){
        $cashiers = User::all();
        return view('admin/admin-user_management', ['cashiers' => $cashiers]);
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'password' => 'required|string|max:255',
        ]);
        User::create($data);
        return redirect('/admin/user_management')->with('success', 'Cashier Added');
        


    }
    public function edit(string $id): View
    {
        $cashiers = User::find($id);
        return view('inventory.edit')->with('cashiers', $cashiers);
    }
    public function update(Request $request, string $id)
    {
        $cashiers = User::find($id);
        $cashiers->update($request->all());
        return redirect('/admin/user_management')->with('success', 'Cashier Updated');
    }
    public function destroy(string $id): RedirectResponse
    {
        User::destroy('delete from users where id = ?',[$id]);
        return redirect('/admin/user_management')->with('success', 'Account deleted!'); 
    }

    public function login(Request $request){
        $credentials = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            
        ]);
        if($credentials->passes()){
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
                return redirect('/cashier/pos') ->with('success', 'Login Successful');
            }else{
                return view('cashier/cashier-login')->with('error', 'Invalid Credentials');   
            }
        }
        else{
            return view('cashier/cashier-login')->with('error', 'Invalid Credentials');   
        }
    }
}
