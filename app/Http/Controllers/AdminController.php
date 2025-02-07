<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.login');
    }
    public function dashboard()
{
    if (!Auth::guard('admin')->check()) {
        return redirect()->route('admin.login')->with('error', 'Please login first.');
    }

    return view('admin.dashboard');
}


    public function form(){
        return view('admin.form');
    }
    public function table(){
        return view('admin.table');
    }

    public function authenticate(Request $request)
{
    $request->validate([
        "email" => 'required',
        "password" => 'required'
    ]);

    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        return redirect()->route('admin.dashboard'); 
    } else {
        return redirect()->route('admin.login')->with('error', 'Something went wrong');
    }
}



    public function register(){
        $user = new User();
        $user->name ="vishal";
        $user->role ="admin";
        $user->email = "vishaldev2024@gmail.com";
        $user->password = Hash::make('admin');
        $user->save();
        return redirect()->route('admin.login')->with('success','User created sucessfully');
    }

}
