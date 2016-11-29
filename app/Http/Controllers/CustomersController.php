<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;
//use App\Http\Requests\CustomerFormRequest;
use App\Customer;
use Illuminate\Support\Facades\DB;

class CustomersController extends Controller
{
    public function index(){
        $clientsHeraldo = DB::connection('heraldo')->select('
            SELECT     Aux_Cliente.Nombre AS nomclient, Aux_Publicacion.Nombre AS nompubli
                FROM Aux_Cliente INNER JOIN Aux_Publicacion ON Aux_Cliente.Id = Aux_Publicacion.Cliente
                WHERE     (Aux_Publicacion.Activa = 1)
                ORDER BY Aux_Cliente.Nombre, Aux_Publicacion.Nombre');
        $customers = Customer::all();

        return view('customers.index', compact('clientsHeraldo', 'customers'));
        
//        $customers = Customer::all();
//        return view('customers.index', compact('customers'));
    }
    
/**    
    public function create() {
        return view('customers.create');
    }
    
    
    public function show($slug) {
        $customer = Customer::whereSlug($slug)->firstOrFail();
        return view('customers.show', compact('customer'));
    }
    
    
    public function edit($slug) {
        $customer = Customer::whereSlug($slug)->firstOrFail();
        return view('customers.edit', compact('customer'));
    }
    
    
    public function update($slug, CustomerFormRequest $request) {
        $customer = Customer::whereSlug($slug)->firstOrFail();
        $customer->nom = $request->get('nom');
        if ($request->get('status') == null ) {
            $customer->status = 0;
        } else {
            $customer->status = 1;
        }
        $customer->save();
        return redirect(action('CustomersController@index'))-> with ('status', 'El client '.$customer->nom.' ha estat actualitzat!');
    }
    
    
    public function store(CustomerFormRequest $request) {
        $slug = uniqid();
        $customer = new Customer(array(
            'nom' => $request->get('nom'),
            'slug' => $slug
        ));
        $customer->save();
        return redirect('/customers')-> with ('status', 'El client ha estat afegit! El seu id és: '.$slug);
    }
    
    
    public function destroy($slug) {
        $customer = Customer::whereSlug($slug)->firstOrFail();
        $customer-> delete();
        return redirect('/customers')-> with ('status', 'El client '.$slug.' ha estat esborrat!');
    }
    
    public function upgrade() {
        $users = DB::connection('heraldo')->select('select * from Aux_Cliente');

        return view('user.index', compact('users'));
    }
**/
}
