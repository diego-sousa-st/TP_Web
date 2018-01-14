<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 15/12/2017
 * Time: 02:17
 */

class Curso
{
    private $codigo;
    private $nome;
    private $instituicao;
    private $forma;
    private $sigla;

    /**
     * Curso constructor.
     * @param $codigo
     * @param $nome
     * @param $instituicao
     * @param $forma
     * @param $sigla
     */
    public function __construct($codigo, $nome, $instituicao, $forma, $sigla)
    {
        $this->codigo = $codigo;
        $this->nome = $nome;
        $this->instituicao = $instituicao;
        $this->forma = $forma;
        $this->sigla = $sigla;
    }

    /**
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
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
    public function getForma()
    {
        return $this->forma;
    }

    /**
     * @param mixed $forma
     */
    public function setForma($forma)
    {
        $this->forma = $forma;
    }

    /**
     * @return mixed
     */
    public function getSigla()
    {
        return $this->sigla;
    }

    /**
     * @param mixed $sigla
     */
    public function setSigla($sigla)
    {
        $this->sigla = $sigla;
    }


}