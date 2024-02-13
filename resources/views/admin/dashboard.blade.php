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
    <div>
        
        <table class="table table-info table-hover my-5">
            <thead class="table-light">
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Asporto</th>
                </tr>
            </thead>
            <tbody>
                    @forelse ($restaurants as $restaurant)
                    <tr>
                        <td>
                            <a href="{{route('admin.restaurants.show', $restaurant->slug)}}">{{$restaurant->name}}</a>
                        </td>
                        <td>{{$restaurant->address}}</td>
                        <td>{{$restaurant->phone_number}}</td>
                        <td>{{$restaurant->email}}</td>
                        <td>
                            @if ($restaurant->pick_up)
                                Sì
                                @else
                                No
                            @endif
                        </td>
                    </tr>
                    @empty
                    <h3 class="text-center pt-4 display-5">
                        Nessun ristorante trovato
                    </h3>
                    @endforelse
            </tbody>
        </table>
           
    </div>
</div>
@endsection
