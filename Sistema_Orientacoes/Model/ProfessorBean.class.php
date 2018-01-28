<?php

class ProfessorBean
{
	private $id;
	private $nome;
	private $instituicao;
	private $email;
	private $pagina;
	private $lattes;
	private $senha;
	private $img;

	/**
	 * Aluno constructor.
	 * @param $id
	 * @param $nome
	 * @param $instituicao
	 * @param $email
	 * @param $pagina
	 * @param $lattes
	 * @param $senha
	 * @param $img
	 */
	public function __construct($id, $nome, $instituicao, $email, $pagina, $lattes, $senha, $img)
	{
		$this->id = $id;
		$this->nome = $nome;
		$this->instituicao = $instituicao;
		$this->email = $email;
		$this->pagina = $pagina;
		$this->lattes = $lattes;
		$this->senha = $senha;
		$this->img = $img;
	}


	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id)
	{
		$this->id = $id;
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
	public function getInstituicao()
	{
		return $this->instituicao;
	}

	/**
	 * @param mixed $instituicao
	 */
	public function setInstituicao($instituicao)
	{
		$this->instituicao = $instituicao;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 */
	public function setEmail($email)
	{
		$this->email = $email;
	}

	/**
	 * @return mixed
	 */
	public function getPagina()
	{
		return $this->pagina;
	}

	/**
	 * @param mixed $pagina
	 */
	public function setPagina($pagina)
	{
		$this->pagina = $pagina;
	}

	/**
	 * @return mixed
	 */
	public function getLattes()
	{
		return $this->lattes;
	}

	/**
	 * @param mixed $lattes
	 */
	public function setLattes($lattes)
	{
		$this->lattes = $lattes;
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

	/**
	 * @return mixed
	 */
	public function getImg()
	{
		return $this->img;
	}

	/**
	 * @param mixed $img
	 */
	public function setImg($img)
	{
		$this->img = $img;
	}

}
