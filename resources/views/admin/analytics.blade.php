@extends('layouts.admin')

@section('title', 'Аналитика')

@section('styles')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/theme/neo.min.css"/>
@endsection

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Аналитика</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-12">

        <div class="card card-primary card-outline card-outline-tabs">

          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-three-main-tab" data-toggle="pill"
                   href="#custom-tabs-three-main" role="tab" aria-controls="custom-tabs-three-main"
                   aria-selected="true">Главная</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                   href="#custom-tabs-three-success" role="tab"
                   aria-controls="custom-tabs-three-profile" aria-selected="false">Подтверждение</a>
              </li>
            </ul>
          </div>

          <div class="card-body">
            <form role="form" class="form_analytics">

              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane active show" id="custom-tabs-three-main" role="tabpanel"
                     aria-labelledby="custom-tabs-three-main-tab">

                  <div class="form-group">
                    <label for="description">Код аналитики для главной страницы</label>
                    <textarea class="form-control" name="analytics_main" rows="9" id="analytics_main"
                              placeholder="">{{$main_analytics}}</textarea>
                  </div>

                </div>

                <div class="tab-pane fade" id="custom-tabs-three-success" role="tabpanel"
                     aria-labelledby="custom-tabs-three-profile-tab">
                  <div class="form-group">
                    <label for="description">Код аналитики для страницы подтверждения</label>
                    <textarea class="form-control" name="analytics_success" rows="9" id="analytics_success"
                              placeholder="">{{$success_analytics}}</textarea>
                  </div>
                </div>

              </div>
              <button class="btn btn-primary btn-sublit-form float-right" onclick="getAnalytics();">Сохранить</button>
            </form>
          </div>

        </div>

      </div>
    </div>
  </section>
@endsection
@section('scripts')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/codemirror.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.52.2/mode/javascript/javascript.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script>
    $(window).bind('keydown', function (event) {
      if (event.ctrlKey || event.metaKey) {
        switch (String.fromCharCode(event.which).toLowerCase()) {
          case 's':
            event.preventDefault();
            getAnalytics()
            break;
        }
      }
    });

    function getAnalytics() {
      $(".btn-sublit-form").attr("disabled", "disabled");
      const formData = $(".form_analytics").serialize();
      saveAnalytics(formData);
      return false;
    }

    function saveAnalytics(data) {
      $.ajax({
        url: "/admin/api/saveAnalytics",
        type: "POST",
        dataType: "json",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        data: data,
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
              title: "Ошибка",
              text: r.message,
              showConfirmButton: false,
              timer: 3000
            });
            $(".btn-sublit-form").removeAttr("disabled");
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