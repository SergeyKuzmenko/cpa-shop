<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  protected $redirectTo = 'admin';

  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->only('login', 'password');
    if (Auth::attempt($credentials, $request->only('remember'))) {
      return redirect()->intended('admin');
    } else {
      return back()->withErrors(['error'=> 'Login Failed '])->withInput($request->input());
    }
  }

  public function changeProfile(Request $request)
  {
    dd($request);
  }

  public function logout()
  {
    Auth::logout();
    return redirect('login');
  }

  public function username()
  {
    return 'login';
  }
}
