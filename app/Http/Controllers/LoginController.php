<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;

class LoginController extends Controller
{
  protected $redirectTo = 'admin';

  public function login()
  {
    return view('login');
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
    $action = $request->input('action');
    $old_param = $request->input('old_param');
    $new_param = $request->input('new_param');

    if ($action){
      $user = User::find(1);
      switch ($action){
        case 'login':
          if ($user->login == $old_param) {
            $user->login = $new_param;
            $user->save();
            $this->logout();
            return response()->json([
              'response' => true,
              'reload' => true
            ]);
          } else {
            return response()->json([
              'response' => false,
              'message' => 'Неверный текущий логин'
            ]);
          }
          break;
        case 'password':
          if (Hash::check($old_param, $user->password)) {
            $user->password = Hash::make($new_param);
            $user->save();
            $this->logout();
            return response()->json([
              'response' => true,
              'reload' => true
            ]);
          } else {
            return response()->json([
              'response' => false,
              'message' => 'Неверный текущий пароль'
            ]);
          }
          break;
        case 'other':
          $name = $request->input('new_param')['name'];
          $email = $request->input('new_param')['email'];

          $user->name = $name;
          $user->email = $email;
          $user->save();

          return response()->json([
            'response' => true
          ]);
          break;
        default:
          return response()->json([
            'response' => false,
            'message' => 'Action not found'
          ]);
          break;
      }
    }
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
