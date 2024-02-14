@extends('layouts.app')

@section('content')
    <section id="products-show" class="container-fluid">
        <h1>{{ $product->name }}</h1>

        <div class="row d-flex flex-wrap px-3">
            {{-- image --}}
            <div class="col-12 col-md-3">
                <img src="{{ asset('storage/' . $product->image) }}" class="w-100 d-block" alt="{{ $product->name }}">
            </div>
            <div class="col">
                {{-- name --}}
                <h2>
                    {{ $product->name }}
                </h2>
                {{-- ingredients --}}
                <p>
                    {{ $product->ingredients }}
                </p>
                <ul>
                    {{-- price --}}
                    <li>
                        $ {{ $product->price }}
                    </li>
                    {{-- availability --}}
                    <li>
                        @if ($product->availability)
                            Disponibile
                        @else
                            Non disponibile
                        @endif
                    </li>
                </ul>
                {{-- operations --}}
                @if (auth()->user()->id === $restaurant->user_id)
                    <ul class="d-flex justify-content-center align-items-center">
                        <li class="px-3">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </li>
                        <li class="px-3">
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger fa-solid fa-trash" type="submit"
                                    data-item-title='{{ $product->name }}' data-bs-toggle="modal"
                                    data-bs-target="#deleteModal"></button>
                            </form>

                        </li>
                    </ul>
                @endif
            </div>

        </div>
        @include('partials.modal_delete')
    </section>
@endsection
