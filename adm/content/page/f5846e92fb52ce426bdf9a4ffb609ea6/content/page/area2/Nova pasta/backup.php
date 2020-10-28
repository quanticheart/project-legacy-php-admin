







<?php
session_start();
mb_internal_encoding("UTF-8");
mb_http_output( "iso-8859-1" );
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=ISO-8859-1",true);
include "conexao.php";



if(!isset($_POST["submit"])) {

echo "

<div class='row col-sm-6'>

<form class='form-horizontal' method='post' action='admin/enviar_noticia1.php' id='validaAcesso' enctype='multipart/form-data'>


<div class='form-group'>
  <div class='col-sm-12'>";


      session_start();
      if($_SESSION['msg'] != false )

    echo "<div class='alert alert-warning' role='alert'>$_SESSION[msg]</div>";

      unset($_SESSION['msg']);

  echo "</div>
</div>


<div class='form-group'>
  <label for='inputEmail3' class='col-sm-2 control-label'>Titulo</label>
  <div class='col-sm-10'>
    <input type='text' name='titulo' class='form-control' id='inputEmail3' placeholder='Primeiro nome'>
  </div>
</div>

<div class='form-group'>
  <label for='inputPassword3' class='col-sm-2 control-label'>Descrição</label>
  <div class='col-sm-10'>
    <textarea type='text' name='descricao' class='form-control' id='inputPassword3' placeholder='Nome secundario'></textarea>
  </div>
</div>";

$resultado = mysqli_query($conecta, 'SELECT * FROM categoria') or die (mysqli_error());
if (@mysqli_num_rows($resultado) == 0){
echo "<p>nada</p>";
}else{
echo "<div class='form-group'>
<label for='inputPassword3' class='col-sm-2 control-label'>Categoria</label>
<div class='col-sm-10'>
<select name='id_cat' id='cat'>";
while($dados = mysqli_fetch_array($resultado))
{
echo "<option value='$dados[id]'>$dados[nome]</option>";
}
echo "</select>    </div>
</div>";}



$resultado = mysqli_query($conecta, 'SELECT * FROM corretor') or die (mysqli_error());
if (@mysqli_num_rows($resultado) == 0){
echo "<p>nada</p>";
}else{
echo "<div class='form-group'>
<label for='inputPassword3' class='col-sm-2 control-label'>Corretor</label>
<div class='col-sm-10'>
<select name='id_corre' id='cat'>";
while($dados = mysqli_fetch_array($resultado))
{
echo "<option value='$dados[id]'>$dados[nome]</option>";
}
echo "</select>    </div>
</div>";}

echo "
<div class='form-group'>
<div class='row col-sm-12'>


  <label for='inputPassword3' class='col-sm-2 control-label'>Fotos</label>

<div class='caixa-foto-upload'>
<span class='caixa-foto'>
<input class='foto' name='img1' type='file' onchange='document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])'></img>
<img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../content/img/imgfoto.png'>
</span>

</div>

<div class='caixa-foto-upload'>
<span class='caixa-foto'>
<input class='foto' name='img2' type='file' onchange='document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])'></img>
<img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../content/img/imgfoto.png'>
</span>

</div>

<div class='caixa-foto-upload'>
<span class='caixa-foto'>
<input class='foto' name='img3' type='file' onchange='document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])'></img>
<img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../content/img/imgfoto.png'>
</span>

</div>

</div>
</div>


<div class='form-group'>
<div class='row col-sm-12'>


  <label for='inputPassword3' class='col-sm-2 control-label'></label>

<div class='caixa-foto-upload'>
<span class='caixa-foto'>
<input class='foto' name='img4' type='file' onchange='document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])'></img>
<img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../content/img/imgfoto.png'>
</span>

</div>

<div class='caixa-foto-upload'>
<span class='caixa-foto'>
<input class='foto' name='img5' type='file' onchange='document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])'></img>
<img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../content/img/imgfoto.png'>
</span>

</div>

<div class='caixa-foto-upload'>
<span class='caixa-foto'>
<input class='foto' name='img6' type='file' onchange='document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])'></img>
<img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../content/img/imgfoto.png'>
</span>

</div>

</div>
</div>

<div class='form-group'>
  <label for='inputEmail3' class='col-sm-2 control-label'>Endereço</label>
  <div class='col-sm-10'>
    <input type='text' name='endereco' class='form-control' id='inputEmail3' placeholder='Primeiro nome'>
  </div>
</div>


<div class='form-group'>
  <label for='inputEmail3' class='col-sm-2 control-label'>numero</label>
  <div class='col-sm-10'>
    <input type='text' name='endnum' class='form-control' id='inputEmail3' placeholder='Primeiro nome'>
  </div>
</div>


<div class='form-group'>
  <label for='inputEmail3' class='col-sm-2 control-label'>regiao</label>
  <div class='col-sm-10'>
    <input type='text' name='regiao' class='form-control' id='inputEmail3' placeholder='Primeiro nome'>
  </div>
</div>

<div class='form-group'>
  <label for='inputEmail3' class='col-sm-2 control-label'>valor</label>
  <div class='col-sm-10'>
    <input type='text' name='valor' class='form-control' id='inputEmail3' placeholder='Primeiro nome'>
  </div>
</div>


<div class='form-group'>
  <label for='inputEmail3' class='col-sm-2 control-label'>numero disponivel</label>
  <div class='col-sm-10'>
    <input type='text' name='ndisponivel' class='form-control' id='inputEmail3' placeholder='Primeiro nome'>
  </div>
</div>



<div class='form-group'>
  <div class='col-sm-offset-2 col-sm-10'>
    <button type='submit' name='BTEnvia' class='btn btn-default'>Cadastrar</button>
  </div>
</div>
</form>



</div>

";
}



?>




























































<?php

include "conexao.php";?>

<div class="row col-sm-6">

<form class="form-horizontal" method="post" action="admin/enviar_noticia.php" id="validaAcesso" enctype="multipart/form-data">


<div class="form-group">
  <div class="col-sm-12">

   <?php
      session_start();
      if($_SESSION['msg'] != false )

    echo "<div class='alert alert-warning' role='alert'>$_SESSION[msg]</div>";

      unset($_SESSION['msg']);?>

  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Titulo</label>
  <div class="col-sm-10">
    <input type="text" name="titulo" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>

<div class="form-group">
  <label for="inputPassword3" class="col-sm-2 control-label">Descrição</label>
  <div class="col-sm-10">
    <textarea type="text" name="descricao" class="form-control" id="inputPassword3" placeholder="Nome secundario"></textarea>
  </div>
</div>

<?php
$resultado = mysqli_query($conecta, "SELECT * FROM categoria") or die (mysqli_error());
if (@mysqli_num_rows($resultado) == 0){
echo "<p>nada</p>";
}else{
echo "<div class='form-group'>
<label for='inputPassword3' class='col-sm-2 control-label'>Categoria</label>
<div class='col-sm-10'>
<select name='id_cat' id='cat'>";
while($dados = mysqli_fetch_array($resultado))
{
echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";
}
echo "</select>    </div>
</div>";}
?>

<?php
$resultado = mysqli_query($conecta, "SELECT * FROM corretor") or die (mysqli_error());
if (@mysqli_num_rows($resultado) == 0){
echo "<p>nada</p>";
}else{
echo "<div class='form-group'>
<label for='inputPassword3' class='col-sm-2 control-label'>Corretor</label>
<div class='col-sm-10'>
<select name='id_corre' id='cat'>";
while($dados = mysqli_fetch_array($resultado))
{
echo "<option value='".$dados['id']."'>".$dados['nome']."</option>";
}
echo "</select>    </div>
</div>";}
?>

<div class="form-group">
<div class="row col-sm-12">


  <label for="inputPassword3" class="col-sm-2 control-label">Fotos</label>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img1" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img2" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img3" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

</div>
</div>


<div class="form-group">
<div class="row col-sm-12">


  <label for="inputPassword3" class="col-sm-2 control-label"></label>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img4" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img5" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

<div class="caixa-foto-upload">
<span class="caixa-foto">
<input class='foto' name="img6" type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])"></img>
<img id="blah" class="caixa-foto-botao" alt="" width="100" height="100" src='../../content/img/imgfoto.png'>
</span>

</div>

</div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Endereço</label>
  <div class="col-sm-10">
    <input type="text" name="endereco" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">numero</label>
  <div class="col-sm-10">
    <input type="text" name="endnum" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">regiao</label>
  <div class="col-sm-10">
    <input type="text" name="regiao" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>

<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">valor</label>
  <div class="col-sm-10">
    <input type="text" name="valor" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>


<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">numero disponivel</label>
  <div class="col-sm-10">
    <input type="text" name="ndisponivel" class="form-control" id="inputEmail3" placeholder="Primeiro nome">
  </div>
</div>



<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" name="BTEnvia" class="btn btn-default">Cadastrar</button>
  </div>
</div>
</form>



</div>





<?php
session_start();
mb_internal_encoding("UTF-8");
mb_http_output( "iso-8859-1" );
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=ISO-8859-1",true);
include "conexao.php";



if(!isset($_POST["submit"])) {


}
else {

	$idUsuario = $_SESSION['id_usuario'];
  $id_cat = $_POST["id_cat"];
  $id_corre = $_POST["id_corre"];
  $codigoanuncio = rand(1000000, 9999999);
	$titulo = $_POST["titulo"];
	$descricao = $_POST["descricao"];
	$endereco = $_POST["endereco"];
	$endnum = $_POST['endnun'];
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
          	$nome_imagem = img1.(md5(uniqid(time()))) . "." . $ext[1];
          	// Caminho de onde ficarÃ¡ a imagem
          	$caminho_imagem = "img/" . $nome_imagem;
  			// Faz o upload da imagem para seu respectivo caminho
  			move_uploaded_file($img1["tmp_name"], $caminho_imagem);
  }}





	$sql_enviar_noticia = mysqli_query($conecta, "INSERT INTO artigo ( id_usuario, id_cat, id_corre, codigoanuncio, titulo, descricao, endereco,valor, ndisponivel, regiao, img1, financia, ativo, destaque, destaqueluxo, data, hora, ip) VALUES ('', '$idUsuario', '$id_cat', '$id_corre', '$codigoanuncio', '$titulo', '$descricao', '$endereco', '$endnum', '$valor', '$ndisponivel', '$regiao', '$img1', '$img1','$img1','$img1','$img1','$img1', 'n', 'n', 'n', 'n',  '$data', 'hora', '$ip')")or die (mysqli_error());



	session_start();
 if($sql_enviar_noticia=true){



 $_SESSION['msg'] = "Noticia cadastrada com sucesso!";
Header("Location: ../home.php");
 }
 else

 { $_SESSION['msg'] = "Falha ao enviar o arquivo";

 header("location:exibir.php");
}
}
?>













































<?php $idUsuario = $_SESSION['id_usuario'];
$id_cat = $_POST["id_cat"];
$id_corre = $_POST["id_corre"];
$codigoanuncio = rand(1000000, 9999999);
$titulo = $_POST["titulo"];
$descricao = $_POST["descricao"];
$endereco = $_POST["endereco"];
$endnum = $_POST['endnun'];
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
          $nome_imagem = img1.(md5(uniqid(time()))) . "." . $ext[1];
          // Caminho de onde ficarÃ¡ a imagem
          $caminho_imagem = "img/" . $nome_imagem;
      // Faz o upload da imagem para seu respectivo caminho
      move_uploaded_file($img1["tmp_name"], $caminho_imagem);
}}





$sql_enviar_noticia = mysqli_query($conecta, "INSERT INTO artigo ( id, id_usuario, id_cat, id_corre, codigoanuncio, titulo, descricao, endereco, endnum, valor, ndisponivel, regiao, img1, img2, img3, img4, img5, img6, financia, ativo, destaque, destaqueluxo, data, hora, ip) VALUES ('', '$idUsuario', '$id_cat', '$id_corre', '$codigoanuncio', '$titulo', '$descricao', '$endereco', '$endnum', '$valor', '$ndisponivel', '$regiao', '$img1', '$img2','$img3','$img4','$img5','$img6', 'n', 'n', 'n', 'n',  '$data', 'hora', '$ip')")or die (mysqli_error());



session_start();
if($sql_enviar_noticia=true){



$_SESSION['msg'] = "Noticia cadastrada com sucesso!";
Header("Location: ../../home.php");
}
else

{ $_SESSION['msg'] = "Falha ao enviar o arquivo";

header("location:exibir.php");
}
?>
