@extends('master')
@section('title', 'Editar Client')
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
                    <legend>Editar Client</legend>
                    <div class ="form-group">
                        <label for ="nom" class ="col-lg-2 control-label">Nom</label>
                        <div class ="col-lg-10">
                            <input type="text" class ="form-control" id ="nom" name="nom" value="{!! $customer->nom !!}">
                        </div>
                    </div>
                    <div class ="form-group">
                        <label for ="status">
                        <div class ="col-lg-10 col-lg-offset-6">
                            <input type="checkbox" name="status" {!! $customer->status ? "checked" : "" !!} > Està actiu?
                        </div>
                        </label>
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