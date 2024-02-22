@extends('layouts.app')

@section('content')
    <div id="order">
        <div class="container-fluid py-4">
            <h2 class="display-3 fw-bold text-center py-2">
                {{ __('I tuoi ordini') }}
            </h2>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            @foreach ($orders as $month => $ordersByMonth)
                <h3 class="text-light text-center m-4">Ordini di
                    <span
                        class="fs-1 text-decoration-underline">{{ \Carbon\Carbon::createFromFormat('m', $month)->formatLocalized('%B') }}</span>
                </h3>
                <div class="row justify-content-center gy-5">
                    @foreach ($ordersByMonth as $order)
                        <div
                            class="col-10 col-sm-6 col-md-4 col-lg-3 bg-light mx-4 p-3 rounded-3 d-flex flex-column justify-content-between ">
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
                                    <li>{{ $order->address }}</li>
                                </ul>
                            </div>
                            <div>
                                <span>Prodotti:</span>
                                <ul>
                                    @foreach ($order->products as $product)
                                        <li class="d-flex justify-content-between ">
                                            <span>{{ $product->name }}</span>
                                            <span>{{ $product->price }}€</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <h5 class="fw-bold fs-3">Totale: {{ $order->amount }}€</h5>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            @if ($orders->isEmpty())
                <div class="alert alert-danger text-center w-25 mx-auto">
                    Non ci sono ordini
                </div>
            @endif
        </div>
    </div>
@endsection
