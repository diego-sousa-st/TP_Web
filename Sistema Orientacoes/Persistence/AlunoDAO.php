<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 12/12/2017
 * Time: 02:41
 */
include_once ("../Model/Aluno.php");
class AlunoDAO
{
    private $aluno;
    private $conexao;

    /**
     * AlunoDAO constructor.
     * @param $aluno
     * @param $conexao
     */
    public function __construct($aluno, $conexao)
    {
        $this->aluno = $aluno;
        $this->conexao = $conexao;
    }

    public function salvarAluno(){
//        echo "Entrei no salvar aluno";
//        echo $this->aluno->getNome()." ";
//        echo $this->aluno->getMatricula()." ";
//        echo $this->aluno->getCidade()." ";
//        echo $this->aluno->getUf()." ";
//        echo $this->aluno->getCra()." ";
//        echo $this->aluno->getCurso()." ";

        $sql = "INSERT INTO aluno (Matricula,Nome,Cidade,UF,CRA,Curso) VALUES (".$this->aluno->getMatricula().",'".$this->aluno->getNome()."','"
        .$this->aluno->getCidade()."','".$this->aluno->getUf()."',".$this->aluno->getCra().",".$this->aluno->getCurso().");";

        $queryComSucesso = $this->conexao->query($sql) or die("Erro no sql".$this->conexao->error);

        return $queryComSucesso;
    }

    /**
     * @param $matricula Matrícula passada como chava para fazer a busca de um aluno no banco
     * @return Aluno|null Retorna um objeto aluno para o sistema
     */
    public function getAluno($matricula){
        $sql = "SELECT * FROM ALUNO WHERE matricula = ".$matricula;
        $resultSet = $this->conexao->query($sql);
        $row = $resultSet->fetch_array(MYSQLI_NUM);
        if ($row != null){
            $matricula = $row[0];
            $nome = $row[1];
            $cidade = $row[2];
            $uf = $row[3];
            $cra = $row[4];
            $curso = $row[5];
            return new Aluno($matricula,$nome,$cidade,$uf,$curso,"teste");
        }
        return null;
    }
}