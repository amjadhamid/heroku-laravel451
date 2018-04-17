<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Amjad hamid') }}</title>


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

 <style>
.shadow-none{
    border : 0 ;
    -webkit-box-shadow : none ;
    box-shadow : none ;
}
 </style>

        {{-- include argument in the router then put the value on here --}}
</head>
<body>
    <div id="app">
        <nav class="navbar shadow-none navbar-defult navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                     
                         <ul class="navbar-nav mr-auto">
                        
                     
                     
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Amjad Hamid') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                            <li class="nav-item active">
                               <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                             </li>
                             <li class="nav-item">
                           
                               <a class="nav-link" href="/hitit">Hitit</a>
                             </li>
                              <li class="nav-item">
                               <a class="nav-link" href="/posts">Posts</a>
                             </li>
                             <li class="nav-item">
                               <a class="nav-link" href="/about">About</a>
                             </li>
                             <li class="nav-item">
                               <a class="nav-link" href="/posts/create" >Create Post</a>
                             </li>
                           </ul>
                       </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="/Dashboard">Dashboard</a></li>

                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

{{--  @include('includes.navbar');  --}}
@include('includes.messeges');



      @yield('content')

    
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
</body>
</html>
