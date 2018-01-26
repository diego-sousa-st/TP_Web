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
		<!-- validacao senha -->
		<script src="../js/validacao.js"></script>		
	</head>
	<body>
		<!--[if lte IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->

		<!-- Add your site or application content here -->
		<!-- início área do site -->

		<div class="container">
			<div class="page-header">
				<h1>Cadastre-se para utilizar o sistema</h1>
			</div>

			<div class="row">
				<form action="../../../Controller/CadastrarAluno.php" method="post">
					<div class="col-md-4">
						<h3>Cadastro</h3>
						
						<div class="form-group">
							<label for="nome">Nome</label>              
							<input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome...">
						</div>            

						<div class="form-group">
							<label for="matricula">Matricula</label>              
							<input type="number" class="form-control" name="matricula" id="matricula" placeholder="Digite sua matricula..."
							min="0" max="999999999">
						</div>            

						<div class="form-group">
							<label for="cidade">Cidade</label>              
							<input type="text" class="form-control" name="cidade" id="cidade" placeholder="Digite o nome da sua cidade...">
						</div>            
						
						<div class="form-group">
							<label for="uf">UF</label>              
							<!-- <input type="text" class="form-control" name="uf" id="uf" placeholder="Digite seu estado"> -->
							<select name="uf" class="form-control" id="uf">
								<option value="MG">MG</option>
								<option value="SP">SP</option>
								<option value="ES">ES</option>
								<option value="RJ">RJ</option>
							</select>
						</div>            
						
						<div class="form-group">
							<label for="curso">Curso</label>              
							<input type="number" class="form-control" name="curso" id="curso" placeholder="Digite o numero do curso...">
						</div>
				
						<div class="form-group" id="formSenha">              
							<label for="senha">Senha</label>
							<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha...">
						</div>

						<div class="form-group" id="formRedigiteSenha">              
							<label for="redigiteSenha">Repita a Senha</label>
							<input type="password" class="form-control" name="redigiteSenha" id="redigiteSenha" placeholder="Redigite sua senha...">
						</div>
						
						<div class="form-group" id="formImagem">
							<label for="imagem">Imagem de Perfil:</label>
							<input type="file" name="imagem" id="imagem" value="Procurar Imagem">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">
							Cadastrar
							</button>          
						</div>
					</div>
				</form>
			</div>
						
		</div>

		<div class="container col-md-12">
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
