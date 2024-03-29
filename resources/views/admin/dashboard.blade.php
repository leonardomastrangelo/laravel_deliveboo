@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4" id="dashboard">
        <h2 class="display-3 fw-bold text-center py-2">
            {{ __('I tuoi ristoranti') }}
        </h2>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

        @forelse ($restaurants as $restaurant)
            <div class="card mb-3 w-75 m-auto">
                <div class="row g-0">
                    <div class="col-md-6">
                        <a href="{{ route('admin.restaurants.show', $restaurant->slug) }}">
                            <img src="{{ "storage/$restaurant->image" }}" class="img-fluid h-100 rounded-start"
                                alt="{{ $restaurant->name }}">
                        </a>
                    </div>
                    <div class="col-md-6 ">
                        <div class="card-body">
                            <h5 class="card-title fs-4">{{ $restaurant->name }}</h5>
                            <p class="card-text" style="font-style: italic">
                                {{ $restaurant->description }}
                            </p>
                            <div>
                                <small class="card-text d-block mb-2">
                                    <i class="fa-solid fa-location-dot me-2" style="color: #000000;"></i>
                                    {{ $restaurant->address }}
                                </small>
                                <small class="card-text d-block mb-2">
                                    <i class="fa-solid fa-envelope me-2" style="color: #000000;"></i>
                                    {{ $restaurant->email }}
                                </small>
                                <small class="card-text d-block mb-2">
                                    <i class="fa-solid fa-phone me-2" style="color: #000000;"></i>
                                    {{ $restaurant->phone_number }}
                                </small>
                            </div>
                            <div class="pt-4 pb-2">
                                @if ($restaurant->pick_up)
                                    <span class="badge text-bg-warning">Asporto</span>
                                @else
                                    <span class="badge text-bg-success">No Asporto</span>
                                @endif
                            </div>
                            <ul class="p-0">
                                @foreach ($restaurant->cuisines as $cuisine)
                                    <li class="badge text-bg-success">
                                        {{ $cuisine->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h3 class="text-center pt-4 display-5">
                Nessun ristorante trovato
            </h3>
        @endforelse
    </div>
@endsection
