@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 ">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ route('matiere.create') }}" class="btn btn-primary my-5">
                            Create a Matiere +
                        </a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Prix</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($matieres as  $matiere)
                                <tr>
                                    <td scope="col">{{ $matiere->id }}</td>
                                    <td scope="col">{{ $matiere->nom }}</td>
                                    <td scope="col">{{ $matiere->prix }} DH</td>
                                    <td scope="col">
                                        <div class="d-flex justify-content-center ">
                                            <a href="{{ route('matiere.edit',['id'=>$matiere->id]) }}"
                                                class="btn btn-warning btn-sm mx-3">Edit</a>
                                            <form
                                                action="{{ route('matiere.delete',['id'=>$matiere->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm mx-3 btn-danger">DELETE</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
