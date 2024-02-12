@extends('layouts.app')

@section('content')
  <section id="restaurants-index" class="container-fluid">
    <h1>Ristoranti</h1>

    <div class="row g-4 ">
      @foreach($restaurants as $restaurant)
        <div class="col-3">
          <div class="card">
            <img src="{{asset('storage/' . $restaurant->image)}}" class="card-img-top" alt="{{$restaurant->name}}">
            <div class="card-body">
              <h5 class="card-title">{{$restaurant->name}}</h5>
              <p class="card-text">{{$restaurant->description}}</p>
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                {{$restaurant->address}}
              </li>
              <li class="list-group-item">
                {{$restaurant->phone_number}}
              </li>
            </ul>
            <div class="card-body">
              <a href="{{route('admin.restaurants.show', $restaurant->id)}}" class="btn btn-primary">
                <i class="fa-solid fa-eye"></i>
              </a>

            </div>
          </div>
        </div>
      @endforeach
    </div>

  </section>

@endsection
