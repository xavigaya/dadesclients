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
                    <legend>Afegir un Registre</legend>
                    <!--<span class="badge"><a href="/timelogs/create">Dia Anterior</a></span>-->
                    <span class="badge"><input type="date" class ="form-control" id ="data"
                      name="data" value="{{ date('Y-m-d', strtotime( old('data').' + 1 days')) }}" autofocus tabindex="1"></span>
                    <!--<span class="badge"><a href="/teams/create">Dia Següent</a></span>-->
                    <table class="table">
                      <thead>
                        <tr>
                            <th >DNI</th>
                            <th >Nom</th>
                            <th >Entrada</th>
                            <!--<th class="col-md-4">Sortida</th>-->
                            <th >Festa</th>
                            <th >Vacances</th>
                            <th >Baixa</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($workers as $worker)
                            <tr >
                              <td>
                                  <input type="text" class ="form-control" id ="dni"
                                  value="{!! $worker->dni !!}"
                                  name="dni[{!! $worker->dni !!}]" readonly>
                              </td>
                              <td>
                                  <input type="text" class ="form-control" id ="nom"
                                  value="{!! $worker->nom.' '.$worker->cognoms !!}"
                                  name="nom[{!! $worker->dni !!}]" readonly>
                              </td>
                              <td class="">
                                <input type="hidden" class ="form-control" id ="entrada"
                                    name="entrada[{!! $worker->dni !!}]" value="0">

                                <label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="entrada"
                                      name="entrada[{!! $worker->dni !!}]" value="16:00">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">16:00</span>
                                </label>

                                <label class="custom-control custom-radio">
                                <input type="radio" class ="form-control custom-control-input" id ="entrada"
                                        name="entrada[{!! $worker->dni !!}]" value="11:30">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">11:30</span>
                                </label>

                                <label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="entrada"
                                        name="entrada[{!! $worker->dni !!}]" value="12:45">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">12:45</span>
                                </label>

                                <label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="entrada"
                                          name="entrada[{!! $worker->dni !!}]" value="17:00">
                                          <span class="custom-control-indicator"></span>
                                          <span class="custom-control-description">17:00</span>
                                </label>

                                <label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="entrada"
                                          name="entrada[{!! $worker->dni !!}]" value="20:30">
                                          <span class="custom-control-indicator"></span>
                                          <span class="custom-control-description">20:30</span>
                                </label>


                                <!--
                                  <input type="time" class ="form-control" id ="entrada"
                                  name="entrada[{!! $worker->dni !!}]">-->
                              </td>
                              <!--<td>-->
                                <input type="hidden" class ="form-control" id ="sortida"
                                    name="sortida[{!! $worker->dni !!}]" value="0">

                                <!--<label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="sortida"
                                      name="sortida[{!! $worker->dni !!}]" value="22:30">
                                      <span class="custom-control-indicator"></span>
                                      <span class="custom-control-description">22:30</span>
                                </label>

                                <label class="custom-control custom-radio">
                                <input type="radio" class ="form-control custom-control-input" id ="sortida"
                                        name="sortida[{!! $worker->dni !!}]" value="18:00">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">18:00</span>
                                </label>

                                <label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="sortida"
                                        name="sortida[{!! $worker->dni !!}]" value="21:00">
                                        <span class="custom-control-indicator"></span>
                                        <span class="custom-control-description">21:00</span>
                                </label>

                                <label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="sortida"
                                          name="sortida[{!! $worker->dni !!}]" value="01:15">
                                          <span class="custom-control-indicator"></span>
                                          <span class="custom-control-description">01:15</span>
                                </label>

                                <label class="custom-control custom-radio">
                                  <input type="radio" class ="form-control custom-control-input" id ="sortida"
                                          name="sortida[{!! $worker->dni !!}]" value="04:30">
                                          <span class="custom-control-indicator"></span>
                                          <span class="custom-control-description">04:30</span>
                                </label>-->


                                <!--
                                  <input type="time" class ="form-control" id ="sortida"
                                  name="sortida[{!! $worker->dni !!}]">
                                -->
                              <!--</td>-->
                              <td>
                                  <input type="hidden" class ="form-control" id ="festa"
                                      name="festa[{!! $worker->dni !!}]" value="0" >
                                  <input type="checkbox" class ="form-control" id ="festa"
                                      name="festa[{!! $worker->dni !!}]" value="1">
                              </td>
                              <td>
                                  <input type="hidden" class ="form-control" id ="vacances"
                                      name="vacances[{!! $worker->dni !!}]" value="0">
                                  <input type="checkbox" class ="form-control" id ="vacances"
                                      name="vacances[{!! $worker->dni !!}]" value="1">
                              </td>
                              <td>
                                  <input type="hidden" class ="form-control" id ="baixa"
                                      name="baixa[{!! $worker->dni !!}]" value="0">
                                  <input type="checkbox" class ="form-control" id ="baixa"
                                      name="baixa[{!! $worker->dni !!}]" value="1">
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                            <button type="reset" class ="btn btn-default">Cancel·lar</button>
                            <button type="submit" class ="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection
