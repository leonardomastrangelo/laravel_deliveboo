<div id="sidebar" class="col-3 col-md-2 col-xxl-1 d-none d-lg-block">
    <div class="d-flex flex-column justify-content-center align-items-center align-content-center px-3 pt-2 min-vh-100">
        <ul>
            <li @if (Request::url() == route('home')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('home') }}">
                    <i class="fa-solid fa-house"></i>
                    <span class="d-none d-md-inline-block tex">Home</span>
                </a>
            </li>
            <li @if (Request::url() == route('admin.dashboard')) class="active-link" @endif>
                <a class="anchor-container" href="{{ route('admin.dashboard') }}">
                    <i class="fa-solid fa-chart-line"></i>
                    <span class="d-none d-md-inline-block">Dashboard</span>
                </a>
            </li>
            @auth
                <li @if (Request::url() == route('admin.orders')) class="active-link" @endif>
                    <a class="anchor-container" href="{{ route('admin.orders') }}">
                        <i class="fa-solid fa-utensils"></i>
                        <span class="d-none d-md-inline-block">Ordini</span>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</div>
