@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('matiere.attach',['id'=>$matiere->id]) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="nom" class="col-md-4 col-form-label text-md-right">Nom Matiere</label>
                    <div class="col-md-6">
                        <input id="nom" type="text" class="form-control" value="{{ $matiere->nom }}" disabled>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="etudiants" class="col-md-4 col-form-label text-md-right">Nom Matiere</label>
                    <div class="col-md-6">
                        <select multiple name="etudiants[]" id="etudiants" class="form-control selectpicker">
                            @foreach(App\Models\Etudiant::all() as $etudiant)
                            <option value="{{ $etudiant->id }}" {{ $matiere->etudiants->contains($etudiant->id) ? 'selected' : ''}} value="">
                                {{ $etudiant->full_name }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
