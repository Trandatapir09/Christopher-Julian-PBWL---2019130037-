<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Session::put('user', $user->username);
            return redirect()->route('welcome');
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        Session::forget('user');
        return redirect('/login');
    }

    public function showChangePassword()
{
    return view('admin.password');
}


public function changePassword(Request $request)
{
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:6|confirmed',
    ]);

    $user = \App\Models\User::where('username', Session::get('user'))->first();

    if (!$user || !\Hash::check($request->old_password, $user->password)) {
        return back()->with('error', 'Password lama salah');
    }

    $user->password = \Hash::make($request->new_password);
    $user->save();

    return redirect()->route('welcome')->with('success', 'Password berhasil diubah');
}

}