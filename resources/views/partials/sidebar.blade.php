<div id="sidebar" class="col-auto col-md-2 col-xxl-1">
    <div class="d-flex flex-column justify-content-center align-items-center px-3 pt-2 text-white min-vh-100">
        <ul>
            <li @if(Request::url() == route('home')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="d-none d-md-inline-block">Home</span>
                </a>
            </li>
            <li @if(Request::url() == route('admin.dashboard')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="d-none d-md-inline-block">Dasboard</span>
                </a>
            </li>
            @auth
            <li>
                <a class="anchor-container" href="{{ route('admin.dashboard') }}">
                    <i class="fa-brands fa-jedi-order"></i>
                    <span class="d-none d-md-inline-block">Orders</span>
                </a>
            </li>
            <li @if(Request::url() == route('admin.restaurants.index')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('admin.restaurants.index') }}">
                    <i class="fa-solid fa-utensils"></i>
                    <span class="d-none d-md-inline-block">Ristoranti</span>
                </a>
            </li>
            @endauth
            @guest
            <li @if(Request::url() == route('guests.restaurants.index')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('guests.restaurants.index') }}">
                    <i class="fa-solid fa-utensils"></i>
                    <span class="d-none d-md-inline-block">Ristoranti</span>
                </a>
            </li>
            @endguest
        </ul>
    </div>
</div>
