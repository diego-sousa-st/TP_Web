<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class ProfessorDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO professor (Nome,Instituicao,Email,Pagina,Lattes,senhaProfessor,imagemProfessor) VALUES ('{$bean->getNome()}','{$bean->getInstituicao()}','{$bean->getEmail()}','{$bean->getPagina()}',{$bean->getLattes()},'{$bean->getSenha()}','{$bean->getImg()}');";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e atualiza o obj
		public static function atualizar($bean){
			//cria a query
			$query = "UPDATE professor SET
					Nome = '{$bean->getNome()}',
					Instituicao = '{$bean->getInstituicao()}',
					Pagina = '{$bean->getPagina()}',
					Lattes = {$bean->getLattes()},
					imagemProfessor = '{$bean->getImg()}',
					senhaProfessor = '{$bean->getSenha()}'
					WHERE ID = {$bean->getId()};";

			// die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e remove o obj pela pk
		public static function remover($id){
			//cria a query
			$query = "DELETE FROM professor WHERE ID = {$id};";

			// die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera tudo
		public static function getAll(){
			//cria a query
			$query = "SELECT * FROM professor;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera tudo de acordo com a pk passada
		public static function get($id){
			//cria a query
			$query = "SELECT * FROM professor WHERE ID = {$id};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recupera informacoes do professor
		public static function getProfessor($email,$senha){
			//cria a query
			$query = "SELECT * FROM professor WHERE Email = '{$email}' AND senhaProfessor = '{$senha}';";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e recuepra o ultimo id inserido
		public static function getUltimoId(){
			//cria a query
			$query = "SELECT ID FROM Professor ORDER BY ID DESC LIMIT 1;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}
	}
?>
