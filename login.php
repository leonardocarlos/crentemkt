<?php session_start(); ?>
<?php
include_once 'inc/config.php';
include_once 'inc/servidor.php';

if(isset($_POST['entrar'])){
    $email = HTMLSPECIALCHARS($_POST['email'], ENT_QUOTES);
    $senha = $_POST['senha'];
    $mensagem = '';
    $temLogin = consultaDados("select * from participante where email = '$email'");
    
    if(mysql_num_rows($temLogin)>0){
        $usuario = mysql_fetch_array($temLogin);
        if($usuario['senha'] == $senha){
          $_SESSION['SSusuario_id'] = $usuario['id'];
          $_SESSION['SSnome'] = $usuario['nome'];
          $_SESSION['SScpf'] = $usuario['cpf'];
          $_SESSION['SSdata_nascimento'] = $usuario['data_nascimento'];
          $_SESSION['SSsexo'] = $usuario['sexo'];
          $_SESSION['SStelefone'] = $usuario['telefone'];
          $_SESSION['SScelular'] = $usuario['celular'];
          $_SESSION['SScep'] = $usuario['cep'];
          $_SESSION['SSendereco'] = $usuario['endereco'];
          $_SESSION['SSnumero'] = $usuario['numero'];
          $_SESSION['SScomplemento'] = $usuario['complemento'];
          $_SESSION['SSbairro'] = $usuario['bairro'];
          $_SESSION['SScidade'] = $usuario['cidade'];
          $_SESSION['SSestado'] = $usuario['estado'];
          $_SESSION['SSarea_atuacao'] = $usuario['area_atuacao'];
          $_SESSION['SSigreja'] = $usuario['igreja'];
          $_SESSION['SSpastor'] = $usuario['pastor'];
          $_SESSION['SSemail'] = $usuario['email'];
          $_SESSION['SSsenha'] = $usuario['senha'];
          $_SESSION['SSid_transacao'] = $usuario['id_transacao'];
          
          $id_usuario = $usuario['id'];
            
            if(isset($_SESSION['SSpagina'])){
                header("Location: " . $_SESSION['SSpagina']);
           }else{
  /*    echo "<script>
        alert('Logado com Sucesso!');
        window.location.href ='" . URL_BASE . "index.php?p=painel_inscricoes';
        </script>"; */
               header('Location:'.URL_BASE.'painel_inscricoes.php');
// $sucesso = true;

                }
            }else{
                $mensagem .= "<div class='alert alert-error'>
                			<a class='close' data-dismiss='alert' href='#'>x</a>A Email está incorreto, tente novamente!
           					</div>";
            }
        }else{
            $mensagem .= "<div class='alert alert-error'>
                			<a class='close' data-dismiss='alert' href='#'>x</a>O nome de usuário informado não existe.!
           					</div>";
  }
  }				
?>