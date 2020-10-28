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

  $query2 = mysqli_query($conecta,"update artigo SET ativo = 'n' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "artigo bloqueado";
   header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;

  case ativar:

  $query2 = mysqli_query($conecta,"update artigo SET ativo = 's' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "artigo Ativado";
   header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;


   case bloquearluxo:

  $query2 = mysqli_query($conecta,"update artigo SET destaqueluxo = 'n' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Artigo de Luxo bloqueado";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;

  case ativarluxo:

  $query2 = mysqli_query($conecta,"update artigo SET destaqueluxo = 's' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  $_SESSION['msg_success'] = "Artigo de Luxo ativado";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;
  
  
     case bloqueardestaque:

  $query2 = mysqli_query($conecta,"update artigo SET destaque = 'n' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
 $_SESSION['msg_success'] = "Artigo fora de destaque";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;

  case ativardestaque:

  $query2 = mysqli_query($conecta,"update artigo SET destaque = 's' where id = '$id'")or die (mysqli_error());

  if ($query2=true){
    session_start();
  
   $_SESSION['msg_success'] = "Artigo em destaque";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  }
  break;
  
  case excluir:
  $id = (int)$_GET["id"];

  	$sql = mysqli_query($conecta, "SELECT * FROM artigo WHERE id ='$id'")or die (mysqli_error());
  	$campo = mysqli_fetch_array ($sql);
  	$codigoanuncio        = $campo ['codigoanuncio'];
	
$pasta = "../../../../../../img/artigo/$codigoanuncio/";

if(is_dir($pasta))
{
$diretorio = dir($pasta);

while($arquivo = $diretorio->read())
{
if(($arquivo != '.') && ($arquivo != '..'))
{
unlink($pasta.$arquivo);
}
}
$diretorio->close();
}

$dir = "../../../../../../img/artigo/$codigoanuncio";
if(rmdir($dir)) 
{
  $query1 = mysqli_query($conecta,"delete from artigo where id ='$id'")or die (mysqli_error());
  if ($query1=true){
  session_start();
  $_SESSION['msg_success'] = "Artigo Excluido PERMANENTEMENTE do sistema";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  }else{
  session_start();
  $_SESSION['msg'] = "Erro ao excluir";
  header('Location: ../../../../home.php?link=31');
  }
 
}else{
	$query1 = mysqli_query($conecta,"delete from artigo where id ='$id'")or die (mysqli_error());
  if ($query1=true){
  session_start();
  $_SESSION['msg_success'] = "Artigo Excluido PERMANENTEMENTE do sistema";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  }else{
  session_start();
  $_SESSION['msg'] = "Erro ao excluir";
  header('Location: ../../../../home.php?link=31');
  }
}
	


  break;

  
    case corretor:

$id = (int)$_GET["id"];
$corre = $_POST['id_corre'];

$query2 = mysqli_query($conecta,"update artigo SET id_corre = '$corre' where id = '$id'")or die (mysqli_error());

if ($query2=true){
  session_start();
  $_SESSION['msg_success'] = "Corretor alterado com sucesso";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}else{

echo "erro";

}
break;


  case categoria:

$id = (int)$_GET["id"];
$cat = $_POST['id_cat'];

$query2 = mysqli_query($conecta,"update artigo SET id_cat = '$cat' where id = '$id'")or die (mysqli_error());

if ($query2=true){
  session_start();
  $_SESSION['msg_success'] = "Categoria alterada com sucesso";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}else{

echo "erro";

}
break;

case alterar:

$titulo         = htmlspecialchars($_POST["titulo"]);
$descricao      = htmlspecialchars($_POST["descricao"]);
$endereco       = htmlspecialchars($_POST["endereco"]);
$endnum         = htmlspecialchars((int)$_POST['endnum']);
$cep            = htmlspecialchars((int)$_POST['cep']);
$valor          = htmlspecialchars((int)$_POST['valor']);
$ndisponivel    = htmlspecialchars((int)$_POST['ndisponivel']);
$regiao         = htmlspecialchars($_POST['regiao']);
$video          = htmlspecialchars($_POST["video"]);
$artigo         = htmlspecialchars($_POST["artigo"]);
$chaves         = htmlspecialchars($_POST["chaves"]);


function NormalizaURL($str){
    $str = mb_strtolower(utf8_decode($str));
    $i=1;
    $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
    $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
    while($i>0) $str = str_replace('--','-',$str,$i);
    if (substr($str, -1) == '-') $str = substr($str, 0, -1);
    return $str;
}

$url            = NormalizaURL($_POST["titulo"]);

$data           = date('d/m/Y');
$hora           = date('H:i:s');
$ip             = $_SERVER["REMOTE_ADDR"];

$query2 = mysqli_query($conecta,"update artigo SET url = '$url', chaves = '$chaves'  , titulo = '$titulo' , descricao = '$descricao'  , endereco = '$endereco'  , endnun = '$endnum'  , cep = '$cep'  , valor = '$valor'  , ndisponivel = '$ndisponivel'  , regiao = '$regiao'  , video = '$video'  , artigo = '$artigo'  ,  data = '$data'  , hora = '$hora'  , ip = '$ip' where id = '$id'")or die (mysqli_error());

if ($query2=true){
  session_start();
  $_SESSION['msg_success'] = "Artigo alterado";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}else{

echo "erro";

}
break;

case foto1:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];
$img1  = $_FILES["img1"];

$sql = mysqli_query($conecta, "SELECT img1 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img1'];

$image1 = WideImage::load($img1["tmp_name"]);
$image1 = $image1->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img1["name"], $ext);
$nome_imagem1 = $codigoanuncio.'-'.img1.'-'.(md5(uniqid(time()))) . "." . $ext[1];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img1 = '$nome_imagem1'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image1->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/'.$nome_imagem1.'');
$_SESSION['msg_success'] = "Imagem atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case foto1:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];
$img1  = $_FILES["img1"];

$sql = mysqli_query($conecta, "SELECT img1 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img1'];

$image1 = WideImage::load($img1["tmp_name"]);
$image1 = $image1->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img1["name"], $ext);
$nome_imagem1 = $codigoanuncio.'-'.img1.'-'.(md5(uniqid(time()))) . "." . $ext[1];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img1 = '$nome_imagem1'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image1->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/'.$nome_imagem1.'');
$_SESSION['msg_success'] = "Imagem atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case foto2:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];
$img2  = $_FILES["img2"];

$sql = mysqli_query($conecta, "SELECT img2 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img2'];

$image2 = WideImage::load($img2["tmp_name"]);
$image2 = $image2->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img2["name"], $ext);
$nome_imagem2 = $codigoanuncio.'-'.img2.'-'.(md5(uniqid(time()))) . "." . $ext[1];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img2 = '$nome_imagem2'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image2->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/'.$nome_imagem2.'');
$_SESSION['msg_success'] = "Imagem atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case deletafoto2:
$id = (int)$_GET["id"];

$sql = mysqli_query($conecta, "SELECT img2 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img2'];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img2 = 'n'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Imagem deletada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao deletar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case foto3:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];
$img3  = $_FILES["img3"];

$sql = mysqli_query($conecta, "SELECT img3 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img3'];

$image3 = WideImage::load($img3["tmp_name"]);
$image3 = $image3->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img3["name"], $ext);
$nome_imagem3 = $codigoanuncio.'-'.img3.'-'.(md5(uniqid(time()))) . "." . $ext[1];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img3 = '$nome_imagem3'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image3->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/'.$nome_imagem3.'');
$_SESSION['msg_success'] = "Imagem atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case deletafoto3:
$id = (int)$_GET["id"];

$sql = mysqli_query($conecta, "SELECT img3 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img3'];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img3 = 'n'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Imagem deletada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao deletar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case foto4:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];
$img4  = $_FILES["img4"];

$sql = mysqli_query($conecta, "SELECT img4 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img4'];

$image4 = WideImage::load($img4["tmp_name"]);
$image4 = $image4->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img4["name"], $ext);
$nome_imagem4 = $codigoanuncio.'-'.img4.'-'.(md5(uniqid(time()))) . "." . $ext[1];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img4 = '$nome_imagem4'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image4->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/'.$nome_imagem4.'');
$_SESSION['msg_success'] = "Imagem atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case deletafoto4:
$id = (int)$_GET["id"];

$sql = mysqli_query($conecta, "SELECT img4 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img4'];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img4 = 'n'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Imagem deletada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao deletar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case foto5:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];
$img5  = $_FILES["img5"];

$sql = mysqli_query($conecta, "SELECT img5 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img5'];

$image5 = WideImage::load($img5["tmp_name"]);
$image5 = $image5->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img5["name"], $ext);
$nome_imagem5 = $codigoanuncio.'-'.img5.'-'.(md5(uniqid(time()))) . "." . $ext[1];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img5 = '$nome_imagem5'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image5->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/'.$nome_imagem5.'');
$_SESSION['msg_success'] = "Imagem atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case deletafoto5:
$id = (int)$_GET["id"];

$sql = mysqli_query($conecta, "SELECT img5 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img5'];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img5 = 'n'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Imagem deletada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao deletar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case foto6:

include "../../../../../../plugin/WideImage/WideImage.php";

$id = (int)$_GET["id"];
$img6  = $_FILES["img6"];

$sql = mysqli_query($conecta, "SELECT img6 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img6'];

$image6 = WideImage::load($img6["tmp_name"]);
$image6 = $image6->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img6["name"], $ext);
$nome_imagem6 = $codigoanuncio.'-'.img6.'-'.(md5(uniqid(time()))) . "." . $ext[1];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img6 = '$nome_imagem6'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$image6->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/'.$nome_imagem6.'');
$_SESSION['msg_success'] = "Imagem atualizada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case deletafoto6:
$id = (int)$_GET["id"];

$sql = mysqli_query($conecta, "SELECT img6 , codigoanuncio FROM artigo WHERE id ='$id'")or die (mysqli_error());
$campo = mysqli_fetch_array ($sql);
$codigoanuncio = $campo ['codigoanuncio']; 
$vfoto         = $campo ['img6'];

unlink("../../../../../../img/artigo/".$codigoanuncio."/".$vfoto."");

if(unlink == true){

$query2 = mysqli_query($conecta,"update artigo SET img6 = 'n'  where id = '$id'")or die (mysqli_error());

session_start();
if($query2=true){
$_SESSION['msg_success'] = "Imagem deletada com sucesso";
 header("Location: {$_SERVER['HTTP_REFERER']}");
}	else{
$_SESSION['msg'] = "Erro ao Atualizar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

}else{
$_SESSION['msg_warning'] = "Erro ao deletar";
header("Location: {$_SERVER['HTTP_REFERER']}");
}

break;

case cadastra:
echo"error";
include "../../../../../../plugin/WideImage/WideImage.php";

$id             = htmlspecialchars((int)rand(1000000000, 9999999999));
$idUsuario      = htmlspecialchars((int)$_SESSION['id_usuario']);
$id_cat         = htmlspecialchars((int)$_POST["id_cat"]);
$id_corre       = htmlspecialchars((int)$_POST["id_corre"]);
$codigoanuncio  = htmlspecialchars((int)rand(1000000, 9999999));

$titulo         = htmlspecialchars($_POST["titulo"]);

$descricao      = htmlspecialchars($_POST["descricao"]);
$endereco       = htmlspecialchars($_POST["endereco"]);
$endnum         = htmlspecialchars((int)$_POST['endnum']);
$cep            = htmlspecialchars((int)$_POST['cep']);
$valor          = htmlspecialchars((int)$_POST['valor']);
$ndisponivel    = htmlspecialchars((int)$_POST['ndisponivel']);
$regiao         = htmlspecialchars($_POST['regiao']);

$fase           = htmlspecialchars($_POST['fase']);
$decorado       = htmlspecialchars($_POST['decorado']);

$mapsoriginal           = $_POST['maps'];
if ($mapsoriginal == null){
$maps = "";	
} else {
$maps = str_replace('width="600"', 'width="100%"', $mapsoriginal);	
}


$img1           = $_FILES["img1"];
$img2           = $_FILES["img2"];
$img3           = $_FILES["img3"];
$img4           = $_FILES["img4"];
$img5           = $_FILES["img5"];
$img6           = $_FILES["img6"];


$destaque       = htmlspecialchars($_POST["destaque"]);
$destaqueluxo   = htmlspecialchars($_POST["destaqueluxo"]);
$financia       = htmlspecialchars($_POST["financia"]);

$video          = htmlspecialchars($_POST["video"]);
$artigo         = htmlspecialchars($_POST["artigo"]);
$chaves         = htmlspecialchars($_POST["chaves"]);

$data           = date('d/m/Y');
$hora           = date('H:i:s');
$ip             = $_SERVER["REMOTE_ADDR"];


function NormalizaURL($str){
    $str = mb_strtolower(utf8_decode($str));
    $i=1;
    $str = strtr($str, utf8_decode('àáâãäåæçèéêëìíîïñòóôõöøùúûýýÿ'), 'aaaaaaaceeeeiiiinoooooouuuyyy');
    $str = preg_replace("/([^a-z0-9])/",'-',utf8_encode($str));
    while($i>0) $str = str_replace('--','-',$str,$i);
    if (substr($str, -1) == '-') $str = substr($str, 0, -1);
    return $str;
}

$url            = NormalizaURL($_POST["titulo"]);




$image = WideImage::load($img1["tmp_name"]);
$image = $image->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img1["name"], $ext);
$nome_imagem1 = $codigoanuncio.'-'.img1.'-'.(md5(uniqid(time()))) . "." . $ext[1];


if (empty($img2["name"])) {
$nome_imagem2 = "n";
} else {
if (count($error) == 0) {
$image2 = WideImage::load($img2["tmp_name"]);
$image2 = $image2->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img2["name"], $ext);
$nome_imagem2 = $codigoanuncio.'-'.img2.'-'.(md5(uniqid(time()))) . "." . $ext[1];
}}


if (empty($img3["name"])) {
$nome_imagem3 = "n";
} else {
if (count($error) == 0) {
$image3 = WideImage::load($img3["tmp_name"]);
$image3 = $image3->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img3["name"], $ext);
$nome_imagem3 = $codigoanuncio.'-'.img3.'-'.(md5(uniqid(time()))) . "." . $ext[1];
}}

if (empty($img4["name"])) {
$nome_imagem4 = "n";
} else {
if (count($error) == 0) {
$image4 = WideImage::load($img4["tmp_name"]);
$image4 = $image4->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img4["name"], $ext);
$nome_imagem4 = $codigoanuncio.'-'.img4.'-'.(md5(uniqid(time()))) . "." . $ext[1];
}}

if (empty($img5["name"])) {
$nome_imagem5 = "n";
} else {
if (count($error) == 0) {
$image5 = WideImage::load($img5["tmp_name"]);
$image5 = $image5->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img5["name"], $ext);
$nome_imagem5 = $codigoanuncio.'-'.img5.'-'.(md5(uniqid(time()))) . "." . $ext[1];
}}

if (empty($img6["name"])) {
$nome_imagem6 = "n";
} else {
if (count($error) == 0) {
$image6 = WideImage::load($img6["tmp_name"]);
$image6 = $image6->resize(800, 450 , 'inside', 'any');
preg_match("/\.(gif|png|jpg){1}$/i", $img6["name"], $ext);
$nome_imagem6 = $codigoanuncio.'-'.img6.'-'.(md5(uniqid(time()))) . "." . $ext[1];
}}

$sql_enviar_noticia  = mysqli_query($conecta, "INSERT INTO artigo ( id, id_usuario, id_cat, id_corre, codigoanuncio, url, chaves, titulo, descricao, video, artigo, endereco, endnun, cep, valor, ndisponivel, regiao, img1, img2, img3, img4, img5, img6, maps, fase, decorado, financia, ativo, destaque, destaqueluxo, data, hora, ip) VALUES ('$id', '$idUsuario', '$id_cat', '$id_corre', '$codigoanuncio', '$url', '$chaves', '$titulo',  '$descricao', '$video', '$artigo', '$endereco', '$endnum', '$cep', '$valor', '$ndisponivel', '$regiao', '$nome_imagem1', '$nome_imagem2', '$nome_imagem3','$nome_imagem4','$nome_imagem5','$nome_imagem6', '$maps', '$fase', '$decorado', '$financia', 's', '$destaque', '$destaqueluxo', '$data', '$hora', '$ip')")or die (mysqli_error(error));



session_start();
if($sql_enviar_noticia=true){
$pasta = mkdir("../../../../../../img/artigo/$codigoanuncio/");


$image-> saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/' .$nome_imagem1.'');

if ($nome_imagem2 == "n") {
} else {
if (count($error) == 0) {
$image2->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/' .$nome_imagem2.'');
}}

if ($nome_imagem3 == "n") {
} else {
if (count($error) == 0) {
$image3->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/' .$nome_imagem3.'');
}}

if ($nome_imagem4 == "n") {
} else {
if (count($error) == 0) {
$image4->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/' .$nome_imagem4.'');
}}

if ($nome_imagem5 == "n") {
} else {
if (count($error) == 0) {
$image5->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/' .$nome_imagem5.'');
}}

if ($nome_imagem6 == "n") {
} else {
if (count($error) == 0) {
$image6->saveToFile('../../../../../../img/artigo/'.$codigoanuncio.'/' .$nome_imagem6.'');
}}



  $_SESSION['msg_success'] = "Artigo postado com sucesso";
  header('Location: ../../../../home.php?link=32');
}
else

{ $_SESSION['msg'] = "Falha ao enviar o arquivo";

header("location:exibir.php");
}


break;

}


}
?>
