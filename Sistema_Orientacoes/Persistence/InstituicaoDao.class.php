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

		//Conecta com o banco e pega infs
		public static function getInstituicoesCurso(){
			//cria a query
			$query = "SELECT Nome, Sigla FROM Instituicao;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}
	}
?>
