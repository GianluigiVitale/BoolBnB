<header id="myHeader">
   <div class="container-fullwidth clearfix">
       <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{route('welcome')}}">BoolBnB</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="header-pos">
                    <ul class="navbar-nav mr-auto">

                        @guest

                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        @if (Route::has('register'))
                            <a class="nav-link"  href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('owner.apartments.create')}}">Host your home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('owner.apartments.index')}}">Your apartments</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->email }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right kp--bg" aria-labelledby="navbarDropdown">
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
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
