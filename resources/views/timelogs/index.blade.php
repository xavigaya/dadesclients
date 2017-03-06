@extends('master')
@section('title', 'Llistat de Registres')
@section('content')
  <div class="container col-md-10 col-md-offset-1">
    @include('timelogs.menuequips')
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2>Registres
            
          </h2>
        </div>
        @if (session('status'))
          <div class ="alert alert-success">
              {{ session('status') }}
          </div>
        @endif
        @if($timelogs->isEmpty())
          <p>No hi ha cap registre </p>
        @else
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th class="col-md-1">Data</th>
                <th class="col-md-1">DNI</th>
                <th class="col-md-2">Nom</th>
                <th class="col-md-1">Entrada</th>
                <th class="col-md-1">Sortida</th>
                <th class="col-md-1">Festa</th>
                <th class="col-md-1">Vacances</th>
                <th class="col-md-1">Baixa</th>
                <th class="col-md-1">Editar</th>
                <th class="col-md-1">Borrar</th>
              </tr>
            </thead>
            <tbody class="text-center">
              {!! $i = 1 !!}
              @foreach($timelogs as $timelog)
                  <tr >
                      <td>
                          {!! $i++ !!}
                      </td>
                      <td>
                        {!! date('d/m/y', strtotime( $timelog->data )) !!}
                      </td>
                      <td>
                        {!! $timelog->dni !!}
                      </td>
                      <td class="text-left">
                        {!! $timelog->nom.' '.$timelog->cognoms !!}
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
                      <td>
                        <a href="/timelogs/{!! $timelog->id !!}/edit">
                          <img src="/img/edit.png" alt="Editar" title="Editar" height="20px">
                        </a>
                      </td>
                      <td>
                        <a href="/timelogs/{!! $timelog->id !!}/delete">
                          <img src="/img/trash.png" alt="Editar" title="Editar" height="20px">
                        </a>
                      </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
        @endif
    </div>
    {!! $timelogs->links() !!}

  </div>
@endsection
