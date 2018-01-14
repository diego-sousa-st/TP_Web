<link rel="stylesheet" href="./css/carrousel.css">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- indicadores -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
    <div class="item active">
        <img class="first-slide" src="./img/img1.jpg" alt="Imagen pesquisa 1">
        <div class="container">
        <div class="carousel-caption">
            <h1>Pesquisa</h1>
            <p>Seja mais um membro do nosso site de pesquisa e orientações!</p>
            <p><a class="btn btn-lg btn-primary" href="./pags/telaCadastroAluno.php" role="button">Cadastre-se agora</a></p>
        </div>
        </div>
    </div>
    <div class="item">
        <img class="second-slide" src="./img/img2.png" alt="Imagem Pesquisa 2">
        <div class="container">
        <div class="carousel-caption">
            <h1>Produza mais!</h1>
            <p>Nosso site oferece uma plataforma completa para gerenciamento de pesquisa</p>
            <p><a class="btn btn-lg btn-success" href="./pags/telaLoginAluno.php" role="button">Faça Login</a></p>
        </div>
        </div>
    </div>
    <div class="item">
        <img class="third-slide" src="./img/img3.jpg" alt="Imagem Pesquisa 3">
        <div class="container">
        <div class="carousel-caption">
            <h1>Faça integração com o Lattes!</h1>
            <p>Integre sua plataforma de gerenciamento de pesquisa com o sistema Lattes!</p>
            <p><a class="btn btn-lg btn-warning" href="http://lattes.cnpq.br/" role="button" target="_blank">Veja mais!</a></p>
        </div>
        </div>
    </div>
    </div>
    <!-- setas -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Anterior</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Próximo</span>
    </a>
</div>