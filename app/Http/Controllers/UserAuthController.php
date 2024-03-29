<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\plans;
use Hash;
use Session;

class UserAuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12'
        ]);
        $user = new users();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        if ($res) {
            return redirect('/login')->with('success', 'User Registered Successfully');
        } else {
            return back()->with('Something went wrong');
        }
    }

    public function loginUser(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        $user = users::where('email', '=', $request->email)->first();
        if ($user) {
            if (hash::check($request->password, $user->password)) {
                $request->session()->put('loginId', $user->id);
                return redirect('/dashboard');
            } else {
                return back()->with('fail', 'Password do not match');
            }
        } else {
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function dashboard()
    {
        $data = array();
        $plans = plans::all();
        if (Session::has('loginId')) {
            $data = users::where('id', '=', Session::get('loginId'))->first();
        }
        return view('dashboard', compact('plans'));
    }

    public function signout()
    {
        if (Session::has('loginId')) {
            Session::pull('loginId');
            return redirect('/login');
        }
    }
}
