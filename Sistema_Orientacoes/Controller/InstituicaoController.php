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
			$sigla = $_DADOS['siglaPesquisa'];//PK
			$nome = $_DADOS['nomeInstituicao'];
			$cidade = $_DADOS['cidade'];
			$uf = $_DADOS['uf'];
			$pais = $_DADOS['pais'];

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
						alert('Erro ao cadastrar instituição: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaCadastroInstituicao.php");
					</script>
				<?php
			}
			break;
		case 'atualizar':
			//ler dados
			$sigla = $_DADOS['siglaPesquisa'];//PK
			$nome = $_DADOS['nomeInstituicao'];
			$cidade = $_DADOS['cidade'];
			$uf = $_DADOS['uf'];
			$pais = $_DADOS['pais'];

			//criar bean
			$instituicaoBean = new InstituicaoBean($sigla, $nome, $cidade, $uf, $pais);

			//executa no banco
			$retorno = InstituicaoDao::atualizar($instituicaoBean);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Instituição atualizada com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao atualizar instituição: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
			break;
		case "remover":
			//ler dados
			$sigla = $_DADOS['siglaPesquisa'];//PK

			//executa no banco
			$retorno = InstituicaoDao::remover($sigla);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Instituição removida com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao remover instituição: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
			break;
		case 'getAll':
			//executa no banco
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
		case 'get':
			//ler dados
			$sigla = $_DADOS['siglaPesquisa'];//PK

			//executa no banco
			$retorno = InstituicaoDao::get($sigla);
			if($retorno->status){//se tudo ocorreu bem
				$retorno->resposta[0]->Sigla = utf8_encode($retorno->resposta[0]->Sigla);
				$retorno->resposta[0]->Nome = utf8_encode($retorno->resposta[0]->Nome);
				$retorno->resposta[0]->Cidade = utf8_encode($retorno->resposta[0]->Cidade);
				$retorno->resposta[0]->UF = utf8_encode($retorno->resposta[0]->UF);
				$retorno->resposta[0]->Pais = utf8_encode($retorno->resposta[0]->Pais);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
	}
?>
