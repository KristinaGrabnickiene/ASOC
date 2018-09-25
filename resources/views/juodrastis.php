@extends('layouts.sea')

@section('content')
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
<p class="text-par"><h1> Antraste</h1></p>

<p class="text-name">tesktass</p>

@endsection

@guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cars.index') }}">Mašinos</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('owners.index') }}">Savininkai</a>
                            </li>
                           
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cars.index') }}">Mašinos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cars.create') }}">Sukurti mašiną</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('owners.index') }}">Savininkai</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('owners.create') }}">Sukurti sąvininką</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

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