@extends('master')
@section('title', 'Llistat de Registres')
@section('content')
    <div class="container col-md-10 col-md-offset-1">
      <div class="panel panel-default">
          <div class="panel-heading">
            <span class="badge">
                <a href="/timelogs/create_equip1"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Preimpressió</a>
            </span>
            <span class="badge">
                <a href="/timelogs/create_equip2"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Manteniment</a>
            </span>
            <span class="badge">
                <a href="/timelogs/create_equip3"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Impressió tarde</a>
            </span>
            <span class="badge">
                <a href="/timelogs/create_equip4"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Administració</a>
            </span>
            <span class="badge">
                <a href="/timelogs/create_equip5"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Impressió Nit</a>
            </span>
            <span class="badge">
                <a href="/timelogs/create_equip6"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Cierre</a>
            </span>
            <span class="badge">
                <a href="/timelogs/create"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Tots</a>
            </span>
          </div>
      </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Registres</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($timelogs->isEmpty())
                <p>No hi ha cap registre</p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Data</th>
                            <th>DNI</th>
                            <th>Entrada</th>
                            <th>Sortida</th>
                            <th>Festa</th>
                            <th>Vacances</th>
                            <th>Baixa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($timelogs as $timelog)
                            <tr >
                                <td>
                                    {!! $timelog->data !!}
                                </td>
                                <td>
                                    {!! $timelog->dni !!}
                                </td>
                                <td>
                                    {!! $timelog->entrada !!}
                                </td>
                                <td>
                                    {!! $timelog->sortida !!}
                                </td>
                                <td>
                                    {!! $timelog->festa !!}
                                </td>
                                <td>
                                    {!! $timelog->vacances !!}
                                </td>
                                <td>
                                    {!! $timelog->baixa !!}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
