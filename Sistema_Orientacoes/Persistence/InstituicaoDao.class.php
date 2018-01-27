<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class InstituicaoDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO Instituicao (Sigla,Nome,Cidade,UF,Pais) VALUES
					('{$bean->getSigla()}','{$bean->getNome()}','{$bean->getCidade()}','{$bean->getUf()}','{$bean->getPais()}');";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e atualiza o obj
		public static function atualizar($bean){
			//cria a query
			$query = "UPDATE Instituicao SET
					Nome = '{$bean->getNome()}',
					Cidade = '{$bean->getCidade()}',
					UF = '{$bean->getUf()}',
					Pais = '{$bean->getPais()}'
					WHERE Sigla = '{$bean->getSigla()}';";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e remove o obj pela pk
		public static function remover($id){
			//cria a query
			$query = "DELETE FROM Instituicao WHERE Sigla = '{$id}';";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera tudo
		public static function getAll(){
			//cria a query
			$query = "SELECT * FROM Instituicao;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera tudo de acordo com a pk passada
		public static function get($id){
			//cria a query
			$query = "SELECT * FROM Instituicao WHERE Sigla = '{$id}';";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}
	}
?>
