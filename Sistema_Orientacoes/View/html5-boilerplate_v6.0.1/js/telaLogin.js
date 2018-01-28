function logar(){
	$("#formCadastro").submit();
}

//troca o login entre aluno e professor
function trocaProf(){
	var classeAtual = $("#btnProf").attr("class");
	if(classeAtual.indexOf("danger") == -1){//nao esta com a classe danger
		//vai virar aluno
		$("#btnProf").attr("class","btn btn-danger");
		$("#loginLabel").html("Matrícula");
		$("#loginProf").attr("style","display:none");
		$("#loginAluno").attr("style","");
		$("#formCadastro").attr("action","../../../Controller/AlunoController.php");
	}
	else{
		//vai virar prof
		$("#btnProf").attr("class","btn btn-success");
		$("#loginLabel").html("Email");
		$("#loginAluno").attr("style","display:none");
		$("#loginProf").attr("style","");
		$("#formCadastro").attr("action","../../../Controller/ProfessorController.php");
	}
}
