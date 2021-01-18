@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('etudiant.store') }}">
                @csrf

                <div class="form-group row">
                    <label for="full_name" class="col-md-4 col-form-label text-md-right">full_name</label>

                    <div class="col-md-6">
                        <input id="full_name" type="text" class="form-control @error('full_name') is-invalid @enderror" name="full_name" autocomplete="full_name" value="{{ old('full_name') }}" autofocus>

                        @error('full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="phone" class="col-md-4 col-form-label text-md-right">phone</label>

                    <div class="col-md-6">
                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="phone" value="{{ old('phone') }}" autofocus>

                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="address" class="col-md-4 col-form-label text-md-right">address</label>

                    <div class="col-md-6">
                        <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address" value="{{ old('address') }}" autofocus></textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">gender</label>

                    <div class="col-md-6">
                        <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" autocomplete="gender" autofocus>
                            <option selected value="male">male</option>
                            <option value="female">female</option>
                        </select>
                        @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="birth_date" class="col-md-4 col-form-label text-md-right">birth_date</label>

                    <div class="col-md-6">
                        <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" autocomplete="birth_date" value="{{ old('birth_date') }}" autofocus>

                        @error('birth_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">email</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="email" value="{{ old('email') }}" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent_full_name" class="col-md-4 col-form-label text-md-right">parent_full_name</label>

                    <div class="col-md-6">
                        <input id="parent_full_name" type="parent_full_name" class="form-control @error('parent_full_name') is-invalid @enderror" name="parent_full_name" autocomplete="parent_full_name" value="{{ old('parent_full_name') }}" autofocus>

                        @error('parent_full_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="parent_phone" class="col-md-4 col-form-label text-md-right">parent_phone</label>

                    <div class="col-md-6">
                        <input id="parent_phone" type="parent_phone" class="form-control @error('parent_phone') is-invalid @enderror" name="parent_phone" autocomplete="parent_phone" value="{{ old('parent_phone') }}" autofocus>

                        @error('parent_phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Create New Etudiant
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
