@extends('layouts.app')

@section('content')

  <section id="restaurants-show" class="container-fluid py-5">
    @if (session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
    @endif
    @if (session()->has('trashed'))
    <h3>Piatti Eliminati</h3>
    @foreach (session()->get('trashed') as $element)
      <ul>
        @foreach ($element as $item)
          <li>{{$item->name}}</li>
        @endforeach  
      </ul>
    @endforeach  
    @endif
      <div class="card mb-3">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="{{asset('storage/'. $restaurant->image)}}" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">
                {{$restaurant->name}}
              </h5>
              <p class="card-text">
                {{$restaurant->description}}
              </p>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  {{$restaurant->address}}
                </li>
                <li class="list-group-item">
                  {{$restaurant->phone_number}}
                </li>
                <li class="list-group-item">
                  {{$restaurant->email}}
                </li>
                <li class="list-group-item">
                  @if ($restaurant->pick_up)
                    Asporto
                  @else
                    No Asporto 
                  @endif
                </li>
                <li class="list-group-item">
                  @foreach ($restaurant->cuisines as $cuisine)
                     <span class="badge text-bg-success">
                      {{$cuisine->name}} 
                    </span>
                  @endforeach
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @if (auth()->user()->id === $restaurant->user_id)
      <a href="{{route('admin.products.create', ['restaurant_id' => $restaurant->id])}}" class="btn btn-primary">
        Crea Prodotto
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
                    $ {{$product->price}}
                  </li>
                  <li class="list-group-item">
                    @if ($product->availability)
                        Disponibile
                      @else
                        Non disponibile
                    @endif
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
    

  </section>

@endsection
