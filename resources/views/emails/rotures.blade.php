<!DOCTYPE html>
<html lang="es" >
    <head>
        <meta charset="utf-8" >
    </head>
    <body>
        <h2> Nova Rotura {!! $nom_producte !!}(ID: {!! $IdProducte !!}) / {!! $data !!} - {!! $hora !!}</h2>
        <div>
            <h3>Desbobinador : {!! $desbobinador !!}</h3>
            <label>Braç =</label> <span>{!! $bras !!}</span><br/>
            <label>Diàmetre Bobina =</label> <span>{!! $diametre_bobina !!}</span><br/>
            <label>Posició Braç =</label> <span>{!! $posicio_bras !!}</span><br/>
            <label>Posició Serra =</label> <span>{!! $posicio_serra !!}</span><br/>
            <label>Rotura =</label> <span>{!! $rotura !!}</span><br/>
            <label>Compensador =</label> <span>{!! $compensador !!}</span><br/>
            <label>Detall Comportament =</label> <span>{!! $detalleu_comportament !!}</span><br/>
            <label>Missatges Display =</label> <span>{!! $detalleu_missatges_display !!}</span><br/>
            <label>Conductor =</label> <span>{!! $conductor !!}</span><br/>
            <label>Bobinero =</label> <span>{!! $bobinero !!}</span><br/>
            <label>Responsable =</label> <span>{!! $responsable !!}</span><br/>
            <label>Nom Bobinero =</label> <span>{!! $nom_bobinero !!}</span>
        </div>
    </body>
</html>