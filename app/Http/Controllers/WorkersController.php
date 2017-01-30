<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Worker;

class WorkersController extends Controller
{
  public function index(){
      $workers = Worker::all();
      return view('workers.index', compact('workers'));
  }

  public function create() {
      return view('workers.create');
  }
}
