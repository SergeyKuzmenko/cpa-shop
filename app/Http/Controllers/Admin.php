<?php

namespace App\Http\Controllers;

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
}
