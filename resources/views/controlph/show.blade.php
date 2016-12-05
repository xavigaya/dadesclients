@extends('master')
@section('title', 'Control Ph')
@section('content')
    <div class ="container col-md-8 col-md-offset-2">
        <div class ="well well bs-component">
            <fieldset>
                <legend><h2 class="bg-warning">Medició de Ph</h2></legend>
                <div class ="form-group">
                    <div class ="col-lg-2">
                        <label for ="data" class ="control-label">Data</label>
                    </div>
                    <div class ="col-lg-4">
                        <input type="date" class ="form-control" id ="data" name="data" value="{!! $ph->data !!}" readonly>
                    </div>
                </div>

                <!-- Dades de medició -->
                <!-- Nevera 1 -->
                <div class ="form-group">
                    <h3 class ="bg-warning col-lg-12">Nevera 1</h3>
                </div>
                <div class ="form-group">
                    <div class ="col-lg-2">
                        <label for ="ph1" class ="control-label">Ph</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="ph1" type="text" placeholder="0.00" name="ph1" size="4"/>
                    </div>
                    <div class ="col-lg-2">
                        <label for ="cond1" class ="control-label">Conductivitat</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="cond1" type="text" placeholder="0000" name="cond1" size="4"/>
                    </div>
                    <div class ="col-lg-2">
                        <label for ="temp1" class ="control-label">Temperatura</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="temp1" type="text" placeholder="00" name="temp1" size="4"/>
                    </div>
                </div>

                <!-- Nevera 2 -->
                <div class ="form-group">
                    <h3 class ="bg-warning col-lg-12">Nevera 2</h3>
                </div>                    
                <div class ="form-group">
                    <div class ="col-lg-2">
                        <label for ="ph2" class ="control-label">Ph</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="ph2" type="text" placeholder="0.00" name="ph2" size="4"/>
                    </div>
                    <div class ="col-lg-2">
                        <label for ="cond2" class ="control-label">Conductivitat</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="cond2" type="text" placeholder="0000" name="cond2" size="4"/>
                    </div>
                    <div class ="col-lg-2">
                        <label for ="temp2" class ="control-label">Temperatura</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="temp2" type="text" placeholder="00" name="temp2" size="4"/>
                    </div>
                </div>

                <!-- Origen -->
                <div class ="form-group">
                    <h3 class ="bg-warning col-lg-12">Origen</h3>
                </div>                    
                <div class ="form-group">
                    <div class ="col-lg-2">
                        <label for ="ph0" class ="control-label">Ph</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="ph0" type="text" placeholder="0.00" name="ph0" size="4"/>
                    </div>
                    <div class ="col-lg-2">
                        <label for ="cond0" class ="control-label">Conductivitat</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="cond0" type="text" placeholder="0000" name="cond0" size="4"/>
                    </div>
                    <div class ="col-lg-2">
                        <label for ="temp0" class ="control-label">Temperatura</label>
                    </div>
                    <div class ="col-lg-2">
                        <input id="temp0" type="text" placeholder="00" name="temp0" size="4"/>
                    </div>
                </div>
                <div class ="form-group">
                    <div class ="col-lg-4 col-lg-offset-8">
                        <button type="submit" class ="btn btn-primary">Guardar</button>
                        <button type="reset" class ="btn btn-default">Cancel·lar</button>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
@endsection