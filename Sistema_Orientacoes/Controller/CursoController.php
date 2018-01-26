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
			$nome = $_POST['nomeCurso'];
			$codigo = $_POST['codigo'];
			$instituicao = $_POST['instituicao'];
			$forma = $_POST['forma'];
			$sigla = $_POST['siglaCurso'];

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
	}
?>