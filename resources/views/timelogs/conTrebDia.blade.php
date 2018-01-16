@extends('master')
@section('title', 'Consulta Horaris')
@section('content')
    <div class ="container col-md-10 col-md-offset-1">
        <div class ="well well bs-component">
            <form class =" form-inline" method="post">
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
                        <div class ="col-lg-12 ">
                            <div class ="col-md-4">
                                <select class="form-control" name="dni">
                                    @foreach ($workers as $person)
                                        <option value="{!! $person->dni !!}">{!! $person->nom,' ',$person->cognoms !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class ="col-md-3">
                                <input type="date" class ="form-control" id ="datainici" name="datainici" required>
                                <span class="help-block">Data Inici</span>
                            </div>
                            <div class ="col-md-3">
                                <input type="date" class ="form-control" id ="datafi" name="datafi" required>
                                <span class="help-block">Data Final</span>
                            </div>
                            <div class ="col-md-2">
                                <button type="submit" class ="btn btn-mini btn-success" >Consultar</button>
                            </div>
                        </div>    
                    </div>
                </fieldset>
            </form>
        </div>
        
        @if ( empty($timelogs))
            <div class ="well well bs-component">
                No hi ha registres per mostrar
            </div>
        @else
            <div class ="well well bs-component">
                {!! $info !!}
                <table class="table taula table-condensed">
                <thead>
                  <tr>
                    <th class="col-md-1">#</th>
                    <th class="col-md-1">Data</th>
                    <th class="col-md-1">Entrada</th>
                    <th class="col-md-1">Sortida</th>
                    <th class="col-md-1">Festa</th>
                    <th class="col-md-1">Vacances</th>
                    <th class="col-md-1">Baixa</th>
                    <th class="col-md-3">Observacions</th>
                    <th class="col-md-1">Editar</th>
                    <th class="col-md-1">Borrar</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                  <!-- {!! $i = 1 !!} -->
                  @foreach($timelogs as $timelog)
                      <tr >
                          <td>
                              {!! $i++ !!}
                          </td>
                          <td>
                            {!! date('d/m/y', strtotime( $timelog->data )) !!}
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
                            {!! $timelog->observacions !!}
                          </td>
                          <td>
                              
                            <a href="/timelogs/{!! $timelog->id !!}/edit">
                                <i class="icon-trash"></i>
                              <img src="/img/edit.png" alt="Editar" title="Editar" height="15px">
                            </a>
                          </td>
                          <td>
                            <a href="/timelogs/{!! $timelog->id !!}/delete">
                              <img src="/img/trash.png" alt="Editar" title="Editar" height="15px">
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