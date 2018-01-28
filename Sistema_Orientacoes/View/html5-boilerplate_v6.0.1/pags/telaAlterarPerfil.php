<?php
	include_once("../../../Controller/VerificaLogado.php");
	if(!$logado){
		header("Location: ../pags/telaLogin.php");
	}
	
?>
<!doctype html>
<html class="no-js" lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Alterar</title>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="../js/telaAlterarPerfil.js"></script>
		<!-- validacao senha -->
		<script src="../js/validacao.js"></script>
	</head>
	<body>
		<!--[if lte IE 9]>
			<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->

		<!-- Add your site or application content here -->
		<!-- início área do site -->

		<?php
			include_once("../pags/Templates/cabecalho.php");
		?>

		<div class="container">
			<div class="page-header">
				<h1>Alterar perfil</h1>
			</div>

			<div class="row">
				<form action="../../../Controller/<?= isset($professor) ? "Professor" : "Aluno" ?>Controller.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="acao" value="atualizar">
					<input type="hidden" id="ehProf" value="<?= isset($professor) ? "true" : "false" ?>">
					<div class="col-md-4">
						<?php if(isset($professor)): ?>
							<h3>Alterar Professor</h3>

							<div class="form-group">
								<label for="id">ID</label>
								<input type="number" class="form-control" name="id" id="id" value="<?= $professor ?>" readonly>
							</div>

							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome..." maxlength="30">
							</div>

							<div class="form-group">
								<label for="instituicoes">Instituições</label>
								<select class="form-control" name="instituicoes" id="instituicoes"></select>
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" class="form-control" name="email" id="email" readonly>
							</div>

							<div class="form-group">
								<label for="pagina">Página</label>
								<input type="url" class="form-control" name="pagina" id="pagina" placeholder="Digite sua pagina..." maxlength="150">
							</div>

							<div class="form-group">
								<label for="lattes">Lattes</label>
								<input type="number" class="form-control" name="lattes" id="lattes" placeholder="Digite seu lattes..." min="0" max="9999999999999999">
							</div>
						<?php else: ?>
							<h3>Alterar Aluno</h3>

							<div class="form-group">
								<label for="matricula">Matricula</label>
								<input type="number" class="form-control" name="matricula" id="matricula" value="<?= $aluno ?>" readonly>
							</div>

							<div class="form-group">
								<label for="nome">Nome</label>
								<input type="text" class="form-control" name="nome" id="nome" placeholder="Digite seu nome...">
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
								<select class="form-control" name="curso" id="curso"></select>
							</div>

							<div class="form-group">
								<label for="cra">CRA</label>
								<input type="number" class="form-control" name="cra" id="cra" placeholder="Digite o seu cra..." min="0" max="100">
							</div>
						<?php endif; ?>

						<div class="form-group" id="formSenhaAntiga">
							<label for="senhaAntiga">Senha Antiga</label>
							<input type="password" class="form-control" name="senhaAntiga" id="senhaAntiga" placeholder="Digite sua senha antiga..." required>
						</div>

						<div class="form-group" id="formSenha">
							<label for="senha">Senha Nova</label>
							<input type="password" class="form-control" name="senha" id="senha" placeholder="Digite sua senha nova...">
						</div>

						<div class="form-group" id="formRedigiteSenha">
							<label for="redigiteSenha">Repita a Senha Nova</label>
							<input type="password" class="form-control" name="redigiteSenha" id="redigiteSenha" placeholder="Redigite sua senha nova...">
						</div>

						<input type="hidden" name="imgAntiga" id="imgAntiga">

						<div class="form-group" id="formImagem">
							<label for="imagem">Imagem de Perfil:</label>
							<input type="file" name="imagem" id="imagem" value="Procurar Imagem">
							<span>Se nenhuma imagem for colocada, permanecerá a atual!</span>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-primary">
							Alterar
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
