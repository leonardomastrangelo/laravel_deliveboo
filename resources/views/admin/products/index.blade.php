@extends('layouts.app')

@section('content')
  <section id="products-index" class="container">
    <h1>Index</h1>

    <div class="row px-3">
      @foreach($products as $product)
        <div class="col-md-6 my-3 col-lg-4">
          <div class="card h-100">
            <div class="card-image overflow-hidden ">
                  <img src="{{asset('storage/' . $product->image)}}" class="card-img-top" alt="{{$product->name}}">
            </div>

            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->ingredients}}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                {{$product->price}}
              </li>
              <li class="list-group-item">
                {{$product->availability}}
              </li>
            </ul>
            <div class="card-body">
              <a href="{{route('admin.products.show', $product->id)}}" class="btn btn-primary">
                <i class="fa-solid fa-eye"></i>
              </a>
              <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">
                <i class="fa-solid fa-pen-to-square"></i>
              </a>
              <a href="{{route('admin.products.destroy', $product->id)}}" class="btn btn-danger">
                <i class="fa-solid fa-trash"></i>
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

  </section>


@endsection
