<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TwoFactorAuthenticationController extends Controller
{
    public function create()
    {
        return view('admin.2fa');
    }
}
