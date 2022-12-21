<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class isAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $userType)
    {
       /*  if (Auth::check()) {
            if (Auth::user()->user_type_id != 0) {
                return $next($request);
            }else{
                return redirect()->route('user.dashboard')->with('error','Acesso não permitido');
            }
        } else {
            return redirect()->route('login');
        } */

        $userTypes = [
            'admin' => [1,2,3,4,5,6],
            'user' => [0],
        ];
        if (Auth::check()) {
            if (!in_array(auth()->user()->user_type_id, $userTypes)) {
                abort(403);
            }
            return $next($request);
        } else {
            return redirect()->route('login');
        }

    }
}
