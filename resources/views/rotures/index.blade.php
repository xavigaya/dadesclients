@extends('master')
@section('title', 'Rotures de Paper')
@section('content')

        <div class="container col-md-12 col-md-offset-0">
            <div class="panel panel-default table-responsive">
                <div class="panel-heading">
                    <h2 class="bg-warning">Rotures de Paper</h2>
                </div>

                @if (session('status'))
                    <div class ="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if(!isset($rotures))
                    <p>No hi ha cap rotura</p>
                @else
                    <table class="table taula">
                        <thead>
                            <tr>
                                <th>ID <hr> Nom Pr.</th>
                                <th> Data <hr> Hora</th>
                                <th>Desbob. <hr> Braç</th>
                                <th>Diàm. Bobina</th>
                                <th>Posició Braç</th>
                                <th>Posició Serra</th>
                                <th>Rotura</th>
                                <th>Compensador</th>
                                <th>Detall Comportament</th>
                                <th>Missatges Display</th>
                                <th>Info Conductor</th>
                                <th>Info Bobinero</th>
                                <th>Responsable <hr> Bobinero</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rotures as $rotura)
                                <tr>
                                    <td>
                                        {!! $rotura->IdProducte ."<hr>". $rotura->nom_producte !!}
                                    </td>
                                    <td>
                                        {!! date('d/m/y',strtotime($rotura->data)) ."<br><hr>". date('H:i',strtotime($rotura->hora)) !!}
                                    </td>
                                    <td>
                                        {!! $rotura->desbobinador ."<br><hr>". $rotura->bras !!}
                                    </td>
                                    <td>
                                        {!! $rotura->diametre_bobina !!}
                                    </td>
                                    <td>
                                        {!! $rotura->posicio_bras !!}
                                    </td>
                                    <td>
                                        {!! $rotura->posicio_serra !!}
                                    </td>
                                    <td>
                                        {!! $rotura->rotura !!}
                                    </td>
                                    <td>
                                        {!! $rotura->compensador !!}
                                    </td>
                                    <td>
                                        {!! $rotura->detalleu_comportament !!}
                                    </td>
                                    <td>
                                        {!! $rotura->detalleu_missatges_display !!}
                                    </td>
                                    <td>
                                        {!! $rotura->conductor !!}
                                    </td>
                                    <td>
                                        {!! $rotura->bobinero !!}
                                    </td>
                                    <td>
                                        {!! $rotura->responsable ."<br><hr>". $rotura->nom_bobinero !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>


@endsection