<?php
	require_once('../Persistence/Conexao/ProcessaQuery.class.php');
	//Classe que executa as acoes no banco
	class AlunoDao{
		//Conecta com o banco e insere o obj
		public static function cadastrar($bean){
			//cria a query
			$query = "INSERT INTO aluno (Matricula,Nome,Cidade,UF,CRA,Curso,senhaAluno,imagemAluno) VALUES ({$bean->getMatricula()},'{$bean->getNome()}','{$bean->getCidade()}','{$bean->getUf()}',{$bean->getCra()},{$bean->getCurso()},'{$bean->getSenha()}','{$bean->getImg()}');";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}

		//Conecta com o banco e recupera informacoes do aluno
		public static function getAluno($matricula,$senha){
			//cria a query
			$query = "SELECT * FROM ALUNO WHERE matricula = {$matricula} AND senhaAluno = '{$senha}';";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e pega infs
		public static function getAlunosOrientacao(){
			//cria a query
			$query = "SELECT Nome, Matricula FROM Aluno;";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::consultarQuery($query);
		}

		//Conecta com o banco e atualiza o obj
		public static function atualiza($bean){
			//cria a query
			$query = "UPDATE aluno SET
					Nome = '{$bean->getNome()}',
					Cidade = '{$bean->getCidade()}',
					UF = '{$bean->getUf()}',
					CRA = {$bean->getCra()},
					Curso = {$bean->getCurso()}
					WHERE Matricula = {$bean->getMatricula()};";

			//die(print_r($query,true));
			//executa
			return ProcessaQuery::executarQuery($query);
		}
	}
?>
