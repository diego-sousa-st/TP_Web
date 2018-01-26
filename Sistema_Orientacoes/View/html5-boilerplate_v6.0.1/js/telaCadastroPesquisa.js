$(document).ready(function () {
	//carrega informacoes
	getAreas();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getAreas(){
	var url = "../../../Controller/PesquisaController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAreas'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = "";
			for (var i = 0; i < res.resposta.length; i++) {
				options += "<option value='"+res.resposta[i].ID+"'>"+res.resposta[i].Nome+"</option>"
			}
			$("#area").html(options);
		} else {
			alert(res.resposta);
		}
	});
}
