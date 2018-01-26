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
	$aluno = $_SESSION['aluno'];
}
else{
	$logado = false;//nao logado
}
