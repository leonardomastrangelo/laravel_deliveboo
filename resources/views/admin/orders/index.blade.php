@extends('layouts.app')

@section('content')
    <div id="order">
        <div class="container-fluid py-4">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif

            <div class="container">
                @forelse ($ordersByMonth as $month => $orders)
                    <h2 class="display-3 fw-bold text-center py-2">Ordini
                        <span class="fs-2 text-decoration-underline">{{ \Carbon\Carbon::createFromFormat('m', $month)->format('m/Y') }}</span>
                    </h2>
                    <form class="w-50 mx-auto py-4 text-center" action="{{route('admin.orders')}}" method="get">
                        <label class="form-label text-dark" for="address">
                            Cerca per indirizzo
                        </label>
                        <div class="w-50 mx-auto">
                            <input value="{{old('address', $address)}}" type="text" name="address" id="address" class="form-control">
                            <button type="submit" class="btn btn-primary mt-2">
                                Cerca
                            </button>
                        </div>
                    </form>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">Nome e Cognome</th>
                                    <th scope="col">Numero di telefono</th>
                                    <th scope="col">Indirizzo di spedizione</th>
                                    <th scope="col">Totale</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.orders.show', $order->id) }}">
                                                {{ $order->name }} {{ $order->surname }}
                                            </a>
                                        </td>
                                        <td>{{ $order->phone_number }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>{{ $order->amount }}€</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        @empty
                        <div class="alert alert-danger text-center w-25 mx-auto">
                            Nessun ordine trovato
                        </div>
                            
                        @endforelse
            </div>

            @if (!$ordersByMonth)
                <div class="alert alert-danger text-center w-25 mx-auto">
                    Non ci sono ordini
                </div>
            @endif
        </div>
    </div>
@endsection