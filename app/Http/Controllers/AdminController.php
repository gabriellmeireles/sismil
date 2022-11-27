<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    
    public function index()
    {
        return view('admin.admin.index');
    }

    public function profile()
    {
       return view('admin.admin.profile');
    }

}
