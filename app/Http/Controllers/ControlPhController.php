<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ControlPh;
use App\Http\Requests;

class ControlPhController extends Controller
{
    public function index(){
        $phs = ControlPh::all()->sortByDesc('id');
        return view('controlph.index', compact('phs'));
        
    }
}
