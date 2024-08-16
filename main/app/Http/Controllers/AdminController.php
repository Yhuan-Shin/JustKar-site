<?php

namespace App\Http\Controllers;
use App\Models\Sales;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function index()
    {
        return view('admin/admin-home');
    }
    public function displayLogs(){
        $sales = Sales::all();
        return view('admin/admin-logs', ['sales' => $sales]);
    }
}
