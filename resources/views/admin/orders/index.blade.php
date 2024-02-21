@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
    <h2 class="display-4 fw-bold text-center py-2">
        {{ __('I tuoi ordini') }}
    </h2>
    @if (session()->has('message'))
      <div class="alert alert-success">
        {{session()->get('message')}}
      </div>
    @endif

    @if(count($orders) > 0)
    @foreach($orders as $order)
        <div class="alert alert-success">
            {{$order->email}}
        </div>
    
    @endforeach

    @else
    <div class="alert alert-danger">
        Non ci sono ordini
    </div>
    @endif

    

</div>
@endsection