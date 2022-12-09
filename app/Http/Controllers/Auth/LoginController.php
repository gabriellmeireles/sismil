<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        
    }

    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'cpf' => 'required|max:11',
            'password' => 'required'
        ]);
        $returnUrl = $request->session()->get('url')['intended'];
        if (auth()->attempt(array('cpf'=>$input['cpf'], 'password'=>$input['password']))) {
            if (auth()->user()->user_type_id == 7) {
                if ($returnUrl != null) {
                    return redirect()->to($returnUrl);
                } else {
                    return redirect()->route('user.dashboard');
                }
            } else {
                if ($returnUrl != null) {
                    return redirect()->to($returnUrl);
                } else {
                    return redirect()->route('admin.dashboard');
                }
            }
        }else{
            return redirect()->route('login')->with('error', 'Login ou senha incorretos');
        }
        
    }
}
