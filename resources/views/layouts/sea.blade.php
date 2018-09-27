<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lazer</title>

  <!-- Fonts -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
  <!-- Style -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/imagehover.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
  <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>
  
  <script>
        $('.delete-form').submit(function() {
            
            return confirm('Ar tikrai norite ištrinti');
        });
        </script>
</head>

<body>
  <!--Navigation bar-->
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/home') }}">
            LJKA
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">

           <!-- Authentication Links -->
          @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @else 
        <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.index') }}">Profiliai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.index') }}">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('document.index') }}">Dokumentų šablonai</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.create') }}">Sukurti profilį</a>
            </li>
            <li class="nav-item">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> {{ Auth::user()->username }}</a>
                </li> 
                <li class="nav-item"> 
                  <a href="{{ route('logout') }}"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                </li>
        @endguest
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Navigation bar-->
  <br>
  <br>
  <section id="duomenys" class="section-padding">
    <div class="container">
      <div class="container">
          <div class="row">
            
            
            @yield('content')
        
      </div>
    </div>
  </div>
  </section>

    <!--Courses-->
  <section id="courses" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2>Galerija</h2>
           <hr class="bottom-line">
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="{{ asset('img/course01.jpg')}}" class="img-responsive"> 
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="{{ asset('img/course02.jpg')}}" class="img-responsive">
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="{{ asset('img/course03.jpg')}}" class="img-responsive">
            <a href="#"></a>
          </figure>
        </div>
      </div>
    </div>
  </section>
  <!--/ Courses-->
 

  <!--Footer-->
  <footer id="footer" class="footer">
    <div class="container text-center">
        <div class="col-xs-12">
        <h2>Kontaktai</h2>
          <p>Lazerių jachtų klasės asociacija <br>
           Kodas 304423310<br>
          Topolių g. 5, Rumšįškių mstl., Kaišiadorių r. Sav., Kaišiadorys <br>
          Swedbank LT22 7300 0101 5101 8087 <br>
          El. Paštas linas.grabnickas@sailing.lt</p>
          </div>
      
<!-- Linkai -->
      <ul class="social-links">
        <li><a href="#link"><i class="fa fa-twitter fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-facebook fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-google-plus fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-dribbble fa-fw"></i></a></li>
        <li><a href="#link"><i class="fa fa-linkedin fa-fw"></i></a></li>
      </ul>
      ©2018  All rights reserved
      <div class="credits">
      </div>
    </div>
  </footer>
  
  <!--/ Footer-->

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/custom.js"></script>


</body>

</html>
