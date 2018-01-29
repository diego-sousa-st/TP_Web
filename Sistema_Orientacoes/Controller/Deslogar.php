<?php
session_start();
session_destroy();

?>
<script type="text/javascript">
	localStorage.setItem("saiu", "<?= date("Y-m-d H:i:s") ?>");
	window.location.replace("../View/html5-boilerplate_v6.0.1/");

	$(document).ready(function () {
		//carrega informacoes
		enviarLog();
	});

	function enviarLog(){
		var url = "../../../Controller/ProfessorController.php";
		var id = localStorage.getItem("id");
		if(localStorage.getItem("id") == ""){
			url = "../../../Controller/AlunoController.php";
			id = localStorage.getItem("matricula")
		}

		//informacoes passadas para a url
		var req = {
			acao: 'salvarLog',
			id: id
		};
		$.post(url, req, function (data) {
			var res = JSON.parse(data);
			if (res.status) {//deu certo
					localStorage.setItem("id", "");
					localStorage.setItem("matricula", "");
					localStorage.setItem("entrou", "");
					localStorage.setItem("saiu", "");
			} else {
				alert(res.resposta);
			}
		});
	}


</script>
