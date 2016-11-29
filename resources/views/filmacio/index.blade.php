@extends('master')
@section('title', 'Llistat de Tipus de Filmació')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/filmacios/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Tipus Filmació
                    </a>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Tipus de Filmació</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($filmacios->isEmpty())
                <p>No hi ha cap tipus de filmació</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($filmacios as $filmacio)
                            <tr>
                                <td>{!! $filmacio->nom !!}</td>
                                <td >
                                    <a href="/filmacios/{!! $filmacio->id !!}/delete">
                                        <img src="/img/trash.png" alt="Esborrar" title="Esborrar" height="20px">
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection