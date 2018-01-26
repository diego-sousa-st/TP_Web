<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class CursoDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO curso (Codigo,Nome,Instituicao,forma,Sigla) VALUES
					({$bean->getCodigo()},'{$bean->getNome()}','{$bean->getInstituicao()}','{$bean->getForma()}','{$bean->getSigla()}');";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera informacoes dos cursos
		public static function getCursos(){
			//cria a query
			$query = "SELECT * FROM Curso;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}
	}
?>
