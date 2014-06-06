<?php session_start(); ?>
<?php ini_set( 'default_charset', 'utf-8'); ?>
<?php
include_once '../admin/inc/config.php';
include_once '../admin/inc/servidor.php';
?>

<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Google Chrome Frame for IE -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Fórum de Marketing Evangélico</title>
<!-- Bootstrap -->
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
<link href="bootstrap/estilo.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo URL_BASE ;?>css/overcast/jquery-ui-1.10.1.custom.css" rel="stylesheet" type="text/css">

<script src="http://code.jquery.com/jquery-latest.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo URL_BASE ;?>js/jquery-ui-1.10.1.custom.js"></script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({
		dateFormat: 'dd/mm/yy',
        changeMonth: true,
        changeYear: true,
		dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
        dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
        monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
		});
  });

$(document).ready(function(){
    $("#cep").blur(function(e){
        if($.trim($("#cep").val()) != ""){
            $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
                if(resultadoCEP["resultado"]){
                    $("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+": "+unescape(resultadoCEP["logradouro"]));
                    $("#bairro").val(unescape(resultadoCEP["bairro"]));
                    $("#cidade").val(unescape(resultadoCEP["cidade"]));
                    $("#estado").val(unescape(resultadoCEP["uf"]));
                }else{
                    alert("Não foi possivel encontrar o endereço");
                }
            });
        }
    })
});
  </script>
</head>

<body>
<div class="container">
  <nav>
        <div class="navbar navbar-inverse nav">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="/">Adminstra&ccedil;&atilde;o</a>

                    <div class="nav-collapse collapse">
                      <ul class="nav">
                          <li class="divider-vertical"></li>
                          <li><a href="index2.php"><i class="icon-home icon-white"></i> In&iacute;cio</a></li>

                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="icon-user icon-white"></i> Participantes
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
	               <li><a href="?p=inscricoes">Inscrever Participante</a></li>
                       <li><a href="?p=listarparticipantes">Listar Participantes</a></li>
                       <li><a href="?p=confirma_pagamento">Confirmar Pagamento</a></li>
                    </ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="icon-list-alt icon-white"></i> Relat&oacute;rios
                      <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                       <li><a href="#">Parcicipantes Pagos</a></li>
                       <li><a href="#">Formas de Pagamento</a></li>
                       <li><a href="#">Pagamentos confirmados</a></li>
                    </ul>
                  </li>
                      </ul>
                      <div class="pull-right">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Seja Bem-vindo,
                            <?php if(isset($_SESSION['SSnome'])) {?>
                             <?php echo $_SESSION['SSnome']; }?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="/user/preferences"><i class="icon-cog"></i> Preferences</a></li>
                                    <li><a href="/help/support"><i class="icon-user"></i> Usu&aacute;rios</a></li>
                                    <li><a href="/help/support"><i class="icon-envelope"></i> Contactar o Suporte</a></li>
                                    <li class="divider"></li>
                                    <li><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </nav> <!-- nav -->

<div class="row-fuid">

<?php
    if(isset($_GET['p']))
    {
        include ($_GET['p'] . ".php");

    }else{
        include 'principal.php';
}
?>

</div><!-- #container -->


</div> <!-- container-->

</body>
</html>