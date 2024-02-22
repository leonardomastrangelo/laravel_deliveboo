@extends('layouts.app')

@section('content')

    <section id="restaurants-show" class="container-fluid py-5">
        @if (session()->has('message'))
            <div class="alert alert-success w-25 text-center mx-auto">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('trashed'))
            <h3>Piatti Eliminati</h3>
            @foreach (session()->get('trashed') as $element)
                <ul>
                    @foreach ($element as $item)
                        <li>{{ $item->name }}</li>
                    @endforeach
                </ul>
            @endforeach
        @endif
        <div class="card mb-3">
            <div class="row g-0">
                <div class="col-md-8 col-lg-6">
                    <img src="{{ asset('storage/' . $restaurant->image) }}" class="img-fluid h-100 rounded-start"
                        alt="...">
                </div>
                <div class="col-md-4 col-lg-6">
                    <div class="card-body">
                        <h5 class="card-title fs-2">
                            {{ $restaurant->name }}
                        </h5>
                        <p class="card-text" style="font-style: italic">
                            {{ $restaurant->description }}
                        </p>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item my-2 border-0">
                                <i class="fa-solid fa-location-dot me-2" style="color: #000000;"></i>
                                {{ $restaurant->address }}
                            </li>
                            <li class="list-group-item my-2 border-0">
                                <i class="fa-solid fa-phone me-2" style="color: #000000;"></i>
                                {{ $restaurant->phone_number }}
                            </li>
                            <li class="list-group-item my-2 border-0">
                                <i class="fa-solid fa-envelope me-2" style="color: #000000;"></i>{{ $restaurant->email }}
                            </li>
                            <li class="list-group-item my-2 border-0">
                                <i class="fa-solid fa-bicycle me-2" style="color: #000000;"></i>
                                @if ($restaurant->pick_up)
                                    Asporto
                                @else
                                    No Asporto
                                @endif
                            </li>
                            <li class="list-group-item">
                                @foreach ($restaurant->cuisines as $cuisine)
                                    <div class="badge text-bg-success">
                                        {{ $cuisine->name }}
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="">
            <div>
                <h2 class="display-4 fw-bold text-center py-4">Prodotti</h2>
            </div>
            <div class="text-center">
                @if (auth()->user()->id === $restaurant->user_id)
                    <a href="{{ route('admin.products.create', ['restaurant_id' => $restaurant->id]) }}"
                        class="btn btn-primary">
                        Crea nuovo prodotto
                    </a>
                @endif
            </div>
        </div>

        <ul>
            <div class="row px-3">
                @foreach ($products as $product)
                    <div class="col-md-6 my-3 col-lg-4">
                        <div class="card h-100">
                            <div class="card-image overflow-hidden ">
                                <a href="{{ route('admin.products.show', $product->id) }}">
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                </a>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->name }}</h5>
                                <p class="card-text">
                                    Ingredienti: <span> {{ $product->ingredients }} </span>
                                </p>
                            </div>
                            <ul class="list-group list-group-flush border-0">
                                <li class="list-group-item border-0">
                                    Prezzo {{ $product->price }} €
                                </li>
                                <li class="list-group-item border-0">
                                    @if ($product->availability)
                                        Disponibile
                                    @else
                                        Non disponibile
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

        </ul>
    </section>

@endsection
