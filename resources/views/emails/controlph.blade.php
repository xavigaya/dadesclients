<!DOCTYPE html>
<html lang="es" >
    <head>
        <meta charset="utf-8" >
    </head>
    <body>
        <h2> Control Ph {!! $Data !!}</h2>
        <div>
            <h3>Nevera 1</h3>
            <label>Ph =</label> <span>{!! $Ph1 !!}</span><br/>
            <label>Conductivitat =</label> <span>{!! $Cond1 !!}</span><br/>
            <label>Temp =</label> <span>{!! $Temp1 !!}</span>
        </div>
        <div>
            <h3>Nevera 2</h3>
            <label>Ph =</label> <span>{!! $Ph2 !!}</span><br/>
            <label>Conductivitat =</label> <span>{!! $Cond2 !!}</span><br/>
            <label>Temp =</label> <span>{!! $Temp2 !!}</span>
        </div>
        <div>
            <h3>Origen</h3>
            <label>Ph =</label> <span>{!! $Ph0 !!}</span><br/>
            <label>Conductivitat =</label> <span>{!! $Cond0 !!}</span><br/>
            <label>Temp =</label> <span>{!! $Temp0 !!}</span>
        </div>
    </body>
</html>