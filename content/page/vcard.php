<?php
include "content/core/connect/conexao.php";
$acao = $_GET['acao'];
$cod  = $_GET['cod'];
switch ($acao) {
				case adm:
								$mostraDados = mysqli_query($conecta, "SELECT nome , snome FROM contato_adm WHERE cod = '$cod'") or die(mysqli_error());
								while ($linha = mysqli_fetch_array($mostraDados)) {
												$nome  = $linha["nome"];
												$snome = $linha["snome"];
												echo "<div class='container'>
		<div class='col-sm-8 col-sm-offset-2'>
										<h3 class='hdg light'>Guardar contato de<br></h3>
                                         <h2 class='hdg light'>$nome $snome</h2>
						<p class='padding-50 line-lg corb'>
				Facilitando para você, e só clicar no botão a baixo e guardar o contato de <strong>$nome</strong> no seu celular, extremamente fácil e rápido. 
							<br><br>
							
							<form class='form-horizontal' method='post' action='content/plugin/vcard/vcuser_adm.php?cod=$cod' id='validaAcesso' enctype='multipart/form-data'>
							<input type='submit' class='btn btn-default upper' name='BTEnvia' value='Salvar contato!'/> 
								</form>
							<br><br>							

					</div>
	</div>";
								}
								break;
				case user:
								$mostraDados = mysqli_query($conecta, "SELECT nome , snome FROM contato WHERE cod = '$cod'") or die(mysqli_error());
								while ($linha = mysqli_fetch_array($mostraDados)) {
												$nome  = $linha["nome"];
												$snome = $linha["snome"];
												echo "<div class='container'>
		<div class='col-sm-8 col-sm-offset-2'>
										<h3 class='hdg light'>Guardar contato de<br></h3>
                                         <h2 class='hdg light'>$nome $snome</h2>
						<p class='padding-50 line-lg corb'>
				Facilitando para você, e só clicar no botão a baixo e guardar o contato de <strong>$nome</strong> no seu celular, extremamente fácil e rápido. 
							<br><br>
							
							<form class='form-horizontal' method='post' action='content/plugin/vcard/vcuser.php?cod=$cod' id='validaAcesso' enctype='multipart/form-data'>
							<input type='submit' class='btn btn-default upper' name='BTEnvia' value='Salvar contato!'/> 
								</form>
							<br><br>							

					</div>
	</div>";
								}
								break;
				case site:
								echo "<div class='container'>
		<div class='col-sm-8 col-sm-offset-2'>
										<h1 class='hdg light'>Guarde nosso contato!</h1>
						<p class='padding-50 line-lg corb'>
				Facilitando para você, e só clicar no botão a baixo e guardar o contato do <a href='$site'>CasaCerta.me</a> no seu celular, extremamente fácil e rápido. 
							<br><br>
							
							<form class='form-horizontal' method='post' action='content/plugin/vcard/vcsite.php' id='validaAcesso' enctype='multipart/form-data'>
							<input type='submit' class='btn btn-default upper' name='BTEnvia' value='Salvar contato!'/> 
								</form>
							<br><br>							

					</div>
	</div>";
								break;
}
?>