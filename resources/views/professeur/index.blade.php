@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col card">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible mt-2 fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div>
                <a href="{{ route('professeur.create') }}" class="btn btn-primary my-5">Create a
                    Professor +
                </a>
            </div>
            <div>
                <h5>Professeurs Avec Matiere</h5>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Nom Complet</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Matiere</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date de Naissence</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($profs as $prof)
                        @if(isset($prof->matiere))
                            <tr>
                                <td>{{ $prof->nom_complet }}</td>
                                <td>{{ $prof->genre }}</td>
                                <td>
                                    <span
                                        class="badge {{ isset($prof->matiere) ? 'badge-success' : 'badge-danger' }}">
                                        {{ $prof->matiere->nom }}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{ $prof->email }}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{ Carbon\Carbon::parse($prof->date_naissence)->isoFormat('MMMM Do YYYY') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('professeur.show',['id'=>$prof->id]) }}"
                                            class="btn btn-sm btn-primary mr-2">
                                            View
                                        </a>
                                        <form
                                            action="{{ route('professeur.delete',['id'=>$prof->id]) }}"
                                            method="post">
                                            <button type="submit" class="btn btn-sm btn-danger mr-2">
                                                @csrf
                                                @method('DELETE')
                                                Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('professeur.edit',['id'=>$prof->id]) }}"
                                            class="btn btn-sm btn-warning mr-2">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    {{ $profs->links() }}
                </tfoot>
            </table>
            <table class="table table-bordered">
                <div>
                    <h5>Professeurs Sans Matiere</h5>
                </div>
                <thead>
                    <tr>
                        <th scope="col">Nom Complet</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Matiere</th>
                        <th scope="col">Email</th>
                        <th scope="col">Date de Naissence</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($profs as $prof)
                        @if(!isset($prof->matiere))
                            <tr>
                                <td>{{ $prof->nom_complet }}</td>
                                <td>{{ $prof->genre }}</td>
                                <td>
                                    <span
                                        class="badge {{ isset($prof->matiere) ? 'badge-success' : 'badge-danger' }}">
                                        No Matiere
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{ $prof->email }}
                                    </span>
                                </td>
                                <td>
                                    <span>
                                        {{ Carbon\Carbon::parse($prof->date_naissence)->isoFormat('MMMM Do YYYY') }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <a href="{{ route('professeur.show',['id'=>$prof->id]) }}"
                                            class="btn btn-sm btn-primary mr-2">
                                            View
                                        </a>
                                        <form
                                            action="{{ route('professeur.delete',['id'=>$prof->id]) }}"
                                            method="post">
                                            <button type="submit" class="btn btn-sm btn-danger mr-2">
                                                @csrf
                                                @method('DELETE')
                                                Delete
                                            </button>
                                        </form>
                                        <a href="{{ route('professeur.edit',['id'=>$prof->id]) }}"
                                            class="btn btn-sm btn-warning mr-2">
                                            Edit
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
