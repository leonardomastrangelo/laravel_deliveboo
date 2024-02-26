@extends('layouts.app')
@section('content')
    <div class="wrap d-flex align-items-center">
	<div class="cube">
		<div><h1 style="color: rgb(43, 191, 197);">Deliveboo</h1></div>
		<div class="back" >
            <img class="w-100 d-block" src="{{asset('storage/restaurants/burgerking.jpg')}}" alt="">
        </div>
		<div class="top">
            <img class="w-100 d-block" src="{{asset('storage/restaurants/thaispice.jpg')}}" alt="">
        </div>
		<div class="bottom">
            <img class="w-100 d-block" src="{{asset('storage/restaurants/starbucks.jpg')}}" alt="">
        </div>
		<div class="left">
            <img class="w-100 d-block" src="{{asset('storage/restaurants/tacobell.jpg')}}" alt="">
        </div>
		<div class="right">
            <img class="w-100 d-block" src="{{asset('storage/restaurants/pizzahut.jpg')}}" alt="">
        </div>
	</div>
</div>
@endsection
