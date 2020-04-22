@extends('layouts.admin')

@section('title', 'Администратор')

@section('styles')
  <style>
    .profile-user-img:hover {
      border: 3px solid #117ae4;
      cursor: pointer;
    }
  </style>
@endsection

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

              <form method="post" id="uploadImage" enctype="multipart/form-data">
                <label for="upload">
                  <img class="profile-user-img admin-image img-fluid img-circle"
                       src="{{ route('admin.profile.image') }}"
                       alt="{{$name}}" title="Выбрать фото" for="upload">
                  <input type="file" id="upload" style="display:none">
                </label>
              </form>
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
                  <button class="btn btn-block bg-gradient-warning btn-flat" onclick="changeLogin(); return false;">
                    Изменить логин
                  </button>
                </div>
              </div>
              <div class="form-group row">
                <label class="col-sm-2 col-form-label">Пароль</label>
                <div class="col-sm-10">
                  <button class="btn btn-block bg-gradient-warning btn-flat" onclick="changePassword(); return false;">
                    Изменить пароль
                  </button>
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
                  <button class="btn btn-success float-right save-other-submit" onclick="saveOther();return false;">
                    Сохранить
                  </button>
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
    $(window).bind('keydown', function (event) {
      if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
          case 's':
            event.preventDefault();
            saveOther()
            break;
        }
      }
    });

    $("input:file").change(function () {
      var formData = new FormData();
      var file = $('#upload')[0].files[0];
      formData.append("image", file);

      $.ajax({
        type: 'POST',
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: '/admin/profile/image',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        beforeSend: function () {
          Swal.fire({
            position: "center",
            icon: "info",
            title: "Загрузка...",
            showConfirmButton: false
          });
        },
        success: function (r) {
          if (r.response) {
            Swal.fire({
              position: "center",
              icon: "success",
              title: "Фото изменено",
              showConfirmButton: false,
              timer: 3000
            });
            $("img.admin-image").each(function () {
              let base_url = $(this).attr('src').split('?i=')[0];
              let address = base_url + '?i=' + Math.random();
              $(this).attr("src", address);
            });
          } else {
            Swal.fire({
              position: "center",
              icon: "error",
              title: "Ошибка",
              text: r.message,
              showConfirmButton: false,
              timer: 3000
            });
          }
        },
        error: function (r) {
          Swal.fire({
            position: "center",
            icon: "error",
            title: "Произошла внутренняя ошибка",
            showConfirmButton: false,
            timer: 3000
          });
        }
      });
    });

    function saveOther() {
      $(".save-other-submit").attr("disabled", "disabled");
      let name = $('#name').val();
      let email = $('#email').val();
      save('other', null, {name, email});
    }
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
          save('login', result.value[0], result.value[1]);
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
          save('password', result.value[0], result.value[1]);
        }
      });
    }

    function save(action, old_param, new_param) {
      $.ajax({
        url: "/admin/api/profile/changeProfile",
        type: "POST",
        dataType: "json",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: {action: action, old_param, new_param},
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
            $(".save-other-submit").removeAttr("disabled");
            if (r.reload) {
              location.reload();
            }
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
            title: "Произошла внутренняя ошибка",
            showConfirmButton: false,
            timer: 3000
          });
          $(".save-other-submit").removeAttr("disabled");
        });
    }
  </script>
@endsection