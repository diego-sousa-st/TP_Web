<!--barra de navegação-->
<!-- nav-tabs -->
<!-- navbar-default,  etc -->
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#barra-navegacao">
            <span class="sr-only">Alternar Menu</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span></button>
            <a href="#" class="navbar-brand">Sistema de Orientações e Pesquisa - DN System</a>
        </div>
        <div class="collapse navbar-collapse" id="barra-navegacao">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="./pags/telaPerfil.php">Visualizar Perfil</a></li>
                <li><a href="../../Controller/ListarCursos.php">Listar Cursos</a></li>                    

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Opções<span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a href="https://sig.ufla.br" target="_blank">SIG Ufla</a></li>
                        <li><a href="../../Controller/DeslogarAluno.php">Deslogar</a></li>
                    </ul>
                </li>
            </ul>  
        </div>
    </div>
</nav>