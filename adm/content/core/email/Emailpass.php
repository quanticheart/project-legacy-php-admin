
<?php

include_once "../connect/conexao.php";

$recebeEmail  = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$confereEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_MAGIC_QUOTES);

if (empty($recebeEmail)) {
 session_start();
 $_SESSION['msg_warning'] = "Digite um email valido";
 header("Location: {$_SERVER['HTTP_REFERER']}");
 return false;
}

elseif ($recebeEmail != $confereEmail) {
 session_start();
 $_SESSION['msg_warning'] = "Digite um email valido";
 header("Location: {$_SERVER['HTTP_REFERER']}");
 return false;
} else {

$consultaInformacoes = mysqli_query($conecta, "SELECT nome, fotouser FROM usuario WHERE email = '$confereEmail' AND ativo = 's'") or die (mysqli_error());
$verificaInformacoes = mysqli_num_rows($consultaInformacoes);

//Aqui vou verificar se houve resultado positivo na pesquisa
if($verificaInformacoes == 1){

//pega os dados para mandar para o email
  while ($linha=mysqli_fetch_array($consultaInformacoes)) {
    $foto = $linha["fotouser"];
    $nome = $linha["nome"];

//cria meu email
$codigo = base64_encode($recebeEmail);//variavel seta o codigo para mudar os dados
$data_fim = date('Y-m-d H:i:s', strtotime('+200 minutes'));//variavel seta o tempo de duação para mudar os dados
$headers = "Content-type:text/html; charset=utf-8";

$destino = $recebeEmail;
$de = utf8_decode("Recupera dados - Administrativo CasaCerta");
$assunto = "solicitou a troca da senha?";

include_once ("mail/htmlsenha.php");
include_once ("mail/Email.php");

$codigo_seleciona = mysqli_query($conecta, "SELECT * FROM codigo_email WHERE codigo = '$codigo' AND tipo = 'senha' ")or die (mysqli_error());

if (mysqli_num_rows($codigo_seleciona) == 1){
	 session_start();
	 
$codigo = mysqli_query($conecta,"UPDATE codigo_email SET data = '$data_fim' , tipo = 'senha' WHERE codigo = '$codigo' ")or die (mysqli_error());
if ($codigo == true){
     $mail->Send($headers, $destino, $html );
     $_SESSION['msg_success'] = "Um E-mail foi mandado para <strong>$recebeEmail</strong>, tera 20 minutos para cadastrar uma nova senha. caso o E-mail nao entre na sua caixa de entrada, olhe no SPAN.";
     header("Location: {$_SERVER['HTTP_REFERER']}");
     }
     else{
     $_SESSION['msg_danger'] = "Erro ao cadastrar";
     header("Location: {$_SERVER['HTTP_REFERER']}");
     }
} else {

//cria meu codigo de email e set o tempo de troca de senha
$codigo = mysqli_query($conecta,"INSERT INTO codigo_email SET codigo = '$codigo' , data = '$data_fim' , tipo = 'senha' ")or die (mysqli_error());
 session_start();
if ($codigo == true){
     $mail->Send($headers, $destino, $html );
     $_SESSION['msg_success'] = "Um E-mail foi mandado para <strong>$recebeEmail</strong>, tera 20 minutos para cadastrar uma nova senha. caso o E-mail nao entre na sua caixa de entrada, olhe no SPAN.";
     header("Location: {$_SERVER['HTTP_REFERER']}");
     }
     else{
     $_SESSION['msg_danger'] = "Erro ao cadastrar";
     header("Location: {$_SERVER['HTTP_REFERER']}");
     }
}

}}


else {
//Se nenhuma das confirmações acima foram efetuadas, mais uma vez, retorno uma mensagem de erro ao usuário.
session_start();
$_SESSION['msg_warning'] = "Email nao esta cadastrado ou usuario bloqueado";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}

}
?>
