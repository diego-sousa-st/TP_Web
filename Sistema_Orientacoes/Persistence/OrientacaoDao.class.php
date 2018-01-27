<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class OrientacaoDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			$cancelado = $bean->getCancelado() == 'S' ? "'S'" : "NULL";
			//cria a query
			$query = "INSERT INTO Orientacao (Aluno, Professor, Tipo, Tema, Inicio, Fim, Cancelado) VALUES ({$bean->getAluno()},{$bean->getProfessor()},'{$bean->getTipo()}','{$bean->getTema()}','{$bean->getInicio()}','{$bean->getFim()}',{$cancelado});";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e atualiza o obj
		public static function atualizar($bean){
			$cancelado = $bean->getCancelado() == 'S' ? "'S'" : "NULL";
			//cria a query
			$query = "UPDATE Orientacao SET
					Aluno = {$bean->getAluno()},
					Professor = {$bean->getProfessor()},
					Tipo = '{$bean->getTipo()}',
					Tema = '{$bean->getTema()}',
					Inicio = '{$bean->getInicio()}',
					Fim = '{$bean->getFim()}',
					Cancelado = {$cancelado}
					WHERE ID = {$bean->getId()};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e remove o obj pela pk
		public static function remover($id){
			//cria a query
			$query = "DELETE FROM Orientacao WHERE ID = {$id};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera tudo
		public static function getAll(){
			//cria a query
			$query = "SELECT * FROM Orientacao;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera tudo de acordo com a pk passada
		public static function get($id){
			//cria a query
			$query = "SELECT * FROM Orientacao WHERE ID = {$id};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}
	}
?>
