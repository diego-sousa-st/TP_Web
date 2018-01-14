<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 12/12/2017
 * Time: 02:41
 */
include_once ("../Model/Curso.php");

class CursoDAO
{
    private $curso;
    private $conexao;

    /**
     * CursoDAO constructor.
     * @param $curso
     * @param $conexao
     */
    public function __construct($curso, $conexao)
    {
        $this->curso = $curso;
        $this->conexao = $conexao;
    }

    public function getTodosCursos(){
        $sql = "SELECT * FROM curso;";

        $cursos = [];
        $resultSet = $this->conexao->query($sql);
        while($row = $resultSet->fetch_array(MYSQLI_NUM)){
            $curso = new Curso($row[0],$row[1],$row[2],$row[3],$row[4]);
            //fazendo push no array
            $cursos[] = $curso;
        }

        return $cursos;
    }

    public function getCurso($id){
        $sql = "SELECT * FROM curso WHERE id = ".$id.";";

        $resultSet = $this->conexao->query($sql);
        $row = $resultSet->fetch_array(MYSQLI_NUM);
        if ($row != null){
            $codigo = $row[0];
            $nome = $row[1];
            $instituicao = $row[2];
            $forma = $row[3];
            $sigla = $row[4];
            return new Curso($codigo,$nome,$instituicao,$forma,$sigla);
        }
        return null;
    }
}