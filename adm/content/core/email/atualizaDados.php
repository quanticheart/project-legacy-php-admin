
<?php

$acao = $_GET['acao'];
$recebeEmail = $_GET["email"];
include_once "../connect/conexao.php";

switch ($acao) {

  case senha:

$recebeSenha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
$criptografada = md5($recebeSenha);

//Nesse if, faço uma conferência em relação à senha informada. Se não for informada nenhuma, retorno a mensagem para que o usuário informe algo!
if (empty($recebeSenha)) {
  session_start();
  $_SESSION['msg_warning'] = "Senha vazia, digite uma senha";
  header("Location: {$_SERVER['HTTP_REFERER']}");
  return false;
} else {

//Agora vamos atualizar os dados no banco
$atualizaDados = mysqli_query($conecta, "UPDATE usuario SET passlogin = '$criptografada' WHERE email = '$recebeEmail'") or die (mysqli_error());


if($atualizaDados=true){

  $codigo = $_POST["codigo"];
  $deletarcodigo = mysqli_query($conecta,"DELETE FROM codigo_email WHERE codigo = '$codigo'")or die (mysqli_error());
session_start();
 if($deletarcodigo=true){
   
   $_SESSION['msg_success'] = "Senha atualizada com sucesso";
   header("Location: $site");
}else{
 
  $_SESSION['msg_danger'] = "Erro ao atualizar";
  header("Location: {$_SERVER['HTTP_REFERER']}");
}
}
}
break;

  case ativa:

  
  include "../../plugin/WideImage/WideImage.php";
  //Recebendo os dados e tratando os mesmos para inserção no banco
  $recebeSeuNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $confereSeuNome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_MAGIC_QUOTES);

  $recebeSeuSNome = filter_input(INPUT_POST, 'snome', FILTER_SANITIZE_SPECIAL_CHARS);
  $confereSeuSNome = filter_input(INPUT_POST, 'snome', FILTER_SANITIZE_MAGIC_QUOTES);

  $recebeNomeUsuario = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_SPECIAL_CHARS);
  $confereNomeUsuario = filter_input(INPUT_POST, 'nomeUsuario', FILTER_SANITIZE_MAGIC_QUOTES);

  $recebeEmail = filter_input(INPUT_POST, 'emailControle', FILTER_VALIDATE_EMAIL);

  $recebeSenha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
  $criptografada = md5($recebeSenha);

  $foto = $_FILES["fotouser"];

  $consultaBanco = mysqli_query($conecta, "SELECT * FROM usuario WHERE userlogin = '$confereNomeUsuario'") or die (mysqli_error($consultaBanco));
  $verificaBanco = mysqli_num_rows($consultaBanco);
  if($verificaBanco == 1){
  session_start();
  $_SESSION['msg_warning'] = "Este nome de usuario ja esta cadastrado";
  echo "<script>history.go(-1)</script>";
  return false;
  } else {


    if ($confereSeuNome != $recebeSeuNome) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um nome valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    else if ($confereSeuSNome != $recebeSeuSNome) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um sobrenome valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    else if ($confereNomeUsuario != $recebeNomeUsuario) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um nome de usuario valido";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if (empty($recebeEmail)) {
    session_start();
    $_SESSION['msg_warning'] = "Digite um Email";
    echo "<script>history.go(-1)</script>";
    return false;
    }

    if (empty($recebeSenha)) {
    session_start();
    $_SESSION['msg_warning'] = "Digite uma senha";
    echo "<script>history.go(-1)</script>";
    return false;
    }

  else {

$extensoes_permitidas = array('.jpg', '.gif', '.png');
$extensao = strrchr($_FILES["fotouser"]['name'], '.');

if(in_array($extensao, $extensoes_permitidas) === false)
{
    session_start();
    $_SESSION['msg_warning'] = "Selecione uma imagem valida";
    echo "<script>history.go(-1)</script>";
    return false;
}
  
  
$image = WideImage::load($foto["tmp_name"]);
$image = $image->resize(300, 300 , 'fill');
preg_match("/\.(gif|png|jpg){1}$/i", $foto["name"], $ext);
$nome_imagem = user.(md5(uniqid(time()))) . "." . $ext[1];

      }		}

  //Agora vamos inserir os dados no banco
  $insereDados = mysqli_query($conecta, "UPDATE usuario SET  nome = '$confereSeuNome',  sobrenome = '$confereSeuSNome',  fotouser = '$nome_imagem', userlogin = '$recebeNomeUsuario',  passlogin = '$criptografada', ativo = 's', data_ultimo = NOW() WHERE email = '$recebeEmail'") or die (mysqli_error());

      session_start();
  		if($insereDados=true){

          $codigo = $_POST["codigo"];
          $deletarcodigo = mysqli_query($conecta,"DELETE FROM codigo_email WHERE codigo = '$codigo'")or die (mysqli_error());
	        if($deletarcodigo=true){
				$image->saveToFile('../../img/user/'.$nome_imagem.'');
			


          $consultaInformacoes = mysqli_query($conecta, "SELECT * FROM usuario WHERE email = '$recebeEmail' AND ativo = 's'") or die (mysqli_error());
          $verificaInformacoes = mysqli_num_rows($consultaInformacoes);
          if($consultaInformacoes == 1){
          while ($linha=mysqli_fetch_array($consultaInformacoes)) {
          $nome = $linha["nome"];
          $foto = $linha["fotouser"];

        $headers = "Content-type:text/html; charset=utf-8";

        $destino = $recebeEmail;
        $de = utf8_decode("Bem vindo $nome - $nomesite");
        $assunto = "Sistema Interno";

        include ("mail/htmlativado.php");
        include ("mail/Email.php");


        if($mail->Send($headers, $destino, $html )){
          session_start();
          $_SESSION['msg_success'] = "Bem vindo <strong>$nome</strong>.";
           header("Location: $site");
        }

       
     	 	}	}}else {
          $_SESSION['msg_danger'] = "erro ao deletar codigo";
             header("Location: {$_SERVER['HTTP_REFERER']}");

        }

}

        else{
  		 $_SESSION['msg_danger'] = "Erro ao cadastrar";
          header("Location: {$_SERVER['HTTP_REFERER']}");
  		}


  



  

  break;
}
?>
