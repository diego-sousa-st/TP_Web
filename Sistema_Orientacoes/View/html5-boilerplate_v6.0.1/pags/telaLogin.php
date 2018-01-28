<?php
	include_once("../../../Controller/VerificaLogado.php");
	if($logado){
		header("Location: ../pags/telaPerfil.php");
	}
?>
<!doctype html>
<html class="no-js" lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Login</title>
		<meta name="description" content="Sistema de Gerenciamento de Orientações, Pesquisa etc.">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="manifest" href="site.webmanifest">
		<link rel="apple-touch-icon" href="../icon.png">
		<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
		<!-- Place favicon.ico in the root directory -->

		<link rel="stylesheet" href="../css/normalize.css">
		<link rel="stylesheet" href="../css/main.css">

		<!-- meu css -->
		<link rel="stylesheet" href="../css/style.css">

		<!-- css bootsrap -->
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">

		<!-- carregamento modernizr-3 -->
		<script src="../js/vendor/modernizr-3.5.0.min.js"></script>

		<script src="../js/telaLogin.js"></script>
	</head>
	<body>
		<!--[if lte IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->

		<!-- Add your site or application content here -->
		<!-- início área do site -->

		<div class="container">
			<div class="page-header">
				<h1>Faça login para utilizar o sistema</h1>
			</div>

			<div class="row">
				<form action="../../../Controller/AlunoController.php" method="post" id="formCadastro">
					<input type="hidden" name="acao" value="logar">
					<div class="col-md-6">
						<h3>Logar</h3>
						<div class="form-group">
							<label for="login" id="loginLabel">Matrícula</label>
							<input type="number" class="form-control" name="loginAluno" id="loginAluno" placeholder="Digite sua matricula..."
							min="0" max="999999999">
							<input type="email" class="form-control" name="loginProf" id="loginProf" placeholder="Digite seu email..." maxlength="45" style="display:none">
						</div>

						<div class="form-group">
							<label for="senha">Senha</label>
							<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha...">
						</div>

						<div class="form-group">
							<span class="btn btn-danger" id="btnProf" onclick="trocaProf();">
							Professor
							</span>
						</div>
						<div class="form-group">
							<span class="btn btn-primary" onclick="logar();">
							Logar
							</span>
						</div>
					</div>
				</form>

				<aside class="col-md-5">
					<blockquote>
  						<p>Não tem cadastro aluno! <strong> <a href="./telaCadastroAluno.php">Faça agora!</a></strong></p>
  						<p>Não tem cadastro professor! <strong> <a href="./telaCadastroProfessor.php">Faça agora!</a></strong></p>
					</blockquote>
				</aside>
			</div>

		</div>

		<div class="container col-md-12">
			<div class="space">

			</div>
			<?php
            	include_once("./Templates/rodape.php");
        	?>
		</div>


		<!-- fim area site -->

		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>

		<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
		<script>
			window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
			ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
		</script>
		<script src="https://www.google-analytics.com/analytics.js" async defer></script>


		<!-- jquery que usei com boostrap -->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- <script src="bootstrap/js/bootstrap.min.js"></script> -->
	</body>
</html>
