@extends('layouts.admin')

@section('title', 'Главная')

@section('content')
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Панель администратора</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-lg-6 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3 class="numberSuccessedOrders">0</h3>
            <p>Заказов</p>
          </div>
          <div class="icon">
            <i class="fas fa-shopping-cart"></i>
          </div>
          <a href="{{ url('/admin/orders') }}" class="small-box-footer">
            Подробнее <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3 class="numberAbortedOrders">0</h3>
            <p>Количество отказов</p>
          </div>
          <div class="icon">
            <i class="fas fa-chart-pie"></i>
          </div>
          <a href="{{ url('/admin/orders') }}" class="small-box-footer">
            Подробнее <i class="fas fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Таблица заказов</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Сводка заказов</h6>
            <p class="card-text">Просмотр подробностей всех заказов (данных о клиентах, предположительное местоположение
              доставки).</p>
            <a href="{{ url('/admin/orders') }}" class="btn btn-primary">Перейти</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Параметры страниц</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Cтраницы</h6>
            <p class="card-text">Редактирование основных параметров (заголовок, цена, скидка и т.д.) которые выводятся
              на страницы сайта</p>
            <a href="{{ url('/admin/options') }}" class="btn btn-primary">Перейти</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Уведомления</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Настройка уведомлений</h6>
            <p class="card-text">Просмотр подробностей всех заказов (данных о клиентах, предположительное местоположение
              доставки).</p>
            <a href="{{ url('/admin/analytics') }}" class="btn btn-primary">Перейти</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0">Аналитинка</h5>
          </div>
          <div class="card-body">
            <h6 class="card-title">Управление скриптами аналитики</h6>
            <p class="card-text">Редактирование основных параметров (заголовок, цена, скидка и т.д.) которые выводятся
              на страницы сайта</p>
            <a href="{{ url('/admin/options') }}" class="btn btn-primary">Перейти</a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

@section('scripts')
  <script>
    jQuery(document).ready(function ($) {
      $.ajax({
        url: 'admin/api/getOrders',
        type: 'GET',
        dataType: 'json'
      })
        .done(function (data) {
          $('.numberSuccessedOrders').html(data.length);
          $('.numberAbortedOrders').html(data.filter((obj) => obj.state < 0).length);
        });

    });
  </script>
@endsection