<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ControlPh;
use App\Http\Requests;
use App\Http\Requests\ControlPhFormRequest;

class ControlPhController extends Controller
{
    public function index(){
        $phs = ControlPh::all()->sortByDesc('id');
        return view('controlph.index', compact('phs'));
        
    }
    
    public function nevera3(){
        $phs = ControlPh::all()->sortByDesc('id');
        return view('controlph.index_nev3', compact('phs'));
        
    }
    
    public function create(){
        return view('controlph.create');
    }
    
    public function store(ControlPhFormRequest $request) {
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
        $ph->save();
        return redirect('/controlph')-> with ('status', 'Medició entrada correctament!');
    }
    
    /**
     * Send an e-mail after insering.
     *
     * @param  Request  $request
     * @return Response
     */
    public function sendEmailphValues(Request $request) {
        
        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}
