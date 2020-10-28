<?php


$id = (int)$_GET["id"];
$acao = $_GET['acao'];
$on = $_GET['on'];

switch ($acao){

case excluir:
if ($on == "s"){
header("Location: content/page/area1/core/scriptAcao.php?id=$id&acao=excluir");
} else {
header("Location: home.php?link=7&id=$id&acao=excluir");
}

break;



}


?>
