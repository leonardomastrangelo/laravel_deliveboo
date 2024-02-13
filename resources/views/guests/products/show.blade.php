

@extends('layouts.app')

@section('content')

  <section id="products-show" class="container-fluid">
    <h1>{{$product->name}}</h1>

    <div class="row d-flex flex-wrap px-3">
      {{-- image --}}
      <div class="col-12 col-md-3">
        <img src="{{asset('storage/'. $product->image)}}" class="w-100 d-block" alt="{{$product->name}}">
      </div>
      <div class="col">
         {{-- name --}}
      <h2>
        {{$product->name}}
      </h2>
      {{-- ingredients --}}
      <p>
        {{$product->ingredients}}
      </p>
      <ul>
        {{-- price --}}
        <li>
          $ {{$product->price}}
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
      </div>

    </div>

  </section>


@endsection
