@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h4>Etudiant</h4>
                    <span>NAN</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><a href="{{ route('matiere.list') }}">Matieres</a></h5>
                    <span>{{ App\Models\Matiere::count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5><a href="{{ route('professeur.list') }}">Professeurs</a></h5>
                    <span>{{ App\Models\Professeur::count() }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 my-3">
        <div class="card">
            <div class="col-md-6 my-5">
                <form class="d-flex flex-row justify-content-around" action="{{ route('home.search') }}" method="post">
                    @csrf
                    <input type="search" placeholder="search" name="search" class="mr-5 form-control">
                    <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    <a href="{{ route('home') }}" class="btn btn-warning btn-sm mx-2">Reload</a>
                </form>
            </div>
            <div class="card-body row">
                <div class="col-md-8">
                    <h4>Professeur Table</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nom Complet</th>
                                <th scope="col">Email</th>
                                <th scope="col">Matiere</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($data['profs']->first()))
                            <div class="alert alert-warning">
                                No prof matches these criteria
                            </div>
                            @endif

                            @foreach($data['profs'] as $prof)
                            <tr>
                                <td>
                                    <a href="{{ route('professeur.show',['id'=>$prof->id]) }}">
                                        {{ $prof->nom_complet }}
                                    </a>
                                </td>
                                <td>{{ $prof->email }}</td>
                                <td>
                                    <span class="badge {{ isset($prof->matiere) ? 'badge-success' : 'badge-danger' }}">
                                        {{ isset($prof->matiere) ? $prof->matiere->nom : 'Sans Matiere' }}
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h4>Matiere Table</h4>
                    @if(empty($data['matiere']->first()))
                    <div class="alert alert-warning">
                        No Matiere matches these criteria
                    </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID#</th>
                                <th scope="col">Nom Matiere</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['matiere'] as $matiere)
                            <tr>
                                <td>{{ $matiere->id }}</td>
                                <td>{{ $matiere->nom }}</td>
                                <td><strong>{{ $matiere->prix }}</strong> DH</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
