@extends('master')
@section('title', 'Consulta Horaris de Treball')
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
                    <legend>CONSULTA HORARIS DE TREBALL</legend>
                    <div class ="form-group col-lg-12">
                            <div class ="col-md-3">
                                <select class="form-control" name="id">
                                    @foreach ($teams as $team)
                                        <option value="{!! $team->id !!}">{!! $team->nom !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class ="col-md-3">
                                <input type="date" class ="form-control" id ="data" name="data" value="{{ date('Y-m-d', strtotime( old('data').' + 0 days')) }}" required>
                            </div>
                            <div class ="col-md-3">
                                <button type="submit" class ="btn btn-success" >Consultar</button>
                            </div>
                    </div>
                </fieldset>
            </form>
        </div>
        
        @if ( empty($workers))
            <div class ="well well bs-component">
                No hi ha registres per mostrar
            </div>
        @else
            <div class ="well well bs-component">
                <label>{!! $nom !!}</label>
                <table class="table taula table-condensed">
                <thead>
                  <tr>
                    <th class="col-md-2">Nom</th>
                    <th class="col-md-1">Entrada</th>
                    <th class="col-md-1">Sortida</th>
                    <th class="col-md-1">Festa</th>
                    <th class="col-md-1">Vacances</th>
                    <th class="col-md-1">Baixa</th>
                    <th class="col-md-5">Observacions</th>
                    <th class="">Editar</th>
                    <th class="">Borrar</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($timelogs as $hora)
                       <tr>
                          <td>{!! $hora->nom.' '.$hora->cognoms !!}</td>
                          <td>{!! $hora->entrada !!}</td>
                          <td>{!! $hora->sortida !!}</td>
                          <td>{!! $hora->festa !!}</td>
                          <td>{!! $hora->vacances !!}</td>
                          <td>{!! $hora->baixa !!}</td>
                          <td>{!! $hora->observacions !!}</td>
                          <td><a href="/timelogs/{!! $hora->id !!}/edit">
                            <i class="glyphicon glyphicon-pencil"></i></a></td>
                          <td><a href="/timelogs/{!! $hora->id !!}/delete">
                            <i class="glyphicon glyphicon-trash"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
                {!! dump($hores) !!}
                {!! dump($timelogs) !!}
            </div>
        @endif
    </div>
@endsection