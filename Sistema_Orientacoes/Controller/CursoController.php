<?php
	// error_reporting(0);
	require_once('Util/Msgs.php');
	require_once("../Persistence/CursoDao.class.php");
	require_once("../Model/CursoBean.class.php");

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
			$nome = $_DADOS['nomeCurso'];
			$codigo = $_DADOS['codigo'];
			$instituicao = $_DADOS['instituicao'];
			$forma = $_DADOS['forma'];
			$sigla = $_DADOS['siglaCurso'];

			//criar bean
			$cursoBean = new CursoBean($codigo, $nome, $instituicao, $forma, $sigla);

			//executa no banco
			$retorno = CursoDao::cadastrar($cursoBean);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Curso cadastrado com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao cadastrar curso: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroCurso.php");
					</script>
				<?php
			}
			break;
		case 'atualizar':
			//ler dados
			$nome = $_DADOS['nomeCurso'];
			$codigo = $_DADOS['codigo'];//PK
			$instituicao = $_DADOS['instituicao'];
			$forma = $_DADOS['forma'];
			$sigla = $_DADOS['siglaCurso'];

			//criar bean
			$cursoBean = new CursoBean($codigo, $nome, $instituicao, $forma, $sigla);

			//executa no banco
			$retorno = CursoDao::atualizar($cursoBean);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Curso atualizado com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao atualizar curso: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
			break;
		case "remover":
			//ler dados
			$codigo = $_DADOS['codigo'];//PK

			//executa no banco
			$retorno = CursoDao::remover($codigo);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Curso removido com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao remover curso: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
			break;
		case 'getAll':
			//executa no banco
			$retorno = CursoDao::getAll();
			if($retorno->status){//se tudo ocorreu bem
				for ($i=0; $i < count($retorno->resposta); $i++) {
					$retorno->resposta[$i]->Nome = utf8_encode($retorno->resposta[$i]->Nome);
					$retorno->resposta[$i]->Instituicao = utf8_encode($retorno->resposta[$i]->Instituicao);
					$retorno->resposta[$i]->forma = utf8_encode($retorno->resposta[$i]->forma);
					$retorno->resposta[$i]->Sigla = utf8_encode($retorno->resposta[$i]->Sigla);
				}
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
		case 'get':
			//ler dados
			$codigo = $_DADOS['codigo'];//PK

			//executa no banco
			$retorno = CursoDao::get($codigo);
			if($retorno->status){//se tudo ocorreu bem
				$retorno->resposta[0]->Nome = utf8_encode($retorno->resposta[0]->Nome);
				$retorno->resposta[0]->Instituicao = utf8_encode($retorno->resposta[0]->Instituicao);
				$retorno->resposta[0]->forma = utf8_encode($retorno->resposta[0]->forma);
				$retorno->resposta[0]->Sigla = utf8_encode($retorno->resposta[0]->Sigla);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
		case 'getInstituicoes':
			//executa no banco
			require_once("../Persistence/InstituicaoDao.class.php");
			$retorno = InstituicaoDao::getAll();
			if($retorno->status){//se tudo ocorreu bem
				for ($i=0; $i < count($retorno->resposta); $i++) {
					$retorno->resposta[$i]->Sigla = utf8_encode($retorno->resposta[$i]->Sigla);
					$retorno->resposta[$i]->Nome = utf8_encode($retorno->resposta[$i]->Nome);
					$retorno->resposta[$i]->Cidade = utf8_encode($retorno->resposta[$i]->Cidade);
					$retorno->resposta[$i]->UF = utf8_encode($retorno->resposta[$i]->UF);
					$retorno->resposta[$i]->Pais = utf8_encode($retorno->resposta[$i]->Pais);
				}
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
	}
?>
