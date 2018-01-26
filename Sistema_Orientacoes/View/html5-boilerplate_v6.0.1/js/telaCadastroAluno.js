$(document).ready(function () {
	//carrega informacoes
	getCursos();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getCursos(){
	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getCursos'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = "";
			for (var i = 0; i < res.resposta.length; i++) {
				options += "<option value='"+res.resposta[i].Codigo+"'>"+res.resposta[i].Nome+"</option>"
			}
			$("#curso").html(options);
		} else {
			alert(res.resposta);
		}
	});
}
