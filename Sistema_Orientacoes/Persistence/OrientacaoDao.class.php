<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class OrientacaoDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO Orientacao (Aluno, Professor, Tipo, Tema, Inicio, Fim, Cancelado) VALUES ({$bean->getAluno()},{$bean->getProfessor()},'{$bean->getTipo()}','{$bean->getTema()}','{$bean->getInicio()}','{$bean->getFim()}',{$bean->getCancelado()});";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}
	}
?>
