<!DOCTYPE html>
<html lang="pt-br" class="no-js">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="Sistema de Gerenciamento de Orientações, Pesquisa etc.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="apple-touch-icon" href="../icon.png">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <!-- Place favicon.ico in the root directory-->
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/main.css">
    <!-- meu css-->
    <link rel="stylesheet" href="../css/style.css">
    <!-- css bootsrap-->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- carregamento modernizr-3-->
    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <title>Sobre Nós</title>
    <script src="../js/canvas.js"></script>
  </head>
  <body>
    <!-- barra de navegação-->
    <!-- nav-tabs-->
    <!-- navbar-default,  etc-->
    <nav class="navbar navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#barra-navegacao" class="navbar-toggle collapsed"><span class="sr-only">Alternar Menu</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="../index.php" class="navbar-brand">Sistema de Orientações e Pesquisa - DN System</a>
        </div>
        <div id="barra-navegacao" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="../pags/telaPerfil.php">Visualizar Perfil</a></li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Cadastrar<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="../pags/telaCadastroPesquisa.php">Pesquisa</a></li>
                <li><a href="../pags/telaCadastroCurso.php">Curso</a></li>
                <li><a href="../pags/telaCadastroInstituicao.php">Instituição</a></li>
                <li><a href="../pags/telaCadastroOrientacao.php">Orientação</a></li>
              </ul>
            </li>
            <li><a href="../../../Controller/ListarCursos.php">Listar Cursos</a></li>
            <li><a href="./galeriaVideos.php">Vídeos</a></li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Opções<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="https://sig.ufla.br" target="_blank">SIG Ufla</a></li>
                <li><a href="../pags/sobreNos.php">Sobre nós</a></li>
                <li><a href="../../../Controller/DeslogarAluno.php">Deslogar</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="row col-md-12">
        <canvas id="canvas0" class="canvas"></canvas>
        <canvas id="canvas1" class="canvas"></canvas>
        <canvas id="canvas2" class="canvas"></canvas>
      </div>
      <div class="row col-md-12 text-center bg-warning shadowed-box bordered rounded">
        <h3>Os desenvolvedores que fazem parte deste projeto são:</h3>
        <div class="row perfil-about">
          <h4>Diego Sousa</h4><img src="../img/diego.jpg" alt="Imagem do Desenvolvedor Diego Sousa" class="img-circle img-about">
          <section>
            <article>Apaixonado por rock e heavy metal, amante de música, está agora aprendendo a gostar de café.</article>Começou a carreira em desenvolvimento em 2015 e atualmente está atuando como trainee na GT4W.
          </section>
        </div>
        <div class="row perfil-about">
          <h4>Nechelley Alves</h4><img src="../img/nechelley.jpg" alt="Imagem do Desenvoldedor Nechelley Alves" class="img-circle img-about">
          <section>
            <article>Amante de música, fissurado por otimizações de código mas ainda não aprendeu a gostar de café.</article>Começou a carreira em desenvolvimento em 2015 e atualmente está atuando como trainee na Technolog.
          </section>
        </div>
      </div>
    </div>
    <footer class="row rodape footer">
      <div class="col-md-12">Desenvolvido por Diego Sousa e Nechelley Alves - © 2018.</div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../js/vendor/jquery-3.2.1.min.js"><\\/script>')</script>
    <script src="../js/plugins.js"></script>
    <script src="../js/main.js"></script>
    <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID.-->
    <script>
      window.ga=function(){ga.q.push(arguments)};ga.q=[];ga.l=+new Date;
      ga('create','UA-XXXXX-Y','auto');ga('send','pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async="" defer=""></script>
    <!-- jquery que usei com boostrap-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed-->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>