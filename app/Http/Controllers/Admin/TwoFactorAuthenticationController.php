<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorAuthenticationController extends Controller
{
    public function create()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.2fa' , compact('user'));
    }
}
