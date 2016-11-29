@extends('master')
@section('title', 'Llistat de Contactes')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/people/create">                
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Contacte
                    
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
                <h2>Contactes</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($people->isEmpty())
                <p>No hi ha cap contacte</p>
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
                        @foreach($people as $person)
                            <tr >
                                <td>
                                    @foreach($publications as $publication)
                                        @if($publication->id == $person->idpubli)
                                            {!! $publication->nom !!}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{!! action('PeopleController@show', $person->slug) !!}">
                                        {!! $person->nom .' '. $person->cognoms !!}
                                    </a>
                                </td>
                                <td>{!! $person->email !!}</td>
                                <td>
                                    @if($person->telf != "")
                                        {!! $person->telf !!} - 
                                    @endif
                                    {!! $person->mobil !!} 
                                </td>
                                <td>
                                    @foreach($peopletype as $persontype)
                                        @if($persontype->id == $person->idtipo)
                                            {!! $persontype->tipus !!}
                                        @endif
                                    @endforeach
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
                            @if($person->info != "")
                                <tr class="separador">
                                    <td >&nbsp;</td>
                                    <td colspan="4">{!! $person->info !!}</td>
                                    <td >&nbsp;</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection