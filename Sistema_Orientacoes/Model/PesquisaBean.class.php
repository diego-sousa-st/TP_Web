<?php
	//Classe que representa a tabela Pesquisa
	class PesquisaBean{
		private $professor;
		private $area;
		private $linha;

		public function __construct($professor, $area, $linha)
		{
			$this->professor = $professor;
			$this->area = $area;
			$this->linha = $linha;
		}

		public function getProfessor(){
			return $this->professor;
		}

		public function setProfessor($valor){
			$this->professor = $valor;
		}

		public function getArea(){
			return $this->area;
		}

		public function setArea($valor){
			$this->area = $valor;
		}

		public function getLinha(){
			return $this->linha;
		}

		public function setLinha($valor){
			$this->linha = $valor;
		}
	}
?>
