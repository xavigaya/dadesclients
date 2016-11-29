@extends('master')
@section('title', 'Veure un Client')
@section('content')
    <div class ="container col-md-8 col-md-offset-2">
        <div class ="well well bs-component">
            <div class ="content">
                <h2 class ="header">{!! $customer->nom !!}</h2>
                <p> <strong>Estat</strong >: {!! $customer->status ? 'Actiu' : 'Inactiu' !!}</p>
                <p> {!! $customer->content !!} </p>
            </div>
            <a href="{!! action('CustomersController@edit', $customer->slug) !!}" class="btn btn-info" > Editar </a>
            <form method="post" action="{!! action('CustomersController@destroy', $customer->slug) !!}" class="pull-left" >
                <input type="hidden" name="_token" value="{!! csrf_token() !!}" >
                <div class="form-group" >
                    <div>
                        <button type="submit" class="btn btn-warning" > Esborrar </button>
                    </div>
                </div>
            </form>
            <div class="clearfix" ></div>
        </div>
    </div>
@endsection