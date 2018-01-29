<!-- barra de navegação-->
<!-- nav-tabs-->
<!-- navbar-default,	etc-->
<nav class="navbar navbar-inverse">
	<div class="container">
	<div class="navbar-header">
		<button type="button" data-toggle="collapse" data-target="#barra-navegacao" class="navbar-toggle collapsed"><span class="sr-only">Alternar Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand">Sistema de Orientações e Pesquisa - DN System</a>
	</div>
	<div id="barra-navegacao" class="collapse navbar-collapse">
		<ul class="nav navbar-nav navbar-right">
		<li><a href="pags/telaPerfil.php">Visualizar Perfil</a></li>
		<li><a href="pags/telaAlterarPerfil.php">Alterar Perfil</a></li>
		<li><a href="pags/telaGrafico.php">Gráfico</a></li>
		<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Listar<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<!-- <li><a href="pags/telaListarProfessores.php">Professores</a></li> -->
				<li><a href="pags/telaListarPesquisas.php">Pesquisas</a></li>
				<li><a href="pags/telaListarCursos.php">Cursos</a></li>
				<li><a href="pags/telaListarInstituicoes.php">Instituições</a></li>
				<li><a href="pags/telaListarOrientacoes.php">Orientações</a></li>
				<?php if(isset($professor)): ?>
					<li><a href="pags/telaListarAlunos.php">Alunos</a></li>
				<?php endif; ?>
			</ul>
		</li>
		<li><a href="pags/galeriaVideos.php">Vídeos</a></li>
		<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Opções<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<li><a href="https://sig.ufla.br" target="_blank">SIG Ufla</a></li>
			<li><a href="pags/sobreNos.php">Sobre nós</a></li>
			<li><a href="../../Controller/Deslogar.php">Deslogar</a></li>
			</ul>
		</li>
		</ul>
	</div>
	</div>
</nav>
