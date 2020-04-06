<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <title>{{$success_title}}</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800"
      rel="stylesheet"
    />
    <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" />
    <script src="{{ asset('public/js/jquery.min.js') }}"></script>
    
</head>

<body style="background-color: rgba(0,0,0,.4)">
  
    <script>
    $(document).ready(function() {
        Swal.fire({
          position: "center",
          icon: "success",
          title: "{{$success_first_text}}",
          text: "{{$success_second_text}}",
          showConfirmButton: false,
          backdrop: false
        });
    })
    </script>
    @if (config('app.env') === 'production')
    {{--  --}}
    @endif
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>