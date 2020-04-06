<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Models\Options;
use App\Models\Notifications;
use App\Models\Analytics;

class Admin extends Controller
{
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
    //dd($a->get()->first()->toArray());
    return view('admin.analytics', $a->get()->first()->toArray());
  }
}
