@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="fs-4 text-secondary my-4">
        {{ __('Dashboard') }}
    </h2>
    @if (session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
    @endif
    <div class="row justify-content-center">
        
            <a class="btn btn-primary" href="{{route('admin.restaurants.create')}}">
                Crea
            </a>
        
        @foreach ($restaurants as $restaurant)
        <div class="col-12 col-md-4 col-lg-3">
            <div class="card">
                <a href="{{route('admin.restaurants.show', $restaurant->id)}}">
                    <h1>{{$restaurant->name}}</h1>
                </a>
                
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
