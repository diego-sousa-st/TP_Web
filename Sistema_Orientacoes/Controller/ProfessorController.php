<?php
	// error_reporting(0);
	require_once('Util/Msgs.php');
	require_once("../Persistence/ProfessorDao.class.php");
	require_once("../Model/ProfessorBean.class.php");

	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?= $msgSemAcao; ?>');</script><?php
		header('Location: ../View/html5-boilerplate_v6.0.1');
	}

	$retorno = new stdClass();
	$senhaProfGeral = "RamonLegal";//senha para garantir que n e um professor tentando se cadastrar como professor
	switch($acao){
		case 'cadastrar':
			//ler dados
			$nome = $_DADOS['nome'];
			$instituicao = $_DADOS['instituicoes'];
			$email = $_DADOS['email'];
			$pagina = $_DADOS['pagina'];
			$lattes = $_DADOS['lattes'];
			$senha = sha1($_DADOS['senha']);
			$img = $_FILES['imagem'];
			$senhaProf = $_DADOS['senhaProf'];

			if($senhaProf != $senhaProfGeral){
				?>
					<script>
						alert('A senha para cadastrar professor esta incorreta!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroProfessor.php");
					</script>
				<?php
			}

			//Testa a imagem

			$nomeImg = "fotoPerfil.png";//nome da imagegem quando nenhuma for selecionada
			//testando se há arquivo
			if(!empty($img['name'])){
				//verifica se o arquivo é uma imagem
				if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$img['type'])){
					?>
			 			<script>
							alert('Tipo da imagem inválido!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroProfessor.php");
						</script>
					<?php
				}
				//tamanho limite da imagem
				$tamanho = 3000000;
				if($img['size']>$tamanho){
					?>
						<script>
							alert('Imagem grande demais!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroProfessor.php");
						</script>
					<?php
				}

				//Se nao houver erro
				//pega a extenção da imagem
				preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$img['name'], $ext);
				//gera nome da imagem
				$nomeImg = time()."_".rand(1,50000).".".$ext[1];
				//caminho
				$caminhoImg = "../Persistence/FotosPerfil/".$nomeImg;
			}

			//criar bean
			$professorBean = new ProfessorBean("", $nome, $instituicao, $email, $pagina, $lattes, $senha, $nomeImg);

			//executa no banco
			$retorno = ProfessorDao::cadastrar($professorBean);
			if($retorno->status){//se tudo ocorreu bem
				session_start();
				$_SESSION['logado'] = true;
				$_SESSION['professor'] = (ProfessorDao::getUltimoId())->resposta[0]->ID;

				//Faz upload da imagem
				if($nomeImg != "fotoPerfil.png"){
					move_uploaded_file($img['tmp_name'], $caminhoImg);
					// unlink('img/perfil/'.$fotoAntiga);
				}

				//redireciona
				?>
					<script>
						alert('Professor cadastrado com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao cadastrar professor: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroProfessor.php");
					</script>
				<?php
			}
			break;
		case 'logar':
			//ler dados
			$email = $_DADOS['loginProf'];
			$senha = $_DADOS['senha'];

			//executa no banco
			$retorno = ProfessorDao::getProfessor($email,sha1($senha));

			if($retorno->status){//se tudo ocorreu bem
				if($retorno->resposta != null){//usuario existe
					//seta a session
					session_start();
					$_SESSION['logado'] = true;
					$_SESSION['professor'] = $retorno->resposta[0]->ID;

					//redireciona
					header('Location: ../View/html5-boilerplate_v6.0.1/');
				}else{//se o usuario nao existe
					?>
						<script>
							alert('Email ou senha inválidos!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaLogin.php");
						</script>
					<?php
				}
			}else{
				?>
					<script>
						alert('<?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaLogin.php");
					</script>
				<?php
			}
			break;
		case 'atualizar':
			//ler dados
			$id = $_DADOS['id'];
			$nome = $_DADOS['nome'];
			$instituicao = $_DADOS['instituicoes'];
			$email = $_DADOS['email'];
			$pagina = $_DADOS['pagina'];
			$lattes = $_DADOS['lattes'];
			$senha = sha1($_DADOS['senha']);
			$img = $_FILES['imagem'];
			$senhaProf = $_DADOS['senhaProf'];
			$imgAntiga = $_DADOS['imgAntiga'];

			//Testa a imagem

			$nomeImg = "fotoPerfil.png";//nome da imagegem quando nenhuma for selecionada
			//testando se há arquivo
			if(!empty($img['name'])){
				//verifica se o arquivo é uma imagem
				if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$img['type'])){
					?>
			 			<script>
							alert('Tipo da imagem inválido!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
						</script>
					<?php
				}
				//tamanho limite da imagem
				$tamanho = 3000000;
				if($img['size']>$tamanho){
					?>
						<script>
							alert('Imagem grande demais!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
						</script>
					<?php
				}

				//Se nao houver erro
				//pega a extenção da imagem
				preg_match('/\.(gif|bmp|png|jpg|jpeg){1}$/i',$img['name'], $ext);
				//gera nome da imagem
				$nomeImg = time()."_".rand(1,50000).".".$ext[1];
				//caminho
				$caminhoImg = "../Persistence/FotosPerfil/".$nomeImg;
			}

			//criar bean
			$professorBean = new ProfessorBean($id, $nome, $instituicao, $email, $pagina, $lattes, $senha, $nomeImg);

			//executa no banco
			$retorno = ProfessorDao::atualizar($professorBean);
			if($retorno->status){//se tudo ocorreu bem
				//redireciona
				?>
					<script>
						alert('Professor atualizado com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao atualizar professor: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
			break;
		case "remover":
			//ler dados
			$matricula = $_DADOS['matricula'];//PK

			//executa no banco
			$retorno = ProfessorDao::remover($matricula);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Professor removido com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao remover professor: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
			break;
		case 'getAll':
			//executa no banco
			$retorno = ProfessorDao::getAll();
			if($retorno->status){//se tudo ocorreu bem
				for ($i=0; $i < count($retorno->resposta); $i++) {
					$retorno->resposta[$i]->Nome = utf8_encode($retorno->resposta[$i]->Nome);
					$retorno->resposta[$i]->Cidade = utf8_encode($retorno->resposta[$i]->Cidade);
					$retorno->resposta[$i]->UF = utf8_encode($retorno->resposta[$i]->UF);
				}
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
		case 'get':
			//ler dados
			$matricula = $_DADOS['matricula'];//PK

			//executa no banco
			$retorno = ProfessorDao::get($matricula);
			if($retorno->status){//se tudo ocorreu bem
				$retorno->resposta[0]->Nome = utf8_encode($retorno->resposta[0]->Nome);
				$retorno->resposta[0]->Cidade = utf8_encode($retorno->resposta[0]->Cidade);
				$retorno->resposta[0]->UF = utf8_encode($retorno->resposta[0]->UF);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
	}
?>
