

		<?php


        session_start();
        if($_SESSION['msg'] != false )

	    echo "<div class='alert alert-success' role='alert'>$_SESSION[msg]</div>";

        unset($_SESSION['msg']);?>

<?php
mb_internal_encoding("UTF-8");
mb_http_output( "iso-8859-1" );
ob_start("mb_output_handler");
header("Content-Type: text/html; charset=ISO-8859-1",true);

include '../../core/login/acessoUsuario.php'; //Aqui verifico se os dados gravados em cookies s�o reais
include "../../core/connect/conexao.php";


echo "<div class='table-responsive'>
<table border=\"1\" cellspacing=\"0\" class='table table-hover' cellpadding=\"0\" width=\"500\">";
echo "<tr>";
echo "<td width=\"50\" valign=\"top\"><div align=\"center\">ID</div></td>";
echo "<td width=\"210\" valign=\"top\"><div align=\"center\">T�tulo</div></td>";
echo "<td width=\"60\" valign=\"top\"><div align=\"center\">Enviado em</div></td>";
echo "<td width=\"60\" valign=\"top\"><div align=\"center\">Publicado?</div></td>";
echo "<td width=\"60\" valign=\"top\"><div align=\"center\">Anuncio</div></td>";
echo "<td width=\"60\" valign=\"top\"><div align=\"center\">Excluir</div></td>";
echo "<td width=\"60\" valign=\"top\"><div align=\"center\">Destaque</div></td>";
echo "</tr>";


$sql_administrar_noticias = mysqli_query($conecta, "SELECT id, codigoanuncio, titulo, data, ativo FROM artigo WHERE id_usuario = '$idUsuario' ORDER BY id DESC")or die (mysqli_error());

if(mysqli_num_rows($sql_administrar_noticias) < 1) {
	echo "<tr>";
	echo "<td width=\"50\" valign=\"top\" colspan=\"6\"><div align=\"center\">Nenhuma not�cia encontrada</div></td>";
	echo "</tr>";
}
else {
	while ($linha=mysqli_fetch_array($sql_administrar_noticias)) {
    $id = $linha["id"];
		$idanuncio = $linha["codigoanuncio"];
		$titulo = $linha["titulo"];
		$data = $linha["data"];
		$ativo = $linha["ativo"];

		if($ativo=="s") {
			$ativo = "Sim";
		}
		else {
			$ativo = "N�o";
		}



		echo "<tr>";
		echo "<td width=\"50\" valign=\"top\"><div align=\"center\">$idanuncio</div></td>";
		echo "<td width=\"210\" valign=\"top\">$titulo</td>";
		echo "<td width=\"60\" valign=\"top\"><div align=\"center\">$data</div></td>";
		echo "<td width=\"60\" valign=\"top\"><div align=\"center\">$ativo</div></td>";
		echo "<td width=\"60\" valign=\"top\"><div align=\"center\"><a href=\"home.php?link=9&id=$id\">Alterar</a></div></td>";
		echo "<td width=\"60\" valign=\"top\"><div align=\"center\"><a href=\"home.php?link=13&id=$id\">Excluir</a></div></td>";
    echo "<td width=\"60\" valign=\"top\"><div align=\"center\"><a href=\"home.php?link=23&id=$id\">Alterar</a></div></td>";
    echo "</tr>";
	}
}

echo "</table></div>";




?>


         </body>

    </html>
