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
					+"<td class='alterar' onclick='permitirAlterar(this);'>"+"<span class='btn'>ALTERAR</span>"+"</td>"
					+"<td onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>"
					+"</tr>";
				$("tbody").append(linha);
			}
			ajustarCursos();
		} else {
			alert(res.resposta);
		}
	});
}

//pega os cursos e coloca no sleect na hora de alterar
function getCursos(codigo){
	var url = "../../../Controller/CursoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var options = "<select class=\"form-control\" name=\"curso\">";
			for (var i = 0; i < res.resposta.length; i++) {
				if(codigo == res.resposta[i].Codigo)
					options += "<option value='"+res.resposta[i].Codigo+"' selected>"+res.resposta[i].Nome+"</option>"
				else
					options += "<option value='"+res.resposta[i].Codigo+"'>"+res.resposta[i].Nome+"</option>"
			}
			options += "</select>";
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

//abre os campos da linha permitindo a edicao
function permitirAlterar(obj){
	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		matricula: $(obj).parent().find(".matricula").html()
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

			var cra = res.resposta[0].CRA;
			if(res.resposta[0].CRA == null)
				cra = "";

			var linha = "<td class='matricula'>"+res.resposta[0].Matricula+"</td>"
				+"<td><input type=\"text\" class=\"form-control\" name=\"nome\" placeholder=\"Digite seu nome...\" value='"+res.resposta[0].Nome+"'></td>"
				+"<td><input type=\"text\" class=\"form-control\" name=\"cidade\" placeholder=\"Digite o nome da sua cidade...\" value='"+res.resposta[0].Cidade+"'></td>"
				+"<td><select name=\"uf\" class=\"form-control\">"
					+optionsHTML
				+"</select>"
				+"<td><input type=\"number\" class=\"form-control\" name=\"cra\" placeholder=\"Digite o seu cra...\" min=\"0\" max=\"100\" value='"+cra+"'></td>"
				+"<td id='curso'>"+res.resposta[0].Curso+"</td>"
				+"<td>"+"<span class='btn' onclick='alterar(this);'>ALTERAR</span>"+"<span class='btn' onclick='location.reload();'>CANCELAR</span>"+"</td>"
				+"<td onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>";

			//altero a linha
			$(obj).parent().html(linha);
			//add select
			getCursos(res.resposta[0].Curso);
			//ajustar todos os botoes alterar
			for (var i = 0; i < $(".alterar").length; i++) {
				$($(".alterar")[i]).attr("onclick","alert('Uma alteração já esta sendo feita!')")
			}
		} else {
			alert(res.resposta);
		}
	});
}

//altera no banco de dados
function alterar(obj){
	var tds = $(obj).parent().parent().find("td");

	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'atualizarNaTabela',
		matricula: $(tds[0]).html(),
		nome: $(tds[1]).find("input").val(),
		cidade: $(tds[2]).find("input").val(),
		uf: $(tds[3]).find("select").val(),
		curso: $(tds[5]).find("select").val(),
		cra: $(tds[4]).find("input").val()
	};
	alert(JSON.stringify(req));
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Aluno alterado com sucesso!");
			location.reload();
		} else {
			alert(res.resposta);
		}
	});
}
