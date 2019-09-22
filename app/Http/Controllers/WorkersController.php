<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\WorkerFormRequest;
use App\Worker;
use App\Team;

class WorkersController extends Controller
{
  public function index(){
      $workers = Worker::where('equip', '>', '0')->orderBy('cognoms')->get();
      return view('workers.index', compact('workers'));
  }

  public function create() {
    $teams = Team::all();
    return view('workers.create', compact('teams'));
  }

  public function store(WorkerFormRequest $request) {
      $worker = new Worker(array(
          'dni' => $request->get('dni'),
          'nom' => $request->get('nom'),
          'cognoms' => $request->get('cognoms'),
          'equip' => $request->get('equip'),
      ));
      $worker->save();
      return redirect('/workers')-> with ('status', 'El treballador ha estat creat!');
  }
}
