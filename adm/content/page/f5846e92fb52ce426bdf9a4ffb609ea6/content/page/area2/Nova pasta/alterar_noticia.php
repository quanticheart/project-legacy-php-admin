


  <!DOCTYPE HTML5 PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">
        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <meta name="description" content="Empresa especializada em transportes pessoais ">
            <meta name="keywords" content="escreva palavras-chaves curtas, máximo 150 caracteres">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
			
				<link rel="stylesheet" href="admin/minified/themes/default.min.css" type="text/css" media="all" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script src="admin/minified/jquery.sceditor.bbcode.min.js"></script>

		 <style>
      
    </style>

	
		
			<link rel="stylesheet" href="tab/css.css">
           
            <title>
                BluPage
            </title>
        </head>
        
        <body>

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
		echo "Notícia inválida.";
	}
	else {
		while ($linha=mysqli_fetch_array($sql_alterar_noticia)) {
			$id = $linha["id"];
			$titulo = $linha["titulo"];
			$descricao = $linha["descricao"];
			$foto = $linha["foto"];
			$baner = $linha["baner"];
			$artigo = $linha["artigo"];
			$autor = $linha["autor"];
			$email = $linha["email"];
			$data_hora = $linha["data_hora"];
			$ip = $linha["ip"];
			$publicado = $linha["publicado"];

			if($publicado=="S") {
				$publicado = "Sim";
			}
			else {
				$publicado = "Não";
			}

			echo "Alterar notícia<br /><br />";
			echo "<form action=\"admin/alterar_noticia.php?id=$id\" name=\"form\" method=\"post\" enctype=\"multipart/form-data\">";
			echo "Título:<br /><input name=\"titulo\" type=\"text\" maxlength=\"100\" value=\"$titulo\" size=\"40\" /><br />";
			echo "Descrição:<br /><input name=\"descricao\" type=\"text\" maxlength=\"255\" value=\"$descricao\" size=\"40\" /><br />";
			echo "Notícia:<br /><textarea name=\"artigo\" rows=\"10\" cols=\"30\">$artigo</textarea><br />";
		
			echo "Publicar? Status: $publicado<br />";
			echo "<select size=\"1\" name=\"publicado\">";
			echo "<option value=\"S\">Sim</option>";
			echo "<option value=\"N\">Não</option>";
			echo "</select><br />";
			echo "<input name=\"submit\" type=\"submit\" value=\"Enviar\" />&nbsp;&nbsp;<input type=\"reset\" value=\"Redefinir\" />";
			echo "</form>";
		}
	}
}
else {
	$id = (int)$_GET["id"];
	$titulo = $_POST["titulo"];
	$descricao = $_POST["descricao"];
	$artigo = $_POST["artigo"];
	$autor = $_POST["autor"];
	$email = $_POST["email"];
	$publicado = $_POST["publicado"];

	$sql_alterar_noticia = mysqli_query($conecta, "UPDATE artigo SET titulo='$titulo', descricao='$descricao',   artigo='$artigo', publicado='$publicado' WHERE id='$id'")or die (mysqli_error());

	
	echo "Alterar notícia<br /><br />";
	echo "Notícia alterada com sucesso!";
	Header("Location: ../home.php"); 
}
?>


         </body>
    
    </html>
	