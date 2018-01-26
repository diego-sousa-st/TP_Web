<?php

class AlunoBean
{
	private $matricula;
	private $nome;
	private $cidade;
	private $uf;
	private $cra;
	private $curso;
	private $senha;

	/**
	 * Aluno constructor.
	 * @param $matricula
	 * @param $nome
	 * @param $cidade
	 * @param $uf
	 * @param $curso
	 * @param $senha
	 */
	public function __construct($matricula, $nome, $cidade, $uf, $curso, $senha)
	{
		$this->matricula = $matricula;
		$this->nome = $nome;
		$this->cidade = $cidade;
		$this->uf = $uf;
		$this->cra = 0;
		$this->curso = $curso;
		$this->senha = $senha;
	}


	/**
	 * @return mixed
	 */
	public function getMatricula()
	{
		return $this->matricula;
	}

	/**
	 * @param mixed $matricula
	 */
	public function setMatricula($matricula)
	{
		$this->matricula = $matricula;
	}

	/**
	 * @return mixed
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * @param mixed $nome
	 */
	public function setNome($nome)
	{
		$this->nome = $nome;
	}

	/**
	 * @return mixed
	 */
	public function getCidade()
	{
		return $this->cidade;
	}

	/**
	 * @param mixed $cidade
	 */
	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}

	/**
	 * @return mixed
	 */
	public function getUf()
	{
		return $this->uf;
	}

	/**
	 * @param mixed $uf
	 */
	public function setUf($uf)
	{
		$this->uf = $uf;
	}

	/**
	 * @return mixed
	 */
	public function getCra()
	{
		return $this->cra;
	}

	/**
	 * @param mixed $cra
	 */
	public function setCra($cra)
	{
		$this->cra = $cra;
	}

	/**
	 * @return mixed
	 */
	public function getCurso()
	{
		return $this->curso;
	}

	/**
	 * @param mixed $curso
	 */
	public function setCurso($curso)
	{
		$this->curso = $curso;
	}

	/**
	 * @return mixed
	 */
	public function getSenha()
	{
		return $this->senha;
	}

	/**
	 * @param mixed $senha
	 */
	public function setSenha($senha)
	{
		$this->senha = $senha;
	}

}
