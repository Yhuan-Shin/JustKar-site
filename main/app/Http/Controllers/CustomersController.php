<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Carbon;

class CustomersController extends Controller
{
    //
    public function store(Request $request)
    {
        $firstname = $request->input('fname');
        $lastname = $request->input('lname');
        $email = $request->input('email');
        $date_time = $request->input('date_time');
        $phone_number = $request->input('phone_number');

        // Create a new customer instance
        $customer = new Customers;
        $customer->first_name = $firstname;
        $customer->last_name = $lastname;
        $customer->email = $email;
        $customer->date_time = $date_time;
        $customer->phone_number = $phone_number;

        // Save the customer to the database
        $customer->save();

        //redirect the user after successful storing
        return redirect('/home')->with('success', 'Form submitted successfully!');
    }
         
    /**
     * Display the specified resource.
     */
    public function showHomePage(){
        $customers = Customers::select('id', 'first_name', 'last_name', 'email', 'date_time', 'phone_number')->get();
        foreach ($customers as $customer) {
            $dateTime = Carbon::parse($customer->date_time);
            $customer->date_time = $dateTime->format('Y-m-d h:i:s A');
        }
        return view('admin/admin-home',['customers'=>$customers]);
        
    } 
    
    public function showOrderPage(){
        $customers = Customers::select('id', 'first_name', 'last_name', 'email', 'date_time', 'phone_number')->get();
        foreach ($customers as $customer) {
            $dateTime = Carbon::parse($customer->date_time);
            $customer->date_time = $dateTime->format('Y-m-d h:i:s A');
        }
        return view('admin/order',['customers'=>$customers]);
    } 
}
