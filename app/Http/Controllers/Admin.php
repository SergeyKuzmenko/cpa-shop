<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\Options;
use App\Models\Notifications;
use App\Models\Analytics;
use App\User;

class Admin extends Controller
{
  public function profile(User $u)
  {
    return view('admin.profile', $u->get()->first()->toArray());
  }

  public function options(Options $o)
  {
    return view('admin.options', $o->get()->first()->toArray());
  }

  public function notifications(Notifications $n)
  {
    return view('admin.notifications', $n->get()->first()->toArray());
  }

  public function analytics(Analytics $a)
  {
    return view('admin.analytics', $a->get()->first()->toArray());
  }

  public function displayAdminImage()
  {
    $defaultImage = 'dashboard/img/admin.png';

    $user = User::find(1);
    if (!$user->image) {
      return response()->file(public_path($defaultImage), ['Content-Type' => 'image/png']);
    }

    $path = storage_path('' . $user->image);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
  }

  public function uploadAdminImage()
  {
    $image = request()->validate([
      'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    if ($image) {
      $imageName = Str::random(32) . '.' . request()->image->getClientOriginalExtension();
      request()->image->move(storage_path('app/public/images'), $imageName);
    } else {
      dd($image);

    }

  }
}
