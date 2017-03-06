<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TimelogsFormRequest;
use App\Http\Requests\TimelogsSearchFormRequest;
use App\Timelog;
use App\Worker;
use DB;

class TimelogsController extends Controller
{

  public function index()
  {
      $timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                        ->orderBy('data', 'equip', 'cognoms')
                        ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                        ->simplePaginate(10);
      return view('timelogs.index', compact('timelogs'));
  }


  public function search(TimelogsSearchFormRequest $request)
  {
    $data = $request->get('data');
    $equip = $request->get('team');

    if ($request->get('team') == 0)
    {
      $timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                        ->where('timelogs.data', $data)
                        ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                        ->simplePaginate(50);
    }
    else
    {
      $timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                        ->where('workers.equip', $equip)
                        ->where('timelogs.data', $data)
                        ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                        ->simplePaginate(10);
    }
    return view('timelogs.index', compact('timelogs'));
    //return view('timelogs.teamedit', compact('timelogs', 'data'));
    //return redirect('/timelogs/'.$data.'/'.$team);
  }

  public function search2($date, $team)
  {
      $data = $date;
      $equip = $team;

      if ($equip == 0)
      {
        $timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                          ->where('timelogs.data', $data)
                          ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                          ->simplePaginate(10);
      }
      else
      {
        $timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                          ->where('workers.equip', $equip)
                          ->where('timelogs.data', $data)
                          ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                          ->simplePaginate(10);
      }

      /**$timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                        ->where('workers.equip', $equip)
                        ->where('timelogs.data', $data)
                        ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                        ->simplePaginate(10);**/
      return view('timelogs.teamedit', compact('timelogs', 'data', 'equip'));
  }

  public function indextoday()
  {
      $dia = date('Y-m-d', strtotime('today'));
      $timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                        ->where('timelogs.data', $dia)
                        ->orderBy('timelogs.data')
                        ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                        ->simplePaginate(10);
      return view('timelogs.index', compact('timelogs'));
  }


  public function edit($id)
  {
      $timelogs = Timelog::whereId($id)->get();
      $workers = Worker::all();
      return view('timelogs.edit')->with(compact ('timelogs', 'workers'));
  }


  public function update(TimelogsFormRequest $request)
  {
    $timelog = Timelog::whereId($request->get('id'))->firstOrFail();

    if ($request->get('festa') || $request->get('vacances') || $request->get('baixa')) {
      $entrada = null;
      $sortida = null;
    } else {
      $entrada = $request->get('entrada');
      $sortida = $request->get('sortida');
    }

    $timelog->data = date('Y-m-d', strtotime($request->get('data')));
    $timelog->dni = $request->get('dni');
    $timelog->entrada = $entrada;
    $timelog->sortida = $sortida;
    $timelog->festa = $request->get('festa');
    $timelog->vacances = $request->get('vacances');
    $timelog->baixa = $request->get('baixa');
    $timelog->save();

    return redirect('/timelogs')-> with ('status', 'El registre '.$request->get('id').' ha estat modificat!');
  }


  public function create_equip($team)
  {
    $timelog = Timelog::all();
    $workers = Worker::all()->where('equip', $team);
    return view('timelogs.create_equip'.$team, compact('workers'));
  }


  public function logging()
  {
    //$workers = Worker::all()->where('equip', '1');
    return view('timelogs.logging');
  }


  public function store(TimelogsFormRequest $request)
  {
    $dades = array();

    foreach ($request->get('dni') as $key => $value)
    {
      $dades[$key] = array('dni'=>$value);
    }
    foreach ($request->get('nom') as $key => $value)
    {
      $dades[$key] += array('nom'=>$value);
    }
    foreach ($request->get('entrada') as $key => $value)
    {
      $dades[$key] += array('entrada'=>$value);
    }
    foreach ($request->get('sortida') as $key => $value)
    {
      $dades[$key] += array('sortida'=>$value);
    }
    foreach ($request->get('festa') as $key => $value)
    {
      $dades[$key] += array('festa'=>$value);
    }
    foreach ($request->get('vacances') as $key => $value)
    {
      $dades[$key] += array('vacances'=>$value);
    }
    foreach ($request->get('baixa') as $key => $value)
    {
      $dades[$key] += array('baixa'=>$value);
    }

    foreach ($dades as $dada)
    {
      if ($dada['festa'] || $dada['vacances'] || $dada['baixa'])
      {
        $dada['entrada'] = null;
        $dada['sortida'] = null;
      }
      if ($dada['entrada'] == '16:00')
      {
        $sortida = '22:30';
      }
      elseif ($dada['entrada'] == '11:30')
      {
        $sortida = '18:00';
      }
      elseif ($dada['entrada'] == '12:45')
      {
        $sortida = '21:00';
      }
      elseif ($dada['entrada'] == '17:00')
      {
        $sortida = '01:15';
      }
      elseif ($dada['entrada'] == '20:30')
      {
        $sortida = '04:30';
      }
      else
      {
        $sortida = $dada['sortida'];
      }

      $timelog = new Timelog(array(
          'data' => $request->get('data'),
          'dni' => $dada['dni'],
          'entrada' => $dada['entrada'],
          'sortida' => $sortida,
          'festa' => $dada['festa'],
          'vacances' => $dada['vacances'],
          'baixa' => $dada['baixa'],
      ));
      $timelog->save();
    }
    return redirect()->back()-> with ('status', 'Els registres s\'han afegit!')->withInput();
  }

  public function storelogging(TimelogsFormRequest $request)
  {
    $worker = Worker::all()->where('dni', $request->get('dni'));
    $timelog = new Timelog(array(
          'data' => $request->get('data'),
          'dni' => $request->get('dni'),
          'entrada' => $request->get('hora'),
      ));
      $timelog->save();

    return redirect()->back()-> with ('status', 'El registre s\'ha afegit!');
  }


  public function destroy($id)
  {
      $timelog = Timelog::whereId($id)->firstOrFail();
      $timelog-> delete();
      return redirect()->back()->with ('status', 'El registre '.$id.' ha estat esborrat!');
  }
}
