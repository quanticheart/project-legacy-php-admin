<?php
$cod = $_GET['cod'];
include "content/core/connect/conexao.php";
$mostraDados = mysqli_query($conecta, "SELECT nome FROM contato WHERE cod = '$cod' AND ativo = 's'") or die(mysqli_error());
echo "<div class='container'>
		<div class='col-sm-8 col-sm-offset-2'>
	 ";
if (mysqli_num_rows($mostraDados) >= 1) {
				while ($linha = mysqli_fetch_array($mostraDados)) {
								$nome = $linha["nome"];
								echo "
		<h1 class='hdg light'>Olá " . $nome . ", você deseja bloquear o envio de E-mails promocionais do CasaCerta.me?</h1>
						<form action='content/plugin/btemail/php/bqemail.php?cod=am9ubnkyNTVkQGdtYWlsLmNvbQ==' method='post' name='form1' class='form-validacao'>
 
        <a class='col-xs-6 BTEnvia btn btn-success' value='Não' href='" . $site . "'>Não</a>
        <input class='col-xs-6 BTApaga btn btn-danger'  type='submit' name='BTEnvia' value='Sim'/> 
        
       
                    
                </form>";
				}
} else {
				echo "<h3 class='hdg light'>Olá, você já bloqueou os E-mails promocionais do CasaCerta.me, caso queira ativar novamente o envio de E-mails, e só se inscrever novamente no rodapé do site! </h3>";
}
echo "</div>
	</div>";
?>