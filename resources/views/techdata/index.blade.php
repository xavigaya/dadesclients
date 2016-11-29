@extends('master')
@section('title', 'Dades Tècniques')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/techdata/create">                
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Dades Tècniques
                    
                    </a>
                </span>
                <span class="badge">
                    <a href="/inputs/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Entrada
                    </a>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Dades Tècniques</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($techdata->isEmpty())
                <p>No hi ha cap contacte</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Publicació</th>
                            <th>Plantilla</th>
                            <th>Observacions</th>
                            <th>Sortida Filmació</th>
                            <th>Entrada Dades</th>
                            <th>Accions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($techdata as $data)
                            <tr >
                                <td>
                                    @foreach($publications as $publication)
                                        @if($publication->id == $data->idpubli)
                                            {!! $publication->nom !!}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{!! action('TechDataController@show', $data->id) !!}">
                                        {!! $data->plantilla !!}
                                    </a>
                                </td>
                                <td>{!! $data->observacions !!}</td>
                                <td>
                                    @foreach($filmacios as $filmacio)
                                        @if($filmacio->id == $data->idfilmacio)
                                            {!! $filmacio->nom !!}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    @foreach($inputs as $input)
                                        @if($input->id == $data->identrada)
                                            {!! $input->nom !!}
                                        @endif
                                    @endforeach
                                </td>
                                <td >
                                    <a href="/techdata/{!! $data->id !!}/edit">
                                        <img src="/img/edit.png" alt="Editar" title="Editar" height="20px">
                                    </a>
                                    <a href="/techdata/{!! $data->id !!}/delete">
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