<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
     {
        return view('Admin.create_admin');
     }

    public function store(Request $request)
     {
        $data = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required']
        ]);

        $data = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'role' => 1,
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'role' => 1, // role 1 for 
        ]);

        return redirect('/');
     }
}
