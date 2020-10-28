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


  case alterar:

  $nome = $_POST['nome'];
  $cor1 = $_POST['Cor-1'];
  $cor2 = $_POST['Cor-2'];

  //Agora vamos inserir os dados no banco
  $insereDados = mysqli_query($conecta, "UPDATE cor SET nome = '$nome' , cor1 = '$cor1' , cor2 = '$cor2' WHERE id = '$id'") or die (mysqli_error());

  if ($insereDados=true){
    session_start();
  $_SESSION['msg_success'] = "Cor modificada com sucesso";
  header("Location: ../../../../home.php?link=9");
  }else{

    echo "erro";
  }
  break;

  case excluir:

  $query1 = mysqli_query($conecta,"delete from cor where id ='$id'")or die (mysqli_error());
  if ($query1=true){
  session_start();
  $_SESSION['msg_success'] = "Cor deletada permanetemente do sistema";
header("Location: ../../../../home.php?link=9");
  }else{
  session_start();
  $_SESSION['msg_danger'] = "Erro ao excluir";
header("Location: ../../../../home.php?link=9");
  }
  break;

  case bloquear:

  $query2 = mysqli_query($conecta,"update cor SET ativo = 'n' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Com Bloqueada";
header("Location: ../../../../home.php?link=9");
  }
  break;

  case ativar:

  $query2 = mysqli_query($conecta,"update cor SET ativo = 's' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Cor ativada";
header("Location: ../../../../home.php?link=9");
  }
  break;


  case cadastroCor:

  $nome = $_POST['nome'];
  $cor1 = $_POST['Cor-1'];
  $cor2 = $_POST['Cor-2'];

  //Agora vamos inserir os dados no banco
  $insereDados = mysqli_query($conecta, "INSERT INTO cor SET nome = '$nome' , cor1 = '$cor1' , cor2 = '$cor2' , ativo = 's'") or die (mysqli_error());

  if ($insereDados=true){
    session_start();
  $_SESSION['msg_success'] = "Cores Adcionadas";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  }else{

    echo "erro";
  }
  break;

}}
?>
