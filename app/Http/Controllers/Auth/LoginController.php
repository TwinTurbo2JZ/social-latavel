<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        
        return view('Auth.login');
    }

    public function login(Request $request)
    {
        $this -> validate($request , [

            'email' => 'required| email',
            'password' => 'required'
        ]);

        
        if(!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'invalid Login details');
        }

        return redirect('/dashboard');
    }
}
