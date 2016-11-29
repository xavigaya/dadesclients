@extends('master')
@section('title', 'Llistat de Tipus de Contactes')
@section('content')
    <div class="container col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/typeperson/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Tipus Contacte
                    </a>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Tipus de Contacte</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($typeperson->isEmpty())
                <p>No hi ha cap tipus de contacte</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Tipus de Contacte</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($typeperson as $type)
                            <tr>
                                <td>{!! $type->tipus !!}</td>
                                <td >
                                    <a href="/typeperson/{!! $type->id !!}/delete">
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