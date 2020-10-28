<?php
include "../../core/connect/conexao.php";

$id = (int)$_GET["id"];
$acao = $_GET['acao'];

switch ($acao) {

	

	case dadosSite:



	$sql = mysqli_query($conecta, "SELECT * FROM site")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$site        = $campo ['site'];
    $title       = $campo ['title'];
	$description = $campo ['description'];
	$keywords    = $campo ['keywords'];
	$cel1        = $campo ['cel1'];
    $cel2        = $campo ['cel2'];
    $logo        = $campo ['logo'];
    $mlogo       = $campo ['mlogo'];	
    $flogo       = $campo ['flogo'];	
    $face        = $campo ['face'];	
    $google      = $campo ['google'];	
    $youtube     = $campo ['youtube'];	
    $email1      = $campo ['email1'];
    $email2      = $campo ['email2'];
    $emaildesc   = $campo ['emaildesc'];
	
	echo "
	<br>
	<div class='jumbotron'>
	  <h1>Dados do Site $title</h1>
	  <p> Dados do site, aqui você pode alterar seus dados manualmente. </p>
	  <p style='color:red;'> ** ATENÇÂO ** </p>
      <p style='color:red;'> ** A alteração de alguns dados podem afetar recebimentos de E-mail , buscas e o rendimento do site, so faça essas alteraçoes depois de consultar o programandor ** </p>
	  
	  
	  
	</div>

	<div class='row col-sm-6'>

    <div class='form-group'>
      <div class='col-sm-2'>

      </div>
    </div>

	<form class='form-horizontal' method='post' action='content/page/area1/core/scriptsite.php?acao=dados' id='validaAcesso' enctype='multipart/form-data'>
 
 <div class='form-group'>
    <label for='inputEmail3' class='col-sm-2 control-label'>URL</label>
    <div class='col-sm-10'>
      <input type='text' name='site' class='form-control' id='inputEmail3' value='$site' placeholder='http://exemplo.com/' required>
    </div>
  </div>


  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Titulo</label>
    <div class='col-sm-10'>
      <input type='text' name='title' class='form-control'  value='$title' placeholder='Titulo do site' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Descrição</label>
    <div class='col-sm-10'>
      <textarea rows='5'  name='desc' class='form-control'  value='' placeholder='Descrição do site com ate 180 caracteres.' required>$description</textarea>
    </div>
  </div>

  
   <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Chaves de pesquisa</label>
    <div class='col-sm-10'>
      <textarea rows='9'  name='chave' class='form-control'  value='' placeholder='Digite chaves para pesquisa seguidas de virgula Exemplo .: carro , lava-rapido ,' required>$keywords</textarea>
    </div>
  </div>
  
 
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Telefone</label>
    <div class='col-sm-10'>
      <input type='text' name='cel1' class='form-control' value='$cel1' placeholder='Telefone' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Celular</label>
    <div class='col-sm-10'>
      <input type='text' name='cel2' class='form-control'  value='$cel2' placeholder='Celular' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Facebook</label>
    <div class='col-sm-10'>
      <input type='text' name='face' class='form-control'  value='$face' placeholder='Facebook' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Google+</label>
    <div class='col-sm-10'>
      <input type='text' name='google' class='form-control'  value='$google' placeholder='Google+' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Youtube</label>
    <div class='col-sm-10'>
      <input type='text' name='youtube' class='form-control'  value='$youtube' placeholder='Youtube' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>E-mail principal</label>
    <div class='col-sm-10'>
      <input type='email' name='email1' class='form-control'  value='$email1' placeholder='E-mail primario' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>E-mail secundario</label>
    <div class='col-sm-10'>
      <input type='email' name='email2' class='form-control'  value='$email2' placeholder='E-mail secundario' required>
    </div>
  </div>
  
  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Descrição do email</label>
    <div class='col-sm-10'>
     
	   <textarea rows='9'  name='emaildesc' class='form-control'  value='' placeholder='Descrição de E-mail' required>$emaildesc</textarea>
    </div>
  </div>
  
 
  
	<div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
    </div>
  </div>
</form>



<form class='form-horizontal' method='post' action='content/page/area1/core/scriptsite.php?acao=logo' id='validaAcesso' enctype='multipart/form-data'>


  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-4 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../img/$logo'></label>
  <div class='col-sm-8'>
    <input type='file' name='logo' id='exampleInputFile' required>
		<button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
    </div>
  </div>

	</form>

<form class='form-horizontal' method='post' action='content/page/area1/core/scriptsite.php?acao=flogo' id='validaAcesso' enctype='multipart/form-data'>


  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-4 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../img/$flogo'></label>
  <div class='col-sm-8'>
    <input type='file' name='logo' id='exampleInputFile' required>
		<button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
    </div>
  </div>

	</form>
	
	<form class='form-horizontal' method='post' action='content/page/area1/core/scriptsite.php?acao=mlogo' id='validaAcesso' enctype='multipart/form-data'>


  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-4 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='../../img/$mlogo'></label>
  <div class='col-sm-8'>
    <input type='file' name='logo' id='exampleInputFile' required>
		<button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
    </div>
  </div>

	</form>



<div class='clear'></div>
  </div>


	";


	break;




}


?>
