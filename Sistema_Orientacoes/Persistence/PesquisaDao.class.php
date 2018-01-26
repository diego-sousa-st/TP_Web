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
