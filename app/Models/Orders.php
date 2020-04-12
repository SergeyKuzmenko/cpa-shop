<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  public function countFailedOrders()
  {
    return $this->where('state', '=', -1)->count();
  }

  public function countSuccessedOrders()
  {
    return $this->where('state', '=', 1)->count();
  }
}
