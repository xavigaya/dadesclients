@extends('master')
@section('title', 'Veure un Publicació')
@section('content')
    <div class ="container col-md-8 col-md-offset-2">
        <div class ="well well bs-component">
            <form class ="form-horizontal" method="post" action=" {!! action('PublicationsController@destroy', $publication->slug) !!}">
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
                            <input type="text" class ="form-control" id ="nom" placeholder="Nom publicació" name="nom" value="{!! $publication->nom !!}" readonly>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="client" class ="col-lg-2 control-label">Client</label>
                        <div class ="col-lg-10">
                            @foreach($customers as $customer)
                                @if($customer->idclient == $selectedCustomer)
                                    <input type="text" class ="form-control" id ="customer" name="customer" value="{!! $customer->nomclient !!}" readonly>
                                @elseif(!$customer->idclient)
                                    <input type="text" class ="form-control" id ="customer" name="customer" value="" readonly>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="format" class ="col-lg-2 control-label">Format</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="format" placeholder="Tabloide / Quartilla" name="format" value="{!! $publication->format !!}" readonly>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="mides" class ="col-lg-2 control-label">Mides</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="mides" placeholder="Mides producte acabat" name="mides" value="{!! $publication->mides !!}" readonly>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="forn" class ="col-lg-2 control-label">Forn?</label>
                        <div class ="col-lg-10">
                            <input type="checkbox" name="forn" id="forn" disabled {!! $publication->forn ? "checked" : "" !!} > 
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="observa" class ="col-lg-2 control-label">Observacions</label>
                        <div class ="col-lg-10">
                            <textarea class ="form-control" rows="3" id ="observa" placeholder="Observacions" name="observa" readonly>{!! $publication->observa !!}</textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="forn" class ="col-lg-2 control-label">Està activa?</label>
                        <div class ="col-lg-10">
                            <input type="checkbox" name="status" disabled {!! $publication->status ? 'checked' : '' !!} >
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                            <a href="{!! action('PublicationsController@edit', $publication->slug) !!}" class="btn btn-info" > Editar </a>
                            <button type="submit" class="btn btn-warning" > Esborrar </button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection