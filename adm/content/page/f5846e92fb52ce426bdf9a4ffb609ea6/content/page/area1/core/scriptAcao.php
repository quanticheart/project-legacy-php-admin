<?php
session_start();
if (empty($_SESSION['id_usuario'])){
 echo "Acesso negado!";
 exit;
}else{
include "../../../../../../core/connect/conexao.php";


// PEGA OS DADOS DO USU�RIO



$id = (int)$_GET["id"];
$acao = $_GET['acao'];

switch ($acao) {

  case bloquear:

  $query2 = mysqli_query($conecta,"update usuario SET ativo = 'n' where id_usuario = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg'] = "Usuario bloqueado";
   header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;

  case ativar:

  $query2 = mysqli_query($conecta,"update usuario SET ativo = 's' where id_usuario = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg'] = "Usuario Ativado";
   header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;


  case excluir:

  $id = (int)$_GET["id"];
  $sql = mysqli_query($conecta, "SELECT fotouser FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
  $campo = mysqli_fetch_array ($sql);
  $vfoto = $campo ['fotouser'];
  unlink("../../../../../../img/user/".$vfoto);

  $query1 = mysqli_query($conecta,"delete from usuario where id_usuario ='$id'")or die (mysqli_error());
  if ($query1=true){
  session_start();
  $_SESSION['msg'] = "Usuario Excluido PERMANENTEMENTE do sistema";
  header('Location: ../../../../home.php?link=4');
  }else{
  session_start();
  $_SESSION['msg'] = "Erro ao excluir";
  header('Location: ../../../../home.php?link=4');
  }
  break;


case alterar:

$id = (int)$_GET["id"];
$nivel = $_POST['nivel'];

$query2 = mysqli_query($conecta,"update usuario SET nivel_usuario = '$nivel' where id_usuario = '$id'")or die (mysqli_error());

if ($query2=true){
  session_start();
  $_SESSION['msg'] = "Nivel alterado";
  header('Location: ../../../../home.php?link=4');
}else{

echo "erro";

}
break;

case dadosUsuario1:

$id = (int)$_GET["id"];

$recebeSeuNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$confereSeuNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_MAGIC_QUOTES);

$recebeSeuSNome = filter_input(INPUT_POST, 'snome', FILTER_SANITIZE_SPECIAL_CHARS);
$confereSeuSNome = filter_input(INPUT_POST, 'snome', FILTER_SANITIZE_MAGIC_QUOTES);


    //erro nao esta verificando
    if ($confereSeuNome != $recebeSeuNome) {
      session_start();
    $_SESSION['msg'] = "Digite um nome valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    else if ($confereSeuSNome != $recebeSeuSNome) {
      session_start();
    $_SESSION['msg'] = "Digite um sobrenome valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }




else{



$query2 = mysqli_query($conecta,"update usuario SET nome = '$confereSeuNome', sobrenome = '$confereSeuSNome' where id_usuario = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg'] = "Nome Atualizado com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}


break;

case dadosUsuario2:

$id = (int)$_GET["id"];

$recebeEmail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

$consultaBanco = mysqli_query($conecta, "SELECT * FROM  usuario WHERE email = '$recebeEmail'") or die (mysqli_error($consultaBanco));
$verificaBanco = mysqli_num_rows($consultaBanco);
if($verificaBanco == 1){
  session_start();
$_SESSION['msg'] = "Email ja cadastrado";
echo "<script>history.go(-1)</script>";
return false;
} else {

    if ($recebeEmail == NULL ) {
      session_start();
    $_SESSION['msg'] = "Digite um Email";
    echo "<script>history.go(-1)</script>";
    return false;
    }


else{


$query2 = mysqli_query($conecta,"update usuario SET  email = '$recebeEmail'  where id_usuario = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg'] = "Email atualizado com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}}


break;


case dadosUsuario3:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];

$foto = $_FILES["fotouser"];

$image = WideImage::load($foto["tmp_name"]);
$image = $image->resize(300, 300 , 'fill');
preg_match("/\.(gif|png|jpg){1}$/i", $foto["name"], $ext);
$nome_imagem = user.(md5(uniqid(time()))) . "." . $ext[1];

$sql = mysqli_query($conecta, "SELECT fotouser FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$vfoto = $campo ['fotouser'];
unlink("../../../../../../img/user/".$vfoto);

$query2 = mysqli_query($conecta,"update usuario SET  fotouser = '$nome_imagem'  where id_usuario = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image->saveToFile('../../../../../../img/user/'.$nome_imagem.'');
$_SESSION['msg'] = "Imagem de usuario atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}




break;

case dadosUsuario4:

$id = (int)$_GET["id"];

$recebeSenha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$criptografada = md5($recebeSenha);


    if ($recebeSenha == NULL ) {
      session_start();
    $_SESSION['msg'] = "Digite uma Senha";
    echo "<script>history.go(-1)</script>";
    return false;
    }


else{


$query2 = mysqli_query($conecta,"update usuario SET  passlogin = '$criptografada'  where id_usuario = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg'] = "Senha atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}


break;

case bloquearSeu:

$query2 = mysqli_query($conecta,"update usuario SET ativo = 'n' where id_usuario = '$id'")or die (mysqli_error());

if ($query2=true){
  session_start();
$_SESSION['msg'] = "Seu usuario foi bloqueado";
header('Location: ../../../../../../core/login/logout.php');
}
break;

case cor:

$cor1 = $_POST['Cor-1'];
$cor2 = $_POST['Cor-2'];

//Agora vamos inserir os dados no banco
$insereDados = mysqli_query($conecta, "UPDATE usuario SET cor1 = '$cor1' , cor2 = '$cor2' where id_usuario = '$id'") or die (mysqli_error());

if ($insereDados=true){
  session_start();
$_SESSION['msg'] = "Cores modificadas";
header("Location: {$_SERVER['HTTP_REFERER']}");
}else{

  echo "erro";
}
break;

case email:

$insereDados = mysqli_query($conecta, "SELECT email, nome , nivel_usuario FROM usuario  WHERE id_usuario = '$id'") or die (mysqli_error());

while ($linha=mysqli_fetch_array($insereDados)) {
  $recebeEmail = $linha["email"];
  $confereSeuNome = $linha["nome"];
  $nivel = $linha["nivel_usuario"];

  if($nivel=="0") {
    $nivel = "Usuario";
  }

  if($nivel=="1") {
    $nivel = "Moderador";

  }

  if($nivel=="2") {
    $nivel = "Administrador";
  }


        session_start();
    if($insereDados=true){

      $codigo = base64_encode($recebeEmail);//variavel seta o codigo para mudar os dados
      $data_fim = date('Y-m-d H:i:s', strtotime('+1 day'));//variavel seta o tempo de duação para mudar os dados
      $headers = "Content-type:text/html; charset=utf-8";

      $destino = $recebeEmail;
      $de = utf8_decode("Convite de acesso");
      $assunto = "Ativamento de conta";

      include ("../../../../../../core/email/mail/htmlativa.php");
      include ("../../../../../../core/email/mail/Email.php");


      $codigo_seleciona = mysqli_query($conecta, "SELECT * FROM codigo_email WHERE codigo = '$codigo' AND tipo = 'ativa' ")or die (mysqli_error());

      if (mysqli_num_rows($codigo_seleciona) == 1){
      $codigo = mysqli_query($conecta,"UPDATE codigo_email SET  data = '$data_fim' WHERE codigo = '$codigo' ")or die (mysqli_error());
      if ($codigo == true){
            if($mail->Send($headers, $destino, $html )){
              session_start();
              $_SESSION['msg_success'] = "Um E-mail foi mandado para <strong>$recebeEmail</strong>.";
               header("Location: {$_SERVER['HTTP_REFERER']}");
            }

            else{
             $_SESSION['msg_danger'] = "Erro ao cadastrar";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }

          }

      } else {

      //cria meu codigo de email e set o tempo de troca de senha
      $codigo = mysqli_query($conecta,"INSERT INTO codigo_email SET codigo = '$codigo' , data = '$data_fim' , tipo = 'ativa' ")or die (mysqli_error());

      if ($codigo == true){
            if($mail->Send($headers, $destino, $html )){
              session_start();
              $_SESSION['msg_success'] = "Um E-mail foi mandado para <strong>$recebeEmail</strong>.";
               header("Location: {$_SERVER['HTTP_REFERER']}");
            }

            else{
             $_SESSION['msg_danger'] = "Erro ao cadastrar";
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }

          }

      }




            $_SESSION['msg'] = "Email enviado novamente";
         header("Location: {$_SERVER['HTTP_REFERER']}");
      }	else{
     $_SESSION['msg'] = "Erro ao cadastrar";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }


}
break;
}


}
?>
