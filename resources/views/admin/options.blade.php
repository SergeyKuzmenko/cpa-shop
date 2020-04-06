@extends('layouts.admin')

@section('title', 'Параметры')

@section('styles')
  <style type="text/css">
    .label-inf {
      font-weight: 700;
      cursor: pointer;
    "
    }

    .input-group {
      margin-bottom: 15px;
    }
  </style>
@endsection

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Параметры страниц</h1>
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
                   href="#custom-tabs-three-profile" role="tab"
                   aria-controls="custom-tabs-three-profile" aria-selected="false">Подтверждение</a>
              </li>
            </ul>
          </div>

          <div class="card-body">
            <form role="form" class="form_options" onsubmit="getOptions(); return false;">

              <div class="tab-content" id="custom-tabs-three-tabContent">
                <div class="tab-pane active show" id="custom-tabs-three-main" role="tabpanel"
                     aria-labelledby="custom-tabs-three-main-tab">

                  <div class="form-group">
                    <label for="title">Заголовок страницы</label>
                    <input type="text" name="main_title" class="form-control" id="main_title"
                           placeholder="Заголовок страницы" value="{{$main_title}}">
                  </div>
                  <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="main_description" rows="5" id="main_description"
                              placeholder="Описание">{{$main_description}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Ключевые слова</label>
                    <input type="text" name="main_keywords" class="form-control" id="main_keywords"
                           placeholder="Ключевые слова (через запятую)" value="{{$main_keywords}}">
                  </div>

                  <h6 class="label-inf" for="percent">Процент скидки</h6>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">-</span>
                    </div>
                    <input type="number" name="main_percent" class="form-control" id="main_percent"
                           placeholder="0" value="{{$main_percent}}">
                    <div class="input-group-append">
                      <span class="input-group-text">%</span>
                    </div>
                  </div>

                  <h6 class="label-inf" for="old_price">Старая цена</h6>
                  <div class="input-group">
                    <input type="number" name="main_old_price" class="form-control" id="main_old_price"
                           placeholder="0" value="{{$main_old_price}}">
                    <div class="input-group-append">
                      <span class="input-group-text">грн</span>
                    </div>
                  </div>

                  <h6 class="label-inf" for="new_price">Новая цена</h6>
                  <div class="input-group">
                    <input type="number" class="form-control" name="main_new_price" class="form-control"
                           id="main_new_price" placeholder="0" value="{{$main_new_price}}">
                    <div class="input-group-append">
                      <span class="input-group-text">грн</span>
                    </div>
                  </div>

                  <hr style="color: black;margin-top: 25px;">

                  <div class="form-group">
                    <label for="description">Open Graph: Локализация</label>
                    <input type="text" name="main_og_locale" class="form-control" id="main_og_locale"
                           placeholder="" value="{{$main_og_locale}}">
                  </div>

                  <div class="form-group">
                    <label for="description">Open Graph: Тип страницы</label>
                    <input type="text" name="main_og_type" class="form-control" id="main_og_type"
                           placeholder="" value="{{$main_og_type}}">
                  </div>

                  <div class="form-group">
                    <label for="description">Open Graph: Заголовок</label>
                    <input type="text" name="main_og_title" class="form-control" id="main_og_title"
                           placeholder="" value="{{$main_og_title}}">
                  </div>

                  <div class="form-group">
                    <label for="description">Open Graph: Описание</label>
                    <input type="text" name="main_og_description" class="form-control" id="main_og_description"
                           placeholder="" value="{{$main_og_description}}">
                  </div>

                  <div class="form-group">
                    <label for="description">Open Graph: URL</label>
                    <input type="text" name="main_og_url" class="form-control" id="main_og_url"
                           placeholder="" value="{{ env('APP_URL') }}">
                  </div>

                  <div class="form-group">
                    <label for="description">Open Graph: Изображение</label>
                    <input type="text" name="main_og_image" class="form-control" id="main_og_image"
                           placeholder="" value="{{$main_og_image}}">
                  </div>

                  <div class="form-group">
                    <label for="description">Open Graph: Название сайта</label>
                    <input type="text" name="main_og_sitename" class="form-control" id="main_og_sitename"
                           placeholder="" value="{{$main_og_sitename}}">
                  </div>

                </div>

                <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel"
                     aria-labelledby="custom-tabs-three-profile-tab">
                  <div class="form-group">
                    <label for="title">Заголовок страницы</label>
                    <input type="text" name="success_title" class="form-control" id="success_title"
                           placeholder="Заголовок страницы" value="{{$success_title}}">
                  </div>
                  <div class="form-group">
                    <label for="title">Описание страницы</label>
                    <input type="text" name="success_description" class="form-control" id="success_description"
                           placeholder="Описание страницы" value="{{$success_description}}">
                  </div>
                  <div class="form-group">
                    <label for="description">Главная надпись</label>
                    <textarea class="form-control" name="success_first_text" rows="5"
                              id="success_first_text" placeholder="Главная надпись">{{$success_first_text}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="description">Дополнительная надпись</label>
                    <textarea class="form-control" name="success_second_text" rows="5"
                              id="success_second_text"
                              placeholder="Дополнительная надпись">{{$success_second_text}}</textarea>
                  </div>
                </div>

              </div>
              <button type="submit" class="btn btn-primary btn-sublit-form float-right">Сохранить</button>
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

    function getOptions() {
      $(".btn-sublit-form").attr("disabled", "disabled");
      let formData = $(".form_options").serialize();
      saveOptions(formData);
    }

    function saveOptions(data) {
      $.ajax({
        url: "/admin/api/saveOptions",
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
              title: "Произошла ошибка",
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