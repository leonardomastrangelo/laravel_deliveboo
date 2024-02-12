@extends('layouts.app')

@section('content')
  <section id="products-edit" class="container-fluid">
    <h1>Modifica <span>{{$product->name}}</span></h1>

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
      <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" required minlength="3" maxlength="200" name="name" value="{{old('name', $product->name)}}">
        @error('name')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Immagine</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old('image', $product->image)}}">
        @error('image')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="ingredients" class="form-label">Ingredienti</label>
        <input type="text" required minlength="3" maxlength="255" class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients" value="{{old('ingredients', $product->ingredients)}}">
        @error('ingredients')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{old('price', $product->price)}}">
        @error('price')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <h3 class="mb-3">Disponibilità</h3>
        <label for="availability" class="form-label">Disponibile</label>
        <input type="radio" checked class="form-control @error('availability') is-invalid @enderror" id="availability" name="availability" value="1">
        <label for="availability" class="form-label">Non Disponibile</label>
        <input type="radio" class="form-control @error('availability') is-invalid @enderror" id="availability" name="availability" value="0">
        @error('availability')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Modifica</button>
      <button type="reset" class="btn btn-info">Reset</button>
    </form>
  </section>
@endsection