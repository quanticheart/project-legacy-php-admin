<?php 
header ('Content-Type: text / html; charset = utf-8');
include_once "content/core/connect/conexao.php";  



$msg = false;
$recebeSeuNome  = "admin";
$recebeEmail    = "admin@admin.com";
$senha = md5("admin");

$consultaBanco = mysqli_query($conecta, "SELECT * FROM usuario WHERE email = '$recebeEmail'") or die (mysqli_error($consultaBanco));
$verificaBanco = mysqli_num_rows($consultaBanco);
if($verificaBanco == 1){
  session_start();
$_SESSION['msg_warning'] = "Email ja cadastrado";
echo "<script>history.go(-1)</script>";
return false;
}


$consultaBanco = mysqli_query($conecta, "SELECT * FROM  usuario WHERE userlogin = '$recebeSeuNome'") or die (mysqli_error($consultaBanco));
$verificaBanco = mysqli_num_rows($consultaBanco);
if($verificaBanco == 1){
  session_start();
$_SESSION['msg_warning'] = "nome ja cadastrado";
echo "<script>history.go(-1)</script>";
return false;
}


else {

//Agora vamos inserir os dados no banco
$insereDados = mysqli_query($conecta, "INSERT INTO usuario (id_usuario, nome, sobrenome, email, fotouser, userlogin, passlogin, ativo, cor1, cor2, data_cadastro, data_ultimo, nivel_usuario) VALUES ('999999', '$recebeSeuNome', '$recebeSeuNome', '$recebeEmail', 'sem', '$recebeSeuNome', '$senha', 's', '#4FC1E9', '#3BAFDA', now() , '' , '2')") or die (mysqli_error());

       
		
		if($insereDados=true){
       
      
		
       } else {

      
       
       }

   }

?>
