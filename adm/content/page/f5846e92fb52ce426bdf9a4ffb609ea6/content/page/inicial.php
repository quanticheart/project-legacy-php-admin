<div class="row espaçoslaterais">


        <div class="page-header">
          <h5>Area 1</h5>
        <h1>Usuarios<small> do sistema</small></h1>
        </div>


        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=2" class="thumbnail">
        <span class="badge inicia"><?php echo mysqli_num_rows($numeroUsuarios); ?></span>
        <img  src="../../img/menu/area1-1.png" alt="...">
        <h5 class="text-center">Usuarios</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=3" class="thumbnail">

        <img  src="../../img/menu/area1-2.png" alt="...">
        <h5 class="text-center">cadastrar</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=4" class="thumbnail">

        <img  src="../../img/menu/area1-3.png" alt="...">
        <h5 class="text-center">Editar Usuarios</h5>
        </a>
        </div>

<?php 		
if($_SESSION['UsuarioNivel'] == "3"){
echo "
        <div class='col-xs-4 col-md-2'>
        <a href='home.php?link=8' class='thumbnail'>
        <img  src='../../img/menu/area1-5.png' alt='...'>
        <h5 class='text-center'>Cores</h5>
        </a>
        </div>
		
		<div class='col-xs-4 col-md-2'>
        <a href='home.php?link=98&acao=dadosSite' class='thumbnail'>
        <img  src='../../img/menu/area1-6.png' alt='...'>
        <h5 class='text-center'>Dados site</h5>
        </a>
        </div>
";}?>
  
       

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=5" class="thumbnail">
        <img  src="../../img/menu/area1-4.png" alt="...">
        <h5 class="text-center">Config de conta</h5>
        </a>
        </div>



</div>

<!-- area de cadastro de categorias -->
<div class="row espaçoslaterais">


        <div class="page-header">
          <h5>Area 2</h5>
        <h1>Artigos <small>de <?php echo $nomeUsuario; ?></small></h1>
        </div>


        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=31" class="thumbnail">
        <span class="badge inicia"><?php echo mysqli_num_rows($itensUsuarioativo); ?></span>
        <img  src="../../img/menu/area2-1.png" alt="...">
        <h5 class="text-center">Artigos</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=32" class="thumbnail">
        <img  src="../../img/menu/area2-2.png" alt="...">
        <h5 class="text-center">Cadastrar</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=34" class="thumbnail">
		 <span class="badge inicia"><?php echo mysqli_num_rows($itensUsuariobloque); ?></span>
        <img  src="../../img/menu/area2-3.png" alt="...">
        <h5 class="text-center">Bloqueados</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=33" class="thumbnail">
        <img  src="../../img/menu/area2-4.png" alt="...">
        <h5 class="text-center">Por categoria</h5>
        </a>
        </div>




</div>

<!-- area de cadastro de categorias -->
<div class="row espaçoslaterais">


        <div class="page-header">
          <h5>Area 3</h5>
        <h1>Categorias<small> dos artigos</small></h1>
        </div>


        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=11" class="thumbnail">
        <span class="badge inicia"><?php echo mysqli_num_rows($numcategorias); ?></span>
        <img  src="../../img/menu/area3-1.png" alt="...">
        <h5 class="text-center">Categorias</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=12" class="thumbnail">

        <img  src="../../img/menu/area3-2.png" alt="...">
        <h5 class="text-center">Cadastrar</h5>
        </a>
        </div>




</div>

<!-- area de cadastro de corretores -->
<div class="row espaçoslaterais">


        <div class="page-header">
          <h5>Area 4</h5>
        <h1>Corretores<small> dos artigos</small></h1>
        </div>


        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=21" class="thumbnail">
        <span class="badge inicia"><?php echo mysqli_num_rows($numeroCorretores); ?></span>
        <img  src="../../img/menu/area4-1.png" alt="...">
        <h5 class="text-center">Corretores</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=22" class="thumbnail">
        <img  src="../../img/menu/area4-2.png" alt="...">
        <h5 class="text-center">Cadastrar</h5>
        </a>
        </div>
		
		<?php 		
        if($_SESSION['UsuarioNivel'] == "3"){
        echo "
        <div class='col-xs-4 col-md-2'>
        <a href='home.php?link=23' class='thumbnail'>
        <img  src='../../img/menu/area4-3.png' alt='...'>
        <h5 class='text-center'>Enviar E-mail</h5>
        </a>
        </div>
        ";}?>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=25" class="thumbnail">
        <img  src="../../img/menu/area4-4.png" alt="...">
        <h5 class="text-center">Dados</h5>
        </a>
        </div>


</div>

<!-- area de cadastro de categorias -->
<div class="row espaçoslaterais">


        <div class="page-header">
          <h5>Area 5</h5>
        <h1>Artigos <small>de Usuarios</small></h1>
        </div>


        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=41" class="thumbnail">
        <span class="badge inicia"><?php echo mysqli_num_rows($numeroArtigos); ?></span>
        <img  src="../../img/menu/area2-1.png" alt="...">
        <h5 class="text-center">Artigos</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=43" class="thumbnail">
		 <span class="badge inicia"><?php echo mysqli_num_rows($numeroArtigosbloque); ?></span>
        <img  src="../../img/menu/area2-3.png" alt="...">
        <h5 class="text-center">Bloqueados</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=42" class="thumbnail">
        <img  src="../../img/menu/area2-4.png" alt="...">
        <h5 class="text-center">Por categoria</h5>
        </a>
        </div>




</div>

<div class="clear"></div>
