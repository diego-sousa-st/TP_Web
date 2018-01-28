$(document).ready(function () {
	//carrega informacoes
	getInstituicoes();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getInstituicoes(){
	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for(var i = 0; i < res.resposta.length; i++){
				var linha = "<tr>"
					+"<td class='codigo'>"+res.resposta[i].Codigo+"</td>"
					+"<td>"+res.resposta[i].Nome+"</td>"
					+"<td class='instituicao'>"+res.resposta[i].Instituicao+"</td>"
					+"<td>"+res.resposta[i].forma+"</td>"
					+"<td>"+res.resposta[i].Sigla+"</td>";
				if($("#ehProf").val() == "true"){
					linha += "<td class='alterar' onclick='permitirAlterar(this);'>"+"<span class='btn'>ALTERAR</span>"+"</td>"
					+"<td onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>"
					+"</tr>";
				}

				$("tbody").append(linha);
			}
			ajustarInstituicoes();
		} else {
			alert(res.resposta);
		}
	});
}

//serve para escrever o nome da instituicao em vez do codigo na tela
function ajustarInstituicoes(){
	var url = "../../../Controller/InstituicaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < $(".instituicao").length; i++) {
				var html = $($(".instituicao")[i]).html().trim();
				for (var j = 0; j < res.resposta.length; j++) {
					if(res.resposta[j].Sigla == html){
						$($(".instituicao")[i]).html(res.resposta[j].Nome)
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
		var url = "../../../Controller/CursoController.php";
		//informacoes passadas para a url
		var req = {
			acao: 'remover',
			codigo: $(obj).parent().find(".codigo").html()
		};
		$.post(url, req, function (data) {
			var res = JSON.parse(data);
			if (res.status) {//deu certo
				alert("Curso excluído com sucesso!");
				$(obj).parent().remove();
			} else {
				alert(res.resposta);
			}
		});
	}
}

//abre os campos da linha permitindo a edicao
function permitirAlterar(obj){
	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		codigo: $(obj).parent().find(".codigo").html()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var linha = "<td class='codigo'>"+res.resposta[0].Codigo+"</td>"
				+"<td><input type=\"text\" class=\"form-control\" placeholder=\"Digite o nome...\" value='"+res.resposta[0].Nome+"'></td>"
				+"<td id='instituicao'>"+res.resposta[0].Instituicao+"</td>"
				+"<td><input type=\"text\" class=\"form-control\" placeholder=\"Digite forma...\" value='"+res.resposta[0].forma+"'></td>"
				+"<td><input type=\"text\" class=\"form-control\" placeholder=\"Digite a sigla...\" value='"+res.resposta[0].Sigla+"'></td>";
			if($("#ehProf").val() == "true"){
				linha += "<td>"+"<span class='btn' onclick='alterar(this);'>ALTERAR</span>"+"<span class='btn' onclick='location.reload();'>CANCELAR</span>"+"</td>"
				+"<td onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>";
			}

			//altero a linha
			$(obj).parent().html(linha);
			//ajustar todos os botoes alterar
			for (var i = 0; i < $(".alterar").length; i++) {
				$($(".alterar")[i]).attr("onclick","alert('Uma alteração já esta sendo feita!')");
			}
			ajustarInstituicao();
		} else {
			alert(res.resposta);
		}
	});
}

//serve para escrever o nome da instituicao em vez do codigo na tela no select na hora de alterar
function ajustarInstituicao(){
	var url = "../../../Controller/InstituicaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var id = $("#instituicao").html();
			var select = "<select class='form-control'>";
			for (var i = 0; i < res.resposta.length; i++) {
				if(res.resposta[i].Sigla == id){
					select += "<option value='"+res.resposta[i].Sigla+"' selected>"+res.resposta[i].Nome +"</option>";
				}
				else{
					select += "<option value='"+res.resposta[i].Sigla+"'>"+res.resposta[i].Nome +"</option>";
				}
			}
			select += "</select>";
			$("#instituicao").html(select);
		} else {
			alert(res.resposta);
		}
	});
}

//altera no banco de dados
function alterar(obj){
	var tds = $(obj).parent().parent().find("td");

	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'atualizar',
		codigo: $(tds[0]).html(),
		nome: $(tds[1]).find("input").val(),
		instituicao: $(tds[2]).find("select").val(),
		forma: $(tds[3]).find("input").val(),
		sigla: $(tds[4]).find("input").val()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Curso alterado com sucesso!");
			location.reload();
		} else {
			alert(res.resposta);
		}
	});
}

//redireciona para adicionar o curso
function add(){
	window.location.replace("telaCadastroCurso.php");
}
