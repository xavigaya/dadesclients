@extends('master')
@section('title', 'Alta Treballador')
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
                    <legend>Afegir un treballador</legend>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">DNI</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="dni" placeholder="" name="dni">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="nom" class ="col-lg-2 control-label">Nom</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="nom" placeholder="Nom persona contacte" name="nom">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="cognoms" class ="col-lg-2 control-label">Cognoms</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="cognoms" placeholder="Cognoms del contacte" name="cognoms">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="equip" class ="col-lg-2 control-label">Equip</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="equip" placeholder="" name="equip">
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
