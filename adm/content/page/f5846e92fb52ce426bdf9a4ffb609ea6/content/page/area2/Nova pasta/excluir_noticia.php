<?php
include "conexao.php";

$id = (int)$_GET["id"];

if(empty($_GET["excluir"])) {
	echo "Exclus�o de not�cia<br /><br />";
	echo "Tem certeza?!<br /><br />";
	echo "<a href=\"admin/excluir_noticia.php?id=$id&excluir=S\">Sim</a><br />";
	echo "<a href=\"../home.php\">N�o</a><br />";
}
else {
	$sql_excluir_noticia = mysqli_query($conecta, "DELETE FROM artigo WHERE id='$id'")or die (mysqli_error());

	if(mysqli_affected_rows() < 1) {
		echo "Exclus�o de not�cia<br /><br />";
		echo "Not�cia removida com sucesso!";
	Header("Location: ../home.php"); 
	}
	else {
		echo "Not�cia inv�lida.";
	}
}
?>