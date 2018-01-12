<html lang="es">
    <head>
        <title>REGISTRE HORARIS LERIGRAF</title>
        <link rel="stylesheet" href="/css/bootstrap.min.css" >
        <link rel="stylesheet" href="/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="/css/estils.css" >
        <script src="/js/jquery-3.1.1.min.js" ></script>
        <script src="/js/bootstrap.min.js" ></script>

        <!--
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" >
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" >
        <link rel="stylesheet" href="/css/estils.css" >
        <script src="//code.jquery.com/jquery-1.11.3.min.js" ></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" ></script>
        -->
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="60">

        {!! Charts::assets() !!}

    </head>
    <body>
    <div class ="container col-md-10 col-md-offset-1">
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
                @if (session('danger'))
                    <div class ="alert alert-danger">
                        {{ session('danger') }}
                    </div>
                @endif
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <fieldset>
                    <legend>REGISTRE HORARIS LERIGRAF</legend>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-2">
                          <span class="badge"><input type="date" class ="form-control" id ="data"
                            name="data" value="{!! date("Y-m-d", strtotime("today")) !!}" readonly></span>
                          <span class="badge"><input type="time" class ="form-control" id ="hora"
                            name="hora" value="{!! date("H:i", strtotime("now -0100")) !!}" readonly></span>

                          <span class="badge"><input type="password" class ="form-control" id ="dni" name="dni" placeholder="DNI 45612389H"></span>
                        </div>
                    </div>
                    <div class ="form-group">
                        <div class ="col-lg-10 col-lg-offset-6">
                            <button type="submit" name="inout" class ="btn btn-success" value="1" >Entrada</button>
                            <button type="submit" name="inout" class ="btn btn-warning" value="2">Sortida</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
  </body>
</html>
