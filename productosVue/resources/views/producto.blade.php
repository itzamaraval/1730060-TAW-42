<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link href="{{ mix('css/app.css') }}" type="text/css" rel="stylesheet" />
        <meta name="csrf-token" value="{{ csrf_token() }}" />

        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <!-- Nucleo Icons -->
        <link href="{{ URL::asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
        <!-- CSS Files -->
        <link href="{{ URL::asset('assets/css/black-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
    </head>

    <body>
      <div id="app">
      </div>
      <script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
    </body>
</html>
