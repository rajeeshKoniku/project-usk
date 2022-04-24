 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--favicon-->
 <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
 <!--plugins-->
 <link href="{!! asset('assets/') !!}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
 <link href="{!! asset('assets/') !!}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
 <link href="{!! asset('assets/') !!}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
 <link href="{!! asset('assets/') !!}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

 <!-- loader-->
 {{-- <link href="{!! asset('assets/') !!}/css/pace.min.css" rel="stylesheet" />
 <script src="{{ asset('assets/') }}/js/pace.min.js"></script> --}}

 <!-- Bootstrap CSS -->
 <link href="{!! asset('assets/') !!}/css/bootstrap.min.css" rel="stylesheet">
 <link href="{!! asset('assets/') !!}/css/bootstrap-extended.css" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
 <link href="{!! asset('assets/') !!}/css/app.css" rel="stylesheet">
 <link href="{!! asset('assets/') !!}/css/icons.css" rel="stylesheet">


 <meta name="csrf-token" content="{{ csrf_token()}}">
 {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

 {{-- terbaru --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
 {{-- terbaru --}}

 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@900&display=swap" rel="stylesheet">

{{-- custom css --}}
<style>
table tr{
  color: white;
}
.card{
    background-color: #3D373F;
    color: white;
  }

</style>
{{-- <style>
    body {
  font-size: 140%;
}

h2 {
  text-align: center;
  padding: 20px 0;
}
table {
    background-color: gray;
}
table caption {
    padding: .5em 0;
}

table.dataTable th,
table.dataTable td {
  white-space: nowrap;
}

.p {
  text-align: center;
  padding-top: 140px;
  font-size: 14px;
}

</style> --}}
{{-- custom css --}}

 @stack('styles')
 <title>@yield('title')</title>
