@extends('master')
@section('title', 'Llistat d\'Equips')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/teams/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Equip
                    </a>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Equips</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($teams->isEmpty())
                <p>No hi ha cap equip</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom equip</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teams as $team)
                            <tr >
                                <td>
                                    {!! $team->id !!}
                                </td>
                                <td>
                                    {!! $team->nom !!}
                                </td>
                                <td >
                                    <a href="/people/{!! $person->slug !!}/edit">
                                        <img src="/img/edit.png" alt="Editar" title="Editar" height="20px">
                                    </a>
                                    <a href="/people/{!! $person->slug !!}/delete">
                                        <img src="/img/trash.png" alt="Esborrar" title="Esborrar" height="20px">
                                    </a>
                                </td>
                            </tr>
                            <tr class="separador">
                                <td >&nbsp;</td>
                                <td colspan="4"></td>
                                <td >&nbsp;</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
