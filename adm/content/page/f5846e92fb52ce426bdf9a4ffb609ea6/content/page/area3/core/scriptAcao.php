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

  $query2 = mysqli_query($conecta,"update categoria SET ativo = 'n' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Categoria bloqueada";
  header('Location: ../../../../home.php?link=11');
  }
  break;

  case ativar:

  $query2 = mysqli_query($conecta,"update categoria SET ativo = 's' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Categoria Ativada";
  header('Location: ../../../../home.php?link=11');
  }
  break;


  case excluir:

  $id = (int)$_GET["id"];

  $query1 = mysqli_query($conecta,"delete from categoria where id ='$id'")or die (mysqli_error());
  if ($query1=true){
  session_start();
  $_SESSION['msg_success'] = "Categoria Excluida PERMANENTEMENTE do sistema";
  header('Location: ../../../../home.php?link=11');
  }else{
  session_start();
  $_SESSION['msg'] = "Erro ao excluir";
  header('Location: ../../../../home.php?link=11');
  }
  break;


case alterar:

$id = (int)$_GET["id"];
$nome = $_POST['nome'];

$query2 = mysqli_query($conecta,"update categoria SET nome = '$nome' where id = '$id'")or die (mysqli_error());

if ($query2=true){
  session_start();
  $_SESSION['msg_success'] = "Nome alterado";
  header('Location: ../../../../home.php?link=11');
}else{

echo "erro";

}
break;

case cadastra:

$recebeSeuNome  = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$confereSeuNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);

    //erro nao esta verificando
    if ($confereSeuNome != $recebeSeuNome) {
      session_start();
    $_SESSION['msg_warning'] = "Digite um nome valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }



else{



$query2 = mysqli_query($conecta,"INSERT INTO categoria (id, nome, ativo) VALUES  ('', '$recebeSeuNome', 's')")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Nova categoria cadastrada";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg_danger'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}


break;

}


}
?>
