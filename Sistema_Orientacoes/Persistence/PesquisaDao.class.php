<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class PesquisaDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO Pesquisa (Professor, Area, Linha) VALUES ({$bean->getProfessor()},{$bean->getArea()},'{$bean->getLinha()}');";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e remove o obj pela pk
		public static function remover($bean){
			//cria a query
			$query = "DELETE FROM Pesquisa WHERE Professor = {$bean->getProfessor()} AND Area = {$bean->getArea()} AND Linha = '{$bean->getLinha()}';";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera tudo
		public static function getAll(){
			//cria a query
			$query = "SELECT * FROM Pesquisa;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera tudo de acordo com o professor passado
		public static function get($professor){
			//cria a query
			$query = "SELECT * FROM Pesquisa WHERE Professor = {$professor};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e pega infs
		public static function getAreas(){
			//cria a query
			$query = "SELECT * FROM Area;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}
	}
?>
