$(document).ready(function () {
	//carrega informacoes
	getAlunos();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getAlunos(){
	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for(var i = 0; i < res.resposta.length; i++){
				var cra = res.resposta[i].CRA;
				if(res.resposta[i].CRA == null)
					cra = "";

				var linha = "<tr>"
					+"<td class='matricula'>"+res.resposta[i].Matricula+"</td>"
					+"<td>"+res.resposta[i].Nome+"</td>"
					+"<td>"+res.resposta[i].Cidade+"</td>"
					+"<td>"+res.resposta[i].UF+"</td>"
					+"<td>"+cra+"</td>"
					+"<td class='curso'>"+res.resposta[i].Curso+"</td>"
					+"<td id='alterar_"+res.resposta[i].Matricula+"'>"+"<span class='btn'>ALTERAR</span>"+"</td>"
					+"<td id='excluir_"+res.resposta[i].Matricula+"' onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>"
					+"</tr>";
				$("tbody").append(linha);
			}
			ajustarCursos();
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

//serve para escrever o nome do curso em vez do codigo na tela
function ajustarCursos(){
	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < $(".curso").length; i++) {
				var html = parseInt($($(".curso")[i]).html().trim());
				for (var j = 0; j < res.resposta.length; j++) {
					if(res.resposta[j].Codigo == html){
						$($(".curso")[i]).html(res.resposta[j].Nome)
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
		var url = "../../../Controller/AlunoController.php";
		//informacoes passadas para a url
		var req = {
			acao: 'remover',
			matricula: $(obj).parent().find(".matricula").html()
		};
		$.post(url, req, function (data) {
			var res = JSON.parse(data);
			if (res.status) {//deu certo
				alert("Aluno excluido com sucesso!");
				$(obj).parent().remove();
			} else {
				alert(res.resposta);
			}
		});
	}
}
