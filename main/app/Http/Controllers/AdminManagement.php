<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

class AdminManagement extends Controller
{
    //
    public function display(){
        $admins = Admin::all();
        return view('superadmin/superadmin-user', ['admins' => $admins]);
    }
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:admin,username',
            'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/'
            ],[
                'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            
            ]
        );
        if (Admin::where('username', $data['username'])->exists()) {
            return redirect('superadmin/user_management')->with('error', 'Username already exists. Please use a different username.');
        }
        Admin::create($data);
        return redirect('/superadmin/user_management')->with('success', 'Admin Added');
        


    }
    public function update(Request $request, string $id)
    {
       try{
        $admins = Admin::find($id);
        $admins->update($request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:admin,username,'.$id,
            'password' => 'required|string|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/'
            ],[
                'password.regex' => 'The password must contain at least one letter, one number, and one special character.',
            
            ])
        );
        return redirect('/superadmin/user_management')->with('success', 'Admin Updated');
       }catch (QueryException $e) {
        if ($e->errorInfo[1] == 1062) { // MySQL error code for duplicate entry
            return redirect('/superadmin/user_management')->with('error', 'Duplicate entry for username. Please use a different username.');
        } else {
            // Handle other query exceptions or rethrow the exception
            throw $e;
        }
       }
    }
    public function destroy(string $id): RedirectResponse
    {
        Admin::destroy('delete from admin where id = ?',[$id]);
        return redirect('/superadmin/user_management')->with('success', 'Account deleted!'); 
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/dashboard')->with('success', 'Login Successful');
        } else {
            return redirect('/admin')->with('error', 'Invalid Credentials');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
