<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
              <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('judul')</title>
     <link href = {{ asset("css/bootstrap.min.css") }} rel="stylesheet" />

</head>
<body>

    <div class="bg-dark p-2">
        <a href="/perkin">Perjanjian Kinerja</a>
        <a href="/iku">Iku</a>
    </div>
    <div class="container">
        @yield('konten')
    </div>

</body>
</html>
