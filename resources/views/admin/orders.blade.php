@extends('layouts.admin')

@section('title', 'Заказы')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">
<style type="text/css" media="screen">
  .selected {
    background: #B0BED9 !important;
  }
  tbody tr:not(.selected):hover {
    cursor: pointer !important;
  }
  .flex-wrap {
    margin-bottom: 20px;
  }
  .btn-group-fab {
    position: fixed;
    width: 50px;
    height: auto;
    right: 20px; bottom: 20px;
    display: none;
  }
  .btn-group-fab div {
    position: relative; width: 100%;
    height: auto;
  }
  .btn-group-fab .btn {
    position: absolute;
    bottom: 0;
    border-radius: 50%;
    display: block;
    margin-bottom: 4px;
    width: 40px; height: 40px;
    margin: 4px auto;
  }
  .btn-group-fab .btn-main {
    width: 50px; height: 50px;
    right: 50%; margin-right: -25px;
    z-index: 9;
  }
  .btn-group-fab .btn-sub {
    bottom: 0; z-index: 8;
    right: 50%;
    margin-right: -20px;
    -webkit-transition: all 2s;
    transition: all 0.5s;
  }
  .btn-group-fab.active .btn-sub:nth-child(2) {
    bottom: 60px;
  }
  .btn-group-fab.active .btn-sub:nth-child(3) {
    bottom: 110px;
  }
  .btn-group-fab.active .btn-sub:nth-child(4) {
    bottom: 160px;
  }
  .btn-group-fab.active .btn-sub:nth-child(5) {
    bottom: 210px;
  }
  .btn-group-fab .btn-sub:nth-child(6) {
    bottom: 260px;
  }

</style>
@endsection

@section('content')
<section class="content-header">
<div class="container-fluid">
  <div class="row mb-2">
    <div class="col-sm-6">
      <h1>Таблица заказов</h1>
    </div>
  </div>
</div>
</section>
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
            <div class="table-responsive">
              <table id="orders" class="table table-bordered table-hover " style="width: 100%" >
                <thead>
                <tr>
                  <th data-priority="1">№ Заказа</th>
                  <th>№ Формы</th>
                  <th data-priority="2">Имя</th>
                  <th data-priority="3">Телефон</th>
                  <th data-priority="4">Дата/Время</th>
                  <th>IP-адресс</th>
                  <th>Город</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th>№ Заказа</th>
                  <th>№ Формы</th>
                  <th>Имя</th>
                  <th>Телефон</th>
                  <th>Дата/Время</th>
                  <th>IP-адресс</th>
                  <th>Город</th>
                </tr>
                </tfoot>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="btn-group-fab" role="group" aria-label="Orders Actions">
  <div>
    <button type="button" class="btn btn-main btn-primary has-tooltip" data-placement="left" title="Действие с заказом" > <i class="fa fa-bars"></i> </button>
    <button type="button" class="btn btn-sub btn-danger has-tooltip" onclick="actionOrder('delete')" data-placement="left" data-toggle="tooltip" data-placement="left" title="Удалить"> <i class="fa fa-trash-o"></i> </button>
    <button type="button" class="btn btn-sub btn-info has-tooltip" onclick="actionOrder('discard')" data-placement="left" data-toggle="tooltip" data-placement="left" title="По умолчанию"> <i class="fa fa-file-o"></i> </button>
    <button type="button" class="btn btn-sub btn-warning has-tooltip" onclick="actionOrder('canceled')" data-placement="left" data-toggle="tooltip" data-placement="left" title="Заказ был отменен"> <i class="fa fa-times"></i> </button>
    <button type="button" class="btn btn-sub btn-success has-tooltip" onclick="actionOrder('successed')" data-placement="left" data-toggle="tooltip" data-placement="left" title="Подтверждение заказа"> <i class="fa fa-check"></i> </button>
  </div>
</div>
@endsection

@section('scripts')
<script src="{{asset('public/dashboard/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('public/dashboard/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
  const Toast = Swal.mixin({
  toast: true,
  position: "top",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: false
});
let table = $("#orders").DataTable({
  select: {
    style: "single"
  },
  language: {
    url: "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Russian.json"
  },
  responsive: true,
  paging: true,
  lengthChange: true,
  searching: true,
  ordering: true,
  info: true,
  autoWidth: true,
  ajax: {
    url: "/admin/api/getOrders",
    dataSrc: ""
  },
  columns: [
    {
      data: "id",
      width: "5%"
    },
    {
      data: "form",
      width: "5%"
    },
    {
      data: "name",
      width: "10%"
    },
    {
      data: "phone",
      width: "20%"
    },
    {
      data: "timestamp",
      width: "15%"
    },
    {
      data: "ip",
      width: "15%"
    },
    {
      data: "location",
      width: "30%"
    }
  ],
  createdRow: function(row, data, dataIndex) {
    if (data.state == 1) {
      $("td", row).addClass("table-success");
    } else if (data.state == -1) {
      $("td", row).addClass("table-danger");
    }
  }
});

function setOrderState(id, action) {
  let query = $.ajax({
    url: "/admin/api/setOrderState",
    type: "POST",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    dataType: "json",
    data: { id, action }
  })
    .done(function(r) {
      if (r.response) {
        if (action == "successed") {
          table.ajax.reload();
          Toast.fire({
            icon: "success",
            title: "Заказ подтвержден"
          });
        } else if (action == "canceled") {
          table.ajax.reload();
          Toast.fire({
            icon: "error",
            title: "Заказ отменен"
          });
        } else if (action == "discard") {
          table.ajax.reload();
          Toast.fire({
            icon: "success",
            title: "Статус заказа: По умолчанию"
          });
        } else if (action == "delete") {
          table.ajax.reload();
          Toast.fire({
            icon: "success",
            title: "Заказ был удален"
          });
        }
      }  else {
        Toast.fire({
          icon: "warning",
          title: "При сохранении статуса заявка произошла ошибка"
        });
      }
      $('.btn-group-fab').css('display', 'none');
    })
    .fail(function() {
      Toast.fire({
        icon: "warning",
        title: "При отправке запроса на сервер произошла ошибка"
      });
    });
}

$(function() {
  $('.btn-group-fab').on('click', '.btn', function() {
    $('.btn-group-fab').toggleClass('active');
  });
  $('has-tooltip').tooltip();
  $('[data-toggle="tooltip"]').tooltip()
});

function actionOrder(action) {
  let id = table.rows({ selected: true }).data()[0].id
  setOrderState(id, action);
}

table.on("select", function(e, dt, type, indexes) {
    $('.btn-group-fab').css('display', 'block');
  })
  .on("deselect", function(e, dt, type, indexes) {
    $('.btn-group-fab').css('display', 'none');
  });
</script>
@endsection