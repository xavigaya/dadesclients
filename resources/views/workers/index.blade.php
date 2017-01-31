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
                            <th>DNI</th>
                            <th>Nom</th>
                            <th>Cognoms</th>
                            <th>Equip</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($workers as $worker)
                            <tr >
                                <td>
                                  {!! $worker->dni !!}
                                </td>
                                <td>
                                  {!! $worker->nom !!}
                                </td>
                                <td>
                                  {!! $worker->cognoms !!}
                                </td>
                                <td>
                                  {!! $worker->equip !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
