<?php
include ("class.phpmailer.php");
$mail = new PHPMailer();// Inicia a classe PHPMailer

// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->SMTPAuth = true; // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML

$mail->Host = "smtp.gmail.com"; // Endereço do servidor SMTP (caso queira utilizar a autenticação, utilize o host smtp.seudomínio.com.br)
$mail->Port = 465;
$mail->Username = ("quantichearttestes@gmail.com");
$mail->Password = ("qQ@20152015");

$mail->SMTPSecure = "ssl";
$mail->Mailer = ("mail");

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Sender = "quanticteste@quanticheart.96.lt"; // Seu e-mail
$mail->From = utf8_decode("quanticteste@quanticheart.96.lt"); // Seu e-mail
$mail->FromName = utf8_decode($de); // Seu nome


$mail->Subject = utf8_decode($assunto);
$mail->Body = utf8_decode($html);
$mail->AddAddress ($destino);

$mail->AddReplyTo("$email","$nome");
$mail->Wordwrap = 50;
//$mail->Addbcc ($para);
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
//$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo

 ?>
