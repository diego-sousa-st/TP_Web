<?php
	// error_reporting(0);
	require_once('Util/Msgs.php');
	require_once("../Persistence/OrientacaoDao.class.php");
	require_once("../Model/OrientacaoBean.class.php");

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
			$aluno = $_POST['fk_aluno'];
			$professor = $_POST['fk_instituicao'];
			$tipo = $_POST['tipo'];
			$tema = $_POST['tema'];
			$inicio = $_POST['inicio'];
			$fim = $_POST['fim'];
			$cancelado = $_POST['cancelado'] == 'S' ? "'S'" : "NULL";

			//criar bean
			$orientacaoBean = new OrientacaoBean("", $aluno, $professor, $tipo, $tema, $inicio, $fim, $cancelado);

			//executa no banco
			$retorno = OrientacaoDao::cadastrar($orientacaoBean);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Orientação cadastrada com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao cadastrar orientação: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroOrientacao.php");
					</script>
				<?php
			}
			break;
	}
?>
