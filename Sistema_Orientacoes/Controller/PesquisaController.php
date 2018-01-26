<?php
	// error_reporting(0);
	require_once('Util/Msgs.php');
	require_once("../Persistence/PesquisaDao.class.php");
	require_once("../Model/PesquisaBean.class.php");

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
			$professor = $_POST['professor'];
			$area = $_POST['area'];
			$linha = $_POST['linhaPesquisa'];

			//criar bean
			$pesquisaBean = new PesquisaBean($professor, $area, $linha);

			//executa no banco
			$retorno = PesquisaDao::cadastrar($pesquisaBean);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Pesquisa cadastrada com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao cadastrar pesquisa: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroPesquisa.php");
					</script>
				<?php
			}
			break;
		case 'getAreas':
			//executa no banco
			$retorno = PesquisaDao::getAreas();
			for ($i=0; $i < count($retorno->resposta); $i++) {
				$retorno->resposta[$i]->Nome = utf8_encode($retorno->resposta[$i]->Nome);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
	}
?>
