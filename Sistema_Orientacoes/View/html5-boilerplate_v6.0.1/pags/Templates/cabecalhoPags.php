
<!-- barra de navegação-->
<!-- nav-tabs-->
<!-- navbar-default,  etc-->
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" data-toggle="collapse" data-target="#barra-navegacao" class="navbar-toggle collapsed"><span class="sr-only">Alternar Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="../index.php" class="navbar-brand">Sistema de Orientações e Pesquisa - DN System</a>
    </div>
    <div id="barra-navegacao" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../pags/telaPerfil.php">Visualizar Perfil</a></li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Cadastrar<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../pags/telaCadastroPesquisa.php">Pesquisa</a></li>
            <li><a href="../pags/telaCadastroCurso.php">Curso</a></li>
            <li><a href="../pags/telaCadastroInstituicao.php">Instituição</a></li>
            <li><a href="../pags/telaCadastroOrientacao.php">Orientação</a></li>
          </ul>
        </li>
        <li><a href="../../../Controller/ListarCursos.php">Listar Cursos</a></li>
        <li><a href="./galeriaVideos.php">Vídeos</a></li>
        <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Opções<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="https://sig.ufla.br" target="_blank">SIG Ufla</a></li>
            <li><a href="../pags/sobreNos.php">Sobre nós</a></li>
            <li><a href="../../../Controller/DeslogarAluno.php">Deslogar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>