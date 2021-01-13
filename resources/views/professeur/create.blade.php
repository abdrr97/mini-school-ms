@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('professeur.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">nom_complet</label>

                    <div class="col-md-6">
                        <input id="nom_complet" type="text"
                            class="form-control @error('nom_complet') is-invalid @enderror" name="nom_complet"
                            autocomplete="nom_complet" value="{{ old('nom_complet') }}" autofocus>

                        @error('nom_complet')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">address</label>

                    <div class="col-md-6">
                        <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" autocomplete="address"
                            autofocus>{{ old('address') }}</textarea>
                        @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="date_naissence" class="col-md-4 col-form-label text-md-right">date_naissence</label>

                    <div class="col-md-6">
                        <input id="date_naissence" type="date"
                            class="form-control @error('date_naissence') is-invalid @enderror" name="date_naissence"
                            autocomplete="date_naissence" value="{{ old('date_naissence') }}"
                            autofocus>

                        @error('date_naissence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="genre" class="col-md-4 col-form-label text-md-right">genre</label>

                    <div class="col-md-6">
                        <select id="genre" type="text" class="form-control @error('genre') is-invalid @enderror"
                            name="genre" autocomplete="genre" autofocus>
                            <option selected value="male">Man</option>
                            <option value="female">Women</option>
                        </select>
                        @error('genre')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

                    <div class="col-md-6">
                        <input id="email" type="male" class="form-control @error('email') is-invalid @enderror"
                            name="email" autocomplete="email" value="{{ old('email') }}" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="tele" class="col-md-4 col-form-label text-md-right">tele</label>

                    <div class="col-md-6">
                        <input id="tele" type="phone" class="form-control @error('tele') is-invalid @enderror"
                            name="tele" autocomplete="tele" value="{{ old('tele') }}" autofocus>

                        @error('tele')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Create New Proffessor
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
