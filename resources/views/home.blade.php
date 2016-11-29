@extends('master')
@section('title', 'Home')

@section('content')
    <div class ="container">
        <div class ="row banner">
            <div class ="col-md-12">
                <h1 class ="text-center margin-top-100 editContent">Dades Clients</h1>
                <h3 class ="text-center margin-top-100 editContent">Consulta les dades dels clients</h3>
                <div class ="text-center">
                    <img src="img/logo_lerigraf.jpg" alt="Logo Lerigraf">
                </div>
                
                <div id='calendar'></div>
            </div>
        </div>
    </div>
@endsection
