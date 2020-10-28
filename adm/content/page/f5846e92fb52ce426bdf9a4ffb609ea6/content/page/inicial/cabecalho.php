
<!-- menu hozizontal superior-->
		<nav class="navbar navbar-default ">
    <div class="container-fluid cor1">
    <a class="navbar-brand cor1" href="home.php?link=1" >
    <img alt="Brand" class='imgmenu' src="../../img/minilogo.png">
    </a>

    <a class="navbar-brand cor1" href="home.php?link=1" >
    <img src='<?php echo $localfotoPessoa; ?>' alt="Brand" class="img-circle imgmenu">
    </a>

    <!-- Menu para dispositivos moveis -->
    <div class="navbar-header cor1">
      <button type="button" class="navbar-toggle collapsed cor2" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand active "  href="home.php?link=1"><?php echo $nomeUsuario; ?></a>
    </div>

    <!-- links aqui do menu dropdown -->
    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right ">
        <li><a href="#"></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle cor2" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
          <ul class="dropdown-menu">  <!-- links aqui  -->

      <li><a href="home.php?link=5">Conta </a></li>
	  <?php 		
if($_SESSION['UsuarioNivel'] == "3"){
echo "	<li><a href='home.php?link=6'>Reportar problema</a></li> ";}?>	  
      <li role="separator" class="divider"></li> <!-- separador de links  -->
      <li><a href="../../core/login/logout.php">sair</a></li>

          </ul>
        </li>
      </ul>

	  <?php 		
if($_SESSION['UsuarioNivel'] == "3"){
echo "

<!-- inicios de formulario de busca  -->
	  <form name='frmBusca' class='navbar-form navbar-right' role='search'  method='post' action='";
	echo $_SERVER['PHP_SELF'];
	  
	  echo "?a=buscar'>
    <div class='input-group'>
      <input type='text' class='form-control'  name='palavra'  placeholder='Search for...'>
      <span class='input-group-btn'>
        <button class='btn btn-default borderradius' type='submit'  value='Buscar' >Go!</button>
      </span>
    </div><!-- fim busca -->
      </form>
	  
	  ";}


  ?>
  
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
