
<!-- Recebendo e gravando os dados -->
<?php

header ('Content-Type: text / html; charset = utf-8');
include "../../../../../../core/connect/conexao.php";


if(isset($_POST['BTEnvia'])){
 
$id    = rand(100000, 999999);
$Nome  = $_POST['nome'];
$cNome = $_POST['nome'];
$recebeEmail    = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$nivel = $_POST['nivel'];
}else{
session_start();
$_SESSION['msg_danger'] = "ERROR";
echo "<script>history.go(-1)</script>";
return false;
}

$consultaBanco = mysqli_query($conecta, "SELECT * FROM  usuario WHERE email = '$recebeEmail'") or die (mysqli_error($consultaBanco));
$verificaBanco = mysqli_num_rows($consultaBanco);
if($verificaBanco == 1){
  session_start();
$_SESSION['msg_warning'] = "Email ja cadastrado";
echo "<script>history.go(-1)</script>";
return false;
}

 else {

   //erro nao esta verificando
   if ($confereSeuNome != $recebeSeuNome) {
     session_start();
   $_SESSION['msg_warning'] = "Digite um nome valido";
   echo "<script>history.go(-1)</script>";
   return false;
   }

  if (empty($recebeEmail)) {
    session_start();
  $_SESSION['msg_warning'] = "Digite um Email";
  echo "<script>history.go(-1)</script>";
  return false;
  }


else {



//Agora vamos inserir os dados no banco
$insereDados = mysqli_query($conecta, "INSERT INTO usuario (id_usuario, nome, sobrenome, email, fotouser, userlogin, passlogin, ativo, cor1, cor2, data_cadastro, data_ultimo, nivel_usuario) VALUES ('$id ', '$cNome', 'sem ativar', '$recebeEmail', 'semfoto', 'semativamento', 'a89s8a98sa89sa98sa', 'n', '#4FC1E9', '#3BAFDA', now() , '' , '$nivel')") or die (mysqli_error());

        session_start();
		if($insereDados=true){

      if($nivel=="0") {
        $nivel = "Usuario";
		$texto = "Você está sendo convidado a ser um membro do site <a href='$site' style='color: #2199e8; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;'>$nomesite</a> em nível de <strong>$nivel</strong>, onde poderá gerar artigos para divulgação de novos produtos<br>
Se desejar realmente ser um <strong>$nivel</strong>, click no botão a baixo e ative sua conta agora!
";
      }

      if($nivel=="1") {
        $nivel = "Moderador";
		$texto = "Você está sendo convidado a ser um membro do site <a href='$site' style='color: #2199e8; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;'>$nomesite</a> em nível de <strong>$nivel</strong>, onde poderá gerar artigos, administrar E-mails para clientes, e revisar artigos de outros membros, junto com outras opções. <br>
Se desejar realmente ser um <strong>$nivel</strong>, click no botão a baixo e ative sua conta agora!
";
      }

      if($nivel=="2") {
        $nivel = "Administrador Mestre";
		$texto = "Você está sendo convidado a ser um membro do site <a href='$site' style='color: #2199e8; font-family: Helvetica, Arial, sans-serif; font-weight: normal; text-align: left; line-height: 1.3; text-decoration: none; margin: 0; padding: 0;'>$nomesite</a> em nível de <strong>$nivel</strong>, onde poderá gerar artigos, administrar e cadastrar novos usuários, enviar E-mail marketing entre outras opções. <br>
Se desejar realmente ser um <strong>$nivel</strong>, click no botão a baixo e ative sua conta agora!

";
      }


      //cria meu email
      $codigo = base64_encode($recebeEmail);//variavel seta o codigo para mudar os dados
      $data_fim = date('Y-m-d H:i:s', strtotime('+1 day'));//variavel seta o tempo de duação para mudar os dados
      $headers = "Content-type:text/html; charset=utf-8";

      $destino = $recebeEmail;
      $de = utf8_decode("Convite de acesso - Administrativo $nomesite");
      $assunto = "Ativamento de conta";

      include ("../../../../../../core/email/mail/htmlativa.php");
      include ("../../../../../../core/email/mail/Email.php");


      $codigo_seleciona = mysqli_query($conecta, "SELECT * FROM codigo_email WHERE codigo = '$codigo' AND tipo = 'ativa' ")or die (mysqli_error());

      if (mysqli_num_rows($codigo_seleciona) == 1){
      $codigo = mysqli_query($conecta,"UPDATE codigo_email SET  data = '$data_fim' WHERE codigo = '$codigo' ")or die (mysqli_error());
      if ($codigo == true){
            $mail->Send($headers, $destino, $html );
              session_start();
              $_SESSION['msg_success'] = "Um E-mail foi mandado para <strong>$recebeEmail</strong>.";
               header("Location: {$_SERVER['HTTP_REFERER']}");
            }

            else{
             $_SESSION['msg_danger'] = "Erro ao cadastrar";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }

          

      } else {

      //cria meu codigo de email e set o tempo de troca de senha
      $codigo = mysqli_query($conecta,"INSERT INTO codigo_email SET codigo = '$codigo' , data = '$data_fim' , tipo = 'ativa' ")or die (mysqli_error());

      if ($codigo == true){
            $mail->Send($headers, $destino, $html );
              session_start();
              $_SESSION['msg_success'] = "Um E-mail foi mandado para <strong>$recebeEmail</strong>.";
               header("Location: {$_SERVER['HTTP_REFERER']}");
            }

            else{
             $_SESSION['msg_danger'] = "Erro ao cadastrar";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }

          

      }

}}


}



?>
