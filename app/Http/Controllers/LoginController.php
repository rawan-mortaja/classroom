<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function create()
    {
        return view('loginn');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            // 'status' => 'active',
        ];

        $result = Auth::attempt(
            $credentials,
            $request->boolean('remember')
        );



        if ($result) {
            return redirect()->intended('/');
        }
        // $user = User::where('email', '=', $request->email)->first();
        // if ($user &&  Hash::check($request->password, $user->password)) {
        //     //Authentication
        //     Auth::login($user , $request->boolean('remember'));
        //     return redirect()->route('classroom.index');
        // }

        return back()->withInput()->withErrors([
            'email' => 'Invalid credentials',
        ]);
    }
}
