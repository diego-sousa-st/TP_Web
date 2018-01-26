$(document).ready(function () {
	//carrega informacoes
	getCurso();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getCurso(){
	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getCurso',
		id: $("#curso").attr("data-id")
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
