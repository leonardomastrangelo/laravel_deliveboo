@extends('layouts.app')

@section('content')
    <section id="products-show" class="container-fluid py-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-12">
                            <img src="{{ asset('storage/' . $product->image) }}" class="w-100 d-block"
                                alt="{{ $product->name }}">
                        </div>
                        <div class="card-body row">
                            <h2 class="card-title  col-md-12">{{ $product->name }}</h2>
                            <p class="card-text  col-md-12">Ingredienti: <span> {{ $product->ingredients }} </span></p>
                            <div class="col-md-12">
                                <div>Prezzo: {{ $product->price }} €</div>
                                <div>
                                    @if ($product->availability)
                                        Disponibile
                                    @else
                                        Non disponibile
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (auth()->user()->id === $restaurant->user_id)
                        <div class="card-footer d-flex justify-content-center align-items-center flex-wrap">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning mx-3 my-3">
                                <i class="fa-solid fa-pen-to-square"></i> Modifica
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="my-3">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa-solid fa-trash"></i> Elimina
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('partials.modal_delete')
    </section>
@endsection
