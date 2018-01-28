$(document).ready(function () {
	//carrega informacoes
	getInstituicoes();
});

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
		} else {
			alert(res.resposta);
		}
	});
}
