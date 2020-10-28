<?php

include_once'../connect/conexao.php';

if(isset($_POST['entrar'])){
  
  $recebeNomeUsuario  = $_POST['nomeUsuario'];
  $confereNomeUsuario = $_POST['nomeUsuario'];
  $recebeSenha        = $_POST['senha'];
  $criptografada      = md5($recebeSenha);
  }else{
  session_start();
  $_SESSION['msg_danger'] = "ERROR";
  header("Location: ../../../index.php");
  }

if (empty($recebeNomeUsuario)) {
session_start();
$_SESSION['msg_warning'] = "Digite um Usuario";
header("Location: ../../../index.php");
}

elseif (empty($recebeSenha)) {
session_start();
$_SESSION['msg_warning'] = "Digite uma senha";
header("Location: ../../../index.php");
}

elseif ($confereNomeUsuario != $recebeNomeUsuario) {
  session_start();
  $_SESSION['msg_warning'] = "Usuario invalido";
  header("Location: ../../../index.php");
} else {

$consultaInformacoes = mysqli_query($conecta, "SELECT * FROM usuario WHERE userlogin = '$confereNomeUsuario' AND passlogin = '$criptografada' AND ativo = 's'") or die (mysqli_error());
$verificaInformacoes = mysqli_num_rows($consultaInformacoes);

if($verificaInformacoes == 1){

$resultado = mysqli_fetch_assoc($consultaInformacoes);

if (!isset($_SESSION)){
session_start();
}
    $nomeU                    = $resultado['nome'];
	$_SESSION["logado"]       = true;
    $_SESSION['nomeUsuario']  = $resultado['userlogin'];
	$_SESSION['UsuarioNivel'] = $resultado['nivel_usuario'];
    $_SESSION['M45-a']        = $recebeSenha;
	
	
if (isset($_POST['remember']))
{
setcookie(md5($confereNomeUsuario), $_SESSION['nomeUsuario'], time()+60*60*24*100, "/");
setcookie(md5($recebeSenha)       , $_SESSION['M45-a'],       time()+60*60*24*100, "/");
}

if($_SESSION['UsuarioNivel'] == "0"){
   $_SESSION['msg_success'] = "Bem vindo usuario";
header("Location: ../../usuario/0/home.php");
}

elseif($_SESSION['UsuarioNivel'] == "1"){
$_SESSION['msg_success'] = "Bem vindo usuario";
header("Location: ../../usuario/0/home.php");
}

elseif($_SESSION['UsuarioNivel'] == "2"){
$_SESSION['msg_success'] = "Bem vindo " .$nomeU. "" ;
header("Location: ../../page/f5846e92fb52ce426bdf9a4ffb609ea6/home.php");
}

elseif($_SESSION['UsuarioNivel'] == "3"){
$_SESSION['msg_success'] = "Bem vindo " .$nomeU. "" ;
header("Location: ../../page/f5846e92fb52ce426bdf9a4ffb609ea6/home.php");
}

elseif($recebeSenha != $recebeSenha){
$_SESSION['msg_warning'] = "Usuário ou Senha Incorretos!";
header("Location: ../../../index.php");
}

exit;
} else {
	
if (mysqli_query($conecta, "SELECT * FROM usuario WHERE userlogin = '$confereNomeUsuario' AND passlogin = '$criptografada' AND ativo = 'n'") or die (mysqli_error()))
{
  session_start();
  $_SESSION['msg_danger'] = "Usuario bloqueado";
  header("Location: ../../../index.php");
  return false;
} else{

session_start();
$_SESSION['msg_warning'] = "Usuário ou Senha invalido";
header("Location: ../../../index.php");

}


	
}




}

?>
