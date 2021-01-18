@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 ">
            <div class="card">
                <div class="card-body">
                    <div>
                        <a href="{{ route('etudiant.create') }}" class="btn btn-primary my-5">
                            Create a etudiants +
                        </a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID#</th>
                                <th scope="col">full_name</th>
                                <th scope="col">phone </th>
                                <th scope="col">address</th>
                                <th scope="col">gender</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($etudiants as $etudiant)
                            <tr>
                                <td scope="col">{{ $etudiant->id }}</td>
                                <td scope="col">{{ $etudiant->full_name }}</td>
                                <td scope="col">{{ $etudiant->phone }}</td>
                                <td scope="col">{{ $etudiant->address }}</td>
                                <td scope="col">{{ $etudiant->gender }}</td>
                                <td scope="col">
                                    <div class="d-flex justify-content-center ">
                                        <a href="{{ route('etudiant.edit',['id'=>$etudiant->id]) }}" class="btn btn-warning btn-sm mx-3">Edit</a>
                                        <form action="{{ route('etudiant.delete',['id'=>$etudiant->id]) }}" method="POST">
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
