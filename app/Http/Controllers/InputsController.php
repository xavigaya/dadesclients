<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\InputFormRequest;
use App\Input;

class InputsController extends Controller
{
    public function index(){
        $input = Input::all();
        return view('inputs.index', compact('input'));
    }
    
    
    public function create() {
        return view('inputs.create');
    }
    
    
    public function store(InputFormRequest $request) {
        $input = new Input(array(
            'nom' => $request->get('nom'),
            'usuari' => $request->get('usuari'),
            'password' => $request->get('password'),
        ));
        $input->save();
        return redirect('/inputs')-> with ('status', 'El tipo d\'entrada '. $input->nom .' ha estat afegit!');
    }
    
    
    public function destroy($id) {
        $input = Input::whereId($id)->firstOrFail();
        $input-> delete();
        return redirect('/inputs')-> with ('status', 'El tipo d\'entrada '.$id.' ha estat esborrat!');
    }
}
