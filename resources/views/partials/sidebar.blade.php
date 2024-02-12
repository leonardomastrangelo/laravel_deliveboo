<div id="sidebar" class="col-auto col-md-3 col-xl-2">
            <div class="d-flex flex-column justify-content-center align-items-center px-3 pt-2 text-white min-vh-100">
               <ul class="d-flex flex-column justify-content-center align-items-center">
                  <li>
                     <i class="fa-solid fa-house"></i>
                     <a class="d-none d-md-inline-block" href="{{route('home')}}">Home</a>
                  </li>
                  <li>
                     <i class="fa-solid fa-chart-line"></i>
                     <a class="d-none d-md-inline-block" href="{{route('admin.dashboard')}}">Dasboard</a>
                  </li>
                  @auth
                  <li>
                     <i class="fa-brands fa-jedi-order"></i>
                     <a class="d-none d-md-inline-block" href="{{route('admin.dashboard')}}">Orders</a>
                  </li>
                  @endauth
                  @auth
                  <li>
                    <i class="fa-solid fa-utensils"></i>
                     <a class="d-none d-md-inline-block" href="{{route('admin.restaurants.index')}}">Ristoranti</a>
                  </li>
                  @endauth
                  @guest
                  <li>
                     <i class="fa-solid fa-utensils"></i>
                     <a class="d-none d-md-inline-block" href="{{route('guests.restaurants.index')}}">Ristoranti</a>
                  </li>
                  @endguest
                  {{-- <li>
                    <i class="fa-solid fa-bowl-food"></i>
                    <a class="d-none d-md-inline-block" href="{{route('admin.products.index')}}">Prodotti</a>
                  </li> --}}
               </ul>
            </div>
        </div>