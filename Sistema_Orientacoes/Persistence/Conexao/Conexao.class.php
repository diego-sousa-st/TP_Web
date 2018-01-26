<?php
	//Classe que conecta com o banco
	class Conexao{
		private $servidor;
		private $user;
		private $password;
		private $bd;
		private $link;
		private $pdo;

		//Contrutor
		public function __construct($servidor, $bd, $user, $password){
			$this->servidor = $servidor;
			$this->user = $user;
			$this->password = $password;
			$this->bd = $bd;
			$this->pdo = new PDO("mysql:host=$servidor;dbname=$bd", $user, $password);
		}

		//executa a query
		public function executarQuery($query){
			return $this->pdo->exec($query);
		}

		//consulta a query
		public function consultarQuery($query){
			return $this->pdo->query($query);
		}

		//Retorna o erro referente a ultima acao feita no banco
		public function getErros(){
			return $this->pdo->errorInfo();
		}

		//inicia a transacao
		public function iniciarTransacao(){
			return $this->pdo->beginTransaction();
		}

		//comita a transacao
		public function commitTransacao(){
			return $this->pdo->commit();
		}

		//faz rollback na transacao
		public function rollbackTransacao(){
			return $this->pdo->rollback();
		}
	}
?>
