<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests;
use App\Http\Requests\RoturesPaperFormRequest;

class RoturesPaperController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index(){
        $rotures = DB::connection('roturapaper')->select('
            SELECT * FROM roturapaper
                ORDER BY  `roturapaper`.`id` DESC');
        
        return view('rotures.index', compact('rotures'));
    }
    
    public function create() {
        return view('rotures.create');
    }
    
    public function store(RoturesPaperFormRequest $request) {
        DB::connection('roturapaper')->table('roturapaper')->insert(
                    [   
                        'IdProducte' => $request->get('IdProducte'),
                        'nom_producte' => $request->get('name'),
                        'data' => date('Y-m-d',strtotime($request->get('data'))),
                        'hora' => date('H:i:s',strtotime($request->get('data'))),
                        'desbobinador' => $request->get('desbobinador'),
                        'bras' => $request->get('bras'),
                        'diametre_bobina' => $request->get('diametrebobina'),
                        'posicio_bras' => $request->get('posicio'),
                        'posicio_serra' => $request->get('posicio2'),
                        'rotura' => $request->get('rotura'),
                        'compensador' => $request->get('compensador'),
                        'detalleu_comportament' => $request->get('detalleu1'),
                        'detalleu_missatges_display' => $request->get('detalleu2'),
                        'conductor' => $request->get('conductor'),
                        'bobinero' => $request->get('bobinero'),
                        'responsable' => $request->get('responsable'),
                        'nom_bobinero' => $request->get('nombobinero')]
        );
        
        return redirect('/rotures')-> with ('status', 'La rotura del producte amb ID : '.$request->get('IdProducte').' s\'ha afegit a la BDD!');
    }
    
    
    /**
     * Send an e-mail after insering.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function sendEmailReminder(Request $request)
    {
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            $m->from('hello@app.com', 'Your Application');

            $m->to($user->email, $user->name)->subject('Your Reminder!');
        });
    }
}