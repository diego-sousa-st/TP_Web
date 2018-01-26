<?php
	// error_reporting(0);
	require_once('Util/Msgs.php');
	require_once("../Persistence/InstituicaoDao.class.php");
	require_once("../Model/InstituicaoBean.class.php");

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
			$nome = $_POST['nomeInstituicao'];
			$sigla = $_POST['siglaPesquisa'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$pais = $_POST['pais'];

			//criar bean
			$instituicaoBean = new InstituicaoBean($sigla, $nome, $cidade, $uf, $pais);

			//executa no banco
			$retorno = InstituicaoDao::cadastrar($instituicaoBean);
			// die(print_r($retorno,true));
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Instituição cadastrada com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao cadastrar Instituição: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroInstituicao.php");
					</script>
				<?php
			}
			break;
		case 'getInstituicoesCurso':
			//executa no banco
			$retorno = InstituicaoDao::getInstituicoesCurso();
			for ($i=0; $i < count($retorno->resposta); $i++) {
				$retorno->resposta[$i]->Nome = utf8_encode($retorno->resposta[$i]->Nome);
				$retorno->resposta[$i]->Sigla = utf8_encode($retorno->resposta[$i]->Sigla);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
	}
?>
