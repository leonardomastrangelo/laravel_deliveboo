@extends('layouts.app')

@section('content')

  <section id="products-show" class="container-fluid">
    <h1>{{$product->name}}</h1>

    <div>
      {{-- image --}}
      <div class="w-25">
        <img src="{{asset('storage/'. $product->image)}}" class="w-100 d-block" alt="{{$product->name}}">
      </div>
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
          {{$product->price}}
        </li>
        {{-- availability --}}
        <li>
          {{$product->availability}}
        </li>
      </ul>
      {{-- operations --}}
      <ul class="d-flex justify-content-center align-items-center">
        <li class="px-3">
          <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
        </li>
        <li class="px-3">
          <a href="{{route('admin.products.destroy', $product->id)}}" class="btn btn-danger">
            <i class="fa-solid fa-trash"></i>
          </a>
        </li>
      </ul>
    </div>
    
  </section>


@endsection