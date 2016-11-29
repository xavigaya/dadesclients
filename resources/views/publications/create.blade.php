@extends('master')
@section('title', 'Publicació')
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
                    <legend>Afegir una publicació</legend>
                    <div class ="form-group">
                        <label for ="nom" class ="col-lg-2 control-label">Nom</label>
                        <div class ="col-lg-10">
                            
                            <select class="form-control" id="publi" name="idpubli" >
                                @foreach($publicacions as $publicacio)
                                    <option value="{!! $publicacio->nompubli !!}">
                                        {!! $publicacio->nompubli !!}
                                    </option>
                                @endforeach
                            </select>
                            
                            <!--<input type="input" class ="form-control" id ="nom" placeholder="Nom publicació"
                                   name="nom" value="{!! $publicacio->nompubli!!}" readonly>-->
                        </div>
                    </div>
                    <!--
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Client</label>
                        <div class ="col-lg-7">
                            <select class="form-control" id="customer" name="idclient" >
                                @foreach($customers as $customer)
                                    <option value="{!! $customer->id !!}">
                                        {!! $customer->nom !!}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3">
                            <span class="badge">
                                <a href="/customers/create">
                                    <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Client
                                </a>
                            </span>
                        </div>
                    </div>
                    -->
                    <div class ="form-group">
                        <label for ="format" class ="col-lg-2 control-label">Format</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="format" placeholder="Tabloide / Quartilla" name="format">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="mides" class ="col-lg-2 control-label">Mides</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="mides" placeholder="Mides producte acabat" name="mides">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="forn" class ="col-lg-2 control-label">Forn?</label>
                        <div class ="col-lg-10">
                            <input type="checkbox" name="forn" id="forn"> 
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="observa" class ="col-lg-2 control-label">Observacions</label>
                        <div class ="col-lg-10">
                            <textarea class ="form-control" rows="3" id ="observa" placeholder="Observacions" name="observa"></textarea>
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