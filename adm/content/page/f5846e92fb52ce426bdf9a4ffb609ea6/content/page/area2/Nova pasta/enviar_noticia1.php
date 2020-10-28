<?php
session_start();
include "conexao.php";


$idUsuario = $_SESSION['id_usuario'];
$id_cat = $_POST["id_cat"];
$id_corre = $_POST["id_corre"];
$codigoanuncio = rand(1000000, 9999999);
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$endereco = $_POST["endereco"];
$endnum = $_POST['endnum'];
$valor = $_POST['valor'];
$ndisponivel = $_POST['ndisponivel'];
$regiao = $_POST['regiao'];


date_default_timezone_set('America/Sao_Paulo');
$data = date('d/m/Y');
$hora = date('H:i:s');
$ip = $_SERVER["REMOTE_ADDR"];


$img1 = $_FILES["img1"];
  // Se a foto estiver sido selecionada
  if (!empty($img1["name"])) {
    // Largura mÃ¡xima em pixels
    $largura = 1000;
    // Altura mÃ¡xima em pixels
    $altura = 1000;
    // Tamanho mÃ¡ximo do arquivo em bytes
    $tamanho = 10000;

      // Verifica se o arquivo Ã© uma imagem
      if(!eregi("^image\/(jpg|png|gif)$", $img1["type"])){
    session_start();
        $_SESSION['msg'] = "Isso nÃ£o Ã© uma imagem valida.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
      }

    // Pega as dimensÃµes da imagem
    $dimensoes = getimagesize($img1["tmp_name"]);
    // Verifica se a largura da imagem Ã© maior que a largura permitida
    if($dimensoes[0] > $largura) {
    session_start();
        $_SESSION['msg'] = "A largura da imagem nÃ£o deve ultrapassar ".$largura." pixels";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    // Verifica se a altura da imagem Ã© maior que a altura permitida
    if($dimensoes[1] > $altura) {
    session_start();
        $_SESSION['msg'] = "Altura da imagem nÃ£o deve ultrapassar ".$altura." pixels";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    // Verifica se o tamanho da imagem Ã© maior que o tamanho permitido
    if($arquivo["size"] > $tamanho) {
    session_start();
        $_SESSION['msg'] = "A imagem deve ter no mÃ¡ximo ".$tamanho." bytes";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    // Se nÃ£o houver nenhum erro
    if (count($error) == 0) {
      // Pega extensÃ£o da imagem
      preg_match("/\.(gif|png|jpg){1}$/i", $img1["name"], $ext);

          // Gera um nome Ãºnico para a imagem
          $nome_imagem1 = $codigoanuncio.'-'.img1.'-'.(md5(uniqid(time()))) . "." . $ext[1];
          // Caminho de onde ficarÃ¡ a imagem
          $caminho_imagem = "img/" . $nome_imagem1;
      // Faz o upload da imagem para seu respectivo caminho
      move_uploaded_file($img1["tmp_name"], $caminho_imagem);
}}

$img2 = $_FILES["img2"];
  // Se a foto estiver sido selecionada
  if (!empty($img2["name"])) {
    // Largura mÃ¡xima em pixels
    $largura = 1000;
    // Altura mÃ¡xima em pixels
    $altura = 1000;
    // Tamanho mÃ¡ximo do arquivo em bytes
    $tamanho = 10000;

      // Verifica se o arquivo Ã© uma imagem
      if(!eregi("^image\/(jpg|png|gif)$", $img2["type"])){
    session_start();
        $_SESSION['msg'] = "Isso nÃ£o Ã© uma imagem valida.";
        header("Location: {$_SERVER['HTTP_REFERER']}");
      }

    // Pega as dimensÃµes da imagem
    $dimensoes = getimagesize($img2["tmp_name"]);
    // Verifica se a largura da imagem Ã© maior que a largura permitida
    if($dimensoes[0] > $largura) {
    session_start();
        $_SESSION['msg'] = "A largura da imagem nÃ£o deve ultrapassar ".$largura." pixels";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    // Verifica se a altura da imagem Ã© maior que a altura permitida
    if($dimensoes[1] > $altura) {
    session_start();
        $_SESSION['msg'] = "Altura da imagem nÃ£o deve ultrapassar ".$altura." pixels";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    // Verifica se o tamanho da imagem Ã© maior que o tamanho permitido
    if($arquivo["size"] > $tamanho) {
    session_start();
        $_SESSION['msg'] = "A imagem deve ter no mÃ¡ximo ".$tamanho." bytes";
        header("Location: {$_SERVER['HTTP_REFERER']}");
    }

    // Se nÃ£o houver nenhum erro
    if (count($error) == 0) {
      // Pega extensÃ£o da imagem
      preg_match("/\.(gif|png|jpg){1}$/i", $img2["name"], $ext);

          // Gera um nome Ãºnico para a imagem
          $nome_imagem2 = $codigoanuncio.'-'.img2.'-'.(md5(uniqid(time()))) . "." . $ext[1];
          // Caminho de onde ficarÃ¡ a imagem
          $caminho_imagem = "img/" . $nome_imagem2;
      // Faz o upload da imagem para seu respectivo caminho
      move_uploaded_file($img2["tmp_name"], $caminho_imagem);
}}





$sql_enviar_noticia = mysqli_query($conecta, "INSERT INTO artigo ( id, id_usuario, id_cat, id_corre, codigoanuncio, titulo, descricao, endereco, endnun, valor, ndisponivel, regiao, img1, img2, img3, img4, img5, img6, financia, ativo, destaque, destaqueluxo, data, hora, ip) VALUES ('', '$idUsuario', '$id_cat', '$id_corre', '$codigoanuncio', '$titulo', '$descricao', '$endereco', '$endnum', '$valor', '$ndisponivel', '$regiao', '$nome_imagem1', '$nome_imagem2', '', '', '', '', 'n', 'n', 'n', 'n', '$data', '$hora', '$ip')")or die (mysqli_error());



session_start();
if($sql_enviar_noticia=true){



$_SESSION['msg'] = "Noticia cadastrada com sucesso!";
Header("Location: ../home.php");
}
else

{ $_SESSION['msg'] = "Falha ao enviar o arquivo";

header("location:exibir.php");
}
?>
