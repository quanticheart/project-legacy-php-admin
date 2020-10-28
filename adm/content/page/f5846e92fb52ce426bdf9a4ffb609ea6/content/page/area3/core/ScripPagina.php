<?php
include "../../core/connect/conexao.php";

$id = (int)$_GET["id"];
$acao = $_GET['acao'];

switch ($acao) {

	case bloquear:

	$sql = mysqli_query($conecta, "SELECT nome FROM categoria WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Bloquear Categoria</h3>
				<p>Bloqueando a categoria ira resultar no ocultamento de todos os posts nela cadastrados.
				</p>
<br>
				<p>Deseja bloquear <strong>$nome</strong> ?</p>
<br>
				<p>
				<a href='content/page/area3/core/scriptAcao.php?id=$id&acao=bloquear' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button'  onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
</div>";

  break;


	case ativar:

	$sql = mysqli_query($conecta, "SELECT nome FROM categoria WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Ativar categoria</h3>
				<p>
Ativar a categoria ira resultar na exibição de todos os posts nela cadastrados.
	<br>
				<p>Deseja Ativar <strong>$nome</strong> ?</p>
	<br>
				<p>
				<a href='content/page/area3/core/scriptAcao.php?id=$id&acao=ativar' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";

	break;


	case excluir:

	$sql = mysqli_query($conecta, "SELECT nome FROM categoria WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Excluir categoria</h3>
				<p>
Excluir uma categoria cadastrada e extremamente perigoso, todos os posts adicionados nesta categoria ficarão inativos, não é recomendado caso não aja o consentimento do adm. Mestre.
</p>
	<br>
				<p>Deseja Excluir <strong>$nome</strong> ?</p>
	<br>
				<p>
				<a href='content/page/area3/core/scriptAcao.php?id=$id&acao=excluir' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";

	break;

	case alterar:

	$sql = mysqli_query($conecta, "SELECT nome FROM categoria WHERE id ='$id'")or die (mysqli_error());
	$campo = mysqli_fetch_array ($sql);
	$nome = $campo ['nome'];

	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Alterar categoria</h3>
				<p>
Alterar o nome da categoria, irá modificar o nome no site também, não é recomendado caso aja artigos cadastrados nela.
</p>
<br>
				<p>Alterar o nome da categoria <strong>$nome</strong> ?</p>
	<br>

	<form class='form-horizontal' method='post' action='content/page/area3/core/scriptAcao.php?id=$id&acao=alterar' id='validaAcesso' enctype='multipart/form-data'>

	<div class='form-group'>
		<div class='col-sm-12'>
			<input type='text' name='nome' class='form-control' id='inputEmail3' value='$nome' placeholder='Primeiro nome' required>
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

	


}


?>
