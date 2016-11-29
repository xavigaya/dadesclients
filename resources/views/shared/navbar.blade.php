<nav class="navbar navbar-default" >
    <div class="container-fluid" >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" >
            <span class="sr-only" > Toggle navigation </span>
            <span class="icon-bar" ></span>
            <span class="icon-bar" ></span>
            <span class="icon-bar" ></span>
            </button>
            <img src="/img/ico_lerigraf.png" alt="Icono Logo Lerigraf" width="40px" />
            <a class="navbar-brand" href="/" ><strong>Lerigraf</strong> Gestió Dades</a>
        </div>
        
        
        <!-- Navbar Right -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
            <ul class="nav navbar-nav navbar-right" >
                <form class="navbar-form navbar-left" role="search" >
                    <div class="form-group" >
                        <input type="text" class="form-control" placeholder="Search" >
                    </div>
                    <button type="submit" class="btn btn-default" > Buscar </button>
                </form>
                <li class="dropdown" >
                    <a href="/rotures" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" > Rotures <span class="caret" ></span></a>
                    <ul class="dropdown-menu" role="menu" >
                        <li><a href="/rotures" > Llistat Rotures </a></li>
                        <li><a href="/rotures/create" > Afegir Rotures </a></li>
                    </ul>
                </li>
                <li><a href="/customers" > Clients </a></li>
                <li><a href="/publications" > Publicacions </a></li>
                <li><a href="/people" > Contactes </a></li>
                <li class="dropdown" >
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" > Member <span class="caret" ></span></a>
                <ul class="dropdown-menu" role="menu" >
                    <li><a href="/users/register" > Register </a></li>
                    <li><a href="/users/login" > Login </a></li>
                </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>