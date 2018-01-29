$(document).ready(function () {
	//carrega informacoes
	getPesquisas();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getPesquisas(){
	var url = "../../../Controller/PesquisaController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for(var i = 0; i < res.resposta.length; i++){
				var linha = "<tr>"
					+"<td class='professores' data-id='"+res.resposta[i].Professor+"'>"+res.resposta[i].Professor+"</td>"
					+"<td class='areas' data-id='"+res.resposta[i].Area+"'>"+res.resposta[i].Area+"</td>"
					+"<td class='linhas'>"+res.resposta[i].Linha+"</td>"
				if($("#ehProf").val() == "true"){
					linha += "<td onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>"
					+"</tr>";
				}

				$("tbody").append(linha);
			}
			ajustarProfessores();
			ajustarAreas();
		} else {
			alert(res.resposta);
		}
	});
}

//serve para escrever o nome da instituicao em vez do codigo na tela
function ajustarProfessores(){
	var url = "../../../Controller/ProfessorController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < $(".professores").length; i++) {
				var html = $($(".professores")[i]).html().trim();
				for (var j = 0; j < res.resposta.length; j++) {
					if(res.resposta[j].ID == html){
						$($(".professores")[i]).html(res.resposta[j].Nome)
						break;
					}
				}
			}
		} else {
			alert(res.resposta);
		}
	});
}

//serve para escrever o nome da instituicao em vez do codigo na tela
function ajustarAreas(){
	var url = "../../../Controller/PesquisaController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAreas'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < $(".areas").length; i++) {
				var html = $($(".areas")[i]).html().trim();
				for (var j = 0; j < res.resposta.length; j++) {
					if(res.resposta[j].ID == html){
						$($(".areas")[i]).html(res.resposta[j].Nome)
						break;
					}
				}
			}
		} else {
			alert(res.resposta);
		}
	});
}

//removea linha e apaga do banco
function remover(obj){
	if(confirm("Tem certeza?")){
		var url = "../../../Controller/PesquisaController.php";
		//informacoes passadas para a url
		var req = {
			acao: 'remover',
			professor: $(obj).parent().find(".professores").attr("data-id"),
			area: $(obj).parent().find(".areas").attr("data-id"),
			linha: $(obj).parent().find(".linhas").html()
		};
		$.post(url, req, function (data) {
			var res = JSON.parse(data);
			if (res.status) {//deu certo
				alert("Pesquisa excluída com sucesso!");
				$(obj).parent().remove();
			} else {
				alert(res.resposta);
			}
		});
	}
}

//redireciona para adicionar o curso
function add(){
	window.location.replace("telaCadastroPesquisa.php");
}
