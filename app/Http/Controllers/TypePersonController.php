<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TypePersonFormRequest;
use App\TypePerson;

class TypePersonController extends Controller
{
    public function index(){
        $typeperson = TypePerson::all();
        return view('typeperson.index', compact('typeperson'));
    }
    
    
    public function create() {
        return view('typeperson.create');
    }
    
    
    public function store(TypePersonFormRequest $request) {
        $typeperson = new TypePerson(array(
            'tipus' => $request->get('nom'),
        ));
        $typeperson->save();
        return redirect('/typeperson')-> with ('status', 'El tipus de client '. $typeperson->tipus .' ha estat afegit!');
    }
    
    
    public function destroy($id) {
        $typeperson = TypePerson::whereId($id)->firstOrFail();
        $typeperson-> delete();
        return redirect('/typeperson')-> with ('status', 'El tipus de contacte '.$id.' ha estat esborrat!');
    }
}
