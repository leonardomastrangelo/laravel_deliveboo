@extends('layouts.app')

@section('content')

  <section id="restaurants-show" class="container-fluid">
    <h1>{{$restaurant->name}}</h1>

    <div>
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
                  <a href="{{route('guests.products.show', $product->id)}}" class="btn btn-primary">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                </div>
              </div>
            </div>
            
          @endforeach
        </div>

      </ul>
    </div>

  </section>

@endsection
