
<?php
mb_internal_encoding("UTF-8");
mb_http_output( "iso-8859-1" );
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=ISO-8859-1",true);
include "conexao.php";

if(!isset($_POST["submit"])) {

	$codigo3 = (int)$_GET["id"];

	$sql_alterar_noticia = mysqli_query($conecta,"SELECT * FROM usuario WHERE id_usuario ='$codigo3'")or die (mysqli_error());

	if(mysqli_num_rows($sql_alterar_noticia) < 1) {
		echo "Usuario invalido";
	}
	else {
		while ($linha=mysqli_fetch_array($sql_alterar_noticia)) {
			$id = $linha["id_usuario"];
			$nome = $linha["nome"];
			$snome = $linha["sobrenome"];
			$email = $linha["email"];
		    $ativo = $linha["ativo"];
            $nivel = $linha["nivel_usuario"];

			if($ativo=="sim") {
				$ativo = "Sim";
			}
			else {
				$ativo = "Não";
			}

			if($nivel=="2") {
				$nivel = "ADM";
			}
			if($nivel=="1") {
				$nivel = "mod";
			}
			if($nivel=="0") {
				$nivel = "user";
			}

			echo "Alterar usuario<br /><br />";
			echo "<form action=\"menu/cadastro/editar.php?id=$id\" name=\"form\" method=\"post\" enctype=\"multipart/form-data\">";
			echo "nome:<br /><input name=\"nome\" type=\"text\" maxlength=\"100\" value=\"$nome\" size=\"40\" /><br />";
			echo "Sobrenome:<br /><input name=\"snome\" type=\"text\" maxlength=\"100\" value=\"$snome\" size=\"40\" /><br />";
			echo "Email:<br /><input name=\"email\" type=\"text\" maxlength=\"255\" value=\"$email\" size=\"40\" /><br />";

			echo "Ativo? Status: $ativo <br />";
			echo "<select size=\"1\" name=\"ativo\">";
			echo "<option value=\"sim\">Sim</option>";
			echo "<option value=\"nao\">Não</option>";
			echo "</select><br />";

			echo "Nivel? Status: $nivel <br />";
			echo "<select size=\"1\" name=\"nivel\">";
			echo "<option value=\"2\">ADM</option>";
			echo "<option value=\"1\">MODER</option>";
			echo "<option value=\"0\">USER</option>";
			echo "</select><br />";

			echo "<input name=\"submit\" type=\"submit\" value=\"Enviar\" />"	;
			echo "</form>";
		}
	}
}
else {
	$codigo3 = (int)$_GET["id"];
	$nome = $_POST["nome"];
	$snome = $_POST["snome"];
	$email = $_POST["email"];
	$ativo = $_POST["ativo"];
	$nivel = $_POST["nivel"];


	$sql_alterar_noticia = mysqli_query($conecta, "UPDATE usuario SET nome='$nome', sobrenome='$snome', email='$email', ativo='$ativo' , nivel_usuario='$nivel' WHERE id_usuario='$codigo3'")or die (mysqli_error());


	echo "Alterar notícia<br /><br />";
	echo "Notícia alterada com sucesso!";
	Header("Location: ../../home.php");
}
?>
