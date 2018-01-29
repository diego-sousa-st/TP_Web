$(document).ready(function () {
	//carrega informacoes
	getOrientacoes();
});

//manda ajax assim q a pagina carregar para pegar as informacoes
function getOrientacoes(){
	var url = "../../../Controller/OrientacaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for(var i = 0; i < res.resposta.length; i++){
				var cancelado = res.resposta[i].Cancelado;
				if(cancelado == "")
					cancelado = "N";

				var linha = "<tr>"
					+"<td class='id'>"+res.resposta[i].ID+"</td>"
					+"<td class='professores'>"+res.resposta[i].Professor+"</td>"
					+"<td class='alunos'>"+res.resposta[i].Aluno+"</td>"
					+"<td>"+res.resposta[i].Tipo+"</td>"
					+"<td>"+res.resposta[i].Tema+"</td>"
					+"<td>"+res.resposta[i].Inicio+"</td>"
					+"<td>"+res.resposta[i].Fim+"</td>"
					+"<td>"+cancelado+"</td>";
				if($("#ehProf").val() == "true"){
					linha += "<td class='alterar' onclick='permitirAlterar(this);'>"+"<span class='btn'>ALTERAR</span>"+"</td>"
					+"<td onclick='remover(this);'>"+"<span class='btn'>EXCLUIR</span>"+"</td>"
					+"</tr>";
				}

				$("tbody").append(linha);
			}
			ajustarProfessores();
			ajustarAlunos();
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
function ajustarAlunos(){
	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			for (var i = 0; i < $(".alunos").length; i++) {
				var html = $($(".alunos")[i]).html().trim();
				for (var j = 0; j < res.resposta.length; j++) {
					if(res.resposta[j].Matricula == html){
						$($(".alunos")[i]).html(res.resposta[j].Nome)
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
		var url = "../../../Controller/OrientacaoController.php";
		//informacoes passadas para a url
		var req = {
			acao: 'remover',
			id: $(obj).parent().find(".id").html()
		};
		$.post(url, req, function (data) {
			var res = JSON.parse(data);
			if (res.status) {//deu certo
				alert("Orientação excluída com sucesso!");
				$(obj).parent().remove();
			} else {
				alert(res.resposta);
			}
		});
	}
}

//abre os campos da linha permitindo a edicao
function permitirAlterar(obj){
	var url = "../../../Controller/OrientacaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'get',
		id: $(obj).parent().find(".id").html()
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var tipos = ["TCC","TCC-EST","EST","MONITORIA","IC","TCC-POS"];
			var tipo = "<select class=\"form-control\">";
			for (var i = 0; i < tipos.length; i++) {
				if(tipos[i] == res.resposta[0].Tipo)
					tipo += "<option value='"+tipos[i]+"' selected>"+tipos[i]+"</option>";
				else
					tipo += "<option value='"+tipos[i]+"'>"+tipos[i]+"</option>";
			}
			tipo += "</select>";

			var cancelado = "<select class=\"form-control\">";
			if(res.resposta[0].Cancelado == "S"){
				cancelado += "<option value=\"S\" selected>Sim</option>"
	  				+"<option value=\"N\">Não</option>";
			}else{
				cancelado += "<option value=\"S\">Sim</option>"
	  				+"<option value=\"N\" selected>Não</option>";
			}
			cancelado += "</select>";

			var linha = "<td class='id'>"+res.resposta[0].ID+"</td>"
				+"<td data-id='"+res.resposta[0].Professor+"'>"+$(obj).parent().parent().find(".professores").html()+"</td>"
				+"<td id='aluno'>"+res.resposta[0].Aluno+"</td>"
				+"<td>"+tipo+"</td>"
				+"<td><input type=\"text\" class=\"form-control\" placeholder=\"Digite o tema...\" value='"+res.resposta[0].Tema+"'></td>"
				+"<td><input type=\"number\" class=\"form-control\" placeholder=\"Digite o inicio...\" value='"+res.resposta[0].Inicio+"'></td>"
				+"<td><input type=\"number\" class=\"form-control\" placeholder=\"Digite o fim...\" value='"+res.resposta[0].Fim+"'></td>"
				+"<td>"+cancelado+"</td>";
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
			ajustarAluno();
		} else {
			alert(res.resposta);
		}
	});
}

//serve para escrever o nome da instituicao em vez do codigo na tela no select na hora de alterar
function ajustarAluno(){
	var url = "../../../Controller/AlunoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getAll'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var id = $("#aluno").html();
			var select = "<select class='form-control'>";
			for (var i = 0; i < res.resposta.length; i++) {
				if(res.resposta[i].Matricula == id){
					select += "<option value='"+res.resposta[i].Matricula+"' selected>"+res.resposta[i].Nome +"</option>";
				}
				else{
					select += "<option value='"+res.resposta[i].Matricula+"'>"+res.resposta[i].Nome +"</option>";
				}
			}
			select += "</select>";
			$("#aluno").html(select);
		} else {
			alert(res.resposta);
		}
	});
}

//altera no banco de dados
function alterar(obj){
	var tds = $(obj).parent().parent().find("td");

	var url = "../../../Controller/OrientacaoController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'atualizar',
		id: $(tds[0]).html(),
		professor: $(tds[1]).attr("data-id"),
		aluno: $(tds[2]).find("select").val(),
		tipo: $(tds[3]).find("select").val(),
		tema: $(tds[4]).find("input").val(),
		inicio: $(tds[5]).find("input").val(),
		fim: $(tds[6]).find("input").val(),
		cancelado: $(tds[7]).find("select").val(),
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			alert("Orientação alterada com sucesso!");
			location.reload();
		} else {
			alert(res.resposta);
		}
	});
}

//redireciona para adicionar o curso
function add(){
	window.location.replace("telaCadastroOrientacao.php");
}
