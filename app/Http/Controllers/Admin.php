<?php

namespace App\Http\Controllers;

use App\Models\Options;
use App\Models\Notifications;
use App\Models\Analytics;
use App\User;

use Illuminate\Support\Facades\DB;

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
    $telegram_connected_users = DB::table('telegram_connected_users')->get()->toArray();
    return view('admin.notifications', ['telegram_connected_users' => $telegram_connected_users, 'params' => $n->get()->first()->toArray()]);
  }

  public function analytics(Analytics $a)
  {
    return view('admin.analytics', $a->get()->first()->toArray());
  }
}
