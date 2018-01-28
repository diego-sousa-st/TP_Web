<?php
/**
 * Created by PhpStorm.
 * User: Diego
 * Date: 12/12/2017
 * Time: 03:59
 */

session_start();
if(isset($_SESSION['logado'])){
	$logado = $_SESSION['logado'];
	if(isset($_SESSION['aluno']))
		$aluno = $_SESSION['aluno'];
	else
		$professor = $_SESSION['professor'];
}
else{
	$logado = false;//nao logado
}
