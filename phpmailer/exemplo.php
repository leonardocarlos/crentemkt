<?php
require_once("class.phpmailer.php"); //caminho do arquivo da classe do phpmailer

$mail = new PHPMailer();
$mail->IsSMTP(); // send via SMTP
$mail->Host = "mail.seudominio"; //seu servidor SMTP
$mail->SMTPAuth = true; // 'true' para autentica��o
$mail->Username = "usuario@seudominio"; // usu�rio de SMTP
$mail->Password = "senhaxx"; // senha de SMTP
$mail->From = "de@seudominio";
//coloque aqui o seu correio, para que a autentica��o n�o barre a mensagem
$mail->FromName = "remetente";
$mail->AddAddress("email@destinatario","Nome do Destinatario ");
$mail->AddAddress("email@destinatario"); // (opcional) s� o envio pelo email
$mail->AddReplyTo("email@destinatario.copia","Nome do Destinatario para quem ira a resposta");
//aqui voc� coloca o endere�o de quem est� enviando a mensagem pela sua p�gina
$mail->WordWrap = 50; // Defini��o de quebra de linha
$mail->IsHTML(true); // envio como HTML se 'true'
$mail->Subject = "Assunto da mensagem ";
$mail->Body = "Conte�do da mensagem HTML ";
$mail->AltBody = "Para mensagens somente texto";
//Verifica se o e-mail foi enviado
if(!$mail->Send())
{
    echo "Mensagem n�o enviada<br />";
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Mensagem enviada";
}
?>