<?php
include "../../core/connect/conexao.php";

$id = (int)$_GET["id"];
$acao = $_GET['acao'];

switch ($acao) {

	case bloquear:

	$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Bloquear Usuario</h3>
				<p>Bloqueando o usuário impedira que este coloque artigos, editar funções, ou utilize qualquer outra função permanentemente.
				</p>
<br>
				<p>Deseja bloquear <strong>$nome</strong> ?</p>
<br>
				<p>
				<a href='content/page/area1/core/scriptAcao.php?id=$id&acao=bloquear' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button'  onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
</div>";

  break;


	case ativar:

	$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Ativar usuário</h3>
				<p>
Ativar este usuário o dará novamente acesso ao sistema e suas funções, de acordo com seu nível de acesso. </p>
	<br>
				<p>Deseja Ativar <strong>$nome</strong> ?</p>
	<br>
				<p>
				<a href='content/page/area1/core/scriptAcao.php?id=$id&acao=ativar' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";

	break;


	case excluir:

	$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Excluir usuário </h3>
				<p>
Excluir o usuário o retirará do sistema permanentemente, caso este tenha que utilizar o sistema novamente, terá que ser cadastrado novamente (Não e recomendado esta ação, somente em casos de extrema urgência)

</p>
	<br>
				<p>Deseja Excluir <strong>$nome</strong> ?</p>
	<br>
				<p>
				<a href='content/page/area1/core/scriptAcao.php?id=$id&acao=excluir' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";

	break;

	case alterar:

	$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Alterar nível </h3>
				<p>
Alterar o nível de usuários dará novas funções ao usuário ou retirara funções dele, esta opção só é recomendada depois de ter consentimento dos outros administradores ou do adm. Mestre.

</p>	<br>
				<p>Alterar nivel de <strong>$nome</strong> ?</p>
	<br>

	<form class='form-horizontal' method='post' action='content/page/area1/core/scriptAcao.php?id=$id&acao=alterar' id='validaAcesso' enctype='multipart/form-data'>

	<select name='nivel' class='form-control' required>
    <option value='0' required>Usuario</option>
    <option value='1' required>Moderador</option>
    <option value='2' required>Administrador</option>
  </select>
	<br>
				<p>

				<input value='Alterar' class='btn btn-primary' type='submit' role='button'>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
				</form>

			</div>
		</div>

	</div>
	</div>";


	break;

	case dadosUsuario:



	$sql = mysqli_query($conecta, "SELECT nome, sobrenome, fotouser, email FROM usuario WHERE id_usuario ='$idUsuario'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];
  $snome = $campo ['sobrenome'];
	$foto = $campo ['fotouser'];
	$email = $campo ['email'];

	echo "
	<br>
	<div class='jumbotron'>
	  <h1>Dados do usuário $nome</h1>
	  <p>Aqui está a lista dos dados do usuário $nome, aqui você pode alterar seus dados manualmente. </p>

	</div>

	<div class='row col-sm-6'>

    <div class='form-group'>
      <div class='col-sm-2'>

      </div>
    </div>

	<form class='form-horizontal' method='post' action='content/page/area1/core/scriptAcao.php?id=$idUsuario&acao=dadosUsuario1' id='validaAcesso' enctype='multipart/form-data'>
  <div class='form-group'>
    <label for='inputEmail3' class='col-sm-2 control-label'>Nome</label>
    <div class='col-sm-10'>
      <input type='text' name='nome' class='form-control' id='inputEmail3' value='$nome' placeholder='Primeiro nome' required>
    </div>
  </div>


  <div class='form-group'>
    <label for='inputPassword3' class='col-sm-2 control-label'>Sobrenome</label>
    <div class='col-sm-10'>
      <input type='text' name='snome' class='form-control' id='inputPassword3' value='$snome' placeholder='Nome secundario' required>
    </div>
  </div>

	<div class='form-group'>
    <div class='col-sm-offset-2 col-sm-10'>
      <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
    </div>
  </div>
</form>

<form class='form-horizontal' method='post' action='content/page/area1/core/scriptAcao.php?id=$idUsuario&acao=dadosUsuario2' id='validaAcesso' enctype='multipart/form-data'>

 <div class='form-group'>
	<label for='inputPassword3' class='col-sm-2 control-label'>E-mail</label>
	<div class='col-sm-10'>
		<input type='email' value='$email' name='email' class='form-control' id='inputPassword3' placeholder='E-mail para contato' required>
	</div>
</div>
<div class='form-group'>
	<div class='col-sm-offset-2 col-sm-10'>
		<button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
	</div>
</div>
</form>



<form class='form-horizontal' method='post' action='content/page/area1/core/scriptAcao.php?id=$idUsuario&acao=dadosUsuario3' id='validaAcesso' enctype='multipart/form-data'>


  <div class='form-group'>
  <label for='inputPassword3' class='col-sm-4 control-label'><img id='blah' class='caixa-foto-botao' alt='' width='100' height='100' src='$localfotoPessoa'></label>
  <div class='col-sm-8'>
    <input type='file' name='fotouser' id='exampleInputFile' required>
		<button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
    </div>
  </div>

	</form>

	<form class='form-horizontal' method='post' action='content/page/area1/core/scriptAcao.php?id=$idUsuario&acao=dadosUsuario4' id='validaAcesso' enctype='multipart/form-data'>

	<div class='form-group'>
	 <label for='inputPassword3' class='col-sm-2 control-label'>Trocar senha</label>
	 <div class='col-sm-10'>
		 <input type='password'  name='senha' class='form-control' id='inputPassword3' placeholder='Nova senha' required>
	 </div>
	</div>
	<div class='form-group'>
	 <div class='col-sm-offset-2 col-sm-10'>
		 <button type='submit' name='BTEnvia' class='btn btn-default'>Alterar</button>
	 </div>
	</div>

		</form>



<div class='clear'></div>
  </div>


	";


	break;

	case bloquearSeu:


		$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$idUsuario'")or die (mysqli_error());
		$campo = mysqli_fetch_array ($sql);
		$nome = $campo ['nome'];

echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Bloquear seu Usuario?</h3>
				<p>
Caso deseje bloquear manualmente seu usuário por algum motivo, clique em sim, posteriormente se desejar ativa-lo novamente, entre em contado com o adm. Mestre.
</p><br>
				<p>Deseja bloquear sua conta <strong>$nome</strong> ?</p>
<br>
				<p>
				<a href='content/page/area1/core/scriptAcao.php?id=$idUsuario&acao=bloquearSeu' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
</div>";

  break;


}


?>
