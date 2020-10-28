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
<div class="container">
<div class="row">
<h1 class="hdg light">$nome da categoria</h1>

 
 
  <div class="col-xs-12 col-sm-12 col-md-12 destaque">

  
   <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 destaque-badge0 "><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Nome do artigo</div>

  <div class="col-xs-6 col-sm-4 col-md-4 destaque-badge1 "><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Em projeto</div>
  <div class="col-xs-6 col-sm-4 col-md-4 destaque-badge2 "><span class="glyphicon glyphicon-lamp" aria-hidden="true"></span> Decorado </div>
  <div class="col-xs-12 col-sm-4 col-md-4 destaque-badge3 "><span class="glyphicon glyphicon-star" aria-hidden="true"></span> Codigo : 0985671 </div>

  <div class="clear"></div>
  <div class="container">
  <div class="row">

  <div class="col-xs-12 col-sm-12  col-md-6 col-md-push-3 cor">
  
  	<div id="makeMeScrollable" class="col-xs-12 col-sm-12  col-md-12">
	
	<img class="img" src="content/img/artigo/pimentas/seasons/005.jpg"/>
	<img class="img" src="content/img/artigo/pimentas/seasons/005.jpg"/>
	<img class="img" src="content/img/artigo/pimentas/seasons/005.jpg"/>
		
	</div>
  
	
  </div>

  
 <div class="col-xs-6 col-sm-6  col-md-3 col-md-pull-6">
 
 <div class="caption">
 <h5 class="text-left">Preço estimado</h5>
 <h3 class="text-left text">R$180.000</h3>
 <h3 class="text-left">São miguel</h3>
 <h5 class="text-left text">Rua blabla</h5>
 <h5 class="text-left text">são paulo - sp </h5>
 
 <h5 class="text-left text">2 quartos / 1 suite / 1 vaga</h5>
  <h5 class="text-left text">55m²</h5>
 </div>

 </div>
 
 <div class="col-xs-6 col-sm-6 col-md-3">
 <div class="row">
 
  <div class="col-xs-12 col-sm-12 col-md-12 desc">
 <div class="caption">

 <h5 class="text-left text2">Envie um E-mail para mais informaçoes ou marcar um horario para conhecer o decorado, e rapido e simples,
 nem precisara sair do site, somente clicar em "Enviar E-mail radido" e preencher os campos
 ou enviar mensagem no numero a baixo via whatsapp, ou se preferir, fazer uma ligação!!</h5>
  </div>
  </div>
 
 


   </div>
 </div>

 <div class="col-xs-12 col-sm-12 col-md-12 cor">
 <div class="row">
 
<a href="<?php echo "lista.php?link=1"; ?>#anchor" ><div class="col-xs-12 col-sm-12 col-md-3 destaque-badge5 "><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Ver Descrição completa</div></a>
<a data-toggle="modal" href="#maps" ><div class="col-xs-6 col-sm-4 col-md-3 destaque-badge4 "><span class="glyphicon glyphicon-globe" aria-hidden="true"></span> Google maps</div></a>
<a data-toggle="modal" href="#email" ><div class="col-xs-6 col-sm-4 col-md-3 destaque-badge4 "><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Enviar E-mail Rapido</div></a>
<div class="col-xs-12 col-sm-4 col-md-3 destaque-badge4"><span class="glyphicon glyphicon-phone-alt" aria-hidden="true"></span> Contato (11) 98716-1949</div>
 </div>
 </div>
 
  </div>
   </div>
   </div>
  </div>
  
  
  
</div>
</div>

	
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
	<?php include_once "content/includes/email.php"; ?>