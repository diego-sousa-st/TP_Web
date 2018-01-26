<?php
	// error_reporting(0);
	require_once('Util/Msgs.php');
	require_once("../Persistence/AlunoDao.class.php");
	require_once("../Model/AlunoBean.class.php");

	$_DADOS = $_POST;

	$acao = trim($_DADOS['acao']);
	if(!isset($acao) || $acao == ''){//se houve algum problema na hora de receber a acao
		?><script>alert('<?php echo $msgSemAcao; ?>');</script><?php
		header('Location: ../View/html5-boilerplate_v6.0.1');
	}

	$retorno = new stdClass();
	switch($acao){
		case 'cadastrar':
			//ler dados
			$nome = $_POST['nome'];
			$matricula = $_POST['matricula'];
			$cidade = $_POST['cidade'];
			$uf = $_POST['uf'];
			$curso = $_POST['curso'];
			$senha = sha1($_POST['senha']);

			//criar bean
			$alunoBean = new AlunoBean($matricula, $nome, $cidade, $uf, $curso, $senha);

			//executa no banco
			$retorno = AlunoDao::cadastrar($alunoBean);
			if($retorno->status){//se tudo ocorreu bem
				session_start();
				$_SESSION['logado'] = true;
				$_SESSION['aluno'] = $alunoBean;

				//redireciona
				header('Location: ../View/html5-boilerplate_v6.0.1/pags/telaPerfil.php');
			}else{
				?><script>alert('Erro ao cadastrar aluno: <?= $retorno->resposta ?>');</script><?php
				header('Location: ../View/html5-boilerplate_v6.0.1/pags/telaCadastroAluno.php');
			}
			break;
	}
?>
