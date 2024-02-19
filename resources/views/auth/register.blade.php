@extends('layouts.app')

@section('content')
<div class="container">
    {{-- errori --}}
    @if ($errors->any())
      <div class="alert alert-danger py-4">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- form --}}
    <div class="row justify-content-center py-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrazione') }}</div>

                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
                        @csrf
                        {{-- campi obbligatori --}}
                        <p class="small text-end py-2">
                            I campi <span class="fs-5">*</span> sono obbligatori
                        </p>

                        {{-- email --}}
                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail *') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password --}}
                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password *') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- conferma password --}}
                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Conferma Password *') }}</label>

                            <div id="error_pass" class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div id="mario">

                                </div>
                            </div>
                        </div>

                        {{-- nome --}}
                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome Attività *') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- piva --}}
                        <div class="mb-4 row">
                            <label for="vat" class="col-md-4 col-form-label text-md-right">{{ __('Partita IVA *') }}</label>

                            <div class="col-md-6">
                                <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror" name="vat" value="{{ old('vat') }}" required minlength="11" maxlength="11">

                                @error('vat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- address --}}
                        <div class="mb-4 row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo *') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required minlength="3" maxlength="250">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- numero di telefono --}}
                        <div class="mb-4 row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Numero di telefono') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" minlength="3" maxlength="20">

                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- immagine --}}
                        <div class="mb-4 row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Immagine') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}">

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- asporto --}}
                        <div class="mb-4 row">
                            <label for="pick_up" class="col-md-4 col-form-label text-md-right">{{ __('Asporto') }}</label>
                            <div class="col-md-8">
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
                        </div>

                        {{-- descrizione --}}
                        <div class="mb-4 row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrizione') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" cols="30" rows="5">{{ old('description') }}</textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        {{-- cucine --}}
                        <div class="mb-4 row">
                            <label for="cuisines[]" class="pb-2">
                            Seleziona cucine *
                            </label>
                                    @foreach ($cuisines as $cuisine)
                                        <div class="col-md-3 mx-3 form-check @error('cuisines') is-invalid @enderror">
                                            <input type="checkbox" class="form-check-input" name="cuisines[]" value="{{ $cuisine->id }}" {{ in_array($cuisine->id, old('cuisines', [])) ? 'checked' : '' }}>
                                            <label class="form-check-label">
                                                {{ $cuisine->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                @error('cuisines')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            {{-- js errore --}}
                            <div id="luigi"></div>
                        </div>

                        {{-- bottone submit --}}
                        <div class="mb-4 row pt-4">
                            <div class="col-12 d-flex justify-content-center align-items-center">
                                <button id="register-btn" type="submit" class="btn btn-primary fs-4">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

