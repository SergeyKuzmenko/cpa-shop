@extends('layouts.admin')

@section('title', 'Администратор')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Профиль</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="{{asset('public/dashboard/img/admin.png')}}"
                   alt="{{$name}}">
            </div>

            <h3 class="profile-username text-center">{{$name}}</h3>
            <p class="text-muted text-center">{{ env('APP_NAME') }}</p>
            {{--<a href="#" class="btn btn-primary btn-block"><b>Изменить фото</b></a>--}}
          </div>
        </div>
      </div>
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <form class="form-horizontal">
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Логин</label>
                <div class="col-sm-10">
                  <button class="btn btn-block bg-gradient-warning btn-flat" onclick="changeLogin(); return false;">Изменить логин    </button>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Пароль</label>
                <div class="col-sm-10">
                  <button class="btn btn-block bg-gradient-warning btn-flat" onclick="changePassword(); return false;">Изменить пароль</button>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Имя</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="name" id="name" placeholder="Имя" value="{{$name}}">
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" name="email" id="email" placeholder="E-mail"
                         value="{{$email}}">
                </div>
              </div>
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button class="btn btn-success float-right" onclick="return false;">Сохранить</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('scripts')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    function changeLogin() {
      Swal.mixin({
        input: 'text',
        confirmButtonText: 'Далее &rarr;',
        showCancelButton: true,
        cancelButtonText: 'Отмена',
        progressSteps: ['1', '2']
      }).queue([
        {
          title: 'Введите текущий логин',
        },
        'Введите новый логин'
      ]).then((result) => {
        if (result.value) {
          const data = JSON.stringify(result.value);
          save('login', data);
        }
      });
    }
    function changePassword() {
      Swal.mixin({
        input: 'password',
        confirmButtonText: 'Далее &rarr;',
        showCancelButton: true,
        cancelButtonText: 'Отмена',
        progressSteps: ['1', '2']
      }).queue([
        {
          title: 'Введите текущий пароль',
        },
        'Введите новый пароль'
      ]).then((result) => {
        if (result.value) {
          const data = JSON.stringify(result.value);
          save('password', data);
        }
      });
    }

    function save(action, data) {
      $.ajax({
        url: "/admin/api/profile/changeProfile",
        type: "POST",
        dataType: "json",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: {action, data},
        beforeSend: function () {
          Swal.fire({
            position: "center",
            icon: "info",
            title: "Обработка...",
            showConfirmButton: false
          });
        }
      })
        .done(function (r) {
          if (r.response) {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Сохранено",
              showConfirmButton: false,
              timer: 3000
            });
            $(".btn-sublit-form").removeAttr("disabled");
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Произошла ошибка",
              text: r.message,
              showConfirmButton: false,
              timer: 3000
            });
          }
        })
        .fail(function (e) {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Произошла ошибка",
            showConfirmButton: false,
            timer: 3000
          });
          $(".btn-sublit-form").removeAttr("disabled");
        });
    }
  </script>
@endsection