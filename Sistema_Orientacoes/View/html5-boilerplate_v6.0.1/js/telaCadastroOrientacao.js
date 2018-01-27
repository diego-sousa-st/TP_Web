$(document).ready(function () {
	//carrega informacoes
	getAlunos();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getAlunos(){
	var url = "../../../Controller/OrientacaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAlunos'
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
