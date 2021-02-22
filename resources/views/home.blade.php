@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><a href="{{ route('etudiant.list') }}">Etudiant</a></h5>
                    {{-- <span>{{ App\Models\Etudiant::count() }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><a href="{{ route('matiere.list') }}">Matieres</a></h5>
                    {{-- <span>{{ App\Models\Matiere::count() }}</span> --}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><a href="{{ route('professeur.list') }}">Professeurs</a></h5>
                    {{-- <span>{{ App\Models\Professeur::count() }}</span> --}}
                </div>
            </div>
        </div>

    </div>

    <div class="col-12 my-3">
        <div class="card">
            <div class="col-md-8 my-5">
                <form class="d-flex flex-row justify-content-around" action="{{ route('home.search') }}" method="post">
                    @csrf
                    <input type="search" placeholder="search" name="search" value="{{ old('search') }}"
                        class="mr-5 form-control">
                    <div class="d-flex my-1">
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                        <a href="{{ route('home') }}" class="btn btn-warning btn-sm mx-2">Reload</a>
                    </div>
                </form>
            </div>
            <div class="card-body row">
                <div class="col-8">
                    <h4>Etudiants associe au Matiers</h4>
                    <table class="table table-bordered ">
                        <thead>
                            <tr>
                                <th>Matiere</th>
                                <th>Etudiant</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matieres as $matiere)
                            <tr>
                                <td><a href="{{ route('matiere.edit',['id'=>$matiere->id]) }}">{{ $matiere->nom }}</a>
                                </td>
                                <td>
                                    <ul class="list-group">
                                        @foreach($matiere->etudiants as $etudiant)
                                        <li class="list-group-item d-flex justify-content-between">
                                            {{ $etudiant->full_name }}
                                            <em><small>{{ $etudiant->matiere_etudiant->created_at->diffForHumans() }}</small></em>
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td><a href="{{ route('matiere.attach',['id'=>$matiere->id]) }}">
                                        Attach student to this class
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-4">
                    <h4>Professeur Table</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nom Complet</th>
                                <th scope="col">Matiere</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($profs->first()))
                            <div class="alert alert-warning">
                                No prof matches these criteria
                            </div>
                            @endif

                            @foreach($profs as $prof)
                            <tr>
                                <td>
                                    <a href="{{ route('professeur.show',['id'=>$prof->id]) }}">
                                        {{ $prof->nom_complet }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge {{ isset($prof->matiere) ? 'badge-success' : 'badge-danger' }}">
                                        {{ isset($prof->matiere) ? $prof->matiere->nom : 'Sans Matiere' }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            @if(!empty($profs->first()))
                            {{ $profs->links() }}
                            @endif
                        </tfoot>
                    </table>
                </div>

                <div class="col-6">
                    {{ $matieres->links() }}
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@endsection