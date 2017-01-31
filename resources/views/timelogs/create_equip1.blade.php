@extends('master')
@section('title', 'Alta Registre')
@section('content')
    <div class ="container col-md-10 col-md-offset-1">
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
                    <span class="badge"><input type="date" class ="form-control" id ="data" name="data"></span>
                    <!--<span class="badge"><a href="/teams/create">Dia Següent</a></span>-->
                    <table  class="table">
                      <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Nom</th>
                            <th>Entrada</th>
                            <th>Sortida</th>
                            <th>Festa</th>
                            <th>Vacances</th>
                            <th>Baixa</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($workers as $worker)
                            <tr >
                              <td>
                                  <input type="text" class ="form-control" id ="dni"
                                  value="{!! $worker->dni !!}" name="dni" readonly>
                              </td>
                              <td>
                                  <input type="text" class ="form-control" id ="nom"
                                  value="{!! $worker->nom.' '.$worker->cognoms !!}" name="nom" readonly>
                              </td>
                              <td>
                                  <input type="time" class ="form-control" id ="entrada" name="entrada">
                              </td>
                              <td>
                                  <input type="time" class ="form-control" id ="sortida" name="sortida">
                              </td>
                              <td>
                                  <input type="checkbox" class ="form-control" id ="festa" name="festa" value="Festa">
                              </td>
                              <td>
                                  <input type="checkbox" class ="form-control" id ="vacances" name="vacances" value="Vacances">
                              </td>
                              <td>
                                  <input type="checkbox" class ="form-control" id ="baixa" name="baixa" value="Baixa">
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
