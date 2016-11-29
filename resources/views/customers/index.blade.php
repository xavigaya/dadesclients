@extends('master')
@section('title', 'Llistat de Clients')
@section('content')

        <div class="container col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Clients</h2>
                </div>
                @if (session('status'))
                    <div class ="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if(!isset($clientsHeraldo))
                    <p>No hi ha cap tipus de contacte</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nom Client</th>
                                <th>Nom Publicació</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $custo)
                                <tr>
                                    <td>
                                        {!! $custo->id !!}
                                    </td>
                                    <td>
                                        {!! $custo->nom !!}
                                    </td>
                                </tr>
                            @endforeach
                            @foreach($clientsHeraldo as $client)
                                <tr>
                                    <td>
                                        {!! $client->nomclient !!}
                                    </td>
                                    <td>
                                        {!! $client->nompubli !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>


@endsection