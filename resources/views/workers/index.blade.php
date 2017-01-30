@extends('master')
@section('title', 'Llistat de Treballadors')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/workers/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Treballador
                    </a>
                </span>
                <span class="badge">
                    <a href="/typeperson/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Tipus Contacte
                    </a>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Treballadors</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($workers->isEmpty())
                <p>No hi ha cap treballador</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Publicació</th>
                            <th>Nom i Cognoms</th>
                            <th>Email</th>
                            <th>Telèfons</th>
                            <th>Càrrec</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workers as $worker)
                            <tr >
                                <td>
                                    {!! $worker->nom .' '. $worker->cognoms !!}
                                </td>
                                <td>

                                </td>
                                <td>
                                </td>
                                <td>

                                </td>
                                <td>

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
