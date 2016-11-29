@extends('master')
@section('title', 'Afegir Entrada')
@section('content')
    <div class ="container col-md-8 col-md-offset-2">
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
                    <legend>Afegir una Entrada de Fitxers</legend>
                    <div class ="form-group">
                        <label for ="nom" class ="col-lg-2 control-label">Nom Entrada</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="nom" placeholder="Dropbox o Wetransfer o Adreça FTP" name="nom">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="usuari" class ="col-lg-2 control-label">Usuari</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="usuari" placeholder="nom de usuari del FTP" name="usuari">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="password" class ="col-lg-2 control-label">Contrasenya</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="password" placeholder="Password del FTP" name="password">
                        </div>
                    </div>
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