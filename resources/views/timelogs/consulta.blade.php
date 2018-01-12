@extends('master')
@section('title', 'Consulta Horaris')
@section('content')
    <div class ="container col-md-10 col-md-offset-1">
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
                @if (session('danger'))
                    <div class ="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>CONSULTA HORARIS</legend>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                            <div class ="col-md-3">
                                Nom
                                <select class="form-control" name="workerid">
                                    @foreach ($workers as $person)
                                        <option value="{!! $person->id !!}">{!! $person->nom,' ',$person->cognoms !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class ="col-md-3">
                                Inici<input type="date" class ="form-control" id ="data" name="inici">
                            </div>
                            <div class ="col-md-3">
                                Fi<input type="date" class ="form-control" id ="data" name="fi">
                            </div>
                        </div>
                        <!--<div class ="col-lg-5 col-lg-offset-3">
                                Triar ....
                        </div>-->
                    </div>
                    
                    <div class ="form-group">
                        <div class ="col-lg-5 col-lg-offset-7">
                            <button type="submit" class ="btn btn-success" >Consultar</button>
                            <button type="reset" class ="btn btn-warning" >Cancel·lar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection