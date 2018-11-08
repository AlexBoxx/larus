<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="The first intellectual system of teaching the theory of traffic on the territory of Russia and neighboring countries">

    <!-- Template Basic Images Start -->
    <link rel="icon" href="{{ asset('school/img/favicon/favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('school/img/favicon/apple-touch-icon-180x180.png') }}">
    <!-- Template Basic Images End -->

    <!-- social content link -->
  	<meta property="og:title" content="The first intellectual system of learning SDA">
  	<meta property="og:description" content="Friends, a cool online unusual training traffic free driving school without">
  	<meta property="og:url" content="https://auto-school.online/">
  	<meta property="og:image" content="img/favicon/apple-touch-icon-180x180.png">
  	<!-- social content link -->

    <!-- Custom Browsers Color End -->
   <link rel="stylesheet" href="{{ asset('school/css/main.min.css') }}">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

</head>
<body>
  <!-- preload -->
    <div id="loader-wrapper"><div class="loader">
        <div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div><div class="line"></div>
        <div class="subline"></div><div class="subline"></div><div class="subline"></div><div class="subline"></div><div class="subline"></div>
        <div class="loader-circle-1"><div class="loader-circle-2"></div></div>
        <div class="needle"></div><div class="loading">Загрузка...</div>
      </div></div>
    <!-- end preload -->



    <div class="container index login">
      <div class="row index align-items-center">

      <!-- content -->
      <div class="container index">
        <div class="row index justify-content-center">

      @yield('content')

      </div>
    </div>
  <!-- content -->


      </div>
    </div>


    <script src="{{ asset('school/js/scripts.min.js') }}"></script>

</body>
</html>
