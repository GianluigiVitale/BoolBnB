<header id="myHeader">
       <div class="container-fluid wl-header clearfix">
              <div class="container-2">
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
                                                  {{ Auth::user()->name }} <span class="caret"></span>
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

                            <div class="col-xl-3 wl-searchbar">
                                   <div class="wl-searchbar-header flex-center">
                                          <form class="clearfix searchform">
                                                 <input type="search" id="search-box" placeholder="" />
                                                 <label for="search-box">
                                                        <span class="icon- fa fa-search fa-horizontal"></span>
                                                 </label>
                                          </form>
                                   </div>
                            </div>
                     </div>
              </div>
       </div>
</header>
