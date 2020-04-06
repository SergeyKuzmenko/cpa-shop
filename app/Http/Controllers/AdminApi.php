<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Telegram\Bot\Api as TelegramAPI;

use App\Models\Orders;
use App\Models\Notifications;

class AdminApi extends Controller {

  public function saveOptions(Request $request) {
    $data = $request->all();
    try {
      foreach ($data as $key => $value) {
        DB::table('options')
          ->where('id', 1)
          ->update([$key => "$value"]);
      }
      return response()->json([
        'response' => true
      ]);
    } catch (Exception $e) {
      return response()->json([
        'response' => false,
        'error' => $e->getMessage()
      ]);
    }
  }

  public function getOrders(Orders $orders) {
    $allOrders = [];
    foreach ($orders->get() as $key => $value) {
      array_push($allOrders, [
        'id' => $value['id'],
        'form' => $value['form'],
        'name' => $value['name'],
        'phone' => $value['phone'],
        'timestamp' => Carbon::parse($value['created_at'])->format('d.m.Y H:i:s'),
        'ip' => $value['ip'],
        'location' => $value['location'],
        'state' => $value['state']
      ]);
    }
    return response()->json($allOrders);
  }

  public function setOrderState(Request $request, Orders $orders) {
    $id = $request->input('id');
    $action = $request->input('action');

    if ($id !== null && $action !== null) {
      switch ($action) {

      case 'successed':
        $orders->where('id', $id)->update(array('state' => 1));
        return response()->json([
          'response' => true
        ]);
        break;

      case 'canceled':
        $orders->where('id', $id)->update(array('state' => -1));
        return response()->json([
          'response' => true
        ]);
        break;

      case 'discard':
        $orders->where('id', $id)->update(array('state' => 0));
        return response()->json([
          'response' => true
        ]);
        break;

      case 'delete':
        $orders->where('id', $id)->delete();
        return response()->json([
          'response' => true
        ]);
        break;

      default:
        return response()->json([
          'response' => false,
          'error' => 'Action not found'
        ]);
        break;
      }
    } else {
      return response()->json([
        'response' => false,
      ]);
    }
  }

  public function notifications(Request $request)
  {
    $r = $request->all();
    if ($r){
      switch ($r['action']){
        case 'telegram':
          if ($r['value'] == 'enable'){
            if ($this->telegramBotCheckConnection($r['key'])['status']) {
              DB::table('notifications')
                ->where('id', 1)
                ->update(['telegram_notification_status' => 1, 'telegram_bot_token' => $r['key']]);
              return response()->json([
                'response' => true,
                'telegram_response' => $this->telegramBotCheckConnection($r['key'])['data']
              ]);
            } else {
              return response()->json([
                'response' => false,
                'message' => 'Не удалось подключиться к боту'
              ]);
            }

          } elseif ($r['value'] == 'disable') {
            DB::table('notifications')
              ->where('id', 1)
              ->update(['telegram_notification_status' => 0, 'telegram_bot_token' => 0]);
            return response()->json([
              'response' => true
            ]);
          } else {
            return response()->json([
              'response' => false
            ]);
          }
          break;
        case 'email':
          echo 'email';
          break;
        default:
          dd($r['action']);
          break;
      }


    }

  }

  public function telegramBotCheckConnection($token)
  {
    $telegram = new TelegramAPI($token);
    try {
      $response = $telegram->getMe();
      if ($response) {
        return  ['status' => true, 'data' => $response];
      }
    } catch (\Exception $exception) {
      return ['status' => false, 'data' => false];
    }
  }


}
