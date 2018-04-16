<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Amjad Hamid</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- when you install the backeges with npm
        which it in the package.json
        you must include it in the project --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://bootswatch.com/4/lux/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  </head>
        {{-- include argument in the router then put the value on here --}}

     

    <body>
    {{-- <h1>{{$name}} </h1> --}}

@include('includes.navbar');
@include('includes.messeges');

      @yield('content');
    </body>
</html>
