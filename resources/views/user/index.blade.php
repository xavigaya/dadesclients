@extends('master')
@section('title', 'Prova')
@section('content')
<!--
<div class="container col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Clients</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Id Client</th>
                    <th>Nom Client</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientsHeraldo as $client)
                    <tr>
                        <td>
                            {!! $client->Id !!}
                        </td>
                        <td>
                            {!! $client->Nombre !!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
-->
@endsection