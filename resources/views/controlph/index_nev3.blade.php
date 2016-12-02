@extends('master')
@section('title', 'Històric Ph')
@section('content')
    <div class="container col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <span class="badge">
                    <a href="/controlph/create">
                        <img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Afegir Medició Ph
                    </a>
                </span>
                <span class="badge">
                    <a href="/controlph/">
                        <img src="/img/add.png" alt="Llistat" title="Llistat" height="20px"> Llistat Ph
                    </a>
                </span>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Mesures Ph</h2>
            </div>
            @if (session('status'))
                <div class ="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if($phs->isEmpty())
                <p>No hi ha cap publicació</p>
            @else
                <table class="table taula">
                    <thead>
                        <tr>
                            <th colspan="2">Lectures</th>
                            <th colspan="3">Nevera 1</th>
                            <th colspan="3">Nevera 2</th>
                            <th colspan="3">Nevera 3</th>
                            <th colspan="3">Origen</th>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <th>Data</th>
                            <th>Ph 1</th>
                            <th>Conductivitat 1</th>
                            <th>Temperatura 1</th>
                            <th>Ph 2</th>
                            <th>Conductivitat 2</th>
                            <th>Temperatura 2</th>
                            <th>Ph 3</th>
                            <th>Conductivitat 3</th>
                            <th>Temperatura 3</th>
                            <th>Ph 0</th>
                            <th>Conductivitat 0</th>
                            <th>Temperatura 0</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($phs as $ph)
                            <tr>
                                <td>{!! $ph->id !!}</td>
                                <td>{!! $ph->Data !!}</td>
                                <td>{!! $ph->Ph1 !!}</td>
                                <td>{!! $ph->Cond1 !!}</td>
                                <td>{!! $ph->Temp1 !!}</td>
                                <td>{!! $ph->Ph2 !!}</td>
                                <td>{!! $ph->Cond2 !!}</td>
                                <td>{!! $ph->Temp2 !!}</td>
                                <td>{!! $ph->Ph3 !!}</td>
                                <td>{!! $ph->Cond3 !!}</td>
                                <td>{!! $ph->Temp3 !!}</td>
                                <td>{!! $ph->Ph0 !!}</td>
                                <td>{!! $ph->Cond0 !!}</td>
                                <td>{!! $ph->Temp0 !!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection