@extends('master')
@section('title', 'Rotures')
@section('content')
    <div class ="container col-md-8 col-md-offset-2">
        <div class ="well well bs-component">
            <form class ="form-horizontal" method="post">
                @foreach ($errors->all() as $error)
                    <p class ="alert alert-danger">{{ $error }}</p>
                @endforeach
                @if (session('status'))
                    <div class ="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend><h2 class="bg-warning">Afegir una rotura de paper</h2></legend>
                    <div class ="form-group">
                        <div class ="col-lg-2">
                            <label for ="IdProducte" class ="control-label">Id Producte</label>
                        </div>
                        <div class ="col-lg-4">
                            <input type="text" class ="form-control" id ="IdProducte" placeholder="id producte" name="IdProducte" required>
                        </div>
                        <div class ="col-lg-2">
                            <label for ="name" class ="control-label">Nom Producte</label>
                        </div>
                        <div class ="col-lg-4">
                            <input type="text" class ="form-control" id ="name" placeholder="nom del producte" name="name" required>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-2">
                            <label for ="data" class ="control-label">Data</label>
                        </div>
                        <div class ="col-lg-4">
                            <input type="date" class ="form-control" id ="data" name="data" required>
                        </div>
                        <div class ="col-lg-2">
                            <label for ="hora" class ="control-label">Hora</label>
                        </div>
                        <div class ="col-lg-4">
                            <input type="time" class ="form-control" id ="hora" name="hora" required>
                        </div>
                    </div>
                    
                    <!-- Dades de le rotura -->
                    <div class ="form-group">
                        <h3 class ="bg-warning col-lg-12">Dades de la rotura</h3>
                    </div>
                    
                    <div class ="form-group">
                        <div class ="col-lg-2">
                            <label for ="desbobinador" class ="control-label">Desbobinador</label>
                        </div>
                        <div class ="col-lg-4">
                            <select class="form-control" id="desbobinador" name="desbobinador" required>
                                <option value="" selected>- selecciona -</option>
                                <option value="RWK1">RWK1</option>
                                <option value="RWK2">RWK2</option>
                                <option value="RWK3">RWK3</option>
                                <option value="RWK4">RWK4</option>
                                <option value="RWK5">RWK5</option>
                                <option value="RWK6">RWK6</option>
                                <option value="RWK7">RWK7</option>
                                <option value="MEG">MEG</option>
                            </select>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-12">
                            <label for ="bras" class ="control-label">Braç on es produeix la rotura</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-4 col-md-offset-2">
                            <input class="radio-inline" type="radio" value ="braç 1" name="bras" required> Braç 1 / Blau
                        </div>
                        <div class ="col-lg-4">
                            <input class="radio-inline" type="radio" value ="braç 2" name="bras"> Braç 2 / Vermell
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-4">
                            <label for ="diametrebobina" class ="control-label">Diàmetre de la bobina trencada</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-4 col-md-offset-2">
                            <input type="text" class ="form-control" id ="diametrebobina" placeholder="diàmetre" name="diametrebobina" required>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-5">
                            <label for ="posicio" class ="control-label">Posició del braç on hi ha hagut la rotura</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-4 col-md-offset-2">
                            <input class="radio-inline" type="radio" value ="posició de treball" name="posicio" required> Posició de treball
                        </div>
                        <div class ="col-lg-4">
                            <input class="radio-inline" type="radio" value ="posició d'empalme" name="posicio"> Posició d'empalme
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-4">
                            <label for ="posicio2" class ="control-label">Posició de la serra i esponja</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-4 col-md-offset-2">
                            <input class="radio-inline" type="radio" value ="posició en repòs" name="posicio2" required> Posició en repòs
                        </div>
                        <div class ="col-lg-4">
                            <input class="radio-inline" type="radio" value ="posició preparat per a empalme" name="posicio2"> Posició preparat per a empalme
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-12">
                            <label for ="rotura" class ="control-label">Rotura en:</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-3 col-md-offset-2">
                            <input class="radio-inline" type="radio" value ="producció normal" name="rotura" required> Producció Normal
                        </div>
                        <div class ="col-lg-3">
                            <input class="radio-inline" type="radio" value ="durant el canvi de bobina" name="rotura"> Durant el canvi de bobina
                        </div>
                        <div class ="col-lg-3">
                            <input class="radio-inline" type="radio" value ="després del canvi de bobina" name="rotura"> Després del canvi de bobina
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-6">
                            <label for ="compensador" class ="control-label">Comportament compensador en l'instant de la rotura</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-5 col-md-offset-2">
                            <input type="radio" name="compensador" value="compensador en posició estàtica, no oscil·lant" required> Compensador en posició estàtica, no oscil·lant
                        </div>
                        <div class ="col-lg-5">
                            <input type="radio" name="compensador" value="compensador en moviment"> Compensador en moviment<br>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-12">
                            <label for ="detalleu1" class ="control-label">Detalleu si ho creieu convenient el comportament del compensador</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-md-offset-2">
                            <textarea class ="form-control" id ="detalleu1" name="detalleu1"></textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-12">
                            <label for ="detalleu2" class ="control-label">Detalleu tots els missatges del display del desbobinador</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-md-offset-2">
                            <textarea class ="form-control" id ="detalleu2" name="detalleu2"></textarea>
                        </div>
                    </div>
                    
                    <!-- Descripcions de les aturades -->
                    <div class ="form-group">
                        <h3 class ="bg-warning col-lg-12">Descripcions de les aturades</h3>
                    </div>
                    
                    <div class ="form-group">
                        <div class ="col-lg-12">
                            <label for ="conductor" class ="control-label">Conductor. Breu descripció de l'aturada</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-md-offset-2">
                            <textarea class ="form-control" id ="conductor" name="conductor" required></textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-12">
                            <label for ="bobinero" class ="control-label">Bobinero. Breu descripció de l'aturada</label>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-md-offset-2">
                            <textarea class ="form-control" id ="bobinero" name="bobinero"></textarea>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-3">
                            <label for ="responsable" class ="control-label">Responsable Equip</label>
                        </div>
                        <div class ="col-lg-3">
                            <select class="form-control" id="responsable" name="responsable" >
                                <option value="" selected>- selecciona -</option>
                                <option value="Fernando Hernández">Fernando Hernández</option>
                                <option value="José Peinado">José Peinado</option>
                                <option value="Emili Egea">Emili Egea</option>
                                <option value="Dídac Ojeda">Dídac Ojeda</option>
                                <option value="Antonio Barco">Antonio Barco</option>
                            </select>
                        </div>
                        <div class ="col-lg-3">
                            <label for ="nombobinero" class ="col-lg-2 control-label">Nom Bobinero</label>
                        </div>
                        <div class ="col-lg-3">
                            <input type="text" class ="form-control" id ="nombobinero" name="nombobinero" required>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-4 col-lg-offset-8">
                            <button type="submit" class ="btn btn-primary">Guardar</button>
                            <button type="reset" class ="btn btn-default">Cancel·lar</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
@endsection