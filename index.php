
<?php include "content/core/connect/conexao.php"; ?>
<!doctype html>
<html class="no-js" lang="pt-br">

<head>
<meta charset="utf-8"/>
<meta name="description" content="<?php echo "$description"; ?>">
<meta name="robots" content="index, follow">
<meta name="author" content="QuanticHeart">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo "$title"; ?></title>

	<link rel="icon" href="<?php echo"$admsite"; ?>content/img/<?php echo"$flogo"; ?>" type="image/ico">
	<?php include_once "content/includes/meta.php"; ?>
	<?php include_once "content/includes/include.php"; ?>

</head>


<body class="home page page-id-1265 page-template page-template-templates page-template-template-home page-template-templatestemplate-home-php slideout nighttime">

<?php include_once "content/includes/menu.php"; ?>


	<div class="banner">
		<div class="fixed_bkg"> <img src="content/img/2.jpg" alt="background" /> </div>
		<div class="front"> <img src="content/img/logo_text.png" alt="logo_casacerta.me" /> </div>
	</div>
	<a name="cont"></a>
	<section class="module gray-lighter centered" >
		<?php $link=isset($_GET[ 'link']) ? $_GET[ 'link'] : ''; $pag[1]="content/page/about.php" ; $pag[2]="content/page/contato.php" ; $pag[3]="content/page/bloq.php" ; $pag[4]="content/page/vcard.php" ; if (!empty($link)) { if (file_exists($pag[$link])) { include $pag[$link]; } else { include "content/includes/destaque/destaque.php"; } } else { include "content/includes/destaque/destaque.php"; } // href="home.php?link=15" ?>
	</section>
	<section class="module newsletter centered" style="background: url(content/img/newsletter_bg.png); background-size: cover;" >
		<div class="container">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="hdg light">Entre em contato conosco</h2>
				<p class="padding-50 line-lg corb"> Utilize o botão a baixo para enviar uma pergunta rápida para o <a href="<?php echo $site?>"><?php echo "$menutitle"; ?></a>, responderemos no máximo em 24Horas.
					<br>
					<br> <a data-toggle="modal" href="#emailr" class="btn btn-default upper">enviar e-mail</a>
					<?php include_once "content/includes/emailr.php"; ?>
					<br>
					<br>
					<br>
					<br>
			</div>
		</div>
	</section>
	<section class="module gray-lighter centered">
		<div class="container">
			<div class="col-sm-8 col-sm-offset-2">
				<h2 class="hdg light">Redes sociais</h2>
				<p class="padding-50 line-lg"> Ajude a divulgar o <a href="<?php echo " $site " ?>"><?php echo "$menutitle"; ?></a>, você pode recomendar para amigos e parentes utilizando redes sociais, lembre-se, você pode não precisar de nossos serviços mas muitos de seus conhecidos
					<br> <strong>podem precisar!</strong>
			</div>
		</div>
		
	
		<div class="slide-social">
			<div class="button">
				<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2FCasaCertame-1084204761640469%2F&width=86&layout=button_count&action=like&show_faces=true&share=false&height=21&appId" width="86" height="21" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			</div>
			<div class="facebook iconrede"> <i class="icon-facebook"><img class='iconeredes' src='content/img/faceincon.png'  alt="facebook logo" /></i> </div>
			<div class="facebook slide">
				<p>Curtir</p>
			</div>
		</div>
		<div class="slide-social">
			<div class="button">
				<iframe class="sp" src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2Fcasacerta.me%2F&layout=button&mobile_iframe=true&width=96&height=20&appId" width="96" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
			</div>
			<div class="facebook iconrede"> <i class="icon-facebook"><img class='iconeredes' src='content/img/faceincon.png'  alt="facebook logo" /></i> </div>
			<div class="facebook slide">
				<p>Compartilhar</p>
			</div>
		</div>

		<div class="slide-social">
			<div class="button">
			
				
	
				<div class="g-plusone" data-size="medium" data-href="<?php echo " $site " ?>"></div>
			</div>
			<div class="google-plus iconrede"> <i class="icon-google-plus"><img class='iconeredes' src='content/img/gicon.png'  alt="google+ logo" /></i> </div>
			<div class="google-plus slide">
				<p>+1</p>
			</div>
		</div>
	
		<div class="slide-social">
			<div class="button ">
				
				
		
				<div class="g-follow" data-annotation="none" data-height="20" data-href="//plus.google.com/u/0/109420798450241797460" data-rel="author"></div>
			</div>
			<div class="google-plus iconrede"> <i class="icon-google-plus"><img class='iconeredes' src='content/img/gicon.png'  alt="google+ logo" /></i> </div>
			<div class="google-plus slide">
				<p>Seguir</p>
			</div>
		</div>
	</section>
	<footer class="footer colorblack" itemscope itemtype="http://data-vocabulary.org/Organization">
		<?php include_once "content/includes/footer.php"; ?>
	</footer>

	<?php include_once "content/plugin/btemail/email.php"; ?>
</body>

</html>
