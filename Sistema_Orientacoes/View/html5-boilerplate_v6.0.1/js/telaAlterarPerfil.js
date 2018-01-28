$(document).ready(function () {
	//carrega informacoes
	if($("#ehProf").val() == "true"){
		getInstituicoes();
	}
	else{
		getCursos();
	}
});


//manda ajax assim q a pagina carregar para pegar as informacoes
function getProfessor(){
	var url = "../../../Controller/ProfessorController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		id: $("#id").val()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#nome").val(res.resposta[0].Nome);
			$("#email").val(res.resposta[0].Email);
			$("#pagina").val(res.resposta[0].Pagina);
			$("#lattes").val(res.resposta[0].Lattes);
			$("#imgAntiga").val(res.resposta[0].imagemProfessor);
			$("#instituicoes").val(res.resposta[0].Instituicao);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes
function getInstituicoes(){
	var url = "../../../Controller/InstituicaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = "";
			for (var i = 0; i < res.resposta.length; i++) {
				options += "<option value='"+res.resposta[i].Sigla+"'>"+res.resposta[i].Nome+"</option>"
			}
			$("#instituicoes").html(options);
			getProfessor();
		} else {
			alert(res.resposta);
		}
	});
}





//manda ajax assim q a pagina carregar para pegar as informacoes
function getAluno(){
	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		matricula: $("#matricula").val()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#nome").val(res.resposta[0].Nome);
			$("#cidade").val(res.resposta[0].Cidade);
			$("#uf").val(res.resposta[0].UF);
			$("#cra").val(res.resposta[0].CRA);
			$("#imgAntiga").val(res.resposta[0].imagemAluno);
			$("#curso").val(res.resposta[0].Curso);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes
function getCursos(){
	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = "";
			for (var i = 0; i < res.resposta.length; i++) {
				options += "<option value='"+res.resposta[i].Codigo+"'>"+res.resposta[i].Nome+"</option>"
			}
			$("#curso").html(options);
			getAluno();
		} else {
			alert(res.resposta);
		}
	});
}
