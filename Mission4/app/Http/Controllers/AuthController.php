<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::where('USERNAME', $request->username)->first();

        if (!$user || !Hash::check($request->password, $user->PASSWORD)) {
            return back()->withErrors([
                'username' => 'Username atau password salah'
            ])->withInput();
        }

        // set session
        session([
            'user_id'   => $user->USER_ID,
            'user_role' => $user->ROLE,
            'user_name' => $user->FULL_NAME
        ]);

        // redirect sesuai role
        if ($user->ROLE === 'admin') {
            return redirect()->route('admin.courses.dashboard');
        } else {
            return redirect()->route('student.dashboard');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login')->with('success', 'Berhasil logout');
    }
}
