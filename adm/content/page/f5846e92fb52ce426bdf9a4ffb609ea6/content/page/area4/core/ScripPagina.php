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

	$sql = mysqli_query($conecta, "SELECT nome FROM corretor WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Excluir corretor</h3>
				<p>
Deseja excluir o corretor <strong>$nome</strong> do sistema de artigos?</p>
	<br>
	<br>
				<p>
				<a href='content/page/area4/core/scriptAcao.php?id=$id&acao=excluir' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";

	break;

	case alterar:

	$sql = mysqli_query($conecta, "SELECT * FROM corretor WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$id = $campo ['id'];
  $nome = $campo ['nome'];
	$email = $campo ['email'];
	$cel1 = $campo ['cel1'];
	$cel2 = $campo ['cel2'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Alterar corretor</h3>
				<p>
Aqui estão os dados no corretor <strong>$nome</strong>, alterar estes dados, irá alterar os dados no site também.</p>
<br>
	<br>

	<form class='form-horizontal' method='post' action='content/page/area4/core/scriptAcao.php?id=$id&acao=alterar' id='validaAcesso' enctype='multipart/form-data'>

	<div class='form-group'>
		<div class='col-sm-12'>
			<input type='text' name='nome' class='form-control' id='inputEmail3' value='$nome' placeholder='Nome abreviado' required>
		</div>
	</div>


		<div class='form-group'>
			<div class='col-sm-12'>
				<input type='text' name='email' class='form-control' id='inputEmail3' value='$email' placeholder='E-mail de contato' required>
			</div>
		</div>


			<div class='form-group'>
				<div class='col-sm-12'>
					<input type='text' name='cel1' class='form-control' id='inputEmail3' value='$cel1' placeholder='Celular' required>
				</div>
			</div>


				<div class='form-group'>
					<div class='col-sm-12'>
						<input type='text' name='cel2' class='form-control' id='inputEmail3' value='$cel2' placeholder='Celular ou telefone' required>
					</div>
				</div>


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


	case email:

	$sql = mysqli_query($conecta, "SELECT * FROM corretor WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$id = $campo ['id'];
  $nome = $campo ['nome'];
	$email = $campo ['email'];
	$cel1 = $campo ['cel1'];
	$cel2 = $campo ['cel2'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-8'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Enviar E-mail</h3>
				<p>
Preencha os campos necessários para enviar um e-mail para o corretor <strong>$nome</strong><br>
	<br>

	<form class='form-horizontal' method='post' action='content/page/area4/core/scriptAcao.php?id=$id&id_u=$idUsuario&acao=email' id='validaAcesso' enctype='multipart/form-data'>

	<div class='form-group'>
		<label for='inputEmail3' class='col-sm-2 control-label'>Assunto</label>
		<div class='col-sm-10'>
			<input type='text' name='assunto' class='form-control' id='inputEmail3' placeholder='Assunto da Mensagem' required>
		</div>
	</div>


	<div class='form-group'>
		<label for='inputEmail3' class='col-sm-2 control-label'>Mensagem</label>
		<div class='col-sm-10'>
			<textarea  name='msg' rows='10' class='form-control' id='inputEmail3' placeholder='Digite o texto que sera enviado por E-mail' required></textarea>
		</div>
	</div>


	<br>
				<p>

				<input value='Enviar E-mail' class='btn btn-primary' type='submit' role='button'>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
				</form>

			</div>
		</div>

	</div>
	</div>";


	break;

}


?>
