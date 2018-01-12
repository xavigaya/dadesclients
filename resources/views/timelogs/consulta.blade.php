@extends('master')
@section('title', 'Consulta Horaris')
@section('content')
    <div class ="container col-md-10 col-md-offset-1">
        <div class ="well well bs-component">
            <form class ="form-horizontal" method="post">
                @foreach ($errors->all() as $error)
                    <p class ="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class ="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (session('danger'))
                    <div class ="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>CONSULTA HORARIS</legend>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                            <div class ="col-md-3">
                                Nom
                                <select class="form-control" name="workerid">
                                    @foreach ($workers as $person)
                                        <option value="{!! $person->id !!}">{!! $person->nom,' ',$person->cognoms !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class ="col-md-3">
                                Inici<input type="date" class ="form-control" id ="data" name="inici">
                            </div>
                            <div class ="col-md-3">
                                Fi<input type="date" class ="form-control" id ="data" name="fi">
                            </div>
                        </div>
                        <!--<div class ="col-lg-5 col-lg-offset-3">
                                Triar ....
                        </div>-->
                    </div>
                    
                    <div class ="form-group">
                        <div class ="col-lg-5 col-lg-offset-7">
                            <button type="submit" class ="btn btn-success" >Consultar</button>
                            <button type="reset" class ="btn btn-warning" >Cancel·lar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        @if ( empty($timelogs))
            <div class ="well well bs-component">
                No hi ha registres que mostrar
            </div>
        @else
            <div class ="well well bs-component">
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
            </div>
        @endif
    </div>
@endsection