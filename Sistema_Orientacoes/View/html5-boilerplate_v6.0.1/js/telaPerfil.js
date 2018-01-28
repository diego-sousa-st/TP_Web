$(document).ready(function () {
	//carrega informacoes
	if($("#ehProf").val() == "true")
		getProfessor();
	else
		getAluno();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getInstituicao(sigla){
	var url = "../../../Controller/InstituicaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		sigla: sigla
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#instituicao").html(res.resposta[0].Nome);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes
function getProfessor(){
	var url = "../../../Controller/ProfessorController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		id: $("#id").html()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#nomeProfessor").html(res.resposta[0].Nome);
			$("#email").html(res.resposta[0].Email);
			$("#pagina").html(res.resposta[0].Pagina);
			$("#lattes").html(res.resposta[0].Lattes);
			$("#img").attr("src","../../../Persistence/FotosPerfil/"+res.resposta[0].imagemProfessor);
			getInstituicao(res.resposta[0].Instituicao);
		} else {
			alert(res.resposta);
		}
	});
}


//manda ajax assim q a pagina carregar para pegar as informacoes
function getCurso(codigo){
	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		codigo: codigo
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#curso").html(res.resposta[0].Nome);
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
		matricula: $("#matricula").html()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			$("#nomeAluno").html(res.resposta[0].Nome);
			$("#cidade").html(res.resposta[0].Cidade);
			$("#uf").html(res.resposta[0].UF);
			$("#cra").html(res.resposta[0].CRA);
			$("#img").attr("src","../../../Persistence/FotosPerfil/"+res.resposta[0].imagemAluno);
			getCurso(res.resposta[0].Curso);
		} else {
			alert(res.resposta);
		}
	});
}

function apagarPerfil(){
	if(confirm("Tem certeza?")){
		var url = "";
		var req = "";
		if($("#ehProf").val() == "true"){
			url = "../../../Controller/ProfessorController.php";
			//informacoes passadas para a url
			req = {
				acao: 'remover',
				id: $("#id").html()
			};
		}
		else{
			url = "../../../Controller/AlunoController.php";
			//informacoes passadas para a url
			req = {
				acao: 'remover',
				matricula: $("#matricula").html()
			};
		}


		$.post(url, req, function (data) {
			// alert(data);
			var res = JSON.parse(data);
			if (res.status) {//deu certo
				alert("Perfil excluido com sucesso!");
				window.location.replace("../../../Controller/Deslogar.php");
			} else {
				alert('Erro ao remover perfil: '+res.resposta+'');
			}
		});
	}
}
