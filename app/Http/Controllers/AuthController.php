<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function login_view()
    {
        return view('auth.login');
    }

    public function login_process(Request $request)
    {
        $request->validate([
            'email' => ['required',],
            'password' => ['required'],
        ]);

        if (Auth::attempt($request->except('_token'))) {
            return redirect()->route('home')->with(['success' => 'Successfully logged in!']);
        } else {
            return back()->with(['failure' => 'Invalid combination!']);
        }
    }

    public function reg_view()
    {
        return view('auth.reg');
    }

    public function reg_process(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email'],
            'password' => ['required', 'confirmed'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        $is_reged = User::create($data);

        if ($is_reged) {
            return back()->with(['success' => 'information has been uploaded!']);
        } else {
            return back()->with(['failure' => 'information is failed to uploaded!']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with(['success' => 'Successfully logged out!']);
    }
    public function dashboard()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        return view('dashboard', compact('user'));
    }
}
