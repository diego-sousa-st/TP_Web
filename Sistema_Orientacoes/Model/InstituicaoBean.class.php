<?php
	//Classe que representa a tabela Instituicao
	class InstituicaoBean{
		private $sigla;
		private $nome;
		private $cidade;
		private $uf;
		private $pais;


		public function __construct($sigla, $nome, $cidade, $uf, $pais)
		{
			$this->sigla = $sigla;
			$this->nome = $nome;
			$this->cidade = $cidade;
			$this->uf = $uf;
			$this->pais = $pais;
		}

		public function getSigla(){
			return $this->sigla;
		}

		public function setSigla($valor){
			$this->sigla = $valor;
		}

		public function getNome(){
			return $this->nome;
		}

		public function setNome($valor){
			$this->nome = $valor;
		}

		public function getCidade(){
			return $this->cidade;
		}

		public function setCidade($valor){
			$this->cidade = $valor;
		}

		public function getUf(){
			return $this->uf;
		}

		public function setUf($valor){
			$this->uf = $valor;
		}

		public function getPais(){
			return $this->pais;
		}

		public function setPais($valor){
			$this->pais = $valor;
		}
	}
?>
