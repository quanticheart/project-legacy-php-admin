<?php
include "../../core/connect/conexao.php";

$id = (int)$_GET["id"];
$acao = $_GET['acao'];

switch ($acao) {

	case alterar:

$mostraDados = mysqli_query($conecta, "SELECT * FROM cor WHERE id = $id") or die (mysqli_error($mostraDados));
while ($linha=mysqli_fetch_array($mostraDados)) {

	$nome = $linha["nome"];
	$cor1 = $linha["cor1"];
	$cor2 = $linha["cor2"];
 $ativo = $linha["ativo"];


		echo "<div class='row'>
			<div class='col-sm-6 col-md-4'>

				<div class='thumbnail'>
					<div class='caption text-center'>
						<h3>Cores hexadecimais</h3>
						<p>
Editar cores já aprovadas pelo sistema não são recomendadas a menos que tenha o consentimento do adm. Mestre
</p>
		<br>

		<form class='form-horizontal' method='post' action='content/page/area1/cor/corAcao.php?acao=alterar&id=$id' id='validaAcesso' enctype='multipart/form-data'>

		<div class='input-group col-sm-12'>
		<input name='nome' type='text' class='form-control' value='$nome' placeholder='Nome de apresentação' required>
		</div>
		<div class='input-group col-sm-12'>
		<input name='Cor-1' type='text' class='form-control' value='$cor1' placeholder='Somente cores hexadecimais' required>
		</div>
		<div class='input-group col-sm-12'>
		<input name='Cor-2' type='text' class='form-control' value='$cor2' placeholder='Exp: #FFFFFF' required>
		</div>
		<br>
						<p>
						<input type='submit' value='Alterar' class='btn btn-primary' role='button'>
						<a href='#' class='btn btn-default' role='button'  onclick='history.go(-1)'>Cancelar</a>
						</p>
					</div>
				</div>

			</div>
		</div>";
}
	break;

	case excluir:

	$mostraDados = mysqli_query($conecta, "SELECT * FROM cor WHERE id = $id") or die (mysqli_error($mostraDados));
	while ($linha=mysqli_fetch_array($mostraDados)) {

		$nome = $linha["nome"];


	echo "<div class='row'>
	<div class='col-sm-6 col-md-4'>

		<div class='thumbnail'>
			<div class='caption text-center'>
				<h3>Excluir cor $nome</h3>
				<p>
Esta ação não é recomendada, a menos que tenha o consentimento do adm. Mestre.

</p>

	<br>
				<p>Deseja Excluir a cor <strong>$nome</strong> ?</p>
	<br>
				<p>
				<a href='content/page/area1/cor/corAcao.php?acao=excluir&id=$id' class='btn btn-primary' role='button'>SIM</a>
				<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>NÃO</a>
				</p>
			</div>
		</div>

	</div>
	</div>";
}
	break;

	case cadastroCor:


		$sql = mysqli_query($conecta, "SELECT nome FROM usuario WHERE id_usuario ='$idUsuario'")or die (mysqli_error());
		$campo = mysqli_fetch_array ($sql);
		$nome = $campo ['nome'];

		echo "<div class='row'>
			<div class='col-sm-6 col-md-4'>

				<div class='thumbnail'>
					<div class='caption text-center'>
						<h3>Cores hexadecimais</h3>
						<p>
						Cadastre somente cores no formato hexadecimal, só cadastre cores aprovadas pelo adm. Mestre, procure cadastrar cores que trabalhem em harmonia, e coloque um nome a que faça jus a harmonia.
						<br><br>Exp de hexadecimal = #FFFFFF
</p>
		<br>

		<form class='form-horizontal' method='post' action='content/page/area1/cor/corAcao.php?acao=cadastroCor' id='validaAcesso' enctype='multipart/form-data'>

		<div class='input-group col-sm-12'>
		<input name='nome' type='text' class='form-control' placeholder='Nome de apresentação' required>
		</div>
		<div class='input-group col-sm-12'>
		<input name='Cor-1' type='text' class='form-control' placeholder='Cor primaria' required>
		</div>
		<div class='input-group col-sm-12'>
		<input name='Cor-2' type='text' class='form-control' placeholder='Cor segundaria' required>
		</div>
		<br>
						<p>
						<input type='submit' value='Cadastrar' class='btn btn-primary' role='button'>
						<a href='#' class='btn btn-default' role='button' onclick='history.go(-1)'>Cancelar</a>
						</p>
					</div>
				</div>

			</div>
		</div>";

	break;


}


?>
