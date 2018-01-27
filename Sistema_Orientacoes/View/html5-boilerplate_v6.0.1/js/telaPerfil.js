$(document).ready(function () {
	//carrega informacoes
	getAluno();
});

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
			$("#nome").html(res.resposta[0].Nome);
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
