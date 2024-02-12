@extends('layouts.app')

@section('content')
    <section id="users-show" class="container-fluid">
        <h1>{{ $restaurant->name }}</h1>

        <div>
            {{-- image --}}
            <div class="w-25 my-4">
                <img src="{{ asset('storage/' . $restaurant->image) }}" class="w-100 d-block" alt="{{ $restaurant->name }}">
            </div>

            <h2>Prodotti</h2>
            <ul>
                @foreach ($products[$restaurant->id] as $product)
                    <li>{{ $product }}</li>
                @endforeach
            </ul>
        </div>

    </section>
@endsection
