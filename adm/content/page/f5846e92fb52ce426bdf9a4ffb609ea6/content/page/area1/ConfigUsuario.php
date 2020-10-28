<div class="row espaçoslaterais">


        <div class="page-header">
        <h1>Configuraçoes<small> de usuario</small></h1>
        </div>


        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=6" class="thumbnail">
        <img  src="../../img/menu/config1-1.png" alt="...">
        <h5 class="text-center">Cores</h5>
        </a>
        </div>

        <div class="col-xs-4 col-md-2">
        <a href="home.php?link=7&acao=dadosUsuario" class="thumbnail">
        <img  src="../../img/menu/config1-2.png" alt="...">
        <h5 class="text-center">Dados</h5>
        </a>
        </div>

       
		  <?php 		
if($_SESSION['UsuarioNivel'] < "3"){
echo "
         <div class='col-xs-4 col-md-2'>
        <a href='home.php?link=7&acao=bloquearSeu' class='thumbnail'>
        <img  src='../../img/menu/config1-3.png' alt='...'>
        <h5 class='text-center'>Bloquear</h5>
        </a>
        </div>
";}


  ?>

</div>
