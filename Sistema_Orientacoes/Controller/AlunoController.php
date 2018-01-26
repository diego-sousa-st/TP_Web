<?php
	// error_reporting(0);
	require_once('Util/Msgs.php');
	require_once("../Persistence/AlunoDao.class.php");
	require_once("../Model/AlunoBean.class.php");

	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?= $msgSemAcao; ?>');</script><?php
		header('Location: ../View/html5-boilerplate_v6.0.1');
	}

	$retorno = new stdClass();
	switch($acao){
		case 'cadastrar':
			//ler dados
			$nome = $_POST['nome'];
			$matricula = $_POST['matricula'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$curso = $_POST['curso'];
			$senha = sha1($_POST['senha']);
			$img = $_FILES['imagem'];

			//Testa a imagem

			$nomeImg = "fotoPerfil.png";//nome da imagegem quando nenhuma for selecionada
			//testando se há arquivo
			if(!empty($img['name'])){
				//verifica se o arquivo é uma imagem
				if(!preg_match('/^image\/(pjpeg|jpeg|png|gif|bmp)$/',$img['type'])){
					?>
			 			<script>
							alert('Tipo da imagem inválido!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroAluno.php");
						</script>
					<?php
				}
				//tamanho limite da imagem
				$tamanho = 3000000;
				if($img['size']>$tamanho){
					?>
						<script>
							alert('Imagem grande demais!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroAluno.php");
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
			$alunoBean = new AlunoBean($matricula, $nome, $cidade, $uf, $curso, $senha, "",$nomeImg);

			//executa no banco
			$retorno = AlunoDao::cadastrar($alunoBean);
			if($retorno->status){//se tudo ocorreu bem
				session_start();
				$_SESSION['logado'] = true;
				$_SESSION['aluno'] = new stdClass();
				$_SESSION['aluno']->matricula = $alunoBean->getMatricula();
				$_SESSION['aluno']->nome = $alunoBean->getNome();
				$_SESSION['aluno']->cidade = $alunoBean->getCidade();
				$_SESSION['aluno']->uf = $alunoBean->getUf();
				$_SESSION['aluno']->curso = $alunoBean->getCurso();
				$_SESSION['aluno']->cra = $alunoBean->getCra();
				$_SESSION['aluno']->img = $alunoBean->getImg();

				//Faz upload da imagem
				if($nomeImg != "fotoPerfil.png"){
					move_uploaded_file($img['tmp_name'], $caminhoImg);
					// unlink('img/perfil/'.$fotoAntiga);
				}

				//redireciona
				?>
					<script>
						alert('Aluno cadastrado com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao cadastrar aluno: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroAluno.php");
					</script>
				<?php
			}
			break;
		case 'logar':
			//ler dados
			$matricula = $_DADOS['matricula'];
			$senha = $_DADOS['senha'];

			//executa no banco
			$retorno = AlunoDao::getAluno($matricula,sha1($senha));

			if($retorno->status){//se tudo ocorreu bem
				if($retorno->resposta != null){//usuario existe
					//seta a session
					session_start();
					$_SESSION['logado'] = true;
					$_SESSION['aluno'] = new stdClass();
					$_SESSION['aluno']->matricula = $retorno->resposta[0]->Matricula;
					$_SESSION['aluno']->nome = $retorno->resposta[0]->Nome;
					$_SESSION['aluno']->cidade = $retorno->resposta[0]->Cidade;
					$_SESSION['aluno']->uf = $retorno->resposta[0]->UF;
					$_SESSION['aluno']->curso = $retorno->resposta[0]->Curso;
					$_SESSION['aluno']->cra = $retorno->resposta[0]->CRA;
					$_SESSION['aluno']->img = $retorno->resposta[0]->imagemAluno;
					// die(print_r($retorno->resposta[0]->Matricula,true));

					//redireciona
					header('Location: ../View/html5-boilerplate_v6.0.1/');
				}else{//se o usuario nao existe
					?>
						<script>
							alert('Matricula ou senha inválidos!');
							window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaLoginAluno.php");
						</script>
					<?php
				}
			}else{
				?>
					<script>
						alert('<?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaLoginAluno.php");
					</script>
				<?php
			}
			break;
		case 'getAlunosOrientacao':
			//executa no banco
			$retorno = AlunoDao::getAlunosOrientacao();
			for ($i=0; $i < count($retorno->resposta); $i++) {
				$retorno->resposta[$i]->Matricula = utf8_encode($retorno->resposta[$i]->Matricula);
				$retorno->resposta[$i]->Nome = utf8_encode($retorno->resposta[$i]->Nome);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
		case 'atualizar':
			//ler dados
			$nome = $_POST['nome'];
			$matricula = $_POST['matricula'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$curso = $_POST['curso'];
			$cra = $_POST['cra'];

			//criar bean
			$alunoBean = new AlunoBean($matricula, $nome, $cidade, $uf, $curso, "", $cra);

			//executa no banco
			$retorno = AlunoDao::atualizar($alunoBean);
			if($retorno->status){//se tudo ocorreu bem
				session_start();
				$_SESSION['logado'] = true;
				$_SESSION['aluno'] = new stdClass();
				$_SESSION['aluno']->matricula = $alunoBean->getMatricula();
				$_SESSION['aluno']->nome = $alunoBean->getNome();
				$_SESSION['aluno']->cidade = $alunoBean->getCidade();
				$_SESSION['aluno']->uf = $alunoBean->getUf();
				$_SESSION['aluno']->curso = $alunoBean->getCurso();
				$_SESSION['aluno']->cra = $alunoBean->getCra();

				//redireciona
				?>
					<script>
						alert('Aluno atualizado com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao atualizar aluno: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}
			break;
	}
?>
