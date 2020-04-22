<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Telegram\Bot\Api as TelegramAPI;

use App\Models\Orders;
use App\Models\Analytics;
use App\User;

class AdminApi extends Controller
{
  public function saveOptions(Request $request)
  {
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

  public function getOrders(Orders $orders)
  {
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

  public function getDashboardInfo(Orders $orders)
  {
    $all = $orders->get()->count();
    $successed = $orders->countSuccessedOrders();
    $failed = $orders->countFailedOrders();
    return response()->json(['response' => [
      'all' => $all,
      'successed' => $successed,
      'failed' => $failed
    ]]);
  }

  public function setOrderState(Request $request, Orders $orders)
  {
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
        'response' => false
      ]);
    }
  }

  public function notifications(Request $request)
  {
    $r = $request->all();
    if ($r) {
      switch ($r['action']) {
        case 'telegram':
          if ($r['value'] == 'enable') {
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
          // todo
          break;
        default:
          return response()->json([
            'response' => false,
            'message' => 'Unknown method'
          ]);
      }
    }
  }

  public function saveAnalytics(Request $request)
  {
    $analytics_main = $request->input('analytics_main');
    $analytics_success = $request->input('analytics_success');
    try {
      $analytics = Analytics::find(1);
      $analytics->main_analytics = $analytics_main;
      $analytics->success_analytics = $analytics_success;
      $analytics->save();
      return response()->json([
        'response' => true
      ]);
    } catch (\Exception $e) {
      return response()->json([
        'response' => false,
        'message' => 'Произошла внутреняя ошибка'
      ]);
    }
  }

  private function telegramBotCheckConnection($token)
  {
    $telegram = new TelegramAPI($token);
    try {
      $response = $telegram->getMe();
      if ($response) {
        return ['status' => true, 'data' => $response];
      }
    } catch (\Exception $exception) {
      return ['status' => false, 'data' => false];
    }
  }

  public function displayAdminImage()
  {
    $defaultImage = 'dashboard/img/admin.png';
    $user = User::find(1);
    if (!$user->image) {
      return response()->file(public_path($defaultImage), ['Content-Type' => 'image/png']);
    } else {
      if (Storage::disk('local')->exists('public/images/' . $user->image)) {
        return response()->file(storage_path('app/public/images/' . $user->image), ['Content-Type' => 'image/png']);
      } else {
        return response()->file(public_path($defaultImage), ['Content-Type' => 'image/png']);
      }
    }
  }

  public function uploadAdminImage(Request $request)
  {
    $files = $request->all();
    $rules = ['image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'];
    $validator = Validator::make($files, $rules);
    $errors = $validator->errors()->messages();

    if (!$errors) {
      $imageName = Str::random(32) . '.' . $request->file('image')->extension();
      $request->file('image')->move(storage_path('app/public/images'), $imageName);

      $user = User::find(1);
      $user->image = $imageName;
      $user->save();

      return response()->json([
        'response' => true,
        'url' => url('/') . Storage::url('app/public/images/' . $imageName)
      ]);
    } else {
      return response()->json([
        'response' => false,
        'message' => 'Ошибка при загрузке файла'
      ]);
    }
  }
}
