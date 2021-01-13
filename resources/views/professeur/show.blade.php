@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>{{ $prof->nom_complet }}</h5>
                        <span>#ID {{ $prof->id }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>address</span>
                            <strong>{{ $prof->address }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>date_naissence</span>
                            <strong>{{ $prof->date_naissence }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>genre</span>
                            <strong>{{ $prof->genre }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>email</span>
                            <strong>{{ $prof->email }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>tele</span>
                            <strong>{{ $prof->tele }}</strong>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="/professeurs" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
