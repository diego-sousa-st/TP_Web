<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 12/12/2017
 * Time: 03:37
 */

include_once ("../Model/Aluno.php");
include_once ("../Persistence/AlunoDAO.php");

$matricula = $_POST['matricula'];

$pArquivo = fopen("../Persistence/senha.txt","r");
$senha = fgets($pArquivo,4096);
$conexao = new mysqli("localhost","usuario",$senha,"orientacoes");


$alunoDAO = new AlunoDAO($aluno,$conexao);

$aluno = $alunoDAO->getAluno($matricula);

include_once ("VerificaLogado.php");
if($aluno != null){
    $_SESSION['logado'] = true;
    $_SESSION['aluno'] = $aluno;
    $logou = true;
    header("Location: ../View/html5-boilerplate_v6.0.1/index.php");
} else{
    header("Location: ../View/html5-boilerplate_v6.0.1/pags/telaLoginAluno.php");
}

