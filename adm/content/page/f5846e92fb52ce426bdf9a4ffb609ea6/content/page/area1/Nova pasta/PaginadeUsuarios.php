<?php
header ('Content-Type: text / html; charset = utf-8');
ob_start();
include '../../core/login/acessoUsuario.php'; //Aqui verifico se os dados gravados em cookies são reais




?>
<div id="home">



<a href='home.php?link=10'>Cadastrar user</a>


                    	<?php
//CONEXÃO COM BANCO
include '../../core/connect/conexao.php';
//COMANDO SQL PARA SELECIONAR TODOS OS  REGISTROS



$mostraDados = mysqli_query($conecta, "SELECT * FROM usuario");


//SETANDO UM REGISTRO POR VEZ
while($registro=mysqli_fetch_row($mostraDados))
{
$codigo3=$registro[0];
$nome=$registro[1];
$foto=$registro[4];
$ativo=$registro[7];
$cor1=$registro[8];
$cor2=$registro[9];
$data=$registro[11];
$nivel=$registro[12];


$result4 = mysqli_query($conecta,"SELECT id_usuario FROM artigo WHERE id_usuario = '$codigo3'");



if($nivel=="2") {
			$nivel = "ADMINISTRADOR";
		}
if($nivel=="1") {
			$nivel = "MODERADOR";
		}
if($nivel=="0") {
			$nivel = "USUARIO";
		}



if($ativo=="sim") {
			$ativo = "ATIVO";
		}
		else {
			$ativo = "BLOQUEADO";
		}

echo "";
echo"<div class='caixauser' style='background:$cor2'>
<div class=''>
<img class=\"fotocaixa\" src='menu/cadastro/img/$foto' />
<div class='clear'></div>
<div class='caixanoticia'>$ativo</div>
<div class='caixanoticia'>NOTICIAS</div>
<div class='clear'></div>
<div class=\"caixaresultado\">";
echo mysqli_num_rows($result4);
echo "</div>
<div class='caixadata'>$data</div>
</div>


<div class='caixanivel' style='background:$cor1'>$nome</div>




<div class='caixanivel'>$ativo</div>
<div class='caixanivel' style='background:$cor1'><a href='home.php?link=12&id=$codigo3'>EDITAR</a></div>

<div class='caixanivel'>$nivel</div>
</div>";


}

//FECHANDO A CONEXÃO
mysqli_close($conecta);

?>










                    </div>
