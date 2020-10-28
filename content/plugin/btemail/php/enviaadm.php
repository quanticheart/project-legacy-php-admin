<?php 
include "../../../core/connect/conexao.php";

if (isset($_POST['BTEnvia'])){
 
    $msg      = false;
	$id       = (int)rand(1000000, 9999999);
	$nome     = htmlspecialchars($_POST['nome']);
	$snome    = htmlspecialchars($_POST['snome']);
	$telefone = htmlspecialchars($_POST['telefone']);
	$email    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$estado   = htmlspecialchars($_POST['estado']);
 	
 	$msg      = htmlspecialchars($_POST['mensagem']);
 	$ip       = ($_SERVER['REMOTE_ADDR']);
    $data     = date('d/m/Y');
    $hora     = date('H:i:s');
	$cod      = base64_encode($email);

	

$insereDados = mysqli_query($conecta, "INSERT INTO contato_adm (id, nome, snome, telefone, email, estado, ip, data, hora, msg, ativo, cod) VALUES ('$id', '$nome', '$snome', '$telefone', '$email', '$estado', '$ip', '$data', '$hora', '$msg', 's', '$cod' )") or die (mysqli_error());


include_once ("../email/Email_adm.php");

	
if($mail=true){

session_start();
$_SESSION['msg_success'] = "<strong>$nome</strong>, seu e-mail foi enviado com <strong>sucesso!</strong>, em um prazo de no máximo 24horas, nossa equipe entrara em contato com você.";
header("Location: {$_SERVER['HTTP_REFERER']}"); 
	 }
	 else{
	     session_start();
		 $_SESSION['msg_danger'] = "Erro ao Enviar e-mail";
         header("Location: {$_SERVER['HTTP_REFERER']}"); 
	 }
	
	
}

	?>