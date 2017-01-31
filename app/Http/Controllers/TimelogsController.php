<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TimelogsFormRequest;
use App\Timelog;
use App\Worker;

class TimelogsController extends Controller
{
  public function index(){
      $timelogs = Timelog::all();

      return view('timelogs.index', compact('timelogs'));
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


  public function store(TimelogsFormRequest $request) {
      $timelog = new Timelog(array(
      $data = $request->get('data'),
      foreach ($request->get('dni') as $value) {
            'dni' => $value['dni'],
            'entrada' => $value->get('entrada'),
            'sortida' => $value->get('sortida'),
            'festa' => $value->get('festa'),
            'vacances' => $value->get('vacances'),
            'baixa' => $value->get('baixa'),
        ));
        $timelog->save();
      }

      return redirect('/timelogs')-> with ('status', 'El registre s\'ha afegit!<br>'.$request);
  }


  public function destroy($id) {
      /**$input = Input::whereId($id)->firstOrFail();
      $input-> delete();
      return redirect('/inputs')-> with ('status', 'El tipo d\'entrada '.$id.' ha estat esborrat!');**/
  }
}
