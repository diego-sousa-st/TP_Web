$(document).ready(function () {
	//carrega informacoes
	getAlunos();
	getInstituicoes();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getInstituicoes(){
	var url = "../../../Controller/InstituicaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getInstituicoesCurso'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = "";
			for (var i = 0; i < res.resposta.length; i++) {
				options += "<option value='"+res.resposta[i].Sigla+"'>"+res.resposta[i].Nome+"</option>"
			}
			$("#fk_instituicao").html(options);
		} else {
			alert(res.resposta);
		}
	});
}

//manda ajax assim q a pagina carregar para pegar as informacoes
function getAlunos(){
	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAlunosOrientacao'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = "";
			for (var i = 0; i < res.resposta.length; i++) {
				options += "<option value='"+res.resposta[i].Matricula+"'>"+res.resposta[i].Nome+"</option>"
			}
			$("#fk_aluno").html(options);
		} else {
			alert(res.resposta);
		}
	});
}
