<?php
ini_set( 'default_charset', 'utf-8');
require_once 'inc/config.php';
 ?>
<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="pt-br"><![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="pt-br"><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="pt-br"><![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="pt-br">
<!--<![endif]-->
<head>
<meta charset="utf-8">

    <meta name="description" content="Comunicação Social nas Igrejas ">
    <meta name="keywords" content="Estratégias, Endomarketing, Marketing Digital, Debates, Redes Sociais, twitter, facebook">
    <meta name="author" content="Léo Artes - Comunicação & Web">
    <meta name="generator" content="HTML5">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Chrome Frame for IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Fórum de Marketing Evangélico</title>
<link href="css/estilos.css" rel="stylesheet" type="text/css" media="all">
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="<?php echo URL_BASE ;?>css/overcast/jquery-ui-1.10.1.custom.css" rel="stylesheet" type="text/css">

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap-tooltip.js"></script>
<script src="<?php echo URL_BASE ;?>js/jquery-ui-1.10.1.custom.js"></script>

<!-- Favicon: Browser + iPhone Webclip -->
<link rel="shortcut icon" href="<?php echo URL_BASE ;?>imagens/favicon.ico" />
<link rel="apple-touch-icon" href="<?php echo URL_BASE ;?>imagens/iphone.png" />
</head>

<body>
<div id="wrap">
<div class="container">
    <div class="row-fluid">
    <nav>
        <div class="navbar navbar-fixed-top">
          <div class="navbar-inner">
            <div class="container">
              <!-- .btn-navbar é usado como alternador para conteúdo de barra de navegação colapsável -->
              <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </a>

              <!-- Tenha certeza de deixar a marca se você quer que ela seja mostrada
              <a class="brand" href="#">Home</a> -->

              <!-- Tudo que você queira escondido em 940px ou menos, coloque aqui -->
              <div class="nav-collapse collapse">
                <!-- .nav, .navbar-search, .navbar-form, etc -->

                <ul class="nav">
                  <li class="active">
                    <a href="index.php">Home</a>
                  </li>
                  <li><a href="?p=sobre-o-evento">Sobre o Evento</a></li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      Programação
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                       <li><a href="?p=palestrantes">Palestrantes</a></li>
                       <li><a href="#">Agenda do Evento</a></li>
                    </ul>
                  </li>
                  <li><a href="?p=inscricoes">Inscrições</a></li>
                  <li><a data-toggle="modal" href="#myModal" >Login</a></li>
                  <li><a href="?p=contato">Contato</a></li>
                  <li><a href="?p=comochegar">Como Chegar</a></li>
                </ul>

              </div> <!-- nav-collapse collapse -->

            </div> <!-- container -->
          </div> <!-- navbar-inner -->
        </div> <!-- navbar -->
    </nav> <!-- nav -->

<div class="modal hide" id="myModal">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">x</button>
    <h3>Area do Participante</h3>
  </div>
  <div class="modal-body ">
        <?php if(!empty($mensagem)) {echo $mensagem; } ?>
        <form method="POST" action="login.php" accept-charset="UTF-8" >
      <p><label class="control-label" for="inputIcon">Email</label>
          <input type="text" class="span4" name="email" id="email" placeholder="Email"></p>
      <p>
          <label class="control-label" for="inputIcon">Senha</label>
          <input type="password" class="span4" name="senha" placeholder="Senha"></p>

      <p><button type="submit" class="btn btn-primary">Entrar</button>
          <input name="entrar" type="hidden" id="entrar">
        <a href="#">Esqueceu a Senha?</a>
      </p>
    </form>
  </div>
  <div class="modal-footer">
    Já fez sua inscrição?
    <a href="?p=inscricoes" class="btn btn-primary">Inscrição</a>
  </div>
</div>

    <header>
    	<div class="span5 text-center">
        <img src="imagens/logo.png" alt="Logo Herança Camp">
        <h2>Comunicação Social nas Igrejas</h2>
        <p>Estratégias :: Endomarketing :: Marketing Digital :: Debates <br> Redes Sociais</p>
      </div>

        <div class="span6 text-center pull-right">
        <img src="imagens/data_evento.png" alt="Data do Evento">
        <img src="imagens/investimento.png" alt="Investimento">
<div class="btn-group">
        <a class="btn btn-success btn-large" href="?p=inscricoes"><i class="icon-ok-sign"></i> Inscreva-se</a>
        <h4>Parcelado em até 12 vezes</h4>
      	</div>
        <div>
                  <small>Inclui: Pasta de apoio, água, café da manhã, almoço,
coffee break, <br>PDF das apresentações e certificado digital.</small>
           </div>
        </div> <!-- span6 -->
        <div class="span11 alert alert-info text-center">
           <a href="?p=comochegar"><h3>LOCAL: Rua Coronel Magalhães, 67 - Cascadura - Rio de Janeiro - RJ</h3></a>
        </div>
    </header> <!-- header -->

</div> <!-- row-fuid -->
<hr>

<div class="row-fuid">

<?php
    if(isset($_GET['p']))
    {
        include ($_GET['p'] . ".php");

    }else{
        include 'home.php';
}
?>

</div><!-- #row-fuid -->

  <div class="row">
  	<div class="span12 text-center">  </div>
  </div>

</div> <!-- container -->

<div id="push"></div>
</div><!-- warp -->

<div id="footer">
<footer class="container">
  <hr>
<div class="span6">Todos os diretos reservados - <a href="<?php echo URL_BASE; ?>admin/" target="_blank">2013</a> | Crente que faz Marketing</div>

<div class="span2 pull-right">
<a href="http://www.leoartes.com.br" target="_blank" title="Léo Artes - Comunicação & Web"><img src="imagens/logo_leo.png" alt="Léo Artes - Comunicação &amp; Web"></a> </div>

</footer>
</div> <!-- #footer -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=218641128196044";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>