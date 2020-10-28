<?php
session_start();
if (empty($_SESSION['id_usuario'])){
 echo "Acesso negado!";
 exit;
}else{
include "../../../../../../core/connect/conexao.php";


$acao = $_GET['acao'];

switch ($acao) {



case dados:

$site       = filter_input(INPUT_POST, 'site', FILTER_SANITIZE_SPECIAL_CHARS);
$csite      = filter_input(INPUT_POST, 'site', FILTER_SANITIZE_SPECIAL_CHARS);
$title      = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS);
$desc       = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
$chave      = filter_input(INPUT_POST, 'chave', FILTER_SANITIZE_SPECIAL_CHARS);
$cel1       = filter_input(INPUT_POST, 'cel1', FILTER_SANITIZE_SPECIAL_CHARS);
$cel2       = filter_input(INPUT_POST, 'cel2', FILTER_SANITIZE_SPECIAL_CHARS);
$face       = filter_input(INPUT_POST, 'face', FILTER_SANITIZE_SPECIAL_CHARS);
$google     = filter_input(INPUT_POST, 'google', FILTER_SANITIZE_SPECIAL_CHARS);
$youtube    = filter_input(INPUT_POST, 'youtube', FILTER_SANITIZE_SPECIAL_CHARS);
$email1     = filter_input(INPUT_POST, 'email1', FILTER_SANITIZE_SPECIAL_CHARS);
$email2     = filter_input(INPUT_POST, 'email2', FILTER_SANITIZE_SPECIAL_CHARS);
$emaildesc  = filter_input(INPUT_POST, 'emaildesc', FILTER_SANITIZE_SPECIAL_CHARS);

    //erro nao esta verificando
    if ($site != $csite) {
      session_start();
    $_SESSION['msg_warning'] = "Digite um site valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    else if ($site === null) {
      session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if ($title  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if ($desc  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }

	if ($chave  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($cel1  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($cel2  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($face  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($google  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($youtube  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($email1  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($email2  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
	
	if ($emaildesc  === null) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um site";
    echo "<script>history.go(-1)</script>";
    return false;
    }
else{



$query2 = mysqli_query($conecta,"update site SET  site = '$csite ', title = ' $title',  description = ' $desc ', keywords = '$chave ', cel1 = '$cel1 ', cel2  = '$cel2 ', face  = ' $face', google  = ' $google',  youtube = '$youtube ',  email1 = '$email1 ',  email2 = '$email2 ', emaildesc  = ' $emaildesc' ")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Dados Atualizados com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg_error'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}


break;




case logo:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];

$foto = $_FILES["logo"];

$image = WideImage::load($foto["tmp_name"]);

preg_match("/\.(gif|png|jpg){1}$/i", $foto["name"], $ext);
$nome_imagem = logo.(md5(uniqid(time()))) . "." . $ext[1];

$sql = mysqli_query($conecta, "SELECT logo FROM site WHERE id ='1'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$vfoto = $campo ['logo'];
unlink("../../../../../../img/".$vfoto);

$query2 = mysqli_query($conecta,"update site SET logo = '$nome_imagem' ")or die (mysqli_error());

session_start();
if($query2=true){
$image->saveToFile('../../../../../../img/'.$nome_imagem.'');
$_SESSION['msg_success'] = "Logo atualizado com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg_error'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}




break;

case flogo:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];

$foto = $_FILES["logo"];

$image = WideImage::load($foto["tmp_name"]);

preg_match("/\.(gif|png|jpg){1}$/i", $foto["name"], $ext);
$nome_imagem = flogo.(md5(uniqid(time()))) . "." . $ext[1];

$sql = mysqli_query($conecta, "SELECT flogo FROM site WHERE id ='1'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$vfoto = $campo ['logo'];
unlink("../../../../../../img/".$vfoto);

$query2 = mysqli_query($conecta,"update site SET flogo = '$nome_imagem' ")or die (mysqli_error());

session_start();
if($query2=true){
$image->saveToFile('../../../../../../img/'.$nome_imagem.'');
$_SESSION['msg_success'] = "Logo atualizado com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg_error'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}




break;

case mlogo:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];

$foto = $_FILES["logo"];

$image = WideImage::load($foto["tmp_name"]);

preg_match("/\.(gif|png|jpg){1}$/i", $foto["name"], $ext);
$nome_imagem = mlogo.(md5(uniqid(time()))) . "." . $ext[1];

$sql = mysqli_query($conecta, "SELECT mlogo FROM site WHERE id ='1'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$vfoto = $campo ['logo'];
unlink("../../../../../../img/".$vfoto);

$query2 = mysqli_query($conecta,"update site SET mlogo = '$nome_imagem' ")or die (mysqli_error());

session_start();
if($query2=true){
$image->saveToFile('../../../../../../img/'.$nome_imagem.'');
$_SESSION['msg_success'] = "Logo atualizado com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg_error'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}




break;

}


}
?>
