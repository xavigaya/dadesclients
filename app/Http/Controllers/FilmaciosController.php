<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\FilmacioFormRequest;
use App\Filmacio;

class FilmaciosController extends Controller
{
    public function index(){
        $filmacios = Filmacio::all();
        return view('filmacio.index', compact('filmacios'));
    }
    
    
    public function create() {
        return view('filmacio.create');
    }
    
    
    public function store(FilmacioFormRequest $request) {
        $filmacios = new Filmacio(array(
            'nom' => $request->get('nom'),
        ));
        $filmacios->save();
        return redirect('/filmacios')-> with ('status', 'El tipus de client '. $filmacios->nom .' ha estat afegit!');
    }
    
    
    public function destroy($id) {
        $filmacios = Filmacio::whereId($id)->firstOrFail();
        $filmacios-> delete();
        return redirect('/filmacios')-> with ('status', 'El tipus filmació '.$filmacios->nom.' ha estat esborrat!');
    }
}
