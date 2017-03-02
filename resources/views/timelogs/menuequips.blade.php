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
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <span class="badge"><input type="date" class ="form-control" id ="data"
                  name="data" value="{{ date('Y-m-d', strtotime( old('data').' + 1 days')) }}"></span>
              <!--<span class="badge"><input type="text" class ="form-control" id ="team"
                  name="team" placeholder="equip"></span>-->

                <select class="badge" name="team">
                  <option value="1">Preimpressió</option>
                  <option value="2">Manteniment</option>
                  <option value="3">Impressió tarde</option>
                  <option value="4">Administració</option>
                  <option value="5">Impressió Nit</option>
                  <option value="6">Cierre</option>
                </select>

              <button type="submit" class ="btn btn-primary" name=>Buscar</button>
          </form>
        </span>
      </div>
      <div class="col-lt-10">
        &nbsp;
      </div>
      <div class="col-lt-10">
        <span class="badge">
            <a href="/timelogs/1/create_equip/"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Preimpressió</a>
        </span>
        <span class="badge">
            <a href="/timelogs/2/create_equip"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Manteniment</a>
        </span>
        <span class="badge">
            <a href="/timelogs/3/create_equip"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Impressió tarde</a>
        </span>
        <span class="badge">
            <a href="/timelogs/4/create_equip"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Administració</a>
        </span>
        <span class="badge">
            <a href="/timelogs/5/create_equip"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Impressió Nit</a>
        </span>
        <span class="badge">
            <a href="/timelogs/6/create_equip"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Cierre</a>
        </span>
        <!--<span class="badge">
            <a href="/timelogs/create"><img src="/img/add.png" alt="Afegir" title="Afegir" height="20px"> Tots</a>
        </span>-->
      </div>
    </div>
</div>
