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
