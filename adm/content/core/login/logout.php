<?php
session_start();
//inicia o update para gravar a data do ultimo logout
include '../connect/conexao.php';
$NomeUsuario = $_SESSION["nomeUsuario"];
$resultado = mysqli_query($conecta,"SELECT * FROM usuario WHERE userlogin = '$NomeUsuario' AND ativo = 's'") or die (mysqli_error());

while ($listagem = mysqli_fetch_array($resultado)){

$idUsuario = $listagem ["id_usuario"];

$salva = mysqli_query($conecta, "UPDATE usuario SET data_ultimo = now() WHERE id_usuario ='$idUsuario'") or die (mysqli_error());

session_destroy();

}//fim
mysqli_close($conecta);//fecha todas as conecçoes e redimenciona para pagina principal

if(!isset($_REQUEST['logmeout'])){
session_start();
$_SESSION['msg_success'] = "Desligado do sistema";	
header("Location: ../../../index.php");
}


?>
