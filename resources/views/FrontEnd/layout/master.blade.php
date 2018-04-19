<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">

  <link rel="shortcut icon" href="frontEnd/img/favicon.png">

  <title>SYSTEM STUDENT</title>

  <!-- Bootstrap CSS -->
  {!!Html::style('frontEnd/css/font-awesome.min.css')!!}
  <!-- bootstrap theme -->
    {!!Html::style('frontEnd/css/bootstrap.min.css')!!}
    {!!Html::style('frontEnd/css/style.css')!!}


    @yield('style')

</head>

<body>
  <section id="container" class="">
@include('FrontEnd.layout.Header.header')
@include('FrontEnd.layout.Footer.footer')

<section id="main-content">
  <div class="wrapper">
@yield('content')
</div>
</section>
</section>
  <!-- javascripts -->
      {!!Html::script('frontEnd/js/jquery.min.js')!!}
        {!!Html::script('frontEnd/js/bootstrap.min.js')!!}
        {!!Html::script('frontEnd/js/main.js')!!}
          @yield('script')


</body>

</html>
