@extends('layouts.admin')

@section('title', 'Уведомления')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Уведомления</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">

      <div class="col-12">
        <div class="card card-primary card-outline card-outline-tabs">

          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-main-tab" data-toggle="pill"
                   href="#custom-tabs-three-telegram" role="tab" aria-controls="custom-tabs-three-main"
                   aria-selected="true"><i class="fab fa-telegram"></i> Telegram</a>
              </li>
              {{--<li class="nav-item">--}}
              {{--<a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"--}}
              {{--href="#custom-tabs-three-email" role="tab"--}}
              {{--aria-controls="custom-tabs-three-profile" aria-selected="false"><i class="fas fa-envelope"></i>--}}
              {{--E-mail</a>--}}
              {{--</li>--}}
            </ul>
          </div>

          <div class="card-body">
            <form role="form" class="form_options" onsubmit="return false;">

              <div class="tab-content" id="custom-tabs-three-tabContent">


                <div class="tab-pane active show" id="custom-tabs-three-telegram" role="tabpanel"
                     aria-labelledby="custom-tabs-three-main-tab">
                  @if (!$telegram_notification_status)
                    <div class="input-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">TELEGRAM_BOT_TOKEN</span>
                      </div>
                      <input type="text" name="telegram_bot_token" class="form-control" id="telegram_bot_token"
                             placeholder="000000000:XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX">
                      <span class="input-group-append">
                      <button type="button"
                              class="btn btn-success btn-flat telegram_notification_enable">Подключить</button>
                    </span>
                    </div>
                  @else
                    <div class="input-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">TestCpaShopBot</span>
                      </div>
                      <input type="text" name="telegram_bot_token" class="form-control" id="telegram_bot_token"
                             value="{{$telegram_bot_token}}" disabled>
                      <span class="input-group-append">
                      <button type="button"
                              class="btn btn-danger btn-flat telegram_notification_disable">Отключить</button>
                    </span>
                    </div>
                  @endif
                </div>


                <div class="tab-pane fade" id="custom-tabs-three-email" role="tabpanel"
                     aria-labelledby="custom-tabs-three-profile-tab">
                  @if (!$email_notification_status)
                    <div class="input-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">E-mail</span>
                      </div>
                      <input type="text" name="email_notification" class="form-control" id="email_notification"
                             placeholder="example@mail.com">
                      <span class="input-group-append">
                        <button type="button" class="btn btn-success btn-flat">Подключить</button>
                      </span>
                    </div>
                  @else
                    <div class="input-group input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">E-mail</span>
                      </div>
                      <input type="text" name="email_notification" class="form-control" id="email_notification"
                             value="{{$email_email}}" disabled>
                      <span class="input-group-append">
                        <button type="button" class="btn btn-danger btn-flat">Отключить</button>
                      </span>
                    </div>
                  @endif
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
      @if ($telegram_notification_status)
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Подключеные профили</h3>
                </div>
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Имя</th>
                      <th>chat_id</th>
                      <th style="width: 40px">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      <td>1</td>
                      <td><a href="https://t.me/sergey__kuzmenko" target="_blank">sergey__kuzmenko</a></td>
                      <td>
                        <a href="#134791860">134791860</a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-danger">Отключить</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td><a href="https://t.me/test_profile" target="_blank">test_profile</a></td>
                      <td>
                        <a href="#134791860">7452347834</a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-danger">Отключить</button>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td><a href="https://t.me/eldak_shop" target="_blank">eldak_shop</a></td>
                      <td>
                        <a href="#134791860">2342343423</a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-block btn-danger">Отключить</button>
                      </td>
                    </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-prirary cardutline direct-chat direct-chat-primary">
                <div class="card-header">
                  <h3 class="card-title">Отправить сообщение</h3>

                  <div class="card-tools">
                    <span data-toggle="tooltip" title="Количество сообщений" class="badge bg-primary">2</span>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages">
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">TestCpaShopBot</span>
                        <span class="direct-chat-timestamp float-left">05.06.2020 23:15</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="{{asset('public/dashboard/img/bot.png')}}" alt="BotImage">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        You better believe it!
                      </div>
                    </div>

                    <div class="direct-chat-msg right">
                      <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-right">TestCpaShopBot</span>
                        <span class="direct-chat-timestamp float-left">05.06.2020 23:20</span>
                      </div>
                      <!-- /.direct-chat-infos -->
                      <img class="direct-chat-img" src="{{asset('public/dashboard/img/bot.png')}}" alt="BotImage">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <b>🔥 Новый заказ 🔥</b> <br>
                        <b>Имя:</b> Тест <br>
                        <b>Телефон:</b> +380(000)00-00-000 <br>
                        <b>Дата:</b> 05.06.2020 23:15 <br>
                        <b>Форма:</b> 1 <br>
                        <b>IP:</b> 127.0.0.1 <br>
                        <b>Местоположение:</b> Украина, Кропивницкий
                      </div>
                    </div>
                    <!-- /.direct-chat-msg -->
                  </div>
                  <!--/.direct-chat-messages-->

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <form action="#">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Написать сообщение ..." class="form-control">
                      <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Отправить</button>
                      </span>
                    </div>
                  </form>
                </div>
                <!-- /.card-footer-->
              </div>
            </div>
          </div>
        </div>
      @endif
    </div>
  </section>
@endsection


@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>

  $('.telegram_notification_enable').click(function () {
    let token = $('#telegram_bot_token').val();
    if (token) {
      saveOptions('telegram', 'enable', token);
    } else {
      Swal.fire({
        position: "center",
        icon: "warning",
        title: "Введите токен",
        showConfirmButton: false,
        timer: 3000
      });
    }
  });

  $('.telegram_notification_disable').click(function () {
    saveOptions('telegram', 'disable');
  });

  function saveOptions(action, value, key) {
    $.ajax({
      url: "/admin/api/notifications",
      type: "POST",
      dataType: "json",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      data: {action, value, key},
      beforeSend: function () {
        Swal.fire({
          position: "center",
          icon: "info",
          title: "Обработка...",
          backdrop: false,
          showConfirmButton: false
        });
      }
    })
      .done(function (r) {
        if (r.response) {
          Swal.fire({
            position: "center",
            icon: "success",
            title: "Выполнено",
            showConfirmButton: false,
            timer: 3000,
            onClose: function () {
              location.reload();
            }
          });
        } else {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Произошла ошибка",
            text: r.message,
            showConfirmButton: false,
            timer: 3000
          });
          $(".btn-sublit-form").removeAttr("disabled");
        }
      })
      .fail(function () {
        Swal.fire({
          position: "center",
          icon: "error",
          title: "Произошла ошибка",
          text: "Внутреняя ошибка сервера",
          showConfirmButton: false,
          timer: 3000
        });
        $(".btn-sublit-form").removeAttr("disabled");
      });
  }
</script>
@endsection