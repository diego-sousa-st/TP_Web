$(document).ready(function () {
	//carrega informacoes
	constroeCanvas();
});

function constroeCanvas(){
	//cada 30px, 1 pesquisa

	var url = "../../../Controller/PesquisaController.php";
	//informacoes passadas para a url
	var req = {
		acao: 'getGrafico'
	};
	$.post(url, req, function (data) {
		var res = JSON.parse(data);
		if (res.status) {//deu certo
			var c = document.getElementById("canvas");

			var ctx = c.getContext("2d");
			var x = 0;
			var y = 300;
			ctx.moveTo(x,y);//ponto inicial
			ctx.font="20px Georgia";
			for(var i = 0; i < res.resposta.length; i++){
				ctx.moveTo(x,y-20);
				ctx.lineTo(x,y-20-30*res.resposta[i].qnt);

				ctx.moveTo(x,y-20-30*res.resposta[i].qnt);
				ctx.lineTo(x+30,y-20-30*res.resposta[i].qnt);

				ctx.fillText("["+res.resposta[i].qnt+"]",x,y-25-30*res.resposta[i].qnt);

				ctx.moveTo(x+30,y-20-30*res.resposta[i].qnt);
				ctx.lineTo(x+30,y-20);

				ctx.moveTo(x,y);
				ctx.fillText("["+res.resposta[i].Nome+"]",x,y);
				x += 320;
				ctx.moveTo(x,0);
			}
			ctx.stroke();//desenha
		} else {
			alert(res.resposta);
		}
	});


}
