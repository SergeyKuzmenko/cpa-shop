<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
  protected $table = 'settings';

  public function getSiteName()
  {
    return $this->where('id', '=', 1)->site_short_name;
  }
}
