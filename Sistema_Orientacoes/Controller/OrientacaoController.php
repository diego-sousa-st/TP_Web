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
			$aluno = $_DADOS['fk_aluno'];
			$professor = $_DADOS['professor'];
			$tipo = $_DADOS['tipo'];
			$tema = $_DADOS['tema'];
			$inicio = $_DADOS['inicio'];
			$fim = $_DADOS['fim'];
			$cancelado = $_DADOS['cancelado'];

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
		case 'atualizar':
			//ler dados
			$id = $_DADOS['id'];//PK
			$aluno = $_DADOS['aluno'];
			$professor = $_DADOS['professor'];
			$tipo = $_DADOS['tipo'];
			$tema = $_DADOS['tema'];
			$inicio = $_DADOS['inicio'];
			$fim = $_DADOS['fim'];
			$cancelado = $_DADOS['cancelado'];

			//criar bean
			$orientacaoBean = new OrientacaoBean($id, $aluno, $professor, $tipo, $tema, $inicio, $fim, $cancelado);

			//executa no banco
			$retorno = OrientacaoDao::atualizar($orientacaoBean);
			echo json_encode($retorno);
			break;
		case "remover":
			//ler dados
			$id = $_DADOS['id'];//PK

			//executa no banco
			$retorno = OrientacaoDao::remover($id);
			echo json_encode($retorno);
			break;
		case 'getAll':
			//executa no banco
			$retorno = OrientacaoDao::getAll();
			if($retorno->status){//se tudo ocorreu bem
				for ($i=0; $i < count($retorno->resposta); $i++) {
					$retorno->resposta[$i]->Tipo = utf8_encode($retorno->resposta[$i]->Tipo);
					$retorno->resposta[$i]->Tema = utf8_encode($retorno->resposta[$i]->Tema);
					$retorno->resposta[$i]->Inicio = utf8_encode($retorno->resposta[$i]->Inicio);
					$retorno->resposta[$i]->Fim = utf8_encode($retorno->resposta[$i]->Fim);
					$retorno->resposta[$i]->Cancelado = utf8_encode($retorno->resposta[$i]->Cancelado);
				}
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
		case 'get':
			//ler dados
			$id = $_DADOS['id'];//PK

			//executa no banco
			$retorno = OrientacaoDao::get($id);
			if($retorno->status){//se tudo ocorreu bem
				$retorno->resposta[0]->Tipo = utf8_encode($retorno->resposta[0]->Tipo);
				$retorno->resposta[0]->Tema = utf8_encode($retorno->resposta[0]->Tema);
				$retorno->resposta[0]->Inicio = utf8_encode($retorno->resposta[0]->Inicio);
				$retorno->resposta[0]->Fim = utf8_encode($retorno->resposta[0]->Fim);
				$retorno->resposta[0]->Cancelado = utf8_encode($retorno->resposta[0]->Cancelado);
			}
			// die(print_r($retorno,true));
			echo json_encode($retorno);
			break;
	}
?>
