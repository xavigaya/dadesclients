<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ControlPh;
use App\Http\Requests;
use App\Http\Requests\ControlPhFormRequest;
use Illuminate\Support\Facades\Mail;
use Charts;

class ControlPhController extends Controller
{
    public function index()
    {
      $phs = ControlPh::orderBy('id', 'desc')->simplePaginate(15);
      return view('controlph.index', compact('phs'));
    }

    public function index2()
    {
      $phs = ControlPh::all()->sortByDesc('id');
      $chart = Charts::database(ControlPh::all(), 'line', 'chartjs')
          ->title('Grafic Evolucio pH')
          //->labels(['Fa 3 dies', 'Fa 2 dies', 'Ahir'])
          //->values([5,10,20])
          //->dimensions(1000,500)
          ->responsive(true)
          ->dateColumn('Data');
          /**
          Afegir aquesta linia al index.blade.php
          {!! $chart->render() !!}
          **/
      return view('controlph.index', compact('phs'), ['chart' => $chart]);
    }


    public function nevera3()
    {
      $phs = ControlPh::orderBy('id', 'desc')->simplePaginate(15);
      return view('controlph.index_nev3', compact('phs'));
    }

    public function create()
    {
        return view('controlph.create');
    }

    public function store(ControlPhFormRequest $request)
    {
      $ph = new ControlPh(array(
          'Data' => $request->get('data'),
          'Ph1' => $request->get('ph1'),
          'Cond1' => $request->get('cond1'),
          'Temp1' => $request->get('temp1'),
          'Ph2' => $request->get('ph2'),
          'Cond2' => $request->get('cond2'),
          'Temp2' => $request->get('temp2'),
          'Ph0' => $request->get('ph0'),
          'Cond0' => $request->get('cond0'),
          'Temp0' => $request->get('temp0')
      ));

      $maildata = array(
          'Data' => $request->get('data'),
          'Ph1' => $request->get('ph1'),
          'Cond1' => $request->get('cond1'),
          'Temp1' => $request->get('temp1'),
          'Ph2' => $request->get('ph2'),
          'Cond2' => $request->get('cond2'),
          'Temp2' => $request->get('temp2'),
          'Ph0' => $request->get('ph0'),
          'Cond0' => $request->get('cond0'),
          'Temp0' => $request->get('temp0')
      );

      Mail::send('emails.controlph', $maildata, function ($message)
      {
        $message->from('controlph@segre.com', 'Automatisme Control Ph');
        $message->to('cduran@segre.com')->cc('alco@segre.com')->bcc('xgaya@segre.com')->subject('Medició Ph');
      });

      $ph->save();
      return redirect('/controlph')-> with ('status', 'Medició entrada correctament!');
    }

}
