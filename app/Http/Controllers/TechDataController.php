<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\TechDataFormRequest;
use App\TechData;
use App\Publication;
use App\Input;
use App\Filmacio;

class TechDataController extends Controller
{
    public function index(){
        $techdata = TechData::all();
        $publications = Publication::all();
        $filmacios = Filmacio::all();
        $inputs = Input::all();
        return view('techdata.index', compact('techdata', 'publications', 'filmacios', 'inputs'));
    }
    
    
    public function create() {
        $publications = Publication::all();
        $inputs = Input::all();
        $filmacios = Filmacio::all();
        return view('techdata.create', compact('publications', 'inputs', 'filmacios'));
    }
    
    
    public function show($id) {
        $techdatas = TechData::whereId($id)->firstOrFail();
        $publications = Publication::all();
        $filmacios = Filmacio::all();
        $inputs = Input::all();
        return view('techdata.show', compact('techdatas', 'publications', 'inputs', 'filmacios'));
    }
    
    
    public function edit($id) {
        $techdata = TechData::whereId($id)->firstOrFail();
        $publications = Publication::all();
        $filmacios = Filmacio::all();
        $inputs = Input::all();
        return view('techdata.edit', compact('techdata', 'publications', 'filmacios', 'inputs'));
    }
    
    
    public function update($id, TechDataFormRequest $request) {
        $techdata = TechData::whereId($id)->firstOrFail();
        $techdata->nom = $request->get('nom');
        $techdata->idpubli = $request->get('idpubli');
        $techdata->cognoms = $request->get('cognoms');
        $techdata->email = $request->get('email');
        $techdata->telf = $request->get('telf');
        $techdata->mobil = $request->get('mobil');
        $techdata->info = $request->get('info');
        $techdata->idtipo = $request->get('idtipo');
        $techdata->save();
        return redirect(action('PeopleController@index'))-> with ('status', 'El contacte '.$techdata->nom.' ha estat actualitzat!');
    }
    
    
    public function store(TechDataFormRequest $request) {
        $slug = uniqid();
        $techdata = new TechData(array(
            'plantilla' => $request->get('plantilla'),
            'idpubli' => $request->get('idpubli'),
            'slug' => $slug,
            'observacions' => $request->get('observacions'),
            'idfilmacio' => $request->get('idfilmacio'),
            'identrada' => $request->get('identrada'),
        ));
        $techdata->save();
        return redirect('/techdata')-> with ('status', 'El contacte ha estat creat! El seu id és: '.$slug);
    }
    
    
    public function destroy($slug) {
        $techdata = TechData::whereSlug($slug)->firstOrFail();
        $techdata-> delete();
        return redirect('/techdata')-> with ('status', 'El contacte '.$techdata->nom.' '.$techdata->cognoms.' ha estat esborrat!');
    }
}
