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
        <a class="navbar-brand" href="{{ url('/') }}">
            LJKA
        </a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">

           
           <!-- Authentication Links -->
          @guest
            <li class="nav-item">
                <a class="nav-link" data-target="#login" data-toggle="modal"  href="">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-target="#register" data-toggle="modal"  href="">{{ __('Register') }}</a>
            </li>
        @else
        <li class="nav-item">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->username }}</a>
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


   <!--Modal Registration-->
   <div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content registration-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">{{ __('Register') }}</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            
            <div class="form-group">
             
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group has-feedback">
                           <!----- username-------------->
                            <label for="username" class="col-md col-form-label text-md-right">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback">
                           <!----- Email-------------->
                            <label for="email" class="col-md col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group has-feedback">
                        <!----- password -------------->
                            <label for="password" class="col-md col-form-label text-md-right">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                          </div>

                        <div class="form-group has-feedback">
                        <label for="password-confirm" class="col-md col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>

                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-green btn-block btn-flat">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>

            </div>

          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal registration-->

  <!--Modal login-->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog modal-sm">

      <!-- Modal content no 1-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center form-title">{{ __('Login') }}</h4>
        </div>
        <div class="modal-body padtrbl">

          <div class="login-box-body">
            
            <div class="form-group">
              <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
              @csrf
                <div class="form-group has-feedback">
                  <!----- username -------------->
                  <label for="email" class="col-md col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                   <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                      @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif   
                  </div>

                    <div class="form-group has-feedback">
                        <!----- password -------------->
                      <label for="password" class="col-md col-form-label text-md-right">{{ __('Password') }}</label>

                      
                      <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                          @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                    </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="checkbox icheck">
                      <label>
                      <input type="checkbox" id="loginrem" > įsiminti
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-12">
                    <button type="submit" class="btn btn-green btn-block btn-flat" >Prisijungti</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <!--/ Modal login-->
  <!--Banner-->
  <div class="banner">
    <div class="bg-color">
      <div class="container">
        <div class="row">
          <div class="banner-text text-center">
            <div class="text-border">
              <h2 class="text-dec">LAZERIŲ JACHTŲ KLASĖS ASOCIACIJA </h2>
            </div>
            
            <div class="intro-para text-center quote">
            @guest
              <p class="small-text">Norint matyti savo statusą reikia prisijungti.</p>
              <a href="" data-target="#login" data-toggle="modal" class="btn-tria">Prisijungti</a>
              @else
              <p class="small-text"> Sveiki, {{ Auth::user()->username }}</p>
             @endguest
           
             
            </div>
            <a href="#feature" class="mouse-hover">  
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--/ Banner-->

   <!--duomenys-->
   <section id="duomenys" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2 class="white">Papildoma lentele duomenims</h2>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="text-comment">
          @yield('content')
          
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </section>
  <div class="container">
      <div class="row">
        <div class="col-lg-6">
        <h2 class="text-center"></h2>
        @yield('content')
        </div>
      </div>
  </div>

  <!--paieška-->
  <section id="cta-2">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h2 class="text-center">Asociacijos nario paieška</h2>
          <p class="cta-2-txt">Paieška vykdoma aktyvių narių saraše</p>
          <div class="cta-2-form text-center">
            <form action="#" method="post" id="workshop-newsletter-form">
              <input name="" placeholder="Vardas pavardė" type="email">
              <input class="cta-2-form-submit-btn" value="Subscribe" type="submit">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ paieška-->
  
  <!--duomenys-->
  <section id="testimonial" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="header-section text-center">
          <h2 class="white">Papildoma lentele duomenims</h2>
        </div>
        <div class="col-md-12 col-sm-12">
          <div class="text-comment">
            <p class="text-par">"Cia bus tekstas"</p>
            <p class="text-name">Cia autorius</p>
          </div>
        </div>
        
        </div>
      </div>
    </div>
  </section>
  <!--/ duomenys-->

    <!--galerija-->
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
            <img src="img/course01.jpg" class="img-responsive">
            <figcaption>
              <h3>Course Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam atque, nostrum veniam consequatur libero fugiat, similique quis.</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course02.jpg" class="img-responsive">
            <figcaption>
              <h3>Course Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam atque, nostrum veniam consequatur libero fugiat, similique quis.</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
        <div class="col-md-4 col-sm-6 padleft-right">
          <figure class="imghvr-fold-up">
            <img src="img/course03.jpg" class="img-responsive">
            <figcaption>
              <h3>Course Name</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam atque, nostrum veniam consequatur libero fugiat, similique quis.</p>
            </figcaption>
            <a href="#"></a>
          </figure>
        </div>
      </div>
    </div>
  </section>
  <!--/ galerija-->
 

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
      
      <!-- End newsletter-form -->
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
  <script src="contactform/contactform.js"></script>

</body>

</html>
