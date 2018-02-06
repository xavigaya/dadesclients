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

        @if ( empty($hores))
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
                    <th class="col-md-1">Permís</th>
                    <th class="col-md-5">Observacions</th>
                    <th class="">Editar</th>
                    <th class="">Borrar</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($hores as $hora)
                       <tr>
                       @if (!empty($hora->entrada || $hora->sortida || $hora->festa || $hora->vacances || $hora->baixa || $hora->permis))
                          <td>{!! $hora->nom.' '.$hora->cognoms !!}</td>
                          <td>{!! $hora->entrada !!}</td>
                          <td>{!! $hora->sortida !!}</td>
                          <td>{!! $hora->festa !!}</td>
                          <td>{!! $hora->vacances !!}</td>
                          <td>{!! $hora->baixa !!}</td>
                          <td>{!! $hora->permis !!}</td>
                          <td>{!! $hora->observacions !!}</td>
                          
                          <td><a href="/timelogs/{!! $hora->idtimelogs !!}/edit" target="_blank">
                            <i class="glyphicon glyphicon-pencil"></i></a></td>
                           <td><a href="/timelogs/{!! $hora->idtimelogs !!}/delete" target="_blank">
                            <i class="glyphicon glyphicon-trash"></i></a></td>
                       @else
                           <form class ="form-horizontal" method="post" action="/timelogs/consulta/equipdia/insert">
                               @foreach ($errors->all() as $error)
                                    <p class ="alert alert-danger">{{ $error }}</p>
                                @endforeach
                                @if (session('status'))
                                    <div class ="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                @endif
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                <input type="hidden" class ="form-control" id ="dni" value="{!! $hora->dni !!}" name="dni">
                                <input type="hidden" class ="form-control" id ="data" value="{!! $data !!}" name="data">
                                <input type="hidden" class ="form-control" id ="equip" value="{!! $team !!}" name="equip">
                               <td>{!! $hora->nom.' '.$hora->cognoms !!}</td>
                               <td>
                                   <input type="time" class ="" id ="entrada" name="entrada">
                               </td>
                               <td>
                                   <input type="time" class ="" id ="sortida" name="sortida">
                               </td>
                               <td>
                                   <input type="hidden" class ="" id ="festa" name="festa" value="0">
                                   <input type="checkbox" class ="" id ="festa" name="festa" value="1">
                               </td>
                               <td>
                                   <input type="hidden" class ="" id ="vacances" name="vacances" value="0">
                                   <input type="checkbox" class ="" id ="vacances" name="vacances" value="1">
                               </td>
                               <td>
                                   <input type="hidden" class ="" id ="baixa" name="baixa" value="0">
                                   <input type="checkbox" class ="" id ="baixa" name="baixa" value="1">
                               </td>
                               <td>
                                   <input type="hidden" class ="" id ="permis" name="permis" value="0">
                                   <input type="checkbox" class ="" id ="permis" name="permis" value="1">
                               </td>
                               <td>
                                   <input type="text" class ="" id ="observacions" name="observacions">
                               </td>
                               <td>
                                   <button type="submit" class ="btn btn-primary">
                                       <i class="glyphicon glyphicon-plus"></i>
                                   </button>
                               </td>
                               <td>&nbsp;</td>
                          </form>
                       @endif
                        </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
        @endif
    </div>
@endsection
