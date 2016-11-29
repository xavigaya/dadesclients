@extends('master')
@section('title', 'Editar Publicació')
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
                    <legend>Editar Publicació</legend>
                    <div class ="form-group">
                        <label for ="nom" class ="col-lg-2 control-label">Nom</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="nom" placeholder="Nom publicació" name="nom" value="{!! $publication->nom !!}">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Client</label>
                        <div class ="col-lg-10">
                            <select class="form-control" id="customer" name="idclient">
                                @foreach($customers as $customer)
                                    @if($customer->idclient == $selectedCustomer)
                                        <option value="{!! $customer->idclient !!}" selected >{!! $customer->nomclient !!}</option>
                                    @else
                                        <option value="{!! $customer->idclient !!}" >{!! $customer->nomclient !!}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="format" class ="col-lg-2 control-label">Format</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="format" placeholder="Tabloide / Quartilla" name="format" value="{!! $publication->format !!}">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="mides" class ="col-lg-2 control-label">Mides</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="mides" placeholder="Mides producte acabat" name="mides" value="{!! $publication->mides !!}">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="forn" class ="col-lg-2 control-label">Forn?</label>
                        <div class ="col-lg-10">
                            <input type="checkbox" name="forn" id="forn" {!! $publication->forn ? "checked" : "" !!} > 
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="observa" class ="col-lg-2 control-label">Observacions</label>
                        <div class ="col-lg-10">
                            <textarea class ="form-control" rows="3" id ="observa" placeholder="Observacions" name="observa">{!! $publication->observa !!}</textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="forn" class ="col-lg-2 control-label">Està activa?</label>
                        <div class ="col-lg-10">
                            <input type="checkbox" name="status" {!! $publication->status ? 'checked' : '' !!} >
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
        </div>
    </div>
@endsection