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
            'name' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/'
            ],[
                'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
                
            
            ]
        );
    //if the password doesn't meet the requirements, return an error
    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/', $data['password'])) {
        return redirect('/admin/user_management')->with('error', 'The password must contain at least one letter, one number, and one special character.');
    }
    //if the username already exists, return an error
    if (User::where('username', $data['username'])->exists()) {
        return redirect('/admin/user_management')->with('error', 'Username already exists. Please use a different username.');
    }
    else{
        User::create($data);
        return redirect('/admin/user_management')->with('success', 'Cashier Added');
           
    }


    }

    public function update(Request $request, string $id)
    {
        try{
            $cashiers = User::find($id);
            $cashiers->update($request->validate([
                'name' => 'required|string',
                'username' => 'required|string|unique:users,username,'.$id,
                'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/'
            ],[
                'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            
            ]));
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
        if (Auth::check()) {
            return redirect('/cashier')->with('error', 'You are already logged in.');
        }
        $credentials = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/'            
        ]);
        if($credentials->passes()){
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])){
                $request->session()->regenerate();
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
