<nav id="navbar" class="container-fluid d-flex align-items-center justify-content-between">
    <a href="{{ url('/') }}">
        <img id="logo" src="{{ Vite::asset('resources/img/logo-deliveboo.png') }}" alt="logo">
    </a>

    <ul class="d-flex d-lg-none">
            <li @if (Request::url() == route('home')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="d-none d-md-inline-block tex">Home</span>
                </a>
            </li>
            <li @if (Request::url() == route('admin.dashboard')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="d-none d-md-inline-block">Dasboard</span>
                </a>
            </li>
            @auth
                <li @if (Request::url() == route('admin.orders')) class="active-link" @endif>
                    <a class="anchor-container" href="{{ route('admin.orders') }}">
                        <i class="fa-brands fa-jedi-order"></i>
                        <span class="d-none d-md-inline-block">Orders</span>
                    </a>
                </li>
            @endauth
        </ul>

    <ul class=" d-flex align-items-center justify-content-center">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost:5174">{{ __('Vai al sito') }}</a>
        </li>

        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Accedi') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item px-2">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrati') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-black" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Esci') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>
