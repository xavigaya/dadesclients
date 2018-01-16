<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TimelogsFormRequest;
use App\Http\Requests\TimelogsSearchFormRequest;
use App\Http\Requests\TimelogsConsultaFormRequest;
use App\Timelog;
use App\Worker;
use DB;

class TimelogsController extends Controller
{
    
    
  /**
  * Show a list of all the registers in the database
  *
  * @return default view
  **/
  public function index()
  {
      $timelogs = Timelog::join('workers', 'timelogs.dni', '=', 'workers.dni')
                        ->orderBy('data', 'equip', 'cognoms')
                        ->select('timelogs.*', 'workers.nom', 'workers.cognoms', 'workers.id as idworker')
                        ->simplePaginate(10);
      return view('timelogs.index', compact('timelogs'));
  }

    
    
  /**
  * Show a list of the registers in a date from a team
  *
  * @return default view
  **/
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
    //return redirect('/timelogs/'.$data.'/'.$equip);
  }

    
    
    
  /**
  * Show an editable list of the registers in an
  * specific date from a team passed in the url
  *
  * @return default view
  **/
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
      return view('timelogs.teamedit', compact('timelogs', 'data', 'equip'));
  }

    
    
  /**
  * List of today working timetable
  *
  * @return list view
  **/
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



  /**
  * Edit form to modify a register
  *
  **/
  public function edit($id)
  {
      $timelogs = Timelog::whereId($id)->get();
      $workers = Worker::all();
      return view('timelogs.edit')->with(compact ('timelogs', 'workers'));
  }


  
  /**
  * Update a register data
  *
  **/
  public function update(TimelogsFormRequest $request)
  {
    $timelog = Timelog::whereId($request->get('id'))->firstOrFail();

    if ($request->get('festa') || $request->get('vacances') || $request->get('baixa') || $request->get('permis')) {
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
    $timelog->permis = $request->get('permis');
    $timelog->observacions = $request->get('observacions');
    $timelog->save();

    return  redirect()->back()-> with ('status', 'El registre '.$request->get('id').' ha estat modificat!'); 
  }

    
    
  /**
  * Creating a team
  *
  **/
  public function create_equip($team)
  {
    $timelog = Timelog::all();
    $workers = Worker::all()->where('equip', $team);
    return view('timelogs.create_equip'.$team, compact('workers'));
  }

    
    
  /**
  * Save input data form
  *
  **/
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
    foreach ($request->get('permis') as $key => $value)
    {
      $dades[$key] += array('permis'=>$value);
    }
    foreach ($request->get('observacions') as $key => $value)
    {
      $dades[$key] += array('observacions'=>$value);
    }

    foreach ($dades as $dada)
    {
      if ($dada['festa'] || $dada['vacances'] || $dada['baixa'] || $dada['permis'])
      {
        $dada['entrada'] = null;
        $dada['sortida'] = null;
      }
      if ($dada['entrada'] == '16:15')
      {
        $sortida = '23:30';
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
        $sortida = '04:45';
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
          'permis' => $dada['permis'],
          'observacions' => $dada['observacions'],
      ));
      $timelog->save();
    }
    return redirect()->back()-> with ('status', 'Els registres s\'han afegit!')->withInput();
  }


    
  /**
    * Input form for registering 
    *
  **/
  public function logging()
  {
    return view('timelogs.logging');
  }

    
    
  /**
    * Guardar els valors del formulari de chek-in / check-out
    * Controlar si és entrada o sortida
    * Controlar si l'usuari existeix
    * Controlar que toca entrar o sortir
    * @return estat del registre
  **/
  public function storelogging(TimelogsFormRequest $request)
  {
      $worker = Worker::whereDni($request->get('dni'))->first();
      $timelog = Timelog::whereDni($request->get('dni'))->orderBy('id', 'desc')->first();
      
      if (($worker != null) && ($timelog->sortida == 0) && 
          ($timelog->festa == 0) && ($timelog->vacances == 0) && 
          ($timelog->baixa == 0) && ($timelog->permis == 0) && ($request->get('inout') == 2))
      {
          $timelog->sortida = $request->get('hora');
          $timelog->festa = 0;
          $timelog->vacances = 0;
          $timelog->baixa = 0;
          $timelog->save();
          
          $data = date('d/m/y', strtotime($request->get('data')));
          
          return redirect()->back()->with('status', $worker->nom.', has registrat la teva SORTIDA el '.
                                          $data.' a les: '.$request->get('hora'));
      } 
      elseif (($worker != null) && ($request->get('inout') == 1)) 
      {
        $timelog = new Timelog(array(
            'data' => $request->get('data'),
            'dni' => $request->get('dni'),
            'entrada' => $request->get('hora'),
            'sortida' => null,
            'festa' => 0,
            'vacances' => 0,
            'baixa' => 0,
        ));
        $timelog->save();
          
        $data = date('d/m/y', strtotime($request->get('data')));
          
        return redirect()->back()->with('status', $worker->nom.', has registrat la teva ENTRADA el '.
                                          $data.' a les: '.$request->get('hora'));
      }
      else 
      {
          return redirect()->back()->with('danger', 'DNI incorrecte / No has fitxat al entrar');
      }
  }

    
    
    
  /**
    * Consulta horas treballades per treballador entre dues dates donades
    *
    * @return view with a list and sum of worked hours
  **/
  public function setConsultaTreballadorDies()
  {
      $workers = Worker::where('equip', '<>', '0')->orderBy('nom')->get();
      return view('timelogs.conTrebDia', compact('workers'));
  }

    
  /**
    * Gets a list of days and sum of hours of a worker
    *
    *
  **/
  public function getConsultaTreballadorDies(TimelogsConsultaFormRequest $request)
  {
      /**
      $inici = date('Y-m-d', strtotime($request->get('datainici')));
      $fi = date('Y-m-d', strtotime($request->get('datafi')));
      **/      
      $timelogs = Timelog::where([
                                ['dni', '=', $request->get('dni')],
                                ['data', '>=', date('Y-m-d', strtotime($request->get('datainici')))],
                                ['data', '<=', date('Y-m-d', strtotime($request->get('datafi')))],
                            ])
                        ->orderBy('data')
                        ->get();

      $workers = Worker::where('equip', '<>', '0')->orderBy('nom')->get();
      foreach ($workers as $worker)
      {
          if ($worker->dni == $request->get('dni'))
          {
              $info = $worker->dni.' -- '.$worker->nom.' '.$worker->cognoms;
          }
      }
      
      return view('timelogs.conTrebDia')->with(compact('timelogs', 'workers', 'info'));
  }

 
    
    
    
  /**
    * Delete a registrer ID
    *
  **/
  public function destroy($id)
  {
      $timelog = Timelog::whereId($id)->firstOrFail();
      $timelog-> delete();
      return redirect()->back()->with ('status', 'El registre '.$id.' ha estat esborrat!');
  }
}
