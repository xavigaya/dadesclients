@extends('master')
@section('title', 'Actualitzar Dades Tècniques')
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
                    <legend>Actualitzar dades tècniques</legend>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Publicació</label>
                        <div class ="col-lg-7">
                            <select class="form-control" id="idpubli" name="idpubli" >
                                @foreach($publications as $publication)
                                    @if($publication->id == $techdata->idpubli)
                                        <option value="{!! $techdata->idpubli !!} selected">
                                            {!! $publication->nom !!}
                                        </option>
                                    @else
                                        <option value="{!! $publication->id !!}">
                                            {!! $publication->nom !!}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <span class="badge">
                                <a href="/publications/create">
                                    <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Publicació
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="plantilla" class ="col-lg-2 control-label">Plantilla</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="plantilla" placeholder="Plantilla" name="plantilla" value="{!! $techdata->plantilla !!}">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="observacions" class ="col-lg-2 control-label">Observacions</label>
                        <div class ="col-lg-10">
                            <textarea type="text" class ="form-control" id ="observacions" placeholder="Dades d'interés, excepcions, ..." name="observacions">{!! $techdata->observacions !!}</textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="filmacio" class ="col-lg-2 control-label">Sortida Filmació</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="idfilmacio" name="idfilmacio" >
                                @foreach($filmacios as $filmacio)
                                    <option value="{!! $filmacio->id !!}">
                                        {!! $filmacio->nom !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="identrada" class ="col-lg-2 control-label">Entrada de Fitxers</label>
                        <div class ="col-lg-7">
                            <select class="form-control" id="identrada" name="identrada" >
                                @foreach($inputs as $input)
                                    <option value="{!! $input->id !!}">
                                        {!! $input->nom." - ".$input->usuari." / ".$input->password !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <span class="badge">
                                <a href="/inputs/create">
                                    <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Entrada
                                </a>
                            </span>
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