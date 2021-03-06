@extends('master')
@section('title', 'Editar Registres Equip')
@section('content')
<div class="container col-md-10 col-md-offset-1">
  @include('timelogs.menuequips')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2>Registres {!! date('d/m/y', strtotime( $data )) !!}</h2>
        </div>
        <form class ="form-horizontal" method="post" action="TimelogsController@update">
          @foreach ($errors->all() as $error)
              <p class ="alert alert-danger">{{ $error }}</p>
          @endforeach
          @if (session('status'))
              <div class ="alert alert-success">
                  {{ session('status') }}
              </div>
          @endif
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
          @if($timelogs->isEmpty())
              <p>No hi ha cap registre </p>
              @include('timelogs.create_equip1')
          @else
              <table class="table col-md-12">
                  <thead>
                      <tr>
                          <th class="col-md-1">Data</th>
                          <th class="col-md-2">DNI</th>
                          <th class="col-md-3">Nom</th>
                          <th class="col-md-1">Entrada</th>
                          <th class="col-md-1">Sortida</th>
                          <th class="col-md-1">Festa</th>
                          <th class="col-md-1">Vacances</th>
                          <th class="col-md-1">Baixa</th>
                          <th class="col-md-1">Borrar</th>
                      </tr>
                  </thead>
                  <tbody class="text-center">
                    @foreach($timelogs as $timelog)
                      <input type="hidden" class ="form-control" id ="id"
                        value="{!! $timelog->id !!}" name="id">
                      <tr >
                          <td>
                            <input type="date" class ="form-control" id ="data"
                            value="{!! $timelog->data !!}" name="data" readonly>
                          </td>
                          <td>
                            <input type="text" class ="form-control" id ="dni"
                            value="{!! $timelog->dni !!}" readonly name="dni" >
                          </td>
                          <td class="text-left">
                            <input type="text" class ="form-control" id ="nom"
                            value="{!! $timelog->nom.' '.$timelog->cognoms !!}" readonly
                            name="nom" >
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
                              <input type="hidden" class ="form-control" id ="festa"
                                name="festa" value="0">
                              <input type="checkbox" class ="form-control" id ="festa"
                                name="festa" value="1" checked>
                            @else
                              <input type="hidden" class ="form-control" id ="festa"
                                name="festa" value="0">
                              <input type="checkbox" class ="form-control" id ="festa"
                                name="festa" value="1">
                            @endif
                          </td>
                          <td>
                            @if($timelog->vacances == 1)
                              <input type="hidden" class ="form-control" id ="vacances"
                                name="vacances" value="0">
                              <input type="checkbox" class ="form-control" id ="vacances"
                                name="vacances" value="1" checked>
                            @else
                              <input type="hidden" class ="form-control" id ="vacances"
                                name="vacances" value="0">
                              <input type="checkbox" class ="form-control" id ="vacances"
                                name="vacances" value="1">
                            @endif
                          </td>
                          <td>
                            @if($timelog->baixa == 1)
                              <input type="hidden" class ="form-control" id ="baixa"
                                name="baixa" value="0">
                              <input type="checkbox" class ="form-control" id ="baixa"
                                name="baixa" value="1" checked>
                            @else
                              <input type="hidden" class ="form-control" id ="baixa"
                                name="baixa" value="0">
                              <input type="checkbox" class ="form-control" id ="baixa"
                                name="baixa" value="1">
                            @endif
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
          <div class ="form-group">
              <div class ="col-lg-10 col-lg-offset-2">
                  <button type="reset" class ="btn btn-default">Cancel·lar</button>
                  <button type="submit" class ="btn btn-primary">Guardar</button>
              </div>
          </div>
        </form>
    </div>
</div>
@endsection
