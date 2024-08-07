<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
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

    public function update(Request $request, string $id)
    {
        try{
            $cashiers = User::find($id);
            $cashiers->update($request->all());
            return redirect('/admin/user_management')->with('success', 'Cashier Updated');
        }
        catch (QueryException $e) {
            if ($e->errorInfo[1] == 1062) { // MySQL error code for duplicate entry
                return redirect('/admin/user_management')->with('error', 'Duplicate entry for username. Please use a different username.');
            } else {
                // Handle other query exceptions or rethrow the exception
                throw $e;
            }
        }
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
                return redirect('/cashier')->with('error', 'Invalid Credentials');   
            }
        }
        else{
            return redirect('/cashier')->with('error', 'Invalid Credentials');   
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/cashier');
    }
}
