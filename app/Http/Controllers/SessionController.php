<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);

            $login_credentials = [
            'email'     => $request->email,
            'password'  => $request->password
                ];
            $user = User::where('email', $login_credentials['email'])->first();

            if(Auth::attempt(  $login_credentials ))
            {
                if(Auth::user()->role == '1')
                 {
                     return view('Admin.dashboard');
                 }
                 else
                 {
                    return view('Guest.dashboard');
                 }

            }
            else
            {
            return back()->withErrors(['password' => 'wrong password']);
            }
    }

    public function logout()
     {
         Auth::logout();
         return redirect()->route('login');
     }
}
