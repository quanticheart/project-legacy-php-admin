	<!-- Styles for my specific scrolling content -->
	<style type="text/css">
.destaque{
	
	margin-top:30px;
}
	
		#makeMeScrollable
		{
			
			height: 170px;
			position: relative;
		}
		
		/* Replace the last selector for the type of element you have in
		   your scroller. If you have div's use #makeMeScrollable div.scrollableArea div,
		   if you have links use #makeMeScrollable div.scrollableArea a and so on. */
		#makeMeScrollable div.scrollableArea img
		{
			position: relative;
			float: left;
			margin: 0;
			padding: 0;
			/* If you don't want the images in the scroller to be selectable, try the following
			   block of code. It's just a nice feature that prevent the images from
			   accidentally becoming selected/inverted when the user interacts with the scroller. */
			-webkit-user-select: none;
			-khtml-user-select: none;
			-moz-user-select: none;
			-o-user-select: none;
			user-select: none;
		}
		
		.img{
		width:227px;
		}
	</style>	
	
<?php

$mostraDados = mysqli_query($conecta,  "SELECT * FROM artigo WHERE ativo ='s' AND destaque ='s' ORDER BY id DESC")or die (mysqli_error());


	

if(mysqli_num_rows($mostraDados) < 1) {
	echo "";
}

else {

	
	echo "

<h1 class='hdg light'>Destaque</h1>";
	
	while ($linha=mysqli_fetch_array($mostraDados)) {
    $id           = $linha["id"];
	$idusu        = $linha["id_usuario"];
	$idcorre      = $linha["id_corre"];
	$id_cat       = $linha["id_cat"];
    $idanuncio    = $linha["codigoanuncio"];
	$descricao    = $linha["descricao"];
    $titulo       = $linha["titulo"];
	$data         = $linha["data"];
    $destaque     = $linha["destaque"];
    $destaqueluxo = $linha["destaqueluxo"];
    $ativo        = $linha["ativo"];
	$valor        = $linha["valor"];
	$regiao       = $linha["regiao"];
	$endereco     = $linha["endereco"];
	$maps         = $linha["maps"];
	$decorado     = $linha["decorado"];
	$fase         = $linha["fase"];
	
	$cat = mysqli_query($conecta,  "SELECT nome FROM categoria WHERE id = '$id_cat'")or die (mysqli_error());
    $campo = mysqli_fetch_array ($cat);
    $nomecat = $campo ['nome'];
	
	$mostracorre = mysqli_query($conecta,  "SELECT * FROM corretor WHERE id = '$idcorre'")or die (mysqli_error());
    $linha2=mysqli_fetch_array($mostracorre);
    $correnome           = $linha2["nome"];
	$correativo          = $linha2["ativo"];
	$corremestre         = $linha2["mestre"];
	$correemail          = $linha2["email"];
	$correcel1           = $linha2["cel1"];
	$correcel2           = $linha2["cel2"];
	
	if($decorado=="s") {
	    $decorado      = "Decorado";
		$classdecorado = "destaque-badge2";
		} else {	
		$decorado      = "Sem Decorado";
		$classdecorado = "destaque-badge4";
		}
		
	echo "
	

<div class='container'>
<div class='row'>
 
 
  <div class='col-xs-12 col-sm-12 col-md-12 destaque'>
  <div class='ribbon'><span>Destaque</span></div>
  
   <div class='row'>
   <div class='col-xs-12 col-sm-12 col-md-12 destaque-badge0 '><span class='glyphicon glyphicon-home' aria-hidden='true'></span> $titulo - $nomecat</div>

  <div class='col-xs-6 col-sm-4 col-md-4 destaque-badge1 '><span class='glyphicon glyphicon-tasks' aria-hidden='true'></span> $fase </div>
  <div class='col-xs-6 col-sm-4 col-md-4  $classdecorado'><span class='glyphicon glyphicon-lamp' aria-hidden='true'></span> $decorado </div>
  <div class='col-xs-12 col-sm-4 col-md-4 destaque-badge3 '><span class='glyphicon glyphicon-star' aria-hidden='true'></span> Codigo : $idanuncio </div>

  <div class='clear'></div>
  <div class='container'>
  <div class='row'>

  <div class='col-xs-12 col-sm-12  col-md-6 col-md-push-3 cor'>
  
  	<div id='makeMeScrollable' class='col-xs-12 col-sm-12  col-md-12'>
	
	<img class='img' src='content/img/artigo/pimentas/seasons/005.jpg'/>
	<img class='img' src='content/img/artigo/pimentas/seasons/005.jpg'/>
	<img class='img' src='content/img/artigo/pimentas/seasons/005.jpg'/>
		
	</div>
  
	
  </div>

  
 <div class='col-xs-6 col-sm-6  col-md-3 col-md-pull-6'>
 
 <div class='caption'>
 <h5 class='text-left'>Preço estimado</h5>
 <h3 class='text-left text'>R$$valor.000</h3>
 <h3 class='text-left'>$regiao</h3>
 <h5 class='text-left text'>$endereco</h5>
 
 </div>

 </div>
 
 <div class='col-xs-6 col-sm-6 col-md-3'>
 <div class='row'>
 
  <div class='col-xs-12 col-sm-12 col-md-12 desc'>
 <div class='caption'>

 <h5 class='text-left text2'>";
 echo html_entity_decode($descricao);
 echo"
</h5>
  </div>
  </div>
 
 


   </div>
 </div>

 <div class='col-xs-12 col-sm-12 col-md-12 cor'>
 <div class='row'>
 
<a href='index.php?link=1#anchor' ><div class='col-xs-12 col-sm-12 col-md-3 destaque-badge5 '><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> Ver Descrição completa</div></a>
<a data-toggle='modal' href='#maps' ><div class='col-xs-6 col-sm-4 col-md-3 destaque-badge4 '><span class='glyphicon glyphicon-globe' aria-hidden='true'></span> Google maps</div></a>
<a data-toggle='modal' href='#email' ><div class='col-xs-6 col-sm-4 col-md-3 destaque-badge4 '><span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Enviar E-mail Rapido</div></a>
<div class='col-xs-12 col-sm-4 col-md-3 destaque-badge4'><span class='glyphicon glyphicon-phone-alt' aria-hidden='true'></span> Contato $correcel1 </div>
 </div>
 </div>
 
  </div>
   </div>
   </div>
  </div>
  
  
  
</div>
</div>
	
	";
	
	}
}
?>
	
	

	
<script type="text/javascript">
		// Initialize the plugin with no custom options
		$(document).ready(function () {
			// None of the options are set
			$("div#makeMeScrollable").smoothDivScroll({
				autoScrollingMode: "onStart",
				autoScrollingDirection: "backAndForth",
				autoScrollingInterval: 100
			
		

			});
		});
		
		Shadowbox.init({
        language: 'pt',
        players: ['img','a'],
        });
	</script>
	
	
	
	<?php include_once "content/includes/maps.php"; ?>
	<?php include "content/includes/email.php"; ?>