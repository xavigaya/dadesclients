@extends('master')
@section('title', 'Contacte')
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
                    <legend>Afegir un contacte</legend>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Publicació</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="idpubli" name="idpubli" >
                                @foreach($publications as $publication)
                                    <option value="{!! $publication->id !!}">
                                        {!! $publication->nom !!}
                                    </option>
                                @endforeach
                            </select>
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
                        <label for ="email" class ="col-lg-2 control-label">Email</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="email" placeholder="xxxxxx@yyyyyyyy.com" name="email">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="telf" class ="col-lg-2 control-label">Telèfon</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="telf" placeholder="(+00) 000 000 000" name="telf">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="mobil" class ="col-lg-2 control-label">Mòbil</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="mobil" placeholder="(+00) 000 000 000" name="mobil">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Tipo Contacte</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="idtipo" name="idtipo" >
                                @foreach($typepeople as $typeperson)
                                    <option value="{!! $typeperson->id !!}">
                                        {!! $typeperson->tipus !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="info" class ="col-lg-2 control-label">Informació</label>
                        <div class ="col-lg-10">
                            <textarea class ="form-control" id ="info" placeholder="tot allò que creguem important" name="info"></textarea>
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