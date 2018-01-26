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
		case 'getCurso':
			//le dados
			$id = $_DADOS['id'];

			//executa no banco
			$retorno = CursoDao::getCurso($id);
			for ($i=0; $i < count($retorno->resposta); $i++) {
				$retorno->resposta[$i]->Nome = utf8_encode($retorno->resposta[$i]->Nome);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
	}
?>
