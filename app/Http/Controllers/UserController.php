<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
       return view('user.user.index');
    }

    public function profile()
    {
       return view('user.user.profile');
    }

}
