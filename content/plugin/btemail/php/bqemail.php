<?php 

include "../../../core/connect/conexao.php";
$cod = $_GET['cod'];

 $query2 = mysqli_query($conecta,"update contato SET ativo = 'n' where cod = '$cod'")or die (mysqli_error());
 
if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "E-mails promocionais bloqueados";
  header('Location: '.$site.'');
  }

?>