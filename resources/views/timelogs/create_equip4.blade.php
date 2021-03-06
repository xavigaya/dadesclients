@extends('master')
@section('title', 'Alta Registre')
@section('content')
    <div class ="container col-md-10 col-md-offset-1">
      @include('timelogs.menuequips')
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
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>Afegir un Registre </legend>
                    <!--<span class="badge"><a href="/timelogs/create">Dia Anterior</a></span>-->
                    <span class="badge"><input type="date" class ="form-control" id ="data"
                      name="data" value="{{ date('Y-m-d', strtotime( old('data').' + 1 days')) }}" autofocus tabindex="1"></span>
                    <!--<span class="badge"><a href="/teams/create">Dia Següent</a></span>-->
                    <table  class="table">
                      <thead>
                        <tr>

                            <th>Nom</th>
                            <th>Entrada</th>
                            <th>Sortida</th>
                            <th>Festa</th>
                            <th>Vacances</th>
                            <th>Baixa</th>
                            <th>Permís</th>
                            <th>Observacions</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($workers as $worker)
                            <tr >

                                  <input type="hidden" class ="form-control" id ="dni"
                                  value="{!! $worker->dni !!}"
                                  name="dni[{!! $worker->dni !!}]" readonly tabindex="8">

                              <td>
                                  <input type="text" class ="form-control" id ="nom"
                                  value="{!! $worker->nom.' '.$worker->cognoms !!}"
                                  name="nom[{!! $worker->dni !!}]" readonly tabindex="9">
                              </td>
                              <td>
                                @if ($worker->dni === "41086189R")
                                  <input type="time" class ="form-control" id ="entrada"
                                  name="entrada[{!! $worker->dni !!}]" value="16:00" tabindex="2">
                                @elseif ($worker->dni === "47686071X")
                                  <input type="time" class ="form-control" id ="entrada"
                                  name="entrada[{!! $worker->dni !!}]" value="10:00" tabindex="2">
                                @else
                                  <input type="time" class ="form-control" id ="entrada"
                                  name="entrada[{!! $worker->dni !!}]" tabindex="2">
                                @endif
                              </td>
                              <td>
                                @if ($worker->dni === "41086189R")
                                  <input type="time" class ="form-control" id ="sortida"
                                  name="sortida[{!! $worker->dni !!}]" value="23:30" tabindex="3">
                                @elseif ($worker->dni === "47686071X")
                                  <input type="time" class ="form-control" id ="sortida"
                                  name="sortida[{!! $worker->dni !!}]" value="14:00" tabindex="3">
                                @else
                                  <input type="time" class ="form-control" id ="sortida"
                                  name="sortida[{!! $worker->dni !!}]" tabindex="3">
                                @endif
                              </td>
                              <td>
                                  <input type="hidden" class ="form-control" id ="festa"
                                      name="festa[{!! $worker->dni !!}]" value="0" >
                                  <input type="checkbox" class ="form-control" id ="festa"
                                      name="festa[{!! $worker->dni !!}]" value="1" tabindex="4">
                              </td>
                              <td>
                                  <input type="hidden" class ="form-control" id ="vacances"
                                      name="vacances[{!! $worker->dni !!}]" value="0">
                                  <input type="checkbox" class ="form-control" id ="vacances"
                                      name="vacances[{!! $worker->dni !!}]" value="1" tabindex="5">
                              </td>
                              <td>
                                  <input type="hidden" class ="form-control" id ="baixa"
                                      name="baixa[{!! $worker->dni !!}]" value="0">
                                  <input type="checkbox" class ="form-control" id ="baixa"
                                      name="baixa[{!! $worker->dni !!}]" value="1" tabindex="6">
                              </td>
                              <td>
                                  <input type="hidden" class ="form-control" id ="permis"
                                      name="permis[{!! $worker->dni !!}]" value="0">
                                  <input type="checkbox" class ="form-control" id ="permis"
                                      name="permis[{!! $worker->dni !!}]" value="1" tabindex="6">
                              </td>
                              <td>
                                  <input type="text" class ="form-control" id ="observacions"
                                      name="observacions[{!! $worker->dni !!}]" tabindex="6">
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                            <button type="reset" class ="btn btn-default">Cancel·lar</button>
                            <button type="submit" class ="btn btn-primary" tabindex="7">Guardar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
