<?php

namespace App\Http\Controllers\Backend\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminLoginRequest;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout']);
    }
    
    public function index(){
        return redirect()->route('backend.show_login_form');
    }

    public function showLoginForm()
    {
        return view('backend.auth.login');
    }

    public function login(AdminLoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('backend.dashboard');
        }

        return redirect()
            ->back()
            ->with('invalidLogin', __('auth.failed'))
            ->withInput($request->only('email'));
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('backend.login'));
    }
}
