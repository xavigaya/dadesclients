<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TeamsFormRequest;
use App\Team;

class TeamsController extends Controller
{
  public function index(){
      $teams = Team::all();
      return view('teams.index', compact('teams'));
  }

  public function create() {
      return view('teams.create');
  }

  public function store(TeamsFormRequest $request) {
      $team = new Team(array(
          'nom' => $request->get('nom'),
      ));
      $team->save();
      return redirect('/teams')-> with ('status', 'L\'equip ha estat creat!');
  }


}
