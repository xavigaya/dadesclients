<div class="panel panel-default">
    <div class="panel-heading">
      <div class="col-lt-10">
        <span class="badge">
            <a href="/timelogs/">Llistat Tot</a>
        </span>
        <span class="badge">
            <a href="/timelogs/today">Llistat Avui</a>
        </span>
        <span class="badge">
          <form class ="form-horizontal" method="post">
              <!--@foreach ($errors->all() as $error)
                  <p class ="alert alert-danger">{{ $error }}</p>
              @endforeach
              @if (session('status'))
                  <div class ="alert alert-success">
                      {{ session('status') }}
                  </div>
              @endif-->
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <span class="badge"><input type="date" class ="form-control" id ="data"
                  name="data" value="{{ date('Y-m-d', strtotime( old('data').' + 1 days')) }}"></span>
              <button type="submit" class ="btn btn-primary">Buscar</button>
          </form>
        </span>
      </div>
      <div class="col-lt-10">
        &nbsp;
      </div>
      <div class="col-lt-10">
        <span class="badge">
            <a href="/timelogs/create_equip1"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Preimpressió</a>
        </span>
        <span class="badge">
            <a href="/timelogs/create_equip2"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Manteniment</a>
        </span>
        <span class="badge">
            <a href="/timelogs/create_equip3"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Impressió tarde</a>
        </span>
        <span class="badge">
            <a href="/timelogs/create_equip4"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Administració</a>
        </span>
        <span class="badge">
            <a href="/timelogs/create_equip5"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Impressió Nit</a>
        </span>
        <span class="badge">
            <a href="/timelogs/create_equip6"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Cierre</a>
        </span>
        <span class="badge">
            <a href="/timelogs/create"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Tots</a>
        </span>
      </div>
    </div>
</div>
