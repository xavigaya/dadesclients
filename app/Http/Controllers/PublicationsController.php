<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Http\Requests;
use App\Http\Requests\PublicationFormRequest;
use App\Publication;
use App\Customer;

class PublicationsController extends Controller
{
    public function index() {
        $publications = Publication::all();
        //$customers = Customer::all();
        $customers = DB::connection('heraldo')->select('
            SELECT     Aux_Cliente.Nombre AS nomclient, Aux_Cliente.Id AS idclient
                FROM Aux_Cliente 
                ORDER BY Aux_Cliente.Nombre');
               
        return view('publications.index', compact('publications', 'customers'));
    }
    
    
    public function create() {
        $customers = Customer::all();
        $publicacions = DB::connection('heraldo')->select('
            SELECT Aux_Publicacion.Id AS idpubli, Aux_Publicacion.Nombre AS nompubli, Aux_Cliente.Id AS idclient,
                Aux_Cliente.Nombre AS nomclient
            FROM Aux_Publicacion INNER JOIN
                Aux_Cliente ON Aux_Publicacion.Cliente = Aux_Cliente.Id
            WHERE (Aux_Publicacion.Activa = 1)
            ORDER BY Aux_Publicacion.Nombre');
        return view('publications.create', compact('customers', 'publicacions'));
    }
    
    
    public function show($slug) {
        $publication = Publication::whereSlug($slug)->firstOrFail();
        //$customers = Customer::all();
        $customers = DB::connection('heraldo')->select('
            SELECT     Aux_Cliente.Nombre AS nomclient, Aux_Cliente.Id AS idclient
                FROM Aux_Cliente 
                ORDER BY Aux_Cliente.Nombre');
        $selectedCustomer = $publication->idclient;
        return view('publications.show', compact('publication', 'customers', 'selectedCustomer'));
    }
    
    
    public function edit($slug) {
        $publication = Publication::whereSlug($slug)->firstOrFail();
        //$customers = Customer::all();
        $customers = DB::connection('heraldo')->select('
            SELECT     Aux_Cliente.Nombre AS nomclient, Aux_Cliente.Id AS idclient
                FROM Aux_Cliente
                ORDER BY Aux_Cliente.Nombre');
        $selectedCustomer = $publication->idclient;
        return view('publications.edit', compact('publication', 'customers', 'selectedCustomer'));
    }
    
    
    public function update($slug, PublicationFormRequest $request) {
        $publication = Publication::whereSlug($slug)->firstOrFail();
        $publication->nom = $request->get('nom');
        if ($request->get('status') == null ) {
            $publication->status = 0;
        } else {
            $publication->status = 1;
        }
        if ($request->get('forn') == null ) {
            $publication->forn = 0;
        } else {
            $publication->forn = 1;
        }
        $publication->idclient = $request->get('idclient');
        $publication->format = $request->get('format');
        $publication->mides = $request->get('mides');
        $publication->observa = $request->get('observa');
        $publication->save();
        return redirect(action('PublicationsController@index'))-> with ('status', 'El client '.$publication->nom.' ha estat actualitzat!');
    }
    
    
    public function store(PublicationFormRequest $request) {
        $slug = uniqid();
        $publication = new Publication(array(
            'nom' => $request->get('nom'),
            'idclient' => $request->get('idclient'),
            'slug' => $slug,
            'format' => $request->get('format'),
            'mides' => $request->get('mides'),
            'forn' => $request->get('forn'),
            'observa' => $request->get('observa'),
        ));
        $publication->save();
        return redirect('/techdata/create')-> with ('status', 'La publicació ha estat creada! El seu id és: '.$slug);
    }
    
    
    public function destroy($slug) {
        $publication = Publication::whereSlug($slug)->firstOrFail();
        $publication-> delete();
        return redirect('/publications')-> with ('status', 'El client '.$slug.' ha estat esborrat!');
    }
}
