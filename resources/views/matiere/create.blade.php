@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('matiere.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">nom</label>

                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom"
                            autocomplete="nom" value="{{ old('nom') }}" autofocus>

                        @error('nom')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="prix" class="col-md-4 col-form-label text-md-right">prix</label>

                    <div class="col-md-6">
                        <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror"
                            name="prix" autocomplete="prix" value="{{ old('prix') }}" autofocus>

                        @error('prix')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Create New Matiere
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
