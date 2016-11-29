@extends('master')
@section('title', 'Llistat de Publicacions')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/publications/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Publicació
                    </a>
                </span>
        <!--        <span class="badge">
                    <a href="/customers/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Client
                    </a>
                </span>-->
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Publicacions</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($publications->isEmpty())
                <p>No hi ha cap publicació</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nom Publicació</th>
                            <th>Client</th>
                            <th>Format</th>
                            <th>Mides</th>
                            <th>Forn</th>
                            <th>Estatus</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($publications as $publication)
                            <tr>
                                <td><a href="{!! action('PublicationsController@show', $publication->slug) !!}">{!! $publication->nom !!}</a>
                                    </td>
                                <td>
                                    @foreach($customers as $customer)
                                        @if($customer->idclient == $publication->idclient)
                                            {!! $customer->nomclient !!}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{!! $publication->format !!}</td>
                                <td>{!! $publication->mides !!}</td>
                                <td>{!! $publication->forn ? 'Si' : 'No' !!}</td>
                                <td>{!! $publication->status ? 'Actiu' : 'Inactiu' !!}</td>
                                <td>
                                    <a href="/publications/{!! $publication->slug !!}/edit">
                                        <img src="/img/edit.png" alt="Editar" title="Editar" height="20px">
                                    </a>
                                    <a href="/publications/{!! $publication->slug !!}/delete">
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