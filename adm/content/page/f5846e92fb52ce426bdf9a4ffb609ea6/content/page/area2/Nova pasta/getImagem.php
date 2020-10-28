<?php 

include "conexao.php";


$PicNum = $_GET["PicNum"]; 


$mostraDados = mysqli_query($conecta, "SELECT * FROM PESSOA WHERE PES_ID=$PicNum") or die (mysqli_error());

 $row=mysqli_fetch_object($mostraDados); 
 
 Header( "Content-type: image/gif");

 echo $row->PES_IMG; ?>

