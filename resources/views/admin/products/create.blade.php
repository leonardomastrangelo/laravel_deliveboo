

@extends('layouts.app')

@section('content')
  <section id="products-create" class="container-fluid">
    {{-- title --}}
    <h1>Creazione</h1>

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
    <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="restaurant_id" value="{{$restaurant_id->id}}">
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
        <label for="ingredients" class="form-label">Ingredienti</label>
        <input type="text" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" value="{{old('ingredients')}}" required minlength="3" maxlength="255">
        @error('ingredients')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price')}}" required>
        @error('price')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="availability" class="form-label">Disponibilità</label>
        <input type="text" class="form-control @error('availability') is-invalid @enderror" id="availability" name="availability" value="{{old('availability')}}" required>
        @error('availability')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Crea</button>
      <button type="reset" class="btn btn-info">Reset</button>
    </form>
  </section>
@endsection