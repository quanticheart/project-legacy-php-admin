
<nav role="navigation" class="navbar navbar-default navbar-fixed-top">


        
      <div class="navbar-header">
	  <a class="navbar-brand" href="index.php">
      <img alt="Brand" class='imgmenu' src="<?php echo"$admsite"; ?>content/img/<?php echo"$mlogo"; ?>">
      </a>
                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">                    
                    <span class="sr-only">Navegação Responsiva</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>                
                </button>                
                <a href="index.php" class="navbar-brand"><?php echo"$menutitle"; ?></a>                
            </div>
            
            <div id="navbarCollapse" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
				
<?php

$mostraDados = mysqli_query($conecta, "SELECT * FROM categoria WHERE ativo = 's' ORDER BY id DESC")or die (mysqli_error());

if(mysqli_num_rows($mostraDados) < 1) {
	echo "<li class='active'><a href='index.php'>Home</a></li>";
	}
	else {
		
	echo "<li class='active'><a href='index.php'>Home</a></li>";
		
	while ($linha=mysqli_fetch_array($mostraDados)) {
    $categoriaid     = $linha["id"];
	$categorianome   = $linha["nome"];
    $categoriaativo  = $linha["ativo"];
   
	echo "<li><a href='#'>$categorianome</a></li>";
	
	}
	
	}

?>
                    
                </ul>
            </div>
        
        </nav>
		
