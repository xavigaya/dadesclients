@extends('master')
@section('title', 'Editar Contacte')
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
                    <legend>Editar Contacte</legend>
                    <div class ="form-group">
                        <label for ="nom" class ="col-lg-2 control-label">Nom</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="nom" value="{!! $person->nom !!}" name="nom" >
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="cognoms" class ="col-lg-2 control-label">Cognoms</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="cognoms" value="{!! $person->cognoms !!}" name="cognoms" >
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Publicació</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="idpubli" name="idpubli">
                                @foreach($publications as $publication)
                                    @if($publication->id == $person->idpubli)
                                        <option value="{!! $person->idpubli !!}" selected>
                                            {!! $publication->nom !!}
                                        </option>
                                    @else
                                        <option value="{!! $publication->id !!}" >
                                            {!! $publication->nom !!}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="email" class ="col-lg-2 control-label">Email</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="email" value="{!! $person->email !!}" name="email" >
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="telf" class ="col-lg-2 control-label">Telèfon</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="telf" value="{!! $person->telf !!}" name="telf" >
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="mobil" class ="col-lg-2 control-label">Mòbil</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="mobil" value="{!! $person->mobil !!}" name="mobil" >
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Tipo Contacte</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="idtipo" name="idtipo" >
                                @foreach($typepeople as $typeperson)
                                    @if($typeperson->id == $person->idtipo)
                                        <option value="{!! $person->idtipo !!}" selected>
                                            {!! $typeperson->tipus !!}
                                        </option>
                                    @else
                                        <option value="{!! $typeperson->id !!}">
                                            {!! $typeperson->tipus !!}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="info" class ="col-lg-2 control-label">Informació</label>
                        <div class ="col-lg-10">
                            <textarea class ="form-control" id ="info" name="info" >{!! $person->info !!}</textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                            <button type="reset" class ="btn btn-default">Cancel·lar</button>
                            <button type="submit" class ="btn btn-primary">Actualitzar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="clearfix" ></div>
        </div>
    </div>
@endsection