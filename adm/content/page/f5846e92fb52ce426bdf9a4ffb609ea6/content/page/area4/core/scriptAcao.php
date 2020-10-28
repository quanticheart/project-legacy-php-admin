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

  $query2 = mysqli_query($conecta,"update corretor SET ativo = 'n' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Corretor bloqueado";
  header('Location: ../../../../home.php?link=21');
  }
  break;

  case ativar:

  $query2 = mysqli_query($conecta,"update corretor SET ativo = 's' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Corretor Ativado";
  header('Location: ../../../../home.php?link=21');
  }
  break;


    case bloquearmestre:

    $query2 = mysqli_query($conecta,"update corretor SET mestre = 'n' where id = '$id'")or die (mysqli_error());

    if ($query2=true){
      session_start();
    $_SESSION['msg_success'] = "Corretor bloqueado";
    header('Location: ../../../../home.php?link=21');
    }
    break;

    case ativarmestre:

    $query2 = mysqli_query($conecta,"update corretor SET mestre = 's' where id = '$id'")or die (mysqli_error());

    if ($query2=true){
      session_start();
    $_SESSION['msg_success'] = "Corretor Ativado";
    header('Location: ../../../../home.php?link=21');
    }
    break;

  case excluir:

  $id = (int)$_GET["id"];

  $query1 = mysqli_query($conecta,"delete from corretor where id ='$id'")or die (mysqli_error());
  if ($query1=true){
  session_start();
  $_SESSION['msg_success'] = "Corretor Excluido PERMANENTEMENTE do sistema";
  header('Location: ../../../../home.php?link=21');
  }else{
  session_start();
  $_SESSION['msg'] = "Erro ao excluir";
  header('Location: ../../../../home.php?link=21');
  }
  break;


case alterar:

$id = (int)$_GET["id"];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cel1 = $_POST['cel1'];
$cel2 = $_POST['cel2'];


$query2 = mysqli_query($conecta,"update corretor SET nome = '$nome' , email = '$email' , cel1 = '$cel1' , cel2 = '$cel2' where id = '$id'")or die (mysqli_error());

if ($query2=true){
  session_start();
  $_SESSION['msg_success'] = "Corretor alterado";
  header('Location: ../../../../home.php?link=21');
}else{

echo "erro";

}
break;

case cadastra:
$id = rand(100000, 999999);

$recebeSeuNome  = htmlspecialchars($_POST['nome']);
$confereSeuNome = htmlspecialchars($_POST['nome']);

$recebeEmail    = htmlspecialchars($_POST['email']);

$cel1           = htmlspecialchars($_POST['cel1']);
$cel2           = htmlspecialchars($_POST['cel2']);


    //erro nao esta verificando
    if ($confereSeuNome != $recebeSeuNome) {
      session_start();
    $_SESSION['msg_warning'] = "Digite um nome valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if ($recebeEmail == NULL ) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um email valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if ($cel1 == NULL ) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um celular valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if ($cel2 == NULL ) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um celular valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

else{



$query2 = mysqli_query($conecta,"INSERT INTO corretor (id, nome, ativo, mestre, email, cel1, cel2) VALUES ('$id', '$recebeSeuNome', 's', 'n', '$recebeEmail',  '$cel1' , '$cel2')") or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Novo corretor cadastrado";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg_danger'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}


break;


case email:

$id_u = (int)$_GET["id_u"];

$assuntomsg  = htmlspecialchars(mysql_real_escape_string($_POST['assunto']));
$msg      = htmlspecialchars(mysql_real_escape_string($_POST['msg']));

$sql = mysqli_query($conecta, "SELECT email , nome FROM corretor WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$nome = $campo ['nome'];
$email = $campo ['email'];

$sql = mysqli_query($conecta, "SELECT nome , nivel_usuario FROM usuario WHERE id_usuario ='$id_u'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$nomeenvio = $campo ['nome'];
$nivel = $campo ['nivel_usuario'];


    //erro nao esta verificando
    if ($assuntomsg == NULL ) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um Assunto";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if ($msg == NULL ) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um celular valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }


else{


$headers = "Content-type:text/html; charset=utf-8";

$destino = $email;
$de = utf8_decode($nomeenvio);
$assunto = $assuntomsg;

include ("../../../../../../core/email/mail/htmlcorretor.php");
include ("../../../../../../core/email/mail/Email.php");

if($mail->Send($headers, $destino, $html )){
  session_start();
  $_SESSION['msg_success'] = "Um E-mail foi mandado para <strong>$email</strong>.";
    header('Location: ../../../../home.php?link=23');
}

else{
 $_SESSION['msg_danger'] = "Erro ";
    header("Location: {$_SERVER['HTTP_REFERER']}");
}



}


break;


}


}
?>
