 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!--favicon-->
 <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
 <!--plugins-->
 <link href="{!! asset('assets/') !!}/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
 <link href="{!! asset('assets/') !!}/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
 <link href="{!! asset('assets/') !!}/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
 <link href="{!! asset('assets/') !!}/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
 <!-- loader-->
 <link href="{!! asset('assets/') !!}/css/pace.min.css" rel="stylesheet" />
 <script src="{{ asset('assets/') }}/js/pace.min.js"></script>
 <!-- Bootstrap CSS -->
 <link href="{!! asset('assets/') !!}/css/bootstrap.min.css" rel="stylesheet">
 <link href="{!! asset('assets/') !!}/css/bootstrap-extended.css" rel="stylesheet">
 <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet"> -->
 <link href="{!! asset('assets/') !!}/css/app.css" rel="stylesheet">
 <link href="{!! asset('assets/') !!}/css/icons.css" rel="stylesheet">
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token()}}">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <title>@yield('title')</title>
