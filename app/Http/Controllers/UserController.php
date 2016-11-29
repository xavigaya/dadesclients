<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        //$clientsHeraldo = DB::connection('heraldo')->select('select * from Aux_Cliente');

        //return view('user.index', ['users' => $users]);
        //return view('user.index', compact('clientsHeraldo'));
    }
}