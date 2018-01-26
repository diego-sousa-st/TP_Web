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
	}
?>
