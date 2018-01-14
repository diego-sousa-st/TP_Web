<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 12/12/2017
 * Time: 03:18
 */

include_once ("../Model/Aluno.php");
include_once ("../Persistence/AlunoDAO.php");

$nome = $_POST['nome'];
$matricula = $_POST['matricula'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$curso = $_POST['curso'];
$senhaAluno = $_POST['senha'];

$aluno = new Aluno($matricula,$nome,$cidade,$uf,$curso,$senhaAluno);

$pArquivo = fopen("../Persistence/senha.txt","r");
$senha = fgets($pArquivo,4096);

$conexao = new mysqli("localhost","usuario",$senha,"orientacoes");
if($conexao){
    $alunoDAO = new AlunoDAO($aluno,$conexao);
    $salvou = $alunoDAO->salvarAluno();
    $conexao->close();

    if($salvou){
        header("Location: ../View/html5-boilerplate_v6.0.1/index.php");
    } else{
        header("Location: ../View/html5-boilerplate_v6.0.1/pags/telaCadastroAluno.php");
    }
} else{
    echo "Falha ao conectar no banco";
}