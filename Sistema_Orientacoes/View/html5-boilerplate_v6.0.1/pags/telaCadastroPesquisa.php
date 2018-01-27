<!DOCTYPE html>
<html lang="pt-br" class="no-js">
  <head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="description" content="Sistema de Gerenciamento de Orientações, Pesquisa etc.">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="../site.webmanifest">
	<link rel="apple-touch-icon" href="../icon.png">
	<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
	<!-- Place favicon.ico in the root directory-->
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="../css/main.css">
	<!-- meu css-->
	<link rel="stylesheet" href="../css/style.css">
	<!-- css bootsrap-->
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
	<!-- carregamento modernizr-3-->
	<script src="../js/vendor/modernizr-3.5.0.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="../js/telaCadastroPesquisa.js"></script>
	<title>Cadastrar Pesquisa</title>
  </head>
  <body>
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
	<div class="container">
	  <div class="col-md-8">
		<h3>Cadastar Pesquisa</h3>
		<!-- o id do professor é igual o do professor logado no momento-->
	  </div>
	  <form id="formCadastroPesquisa" action="../../../Controller/PesquisaController.php" method="post" class="col-md-8">
		  <input type="hidden" name="acao" value="cadastrar">
		  <!-- <input type="hidden" name="professor" value="1"> -->
		<div class="form-group">
		  <label for="area">Área:                </label>
		  <!-- preencher a area com dados do banco-->
		  <select id="area" name="area" required class="form-control"></select>
		</div>
		<div class="form-group">
		  <label for="linhaPesquisa">Linha de pesquisa:</label>
		  <input id="linhaPesquisa" type="text" name="linhaPesquisa" maxlength="75" required class="form-control">
		</div>
		<div class="form-group">
		  <button type="submit" class="btn btn-primary">Cadastrar Pesquisa</button>
		</div>
	  </form>
	</div>
	<footer class="row rodape footer">
	  <div class="col-md-12">Desenvolvido por Diego Sousa e Nechelley Alves - © 2018.</div>
	</footer>
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script>window.jQuery || document.write('<script src="../js/vendor/jquery-3.2.1.min.js"><\\/script>')</script>
	<script src="../js/plugins.js"></script>
	<script src="../js/main.js"></script>
	<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID.-->
	<script>
	  window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
	  ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
	</script>
	<script src="https://www.google-analytics.com/analytics.js" async="" defer=""></script>
	<!-- jquery que usei com boostrap-->
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed-->
	<script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
