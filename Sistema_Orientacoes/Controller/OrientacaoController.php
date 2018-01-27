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
			$professor = $_POST['professor'];
			$tipo = $_POST['tipo'];
			$tema = $_POST['tema'];
			$inicio = $_POST['inicio'];
			$fim = $_POST['fim'];
			$cancelado = $_POST['cancelado'];

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
			$id = $_POST['id'];//PK
			$aluno = $_POST['fk_aluno'];
			$professor = $_POST['professor'];
			$tipo = $_POST['tipo'];
			$tema = $_POST['tema'];
			$inicio = $_POST['inicio'];
			$fim = $_POST['fim'];
			$cancelado = $_POST['cancelado'];

			//criar bean
			$orientacaoBean = new OrientacaoBean($id, $aluno, $professor, $tipo, $tema, $inicio, $fim, $cancelado);

			//executa no banco
			$retorno = OrientacaoDao::atualizar($orientacaoBean);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Orientação atualizada com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao atualizar orientação: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
			break;
		case "remover":
			//ler dados
			$id = $_POST['id'];//PK

			//executa no banco
			$retorno = OrientacaoDao::remover($id);
			if($retorno->status){//se tudo ocorreu bem
				?>
					<script>
						alert('Orientação removida com sucesso!');
						window.location.replace("../View/html5-boilerplate_v6.0.1/");
					</script>
				<?php
			}else{
				?>
					<script>
						alert('Erro ao remover orientação: <?= $retorno->resposta ?>');
						window.location.replace("../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php");//arrumar
					</script>
				<?php
			}
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
			$id = $_POST['id'];//PK

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
		case 'getAlunos':
			//executa no banco
			require_once("../Persistence/AlunoDao.class.php");
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
	}
?>
