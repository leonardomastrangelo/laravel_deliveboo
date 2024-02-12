@extends('layouts.app')

@section('content')
  <section id="restaurants-create" class="container-fluid">
    {{-- title --}}
    <h1>Crea nuovo ristorante</h1>

    {{-- errori --}}
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- form --}}
    <form action="{{route('admin.restaurants.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required minlength="3" maxlength="200">
        @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image')}}">
        @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="address" class="form-label">Indirizzo</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{old('address')}}" required minlength="3" maxlength="255">
        @error('address')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="phone_number" class="form-label">Telefono</label>
        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{old('phone_number')}}" required minlength="3" maxlength="20">
        @error('phone_number')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-mail</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}" required minlength="3" maxlength="255">
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="vat" class="form-label">P. IVA</label>
        <input type="text" class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat" value="{{old('vat')}}" required maxlength="20" >
        @error('vat')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3">
        <label class="form-label">Asporto</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="pick_up" id="pick_up1" value='1'>
            <label class="form-check-label" for="pick_up1">
              Si
            </label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="pick_up" id="pick_up2" value='0'>
            <label class="form-check-label" for="pick_up2">
              No
            </label>
          </div>
      </div>

      <div class="mb-3">
        <label for="description">Descrizione</label>
        <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" cols="30" rows="10">
            {{old('description')}}
        </textarea>
        @error('description')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Crea</button>
      <button type="reset" class="btn btn-info">Reset</button>
    </form>
  </section>
@endsection
