window.onload = init;

function init() {
	drawSorriso();
	drawBalao();
	writeText();
}

function drawBalao() {
	var canvas = document.getElementById('canvas1');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		// curva quadratica
		var y = -25;
		var x = -25;
		ctx.beginPath();
		ctx.moveTo(75+x, 25+y);
		ctx.quadraticCurveTo(25+x, 25+y, 25+x, 62.5+y);
		ctx.quadraticCurveTo(25+x, 100+y, 50+x, 100+y);
		ctx.quadraticCurveTo(50+x, 120+y, 30+x, 125+y);
		ctx.quadraticCurveTo(60+x, 120+y, 65+x, 100+y);
		ctx.quadraticCurveTo(125+x, 100+y, 125+x, 62.5+y);
		ctx.quadraticCurveTo(125+x, 25+y, 75+x, 25+y);
		ctx.stroke();
	}
}

function drawSorriso() {
	var canvas = document.getElementById('canvas0');
	if (canvas.getContext) {
		var ctx = canvas.getContext('2d');

		var x = 170;
		var y = 20;
		ctx.beginPath();
		ctx.arc(75+x, 75+y, 50, 0, Math.PI * 2, true); // circulo de fora
		ctx.moveTo(110+x, 75+y);
		ctx.arc(75+x, 75+y, 35, 0, Math.PI, false);  // Boca (sentido horário)
		ctx.moveTo(65+x, 65+y);
		ctx.arc(60+x, 65+y, 5, 0, Math.PI * 2, true);  // olha esquerdo
		ctx.moveTo(95+x, 65+y);
		ctx.arc(90+x, 65+y, 5, 0, Math.PI * 2, true);  // olho direito
		ctx.stroke();
	}
}
  
function writeText() {
	var c = document.getElementById("canvas2");
	var ctx = c.getContext("2d");
	ctx.font = "1.5em Arial";
	ctx.fillText("Quem são os programadores",10,50);
	ctx.fillText("por trás do sistema?",10,70);
	
}