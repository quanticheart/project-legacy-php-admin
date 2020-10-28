<?php

include '../../core/connect/conexao.php';
include '../../core/login/acessoUsuario.php'; //Aqui verifico se os dados gravados em cookies são reais

?>

<!DOCTYPE HTML5 PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="pt-br" xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="author" CONTENT="QuanticHeart">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Area administrativa</title>

<link rel="icon" href="content/img/ico.ico" type="image/ico">

<link rel='stylesheet' href='../../cascata/cor.css' type='text/css' media='all' />
<link rel='stylesheet' href='../../cascata/css.css' type='text/css' media='all' />
<link rel='stylesheet' href='../../cascata/important.css' type='text/css' media='all' />
<link rel='shortlink' href='index.html' />
<link href="../../boot/css/bootstrap.css" rel="stylesheet">
        <!-- Chamadas JS -->
<script src="../../boot/js/jquery.min.js"></script>
<script src="../../boot/js/bootstrap.min.js"></script>
<script src="../../boot/js/bootstrap.file-input.js"></script>

<?php include "../../plugin/tab/plugin.php" ?>
       


  
<script>
$(document).ready(function() {
$('#my-table').dynatable()({
 
});
 } );
 
</script>

<script type='text/javascript'>//<![CDATA[
var VanillaRunOnDomReady = function() {
$('.top').on('click', function() {
	$parent_box = $(this).closest('.box');
	$parent_box.siblings().find('.bottom').slideUp();
	$parent_box.find('.bottom').slideToggle(300, 'swing');
});

}

var alreadyrunflag = 0;

if (document.addEventListener)
    document.addEventListener("DOMContentLoaded", function(){
        alreadyrunflag=1; 
        VanillaRunOnDomReady();
    }, false);
else if (document.all && !window.opera) {
    document.write('<script type="text/javascript" id="contentloadtag" defer="defer" src="javascript:void(0)"><\/script>');
    var contentloadtag = document.getElementById("contentloadtag")
    contentloadtag.onreadystatechange=function(){
        if (this.readyState=="complete"){
            alreadyrunflag=1;
            VanillaRunOnDomReady();
        }
    }
}

window.onload = function(){
  setTimeout("if (!alreadyrunflag){VanillaRunOnDomReady}", 0);
}//]]> 

</script>
		
 <script src="../../plugin/tinymce/tinymce.min.js"></script>
  <script>tinymce.init({
  selector: '.textarea1',
  height: 200,
  theme: 'modern',

  toolbar1: ' styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
  image_advtab: true,
  templates: [
    { title: 'Test template 1', content: 'Test 1' },
    { title: 'Test template 2', content: 'Test 2' }
  ],
  content_css: [
    '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
    '//www.tinymce.com/css/codepen.min.css'
  ]
 });</script>

 <script>tinymce.init({
 selector: '.textarea2',
 height: 600,
 theme: 'modern',
 plugins: [
   'advlist autolink lists link image charmap print preview hr anchor pagebreak',
   'searchreplace wordcount visualblocks visualchars code fullscreen',
   'insertdatetime media nonbreaking save table contextmenu directionality code',
   'emoticons template paste textcolor colorpicker textpattern imagetools'
 ],
 toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
 toolbar2: 'print preview media | forecolor backcolor emoticons | code',
 image_advtab: true,
 templates: [
   { title: 'Test template 1', content: 'Test 1' },
   { title: 'Test template 2', content: 'Test 2' }
 ],
 content_css: [
   '//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css',
   '//www.tinymce.com/css/codepen.min.css'
 ]
 });</script>
 </head>

<body>

<!-- cabeçalho-->
<section id="cabecalho">
<?php include_once ("content/page/inicial/cabecalho.php"); ?>
</section>

<!-- mensagems de sessao-->
  <?php include '../../core/msg/msg.php'; ?>

<!-- conteudo geral-->
  <div class="container">
  <div class="row">


<!-- menu lateral-->
<section>
<?php include_once ("content/page/inicial/menu.php"); ?>
</section>


<!-- php com conteudos do da div geral do sistema-->
  <div role="main" class="colormain col-md-10 ">
    <?php
    // aqui configuro todos os links que irao aparecer no conteudo do sistema
    // cada link significa que e uma pagina do site
   // href="home.php?link=1" assim cada link deve ser chamado correspondendo ao seu numero
      $link = isset($_GET['link']) ? $_GET['link']: '';

     $pag[1] = "content/page/inicial.php";
     $pag[2] = "content/page/area1/PaginadeUsuarios.php";
     $pag[3] = "content/page/area1/CadastraUsuarios.php";
     $pag[4] = "content/page/area1/EditarUsuarios.php";
     $pag[5] = "content/page/area1/ConfigUsuario.php";
     $pag[6] = "content/page/area1/config/cor.php";
     $pag[7] = "content/page/area1/core/ScripPagina.php";
     $pag[8] = "content/page/area1/cor/menuCor.php";
     $pag[9] = "content/page/area1/cor/editarCor.php";
    $pag[10] = "content/page/area1/cor/corPagina.php";
    $pag[99] = "content/page/area1/core/on.php";
	$pag[98] = "content/page/area1/core/site.php";
	$pag[97] = "content/page/area1/ListaArtigo.php";
	
    $pag[11] = "content/page/area3/ListaCategoria.php";
    $pag[12] = "content/page/area3/CadastraCategoria.php";
    $pag[13] = "content/page/area3/core/ScripPagina.php";
    $pag[14] = "content/page/area3/ItensCategoria.php";

    $pag[21] = "content/page/area4/ListaCorretor.php";
    $pag[22] = "content/page/area4/CadastraCorretor.php";
    $pag[23] = "content/page/area4/EmailCorretor.php";
    $pag[24] = "content/page/area4/core/ScripPagina.php";
	$pag[25] = "content/page/area4/Dados.php";
	$pag[26] = "content/page/area4/ItensCorretor.php";

    $pag[31] = "content/page/area2/ListaArtigo.php";
    $pag[32] = "content/page/area2/CadastraArtigo.php";
    $pag[33] = "content/page/area2/Categoria.php";
    $pag[34] = "content/page/area2/ArtigoBloqueado.php";
	$pag[35] = "content/page/area2/ArtigosUsuario.php";
	
	$pag[41] = "content/page/area5/ListaArtigo.php";
    $pag[42] = "content/page/area5/Categoria.php";
    $pag[43] = "content/page/area5/ArtigoBloqueado.php";
    $pag[44] = "content/page/area5/ItensCategoria.php";
	
    if (!empty($link)){//aqui ele pega o link selecionado pelo usuario

    	if(file_exists($pag[$link]))
    	{
    		include $pag[$link];

    	}
    	else
    	{// se nenhum link for selecionado ele mostra essa pagina ou seja
        // essa pagina e sempre a principal ou index

    		include "content/page/inicial.php";
    	}

    }else{//se der algum erro ele redimenciona para o index do mesmo jeito
    	include "content/page/inicial.php";
    }
     ?>


  </div><!-- final da div MAIN-->

  </div></div>


<!-- footer-->
      <footer class="row">

      </footer>


  </body>
</html>
