@extends('master')
@section('title', 'Llistat Entrades')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/inputs/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Entrada
                    </a>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Entrades</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($input->isEmpty())
                <p>No hi ha cap tipus de contacte</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Entrada</th>
                            <th>Usuari</th>
                            <th>Contrasenya</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($input as $in)
                            <tr>
                                <td>{!! $in->nom !!}</td>
                                <td>{!! $in->usuari !!}</td>
                                <td>{!! $in->password !!}</td>
                                <td >
                                    <a href="/inputs/{!! $in->id !!}/delete">
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