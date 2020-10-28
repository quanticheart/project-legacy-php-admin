<div class='row'>



<?php
//CONEXÃO COM BANCO
include '../../core/connect/conexao.php';
//COMANDO SQL PARA SELECIONAR TODOS OS  REGISTROS

$mostraDados = mysqli_query($conecta, "SELECT * FROM usuario WHERE nivel_usuario <= 3") or die (mysqli_error($mostraDados));
  
if(mysqli_num_rows($mostraDados) > 0) {
	
	

//SETANDO UM REGISTRO POR VEZ
while($registro=mysqli_fetch_row($mostraDados))
{
$id      =$registro[0];
$nome    =$registro[1];
$foto    =$registro[4];
$ativo   =$registro[7];
$cor1    =$registro[8];
$cor2    =$registro[9];
$data    =$registro[11];
$nivel    =$registro[12];


$posts = mysqli_query($conecta,"SELECT id_usuario FROM artigo WHERE id_usuario = '$id'");



if($nivel=="2") {
			$nivel = "ADMINISTRADOR";
		}
if($nivel=="1") {
			$nivel = "MODERADOR";
		}
if($nivel=="0") {
			$nivel = "USUARIO";
		}



        if($ativo=="s") {
			$ativo = "SIM";
			$class = "background:#2ecc71; color:#ffffff; margin-top:2px; 	font-weight: bold;";
			$link = "href='content/page/area1/core/scriptAcao.php?acao=bloquear&id=";
			$botao = "warning";
			$acao ="Bloquear";
			$post ="<li role='separator' class='divider'></li>
             <li><a href='home.php?link=97&id=$id'>Posts deste usuario</a></li>";
		}
		elseif ($ativo=="n" && $data=="0000-00-00 00:00:00"){
		    $ativo = "NÃO";
			$class = "background:#e74c3c; color:#ffffff; margin-top:2px; 	font-weight: bold;";
			$link = "";
			$botao = "info";
			$acao ="";
			$post ="";
			}
		else {
			$ativo = "NÃO";
			$class = "background:#e74c3c; color:#ffffff; margin-top:2px; 	font-weight: bold;";
			$link = "href='content/page/area1/core/scriptAcao.php?acao=ativar&id=";
			$botao = "info";
			$acao =" Ativar ";
			$post ="<li role='separator' class='divider'></li>
             <li><a href='home.php?link=97&id=$id'>Posts deste usuario</a></li>";
		}

if ($foto == "semfoto"){
	$foto = "sem.png";
	
}		

    echo "<div class='col-sm-6 col-md-4'>
    <div class='thumbnail espaçotop' style='background:$cor1 !important'>
        <img class='imgusuario' src='../../img/user/$foto' alt='...'>
        <div class='caption'>
          <h3 class='text-center'>$nome</h3>
            <li class='list-group-item col-sm-6'>
              <span class='badge'>$ativo</span>
              Ativo
            </li>
            <li class='list-group-item col-sm-6'>
              <span class='badge'>";
                echo mysqli_num_rows($posts);

                echo"</span>
              Posts
            </li>
            <li class='list-group-item col-sm-12'>
              <span class='badge'>$data</span>
            Ultimo login
            </li>
            <li class='list-group-item col-sm-6'>
              <div class='btn-group'>
           <button class='btn btn-default btn-xs btn-xs-green dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Editar Usuario <span class='caret'></span>
            </button>
           <ul class='dropdown-menu'>
             <li><a href='home.php?link=7&id=$id&acao=alterar'>Mudar nivel de acesso</a></li>
             <li><a $link$id'>$acao</a></li>
             $post
           </ul>
           </div>
            </li>
            <li class='list-group-item col-sm-6 '>
              <span class='badge'>$nivel</span>
            </li>
          </ul>
          <div class='clear'></div>
      </div>
      </div></div>";



}

//FECHANDO A CONEXÃO
mysqli_close($conecta);

}

else {
	
	
	echo "
	
	<br>
<div class='jumbotron'>
  <h1>Nenhum usuario cadastrado</h1>
  <p>Cadastre usuarios novos no sistema</p>
   <p>para lista-los aqui!</p>
</div>
	
	";
}
?>


</div>
</div>
