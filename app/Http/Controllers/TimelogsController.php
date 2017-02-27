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
  public function index(){
      $timelogs = Timelog::all()->sortByDesc('data');
      $workers = Worker::all();

      return view('timelogs.index', compact('timelogs', 'workers'));
  }

  public function indexSearch(TimelogsSearchFormRequest $request){
      $timelogs = Timelog::all()->where('data', $request->get('data'))->sortByDesc('nom');
      $workers = Worker::all();

      return view('timelogs.index', compact('timelogs', 'workers'));
  }

  public function indextoday(){
      $dia = date('Y-m-d', strtotime('today'));
      $timelogs = Timelog::all()->where('data', $dia)->sortByDesc('data');
      $workers = Worker::all();

      return view('timelogs.index', compact('timelogs', 'workers'));
  }

  public function edit($id){
      $timelogs = Timelog::where('id', $id)->get();
      $workers = Worker::all();

      return view('timelogs.edit')->with(compact ('timelogs', 'workers'));
  }

  public function create() {
    $workers = Worker::all();
    return view('timelogs.create', compact('workers'));
  }

  public function create_equip1() {
    $workers = Worker::all()->where('equip', '1');
    return view('timelogs.create_equip1', compact('workers'));
  }

  public function create_equip2() {
    $workers = Worker::all()->where('equip', '2');
    return view('timelogs.create_equip2', compact('workers'));
  }

  public function create_equip3() {
    $workers = Worker::all()->where('equip', '3');
    return view('timelogs.create_equip3', compact('workers'));
  }

  public function create_equip4() {
    $workers = Worker::all()->where('equip', '4');
    return view('timelogs.create_equip4', compact('workers'));
  }

  public function create_equip5() {
    $workers = Worker::all()->where('equip', '5');
    return view('timelogs.create_equip5', compact('workers'));
  }

  public function create_equip6() {
    $workers = Worker::all()->where('equip', '6');
    return view('timelogs.create_equip6', compact('workers'));
  }

  public function logging() {
    //$workers = Worker::all()->where('equip', '1');
    return view('timelogs.logging');
  }


  public function store(TimelogsFormRequest $request) {
    $dades = array();

    foreach ($request->get('dni') as $key => $value){
      $dades[$key] = array('dni'=>$value);
    }
    foreach ($request->get('nom') as $key => $value){
      $dades[$key] += array('nom'=>$value);
    }
    foreach ($request->get('entrada') as $key => $value){
      $dades[$key] += array('entrada'=>$value);
    }
    foreach ($request->get('sortida') as $key => $value){
      $dades[$key] += array('sortida'=>$value);
    }
    foreach ($request->get('festa') as $key => $value){
      $dades[$key] += array('festa'=>$value);
    }
    foreach ($request->get('vacances') as $key => $value){
      $dades[$key] += array('vacances'=>$value);
    }
    foreach ($request->get('baixa') as $key => $value){
      $dades[$key] += array('baixa'=>$value);
    }

    foreach ($dades as $dada){
      if ($dada['festa'] || $dada['vacances'] || $dada['baixa']) {
        $dada['entrada'] = null;
        $dada['sortida'] = null;
      }
      if ($dada['entrada'] == '16:00') {
        $sortida = '22:30';
      }  elseif ($dada['entrada'] == '11:30') {
        $sortida = '18:00';
      } elseif ($dada['entrada'] == '12:45') {
        $sortida = '21:00';
      }  elseif ($dada['entrada'] == '17:00') {
        $sortida = '01:15';
      } elseif ($dada['entrada'] == '20:30') {
        $sortida = '04:30';
      } else {
        $sortida = $dada['sortida'];
      }
      $timelog = new Timelog(array(
          'data' => $request->get('data'),
          'dni' => $dada['dni'],
          'entrada' => $dada['entrada'],
          //'sortida' => $dada['sortida'],
          'sortida' => $sortida,
          'festa' => $dada['festa'],
          'vacances' => $dada['vacances'],
          'baixa' => $dada['baixa'],
      ));
      $timelog->save();
    }

    return redirect()->back()-> with ('status', 'El registre s\'ha afegit!')->withInput();
  }

  public function storelogging(TimelogsFormRequest $request) {
    $worker = Worker::all()->where('dni', $request->get('dni'));
    $timelog = new Timelog(array(
          'data' => $request->get('data'),
          'dni' => $request->get('dni'),
          'entrada' => $request->get('hora'),
      ));
      $timelog->save();

    return redirect()->back()-> with ('status', 'El registre s\'ha afegit!');
  }


  public function destroy($id) {
      /**$input = Input::whereId($id)->firstOrFail();
      $input-> delete();
      return redirect('/inputs')-> with ('status', 'El tipo d\'entrada '.$id.' ha estat esborrat!');**/
  }
}
