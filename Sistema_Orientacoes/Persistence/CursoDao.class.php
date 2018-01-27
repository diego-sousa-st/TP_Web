<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class CursoDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO Curso (Codigo,Nome,Instituicao,forma,Sigla) VALUES
					({$bean->getCodigo()},'{$bean->getNome()}','{$bean->getInstituicao()}','{$bean->getForma()}','{$bean->getSigla()}');";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e atualiza o obj
		public static function atualizar($bean){
			//cria a query
			$query = "UPDATE Curso SET
					Nome = '{$bean->getNome()}',
					Instituicao = '{$bean->getInstituicao()}',
					forma = '{$bean->getForma()}',
					Sigla = '{$bean->getSigla()}'
					WHERE Codigo = {$bean->getCodigo()};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e remove o obj pela pk
		public static function remover($id){
			//cria a query
			$query = "DELETE FROM Curso WHERE Codigo = {$id};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera tudo
		public static function getAll(){
			//cria a query
			$query = "SELECT * FROM Curso;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera tudo de acordo com a pk passada
		public static function get($id){
			//cria a query
			$query = "SELECT * FROM Curso WHERE Codigo = {$id};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		
	}
?>
