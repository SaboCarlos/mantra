


<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header-area">
        <div class="h-100 d-md-flex justify-content-between align-items-center">
            <div class="email-address">
                <a href="mailto:Sabo.carlos594@gmail.com">Sabo.carlos594@gmail.com</a>
            </div>
            <div class="phone-number d-flex">
                <div class="icon">
                    <img src="../assets/icons/phone-call.png" alt="">
                </div>
                <div class="number">
                    <a href="tel:+258 842 756 666">+258 842 756 666</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Header Area -->
    <div class="main-header-area" id="stickyHeader">
        <div class="classy-nav-container breakpoint-off">
            <!-- Classy Menu -->
            <nav class="classy-navbar justify-content-between" id="southNav">

                <!-- Logo -->
                <a class="nav-brand" href="{{ url('/') }}"><img src="../assets/icons/logo.png" alt="" width="60px"></a>

                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>

                <!-- Menu -->
                <div class="classy-menu">

                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>

                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('/novidades') }}">Novidades</a></li>
                            <li><a href="{{ url('/colecao') }}">Categoria</a>
                                {{--<ul class="dropdown">
                                    <li><a href="{{ url('/') }}">Aluger</a></li>
                                    <li><a href="{{ url('/') }}">Casas</a></li>
                                    <li><a href="#">Terrenos</a></li>
                                </ul>--}}
                            </li>
                            <li><a href="{{ url('/sobre') }}">Sobre Nos</a></li>

                        </ul>

                        <!-- Search Form -->
                        <div class="south-search-form">
                            <form action="{{ url('search')}}" method="Get">
                                <input type="search" name="search" value="{{ Request::get('search')}}" id="search" placeholder="Search Anything ...">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                        </div>

                        <!-- Search Button -->
                        <a href="#" class="searchbtn"><i class="fa" aria-hidden="true"></i></a>
                        @guest
                        <ul>
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registar') }}</a>
                                </li>
                            @endif
                        </ul>
                        @else
                            <ul>
                                <li><a  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                    <ul class="dropdown">
                                        <li><a href="{{ url('/perfil') }}"><i class="fa fa-user"></i> Perfil</a></li>
                                        <li><a href="{{ url('/imobiliario') }}"><i class="fa fa-list"></i> Publicar</a></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>  {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                        </a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endguest

                        
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>
        </div>
    </div>
</header>
