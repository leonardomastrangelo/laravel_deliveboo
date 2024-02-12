@extends('layouts.app')

@section('content')

  <section id="restaurants-show" class="container-fluid">
    <h1>{{$restaurant->name}}</h1>

    <div>
      {{-- image --}}
      <div class="w-25 my-4">
        <img src="{{asset('storage/'. $restaurant->image)}}" class="w-100 d-block" alt="{{$restaurant->name}}">
      </div>
      @if (auth()->user()->id === $restaurant->user_id)
      <a href="{{route('admin.products.create', ['restaurant_id' => $restaurant->id])}}" class="btn btn-primary">
        Crea
      </a>
      @endif
      
      <h2>Prodotti</h2>
      <ul>
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
                  @if (auth()->user()->id === $restaurant->user_id)
                  <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-warning">
                    <i class="fa-solid fa-pen-to-square"></i>
                  </a>
                  <form action="{{route('admin.products.destroy', $product->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn cancel-button btn-danger fa-solid fa-trash" data-item-title="{{$product->name}}"></button>
                  </form>
                  @endif
                </div>
              </div>
            </div>
            
          @endforeach
        </div>

      </ul>
    </div>

  </section>

@endsection
