@extends('layouts.app')

@section('content')
    <div id="order">
        <div class="container-fluid py-4">
            <h2 class="display-4 fw-bold text-center py-2">
                {{ __('I tuoi ordini') }}
            </h2>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row g-2">
                @if (count($orders) > 0)
                    @foreach ($orders as $order)
                        <div
                            class="col-10 col-sm-5 col-md-4 col-lg-3 bg-light mx-4 p-3 rounded-3 d-flex flex-column justify-content-between overflow-hidden">
                            <h3 class="text-center fs-3">Ordine</h3>
                            <div>
                                <span>Nome e Cognome:</span>
                                <ul>
                                    <li> {{ $order->name }} {{ $order->surname }}</li>
                                </ul>
                            </div>
                            <div>
                                <span>Contatti:</span>
                                <ul>
                                    <li> {{ $order->email }}</li>
                                    <li> {{ $order->phone_number }}</li>
                                </ul>
                            </div>
                            <div>
                                <span>Indirizzo di spedizione:</span>
                                <ul>
                                    <li>
                                        {{ $order->address }}
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <span>Prodotti:</span>
                                <ul>
                                    @foreach ($order->products as $product)
                                        <li class="d-flex justify-content-between ">
                                            <span> {{ $product->name }}</span>
                                            <span>{{ $product->price }}€</span>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                            <div>
                                <h5 class=" fw-bold fs-3">Totale: {{ $order->amount }}€</h5>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <div class="alert alert-danger">
                Non ci sono ordini
            </div>
            @endif



        </div>
    </div>

@endsection
