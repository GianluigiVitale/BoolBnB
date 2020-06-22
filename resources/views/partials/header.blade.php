<header id="myHeader">
       <div class="container-fluid clearfix">
              <nav class="navbar navbar-expand-lg">
                     <a class="navbar-brand" href="#">BoolBnB</a>
                     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse justify-content-end"  id="navbarNavAltMarkup">
                       <div class="navbar-nav">
                         <a class="nav-item nav-link" href="#">Host Your Home <span class="sr-only">(current)</span></a>
                         @guest
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a class="nav-link kb--btn" href="{{ route('register') }}">{{ __('Register') }}</a>
                         @endguest
                       </div>
                     </div>
                   </nav>
              {{-- <div class="container-2">
                     <div class="row wl-header-row">
                            <div class="col-xl-2 col-lg-12 wl-logo">
                                   <div class="wl-logo-header flex-center">
                                          <a id="logo" href="" rel="home">BoolBnB</a>
                                          <i class="fas fa-bars"></i>
                                   </div>


                            </div>

                            <div class="col-xl-7  wl-nav">
                                   <div class="wl-nav-header flex-center">
                                          <a class="nav-link" href="#">Host your home</a>
                                          <a class="nav-link" href="#">Help</a>
                                          @guest
                                          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                          @if (Route::has('register'))
                                              <a class="nav-link"  href="{{ route('register') }}">{{ __('Register') }}</a>
                                          @endif
                                          @else
                                          <li class="nav-item dropdown">
                                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                  {{ Auth::user()->email }} <span class="caret"></span>
                                              </a>

                                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                                                          document.getElementById('logout-form').submit();">
                                                      {{ __('Logout') }}
                                                  </a>

                                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                      @csrf
                                                  </form>
                                              </div>
                                          </li>
                                          @endguest
                                   </div>
                            </div>
                     </div>
              </div> --}}
       </div>
</header>
