<?php
	//Classe que representa a tabela Orientacao
	class OrientacaoBean{
		private $id;
		private $aluno;
		private $professor;
		private $tipo;
		private $tema;
		private $inicio;
		private $fim;
		private $cancelado;


		public function __construct($id, $aluno, $professor, $tipo, $tema, $inicio, $fim, $cancelado)
		{
			$this->id = $id;
			$this->aluno = $aluno;
			$this->professor = $professor;
			$this->tipo = $tipo;
			$this->tema = $tema;
			$this->inicio = $inicio;
			$this->fim = $fim;
			$this->cancelado = $cancelado;
		}

		public function getId(){
			return $this->id;
		}

		public function setId($valor){
			$this->id = $valor;
		}

		public function getAluno(){
			return $this->aluno;
		}

		public function setAluno($valor){
			$this->aluno = $valor;
		}

		public function getProfessor(){
			return $this->professor;
		}

		public function setProfessor($valor){
			$this->professor = $valor;
		}

		public function getTipo(){
			return $this->tipo;
		}

		public function setTipo($valor){
			$this->tipo = $valor;
		}

		public function getTema(){
			return $this->tema;
		}

		public function setTema($valor){
			$this->tema = $valor;
		}

		public function getInicio(){
			return $this->inicio;
		}

		public function setInicio($valor){
			$this->inicio = $valor;
		}

		public function getFim(){
			return $this->fim;
		}

		public function setFim($valor){
			$this->fim = $valor;
		}

		public function getCancelado(){
			return $this->cancelado;
		}

		public function setCancelado($valor){
			$this->cancelado = $valor;
		}
	}
?>
