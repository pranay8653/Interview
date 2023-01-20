<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function create()
     {
        return view('Guest.create_guest');
     }

    public function store(Request $request)
     {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $data = Guest::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'role' => 2,
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'role' => 2,// role 2 means Guest User
        ]);

        return redirect('/');
     }
}
