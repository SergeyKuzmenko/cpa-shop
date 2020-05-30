
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Вход - Панель администратора</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="{{ asset('public/img/favicon.png') }} "type="image/png"/>
  <link rel="stylesheet" href="{{asset('public/dashboard/css/fontawesome.all.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/css/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/dashboard/css/adminlte.min.css')}}">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{ url('/') }}">{{ env('APP_NAME') }}</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Войдите, чтобы начать сеанс</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" name="login" id="login" class="form-control" placeholder="Логин" autocomplete="false" autofocus >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" id="password" class="form-control" placeholder="Пароль">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
                Запомнить меня
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Войти</button>
          </div>
        </div>
      </form>
    </div>
    @if($errors->any())
      <div class="card-footer">
        <div class="callout callout-danger">
          <h5>Ошибка</h5>
          <p>Неверный логин или пароль</p>
        </div>
      </div>
      @endif
  </div>
</div>

<script src="{{asset('public/dashboard/js/jquery.min.js')}}"></script>
<script src="{{asset('public/dashboard/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('public/dashboard/js/adminlte.min.js')}}"></script>

</body>
</html>
