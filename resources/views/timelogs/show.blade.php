@extends('master')
@section('title', 'Veure Contacte')
@section('content')
    <div class ="container col-md-8 col-md-offset-2">
        <div class ="well well bs-component">
            <form method="post" action="{!! action('PeopleController@destroy', $person->slug) !!}" class ="form-horizontal" >
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
                    <legend>{!! $person->nom.' '.$person->cognoms !!}</legend>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Publicació</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="idpubli" name="idpubli" readonly>
                                @foreach($publications as $publication)
                                    @if($publication->id == $person->idpubli)
                                        <option value="{!! $person->idpubli !!}">
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
                            <input type="text" class ="form-control" id ="email" value="{!! $person->email !!}" name="email" readonly>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="telf" class ="col-lg-2 control-label">Telèfon</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="telf" value="{!! $person->telf !!}" name="telf" readonly>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="mobil" class ="col-lg-2 control-label">Mòbil</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="mobil" value="{!! $person->mobil !!}" name="mobil" readonly>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Tipo Contacte</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="idtipo" name="idtipo" readonly>
                                @foreach($typepeople as $typeperson)
                                    @if($typeperson->id == $person->idtipo)
                                        <option value="{!! $person->idtipo !!}">
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
                            <textarea class ="form-control" id ="info" name="info" readonly>{!! $person->info !!}</textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                            <a href="{!! action('PeopleController@edit', $person->slug) !!}" class="btn btn-info" > Editar </a>
                            <button type="submit" class="btn btn-warning" > Esborrar </button>
                        </div>
                    </div>
                </fieldset>
            </form>
            <div class="clearfix" ></div>
        </div>
    </div>
@endsection