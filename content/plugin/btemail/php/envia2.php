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
 	$cidade   = htmlspecialchars($_POST['cidade']);
 	$msg      = htmlspecialchars($_POST['mensagem']);
 	$ip       = ($_SERVER['REMOTE_ADDR']);
    $data     = date('d/m/Y');
    $hora     = date('H:i:s');
	$cod      = base64_encode($email);
	
$consultaBanco = mysqli_query($conecta, "SELECT * FROM contato WHERE email = '$email'") or die (mysqli_error($consultaBanco));
$verificaBanco = mysqli_num_rows($consultaBanco);
if($verificaBanco == 0){
$insereDados = mysqli_query($conecta, "INSERT INTO contato (id, nome, snome, telefone, email, estado, cidade, ip, data, hora, msg, ativo, cod) VALUES ('$id', '$nome', '$snome', '$telefone', '$email', '$estado', '$cidade', '$ip', '$data', '$hora', '$msg', 's', '$cod' )") or die (mysqli_error());
} 

$consultaBanco = mysqli_query($conecta, "SELECT * FROM contato WHERE email = '$email' AND ativo = 'n'") or die (mysqli_error($consultaBanco));
$verificaBanco = mysqli_num_rows($consultaBanco);
if($verificaBanco == 1){
$insereDados = mysqli_query($conecta, "update contato SET ativo = 's' where email = '$email'") or die (mysqli_error());
} 	
    include_once ("../email/Email.php");
    include_once ("../email/Email_c.php");
	
if($mail=true){
$consultaBanco = mysqli_query($conecta, "SELECT id FROM contato WHERE email = '$email'") or die (mysqli_error($consultaBanco));
while ($linha=mysqli_fetch_array($consultaBanco)){
$id_f        = $linha["id"];
$id_msg      = (int)rand(1000000, 9999999);
$insereDados = mysqli_query($conecta, "INSERT INTO msg (id_msg, id, nome, snome, telefone, email, estado, cidade, ip, data, hora, msg) VALUES ('$id_msg', '$id_f', '$nome', '$snome', '$telefone', '$email', '$estado', '$cidade', '$ip', '$data', '$hora', '$msg' )") or die (mysqli_error());
}
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