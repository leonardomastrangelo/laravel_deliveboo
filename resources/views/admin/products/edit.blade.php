@extends('layouts.app')

@section('content')
    <section id="products-edit" class="container-fluid py-5 px-3">
        <h1 class="fw-bold text-center">Modifica <span>{{ $product->name }}</span></h1>

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
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="p-3 rounded-2 fw-bold">
            @csrf
            @method('PUT')
            <input type="hidden" name="restaurant_id" value="{{ old('restaurant_id', $product->restaurant_id) }}">
            <div class="mb-3">
                <label for="name" class="form-label">Nome*</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" required
                    minlength="3" maxlength="200" name="name" value="{{ old('name', $product->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Immagine</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                    name="image" value="{{ old('image', $product->image) }}">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="ingredients" class="form-label">Ingredienti*</label>
                <input type="text" required minlength="3" maxlength="255"
                    class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients"
                    value="{{ old('ingredients', $product->ingredients) }}">
                @error('ingredients')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo(€)*</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                    name="price" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <div id="wario"></div>
            </div>
            <div class="mb-3">
                <label for="availability" class="form-check-label">Disponibile</label>
                <input type="radio" checked class="form-check-input @error('availability') is-invalid @enderror"
                    id="availability" name="availability" value="1">
                <label for="availability" class="form-check-label">Non Disponibile</label>
                <input type="radio" class="form-check-input @error('availability') is-invalid @enderror" id="availability"
                    name="availability" value="0">
                <span>*</span>
                @error('availability')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
        <div class="form-check">
            <input type="checkbox" class="form-check-input @error('availability') is-invalid @enderror" id="availability" name="availability" value="1">
            <label for="availability" class="form-check-label">Disponibile</label>
        </div>
        @error('availability')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div> --}}
            <button type="submit" id='product_button' class="btn btn-primary">Modifica</button>
            <button type="reset" class="btn btn-danger">Ripristina</button>
            <p class="small my-3">
                Il campo * è obbligatorio
            </p>
        </form>
    </section>
@endsection
