<?php
include "conexao.php";

$id = (int)$_GET["id"];

if(empty($_GET["excluir"])) {
	echo "Exclusão de notícia<br /><br />";
	echo "Tem certeza?!<br /><br />";
	echo "<a href=\"admin/excluir_noticia.php?id=$id&excluir=S\">Sim</a><br />";
	echo "<a href=\"../home.php\">Não</a><br />";
}
else {
	$sql_excluir_noticia = mysqli_query($conecta, "DELETE FROM artigo WHERE id='$id'")or die (mysqli_error());

	if(mysqli_affected_rows() < 1) {
		echo "Exclusão de notícia<br /><br />";
		echo "Notícia removida com sucesso!";
	Header("Location: ../home.php"); 
	}
	else {
		echo "Notícia inválida.";
	}
}
?>