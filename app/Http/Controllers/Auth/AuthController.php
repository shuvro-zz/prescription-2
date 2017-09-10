<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function logout(Request $request)
    {
        $this->middleware('guest', ['except' => 'logout']);
        $request->session()->flush();
        $message_logout=$request->session()->flash('message_logout', 'Logged Out Successfully');
        return redirect('login');
    }
}
