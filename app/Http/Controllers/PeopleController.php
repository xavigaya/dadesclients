<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PeopleFormRequest;
use App\Person;
use App\TypePerson;
use App\Publication;

class PeopleController extends Controller
{
    public function index(){
        $people = Person::all();
        $publications = Publication::all();
        $peopletype = TypePerson::all();
        return view('people.index', compact('people', 'publications', 'peopletype'));
    }
    
    
    public function create() {
        $publications = Publication::all();
        $typepeople = TypePerson::all();
        return view('people.create', compact('publications', 'typepeople'));
    }
    
    
    public function show($slug) {
        $person = Person::whereSlug($slug)->firstOrFail();
        $publications = Publication::all();
        $typepeople = TypePerson::all();
        return view('people.show', compact('person', 'publications', 'typepeople'));
    }
    
    
    public function edit($slug) {
        $person = Person::whereSlug($slug)->firstOrFail();
        $publications = Publication::all();
        $typepeople = TypePerson::all();
        $selectedperson = $person->idclient;
        return view('people.edit', compact('person', 'typepeople', 'selectedperson', 'publications'));
    }
    
    
    public function update($slug, PeopleFormRequest $request) {
        $person = Person::whereSlug($slug)->firstOrFail();
        $person->nom = $request->get('nom');
        $person->idpubli = $request->get('idpubli');
        $person->cognoms = $request->get('cognoms');
        $person->email = $request->get('email');
        $person->telf = $request->get('telf');
        $person->mobil = $request->get('mobil');
        $person->info = $request->get('info');
        $person->idtipo = $request->get('idtipo');
        $person->save();
        return redirect(action('PeopleController@index'))-> with ('status', 'El contacte '.$person->nom.' ha estat actualitzat!');
    }
    
    
    public function store(PeopleFormRequest $request) {
        $slug = uniqid();
        $person = new Person(array(
            'nom' => $request->get('nom'),
            'idpubli' => $request->get('idpubli'),
            'slug' => $slug,
            'cognoms' => $request->get('cognoms'),
            'email' => $request->get('email'),
            'telf' => $request->get('telf'),
            'mobil' => $request->get('mobil'),
            'info' => $request->get('info'),
            'idtipo' => $request->get('idtipo')
        ));
        $person->save();
        return redirect('/people')-> with ('status', 'El contacte ha estat creat! El seu id és: '.$slug);
    }
    
    
    public function destroy($slug) {
        $person = Person::whereSlug($slug)->firstOrFail();
        $person-> delete();
        return redirect('/people')-> with ('status', 'El contacte '.$person->nom.' '.$person->cognoms.' ha estat esborrat!');
    }
}
