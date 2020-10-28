

<?php
mb_internal_encoding("UTF-8");
mb_http_output( "iso-8859-1" );
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=ISO-8859-1",true);
include "conexao.php";

if(!isset($_POST["submit"])) {
	$id = (int)$_GET["id"];

	$sql_alterar_noticia = mysqli_query($conecta,"SELECT * FROM artigo WHERE id='$id' ORDER BY id DESC")or die (mysqli_error());

	if(mysqli_num_rows($sql_alterar_noticia) < 1) {
		echo "Not�cia inv�lida.";
	}
	else {
		while ($linha=mysqli_fetch_array($sql_alterar_noticia)) {

			$financia = $linha["financia"];
			if($financia=="s") {
				$financia = "Sim";
			}
			else {
				$financia = "N�o";
			}

      $ativo = $linha["ativo"];
      if($ativo=="s") {
      $ativo = "Sim";
      }
      else {
        $ativo = "N�o";
      }

      $destaque = $linha["destaque"];
      if(  $destaque=="s") {
      $destaque = "Sim";
      }
      else {
          $destaque = "N�o";
      }

      $destaqueluxo = $linha["destaqueluxo"];
      if(  $destaqueluxo=="s") {
      $destaqueluxo = "Sim";
      }
      else {
          $destaqueluxo = "N�o";
      }

			echo "Alterar not�cia<br /><br />";
			echo "<form action=\"admin/alterar_destaque.php?id=$id\" name=\"form\" method=\"post\" enctype=\"multipart/form-data\">";


			echo "Publicar? Status: $financia<br />";
			echo "<select size=\"1\" name=\"financia\">";
			echo "<option value=\"s\">Sim</option>";
			echo "<option value=\"N\">N�o</option>";
			echo "</select><br />";

      echo "Publicar? Status: $ativo<br />";
      echo "<select size=\"1\" name=\"ativo\">";
      echo "<option value=\"s\">Sim</option>";
      echo "<option value=\"N\">N�o</option>";
      echo "</select><br />";

      echo "Publicar? Status: $destaque<br />";
      echo "<select size=\"1\" name=\"destaque\">";
      echo "<option value=\"s\">Sim</option>";
      echo "<option value=\"N\">N�o</option>";
      echo "</select><br />";

      echo "Publicar? Status: $destaqueluxo<br />";
      echo "<select size=\"1\" name=\"destaqueluxo\">";
      echo "<option value=\"s\">Sim</option>";
      echo "<option value=\"N\">N�o</option>";
      echo "</select><br />";

			echo "<input name=\"submit\" type=\"submit\" value=\"Enviar\" />&nbsp;&nbsp;<input type=\"reset\" value=\"Redefinir\" />";
			echo "</form>";
		}
	}
}
else {
	$id = (int)$_GET["id"];
	$financia = $_POST["financia"];
	$ativo = $_POST["ativo"];
	$destaque = $_POST["destaque"];
	$destaqueluxo = $_POST["destaqueluxo"];

	$sql_alterar_noticia = mysqli_query($conecta, "UPDATE artigo SET financia='$financia', ativo='$ativo',   destaque='$destaque', destaqueluxo='$destaqueluxo' WHERE id='$id'")or die (mysqli_error());

  session_start();
  if($sql_alterar_noticia=true){
  $_SESSION['msg'] = "Anuncio alterado com sucesso!";
  Header("Location: ../home.php");
  }
  else

  { $_SESSION['msg'] = "Falha ao enviar o arquivo";

  header("location:exibir.php");
  }


}
?>


         </body>

    </html>
