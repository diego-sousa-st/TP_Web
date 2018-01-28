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
			for(var i = 0; i < res.resposta.length; i++){
				var linha = "<tr>"
					+"<td class='sigla'>"+res.resposta[i].Sigla+"</td>"
					+"<td>"+res.resposta[i].Nome+"</td>"
					+"<td>"+res.resposta[i].Cidade+"</td>"
					+"<td>"+res.resposta[i].UF+"</td>"
					+"<td>"+res.resposta[i].Pais+"</td>";
				if($("#ehProf").val() == "true"){
					linha += "<td class='alterar' onclick='permitirAlterar(this);'>"+"<span class='btn'>ALTERAR</span>"+"</td>"
					+"<td onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>"
					+"</tr>";
				}

				$("tbody").append(linha);
			}

		} else {
			alert(res.resposta);
		}
	});
}

//removea linha e apaga do banco
function remover(obj){
	if(confirm("Tem certeza?")){
		var url = "../../../Controller/InstituicaoController.php";
		//informacoes passadas para a url
		var req = {
			acao: 'remover',
			sigla: $(obj).parent().find(".sigla").html()
		};
		$.post(url, req, function (data) {
			var res = JSON.parse(data);
			if (res.status) {//deu certo
				alert("Instituição excluida com sucesso!");
				$(obj).parent().remove();
			} else {
				alert(res.resposta);
			}
		});
	}
}

//abre os campos da linha permitindo a edicao
function permitirAlterar(obj){
	var url = "../../../Controller/InstituicaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		sigla: $(obj).parent().find(".sigla").html()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = ["MG","SP","ES","RJ"];
			var optionsHTML = "";
			for (var i = 0; i < options.length; i++) {
				if(options[i] == res.resposta[0].UF)
					optionsHTML += "<option value=\""+options[i]+"\" selected>"+options[i]+"</option>";
				else
					optionsHTML += "<option value=\""+options[i]+"\">"+options[i]+"</option>";
			}

			var linha = "<td class='sigla'>"+res.resposta[0].Sigla+"</td>"
				+"<td><input type=\"text\" class=\"form-control\" placeholder=\"Digite o nome...\" value='"+res.resposta[0].Nome+"'></td>"
				+"<td><input type=\"text\" class=\"form-control\" placeholder=\"Digite o nome da sua cidade...\" value='"+res.resposta[0].Cidade+"'></td>"
				+"<td><select class=\"form-control\">"
					+optionsHTML
				+"</select>"
				+"<td><input type=\"text\" class=\"form-control\" placeholder=\"Digite o pais...\" value='"+res.resposta[0].Pais+"'></td>";
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
		} else {
			alert(res.resposta);
		}
	});
}

//altera no banco de dados
function alterar(obj){
	var tds = $(obj).parent().parent().find("td");

	var url = "../../../Controller/InstituicaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'atualizar',
		sigla: $(tds[0]).html(),
		nome: $(tds[1]).find("input").val(),
		cidade: $(tds[2]).find("input").val(),
		uf: $(tds[3]).find("select").val(),
		pais: $(tds[4]).find("input").val()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Instituição alterada com sucesso!");
			location.reload();
		} else {
			alert(res.resposta);
		}
	});
}

//redireciona para adicionar a instituicao
function add(){
	window.location.replace("telaCadastroInstituicao.php");
}
