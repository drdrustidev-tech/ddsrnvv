<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');        
        $this->middleware('role:1', ['only' => ['superadmin']]);
        $this->middleware('role:2', ['only' => ['admin']]);
       
    }

    public function superadmin()
    {
        
        return view('superadmin.home');
    }

    public function admin()
    {
       
        return view('admin.home');
    }




}
