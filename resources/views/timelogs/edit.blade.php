@extends('master')
@section('title', 'Editar Registre')
@section('content')
<div class="container col-md-10 col-md-offset-1">
  @include('timelogs.menuequips')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Registres </h2>
        </div>
        <form class ="form-horizontal" method="post">
          @foreach ($errors->all() as $error)
              <p class ="alert alert-danger">{{ $error }}</p>
          @endforeach
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
                          <th class="col-md-1">Data</th>
                          <th class="col-md-1">DNI</th>
                          <th class="col-md-2">Nom</th>
                          <th class="col-md-1">Entrada</th>
                          <th class="col-md-1">Sortida</th>
                          <th class="col-md-1">Festa</th>
                          <th class="col-md-1">Vacances</th>
                          <th class="col-md-1">Baixa</th>
                      </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach($timelogs as $timelog)
                      <tr >
                          <td>
                            {!! date('d/m/Y', strtotime($timelog->data)) !!}
                          </td>
                          <td>
                            {!! $timelog->dni !!}
                          </td>
                          <td class="text-left">
                            @foreach($workers as $worker)
                              @if($worker->dni == $timelog->dni)
                                {!! $worker->nom.' '.$worker->cognoms !!}
                              @endif
                            @endforeach
                          </td>
                          <td>
                            <input type="text" class ="form-control" id ="entrada"
                            value="{!! $timelog->entrada !!}" name="entrada">
                          </td>
                          <td>
                            <input type="text" class ="form-control" id ="sortida"
                            value="{!! $timelog->sortida !!}" name="sortida">
                          </td>
                          <td>
                            @if($timelog->festa == 1)
                              <input type="checkbox" class ="form-control" id ="festa"
                                name="festa" value="1" checked>
                            @else
                            <input type="checkbox" class ="form-control" id ="festa"
                              name="festa" value="0">
                            @endif
                          </td>
                          <td>
                            @if($timelog->vacances == 1)
                              <input type="checkbox" class ="form-control" id ="vacances"
                                name="vacances" value="1" checked>
                            @else
                            <input type="checkbox" class ="form-control" id ="vacances"
                              name="vacances" value="0">
                            @endif
                          </td>
                          <td>
                            @if($timelog->baixa == 1)
                              <input type="checkbox" class ="form-control" id ="baixa"
                                name="baixa" value="1" checked>
                            @else
                            <input type="checkbox" class ="form-control" id ="baixa"
                              name="baixa" value="0">
                            @endif
                          </td>
                      </tr>
                    @endforeach
                  </tbody>
              </table>
          @endif
        </form>
    </div>
</div>
@endsection
