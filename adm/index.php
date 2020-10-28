<!doctype html>
<html class="no-js" lang="pt-br">

<head>
<meta charset="utf-8"/>
<meta name="description" content="Melhor maneira de se achar a CasaCerta para sua compra ou investimento, entre e tenha as informações necessárias que precisa para adquirir seu imóvel!!">
<meta name="keywords" content="segurança, residência, residencial, guarulhos, troca, casa, nova, apartamento, prédio, região, certa, casacerta, terreno, aluguel, são paulo, compra, caixa, minha casa minha vida, baixo custo, barato, renda, mínima, casacerta, maneira, certa!, casa, uma, achar, e-mail, melhor, contato, receber, nossos, podem, click, doação, caixa, casacerta me, casa certa!, melhor maneira, maneira de achar, a casa certa!, melhor maneira de, achar a casa, de achar a,">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="robots" content="no-index">
<meta name="author" content="QuanticHeart">

<link rel="canonical" href="<?php echo"$site"; ?>" />
<link rel="shortlink" href="<?php echo"$site"; ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>Area administrativa</title>
<link rel="icon" href="content/img/ico.ico" type="image/ico">

<link rel='stylesheet' href='content/cascata/important.css' type='text/css' media='all' />
<link href="content/boot/css/bootstrap.css" rel="stylesheet">
        <!-- Chamadas JS -->
<script src="content/boot/js/jquery.min.js"></script>
<script src="content/boot/js/bootstrap.min.js"></script>

</head>

  <body>

      <section id="cabecalho">
<?php include_once ("content/core/login/cabecalho.php"); ?>
<?php include_once ("content/core/msg/msg.php");  session_destroy();?>
			</section>
      

	 
	  
  <?php



  // aqui configuro todos os links que irao aparecer no conteudo do sistema
  // cada link significa que e uma pagina do site
  // href="home.php?link=1" assim cada link deve ser chamado correspondendo ao seu numero
    $link = isset($_GET['link']) ? $_GET['link']: '';

   $pag[1] = "content/core/inicial.php";
   $pag[2] = "content/core/email/Recpass.php";
   $pag[3] = "content/core/email/atualizaInformacoes.php";


  if (!empty($link)){//aqui ele pega o link selecionado pelo usuario

    if(file_exists($pag[$link]))
    {
      include $pag[$link];

    }
    else
    {// se nenhum link for selecionado ele mostra essa pagina ou seja
      // essa pagina e sempre a principal ou index

      include "content/core/inicial.php";
    }

  }else{//se der algum erro ele redimenciona para o index do mesmo jeito
    include "content/core/inicial.php";
  }
   ?>


  </body>
</html>
