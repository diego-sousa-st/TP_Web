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
			$nome = $_DADOS['nome'];
			$matricula = $_DADOS['matricula'];//PK
			$cidade = $_DADOS['cidade'];
			$uf = $_DADOS['uf'];
			$curso = $_DADOS['curso'];
			$senha = sha1($_DADOS['senha']);
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
				$_SESSION['aluno'] = $matricula;

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
			$matricula = $_DADOS['loginAluno'];
			$senha = $_DADOS['senha'];

			//executa no banco
			$retorno = AlunoDao::getAluno($matricula,sha1($senha));

			if($retorno->status){//se tudo ocorreu bem
				if($retorno->resposta != null){//usuario existe
					//seta a session
					session_start();
					$_SESSION['logado'] = true;
					$_SESSION['aluno'] = $matricula;

					//redireciona
					?>
						<script>
							localStorage.setItem("matricula", "<?= $_SESSION['aluno'] ?>");
							localStorage.setItem("professor", "");
							localStorage.setItem("entrou", "<?= date("Y-m-d H:i:s") ?>");
							window.location.replace("../View/html5-boilerplate_v6.0.1/");
						</script>
					<?php
				}else{//se o usuario nao existe
					?>
						<script>
							alert('Matricula ou senha inválidos!');
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
			$nome = $_DADOS['nome'];
			$matricula = $_DADOS['matricula'];//PK
			$cidade = $_DADOS['cidade'];
			$uf = $_DADOS['uf'];
			$curso = $_DADOS['curso'];
			$cra = $_DADOS['cra'];
			$senhaAntiga = sha1($_DADOS['senhaAntiga']);
			$img = $_FILES['imagem'];
			$imgAntiga = $_DADOS['imgAntiga'];

			//testa senha antiga
			$senhaSalva = AlunoDao::get($matricula)->resposta[0]->senhaAluno;
			if($senhaSalva != $senhaAntiga){
				//redireciona
				?>
					<script>
						alert('Sua senha antiga esta incorreta!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaAlterarPerfil.php");
					</script>
				<?php
			}

			//Testa a imagem

			$nomeImg = $imgAntiga;//nome da imagegem quando nenhuma for selecionada
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


			$senha = "";
			if(isset($_DADOS['senha']) && $_DADOS['senha'] != ""){
				$senha = sha1($_DADOS['senha']);
			}
			else{
				$senha = $senhaAntiga;
			}

			//criar bean
			$alunoBean = new AlunoBean($matricula, $nome, $cidade, $uf, $curso, $senha, $cra, $nomeImg);

			//executa no banco
			$retorno = AlunoDao::atualizar($alunoBean);
			if($retorno->status){//se tudo ocorreu bemloginAluno
				if($nomeImg != $imgAntiga){
					move_uploaded_file($img['tmp_name'], $caminhoImg);
					if($imgAntiga != "fotoPerfil.png")
						unlink('../Persistence/FotosPerfil/'.$imgAntiga);
				}
				//redireciona
				?>
					<script>
						alert('Aluno atualizado com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao atualizar aluno: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaAlterarPerfil.php");
					</script>
				<?php
			}
			break;
		case "remover":
			//ler dados
			$matricula = $_DADOS['matricula'];//PK

			//executa no banco
			$retorno = AlunoDao::remover($matricula);
			echo json_encode($retorno);
			break;
		case 'getAll':
			//executa no banco
			$retorno = AlunoDao::getAll();
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
			$retorno = AlunoDao::get($matricula);
			if($retorno->status){//se tudo ocorreu bem
				$retorno->resposta[0]->Nome = utf8_encode($retorno->resposta[0]->Nome);
				$retorno->resposta[0]->Cidade = utf8_encode($retorno->resposta[0]->Cidade);
				$retorno->resposta[0]->UF = utf8_encode($retorno->resposta[0]->UF);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
		case 'atualizarNaTabela':
			//ler dados
			$nome = $_DADOS['nome'];
			$matricula = $_DADOS['matricula'];//PK
			$cidade = $_DADOS['cidade'];
			$uf = $_DADOS['uf'];
			$curso = $_DADOS['curso'];
			$cra = $_DADOS['cra'];

			//criar bean
			$alunoBean = new AlunoBean($matricula, $nome, $cidade, $uf, $curso, "", $cra, "");

			//executa no banco
			$retorno = AlunoDao::atualizarNaTabela($alunoBean);
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
		case 'salvarLog':
			//ler dados
			$id = $_DADOS['id'];//PK
			$entrou = $_DADOS['entrou'];
			$saiu = $_DADOS['saiu'];

			//executa no banco
			$retorno = ProfessorDao::salvarLog($id,$entrou,$saiu);
			echo json_encode($retorno);
			break;
	}
?>
