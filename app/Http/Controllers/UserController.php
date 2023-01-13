<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }

    public function index()
    {
        if (auth()->user()->complete_registration) {
            return view('user.user.index');
        }
        return $this->profile();

    }

    public function profile()
    {
        if (auth()->user()->complete_registration == 0) {
            return view('user.user.profile',[session()->flash('message', 'Para dar continuidade ao processo seletivo, por favor finalize seu cadastro.')]);
        }
        return view('user.user.profile');
    }


}
